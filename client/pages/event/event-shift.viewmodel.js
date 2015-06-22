'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var EventActionViewModel = require('event-action.viewmodel');

    var EventShiftViewModel = function (eventId) {
        this.eventActionViewModel = ko.observable(new EventActionViewModel());
        this.currentUser = auth.currentUser();
        this.shifts = ko.observableArray([]);
        this.signups = ko.observable({});
        this.waitlist = ko.observable({});

        // init shifts
        this.getData('shifts', eventId)
        .then(function (shifts) {
            this.disablePastShifts(shifts);

            shifts.forEach(function (s) {
                this.formatShiftData(s);
                this.setShiftObservables(s);
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
            this.getData('signups', shift.id)       // get the signups
            .then(function (signups) {
                var result = {};
                result[shift.id] = signups;
                this.signups(sandbox.util.assign(this.signups, result));
                this.setSignUpAvailabilityForShift(this.currentUser, shift, signups);
            }.bind(this))
            .catch(function (err) {
                console.error('Error: Cannot get signups (', err, ')');
            })
            .done();

            // setup signup, remove, waitlist, remove form waitlist
            this.setActionSubscriptions(shift);

        }, this);
    };

    EventShiftViewModel.prototype.setSignUpAvailabilityForShift = function (user, shift, signups) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; }), 
            userSignedUp = sandbox.util.find(signups, function (su) { return su.user === user.id; }, this);

        // find out if shift is full
        if(signups.length >= shift.cap && shift.cap !== '0' && shift.cap !== '-1') { currentShift.isFull(true); }

        // find out if current user already signup to shift
        if(userSignedUp) { currentShift.isSignedUp(true); }
    };

    EventShiftViewModel.prototype.getWaitlists = function (shifts) {
        shifts.forEach(function (shift) { 
            this.getData('waitlist', shift.id)       
            .then(function (waitlist) {
                var result = {};
                result[shift.id] = waitlist;
                this.waitlist(sandbox.util.assign(this.waitlist, result));
                this.setWaitlistAvailabilityForShift(shift, waitlist);            
            }.bind(this))
            .catch(function (err) {
                console.error('Error: Cannot get waitlist (', err, ')');
            })
            .done();    
        }, this);
    };

    EventShiftViewModel.prototype.setWaitlistAvailabilityForShift = function (shift, waitlist) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; }), 
            userWaitlisted = sandbox.util.find(waitlist, function (w) { return w.id === this.currentUser.id; }, this);

        // find out if current user already waitlisted to shift
        if(userWaitlisted) { currentShift.isWaitlisted(true); }
    };

    EventShiftViewModel.prototype.formatShiftData = function (shift) {
        shift.start_time = (shift.start_time) ? sandbox.date.parseUnix(shift.start_time).format('h:mm A') : '';
        shift.end_time = (shift.end_time) ? sandbox.date.parseUnix(shift.end_time).format('h:mm A') : '';
    };

    EventShiftViewModel.prototype.getData = function (name, id) {
        var data = {
            apiKey: window.env.API_KEY
        }, url;

        switch(name) {
            case 'shifts':
                data.event = id;
                url = window.env.SERVER_HOST + '/shift';
                break;
            case 'signups':
                data.shift = id;
                url = window.env.SERVER_HOST + '/shift/signups';
                break;
            case 'waitlist':
                data.shift = id;
                url = window.env.SERVER_HOST + '/waitlist';
                break;
        }

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
            
            if(!this.waitlist()[shift.id].length) { currentShift.isFull(false); }
            this.getWaitlists([shift]);
            
        }, this);
    };

    EventShiftViewModel.prototype.setShiftObservables = function (shift) {
        shift.isFull = ko.observable(false);
        shift.isSignedUp = ko.observable(false);
        shift.isWaitlisted = ko.observable(false);

        shift.canSignUp = ko.computed(function () {
            return !shift.isSignedUp() && !shift.isFull() && (shift.open_to & this.currentUser.position);
        }, this);

        shift.canWaitlist = ko.computed(function () {
            return !shift.isSignedUp() && shift.isFull() && !shift.isWaitlisted() && (shift.open_to & this.currentUser.position);
        }, this);
    };

    EventShiftViewModel.prototype.disablePastShifts = function (shifts) {
        var currentDate = sandbox.date.toUnix();
        shifts.forEach(function (s) {
            if (s.start_time <= currentDate) { s.disabled = true; }
            else { s.disabled = false; }
        });
    };

    return EventShiftViewModel;
});