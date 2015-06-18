'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var EventShiftViewModel = function (eventId) {
        this.shifts = ko.observableArray([]);
        this.signups = ko.observable({});

        // init shifts
        this.getShifts({ eventId: eventId })
        .then(function (shifts) {
            
            this.getSignups(shifts);

            shifts.forEach(function (s) {
                s.start_time = (s.start_time) ? sandbox.date.parseUnix(s.start_time).format('h:mm A') : '';
                s.end_time = (s.end_time) ? sandbox.date.parseUnix(s.end_time).format('h:mm A') : '';
            }, this);

            this.shifts(shifts);
        
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get shifts (', err, ')');
        })
        .done();
    };

    EventShiftViewModel.prototype.getSignups = function (shifts) {
        shifts.forEach(function (s) {           // for each shift
            this.getSignupsByShift(s.id)        // get the signups
            .then(function (signups) {

                var result = {};
                result[s.id] = signups;
                this.signups(sandbox.util.assign(this.signups, result));
            
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

    return EventShiftViewModel;
});