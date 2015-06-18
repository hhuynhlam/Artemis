'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var ShiftViewModel = require('event-shift.viewmodel');

    var EventDetailViewModel = function (eventId) {
        this.event = ko.observable({});
        this.shiftViewModel = ko.observable(new ShiftViewModel(eventId));

        // init event
        this.getEvent({ id: eventId })
        .then(function (event) {
            var _event = event[0];
            _event.date = (_event.date) ? sandbox.date.parseUnix(_event.date).format('MM/DD/YYYY') : '';
            this.event(_event);
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get event (', err, ')');
        })
        .done();
    };

    EventDetailViewModel.prototype.getEvent = function (options) {
        var data, url;
        options = options || {};
        
        url = window.env.SERVER_HOST + '/event';
        data = {
            apiKey: window.env.API_KEY,
            id: options.id
        };

        return sandbox.http.get(url, data);
    };

    return EventDetailViewModel;
});