'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    require('k/kendo.calendar.min');

    var EventCalendarViewModel = function () {
        this.$selector = $('#Calendar');
        this.events = ko.observableArray([]);

        // init calendar
        var data = {
            value: 'Hello'
        };

        this.$selector.kendoCalendar({
            data: data,
            month: {
                content: '<span>#= data.value #</span>'
            }
        });

        this.getEvents()
        .then(function (events) {
            this.events(events);
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get events (', err, ')');
        })
        .done();
    };

    EventCalendarViewModel.prototype.getEvents = function (options) {
        var data, url;
        options = options || {};

        url = window.env.SERVER_HOST + '/event';
        data = {
            apiKey: window.env.API_KEY,
            event_code: options.type,
            startDate: (options.startDate) ? sandbox.date.toUnix(options.startDate) : undefined,
            endDate: (options.startDate) ? sandbox.date.toUnix(options.endDate) : undefined
        };

        return sandbox.http.get(url, data);
    };

    return EventCalendarViewModel;
});