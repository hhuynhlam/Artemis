'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var EventSignupViewModel = require('event-signup.viewmodel');

    var EventShiftViewModel = function (eventId) {
        this.eventSignupViewModel = ko.observable(new EventSignupViewModel());
        this.currentUser = auth.currentUser();
        this.shifts = ko.observableArray([]);
        this.signups = ko.observable({});
        this.waitlist = ko.observable({});

        // init shifts
        this.getShifts({ eventId: eventId })
        .then(function (shifts) {
            shifts.forEach(function (s) {
                s.start_time = (s.start_time) ? sandbox.date.parseUnix(s.start_time).format('h:mm A') : '';
                s.end_time = (s.end_time) ? sandbox.date.parseUnix(s.end_time).format('h:mm A') : '';
                s.isFull = ko.observable(false);
                s.isSignedUp = ko.observable(false);
                s.isWaitlisted = ko.observable(false);
            }, this);

            this.shifts(shifts);
            this.getSignups(shifts);
            this.getWaitlists(shifts);

        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get shifts (', err, ')');
        })
        .done();
    };

    EventShiftViewModel.prototype.getSignups = function (shifts) {
        shifts.forEach(function (shift) {           // for each shift
            this.getSignupsByShift(shift.id)        // get the signups
            .then(function (signups) {
                var result = {};
                result[shift.id] = signups;

                this.signups(sandbox.util.assign(this.signups, result));
                this.setShiftAvailability(this.currentUser, shift, signups);
                this.setActionSubscriptions(shift);
            
            }.bind(this))
            .catch(function (err) {
                console.error('Error: Cannot get signups (', err, ')');
            })
            .done();    
        }, this);
    };

    EventShiftViewModel.prototype.getSignupsByShift = function (shiftId) {
        var data, url;
        
        url = window.env.SERVER_HOST + '/shift/signups';
        data = {
            apiKey: window.env.API_KEY,
            shift: shiftId
        };

        return sandbox.http.get(url, data);
    };

    EventShiftViewModel.prototype.getShifts = function (options) {
        var data, url;
        options = options || {};
        
        url = window.env.SERVER_HOST + '/shift';
        data = {
            apiKey: window.env.API_KEY,
            event: options.eventId
        };

        return sandbox.http.get(url, data);
    };

    EventShiftViewModel.prototype.setShiftAvailability = function (user, shift, signups) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; }), 
            userSignedUp = sandbox.util.find(signups, function (su) { return su.user === user.id; }, this);

        // find out if shift is full
        if(signups.length >= shift.cap && shift.cap !== '0') { currentShift.isFull(true); }

        // find out if current user already signup to shift
        if(userSignedUp) { currentShift.isSignedUp(true); }
    };

    EventShiftViewModel.prototype.getWaitlists = function (shifts) {
        shifts.forEach(function (shift) {           // for each shift
            this.getWaitlistByShift(shift.id)        // get the signups
            .then(function (waitlist) {
                var result = {};
                result[shift.id] = waitlist;

                this.waitlist(sandbox.util.assign(this.waitlist, result));
                this.setWaitlistAvailability(this.currentUser, shift, waitlist);            
            }.bind(this))
            .catch(function (err) {
                console.error('Error: Cannot get waitlist (', err, ')');
            })
            .done();    
        }, this);
    };

    EventShiftViewModel.prototype.setWaitlistAvailability = function (user, shift, waitlist) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; }), 
            userWaitlisted = sandbox.util.find(waitlist, function (w) { return w.id === user.id; }, this);

        // find out if current user already waitlisted to shift
        if(userWaitlisted) { currentShift.isWaitlisted(true); }
    };

    EventShiftViewModel.prototype.getWaitlistByShift = function (shiftId) {
        var data, url;
        
        url = window.env.SERVER_HOST + '/waitlist';
        data = {
            apiKey: window.env.API_KEY,
            shift: shiftId
        };

        return sandbox.http.get(url, data);
    };

    EventShiftViewModel.prototype.setActionSubscriptions = function (shift) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; });

        sandbox.msg.subscribe(shift.id + '.shift.add', function (updatedSignups) {
            var updated = {};
            updated[shift.id] = updatedSignups;
            this.signups(sandbox.util.assign(this.signups, updated));
            currentShift.isSignedUp(true);
        }, this);

        sandbox.msg.subscribe(shift.id + '.shift.waitlist.add', function (updatedWaitlist) {
            var updated = {};
            updated[shift.id] = updatedWaitlist;
            this.waitlist(sandbox.util.assign(this.waitlist, updated));
            currentShift.isWaitlisted(true);
        }, this);

        sandbox.msg.subscribe(shift.id + '.shift.waitlist.remove', function (updatedWaitlist) {
            var updated = {};
            updated[shift.id] = updatedWaitlist;
            this.waitlist(sandbox.util.assign(this.waitlist, updated));
            currentShift.isWaitlisted(false);
        }, this);

        sandbox.msg.subscribe(shift.id + '.shift.remove', function (updatedSignups) {
            var updated = {};
            updated[shift.id] = updatedSignups;
            this.signups(sandbox.util.assign(this.signups, updated));
            currentShift.isSignedUp(false);
            currentShift.isFull(false);
        }, this);
    };

    return EventShiftViewModel;
});