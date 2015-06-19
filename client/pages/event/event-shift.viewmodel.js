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

        // init shifts
        this.getShifts({ eventId: eventId })
        .then(function (shifts) {
            shifts.forEach(function (s) {
                s.start_time = (s.start_time) ? sandbox.date.parseUnix(s.start_time).format('h:mm A') : '';
                s.end_time = (s.end_time) ? sandbox.date.parseUnix(s.end_time).format('h:mm A') : '';
                s.isFull = ko.observable(false);
                s.isSignedUp = ko.observable(false);
            }, this);

            this.shifts(shifts);
            this.getSignups(shifts);

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

    EventShiftViewModel.prototype.getSignupsByShift = function (shiftId) {
        var data, url;
        
        url = window.env.SERVER_HOST + '/shift/signups';
        data = {
            apiKey: window.env.API_KEY,
            shift: shiftId
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

    EventShiftViewModel.prototype.setActionSubscriptions = function (shift) {
        var currentShift = sandbox.util.find(this.shifts(), function (s) { return s.id === shift.id; });

        sandbox.msg.subscribe(shift.id + '.shift.add', function (updatedSignups) {
            var updated = {};
            updated[shift.id] = updatedSignups;
            this.signups(sandbox.util.assign(this.signups, updated));
            currentShift.isSignedUp(true);
        }, this);

        sandbox.msg.subscribe(shift.id + '.shift.waitlist', function () {
            debugger;
        });

        sandbox.msg.subscribe(shift.id + '.shift.remove', function (updatedSignups) {
            var updated = {};
            updated[shift.id] = updatedSignups;
            this.signups(sandbox.util.assign(this.signups, updated));
            currentShift.isSignedUp(false);
        }, this);
    };

    return EventShiftViewModel;
});