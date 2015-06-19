'use strict';

define(function (require) {
    var $= require('jquery');
    var auth = require('auth');
    var sandbox = require('sandbox');

    var EventSignupViewModel = function () {
        this.currentUser = auth.currentUser();
    };

    EventSignupViewModel.prototype.add = function (viewmodel, event) {
        var $target = $($(event)[0].target),
            data, url;
        
        url = window.env.SERVER_HOST + '/shift/user/signups/add';
        data = {
            apiKey: window.env.API_KEY,
            user: this.currentUser.id,
            shift: $target.attr('data-shiftId'),
            event: $target.attr('data-eventId'),
            driver: 0,
            timestamp: sandbox.date.toUnix()
        };

        sandbox.http.post(url, data)
        .then(function (signups) {
            sandbox.msg.publish($target.attr('data-shiftId') + '.shift.add', signups);
        })
        .catch(function (err) {
            console.error('Error: Could not add user to shift (', err, ')');
        })
        .done();
    };

    EventSignupViewModel.prototype.addWaitlist = function (viewmodel, event) {
        var $target = $($(event)[0].target),
            data, url;
        
        url = window.env.SERVER_HOST + '/waitlist/add';
        data = {
            apiKey: window.env.API_KEY,
            user: this.currentUser.id,
            shift: $target.attr('data-shiftId'),
            event: $target.attr('data-eventId'),
            timestamp: sandbox.date.toUnix()
        };

        sandbox.http.post(url, data)
        .then(function (waitlist) {
            sandbox.msg.publish($target.attr('data-shiftId') + '.shift.waitlist.add', waitlist);
        })
        .catch(function (err) {
            console.error('Error: Could not waitlist to shift (', err, ')');
        })
        .done();
    };

    EventSignupViewModel.prototype.removeWaitlist = function (viewmodel, event) {
        var $target = $($(event)[0].target),
            data, url;
        
        url = window.env.SERVER_HOST + '/waitlist/delete';
        data = {
            apiKey: window.env.API_KEY,
            user: this.currentUser.id,
            shift: $target.attr('data-shiftId'),
            event: $target.attr('data-eventId'),
            timestamp: sandbox.date.toUnix()
        };

        sandbox.http.post(url, data)
        .then(function (waitlist) {
            sandbox.msg.publish($target.attr('data-shiftId') + '.shift.waitlist.remove', waitlist);
        })
        .catch(function (err) {
            console.error('Error: Could not remove waitlist from shift (', err, ')');
        })
        .done();
    };

    EventSignupViewModel.prototype.remove = function (viewmodel, event) {
        var $target = $($(event)[0].target),
            data, url;
        
        url = window.env.SERVER_HOST + '/shift/user/signups/delete';
        data = {
            apiKey: window.env.API_KEY,
            user: this.currentUser.id,
            shift: $target.attr('data-shiftId'),
            event: $target.attr('data-eventId')
        };

        sandbox.http.get(url, data)
        .then(function (signups) {
            sandbox.msg.publish($target.attr('data-shiftId') + '.shift.remove', signups);
        })
        .catch(function (err) {
            console.error('Error: Could not remove user to shift (', err, ')');
        })
        .done();
    };

    return EventSignupViewModel;
});