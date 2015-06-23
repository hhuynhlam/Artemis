'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    require('fullcalendar');

    var EventCalendarViewModel = function () {
        var month = sandbox.date.getStartEndOfMonth(sandbox.date.getDate().format('M'));
        this.$selector = $('#Calendar');

        // setup
        this.setupObservables();

        // load events
        this.getEvents({
            startDate: month.start,
            endDate: month.end
        })
        .then(function (events) {
            this.events(events);
            this.renderCalendar();
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
            startDate: (options.startDate) ? options.startDate.unix() : undefined,
            endDate: (options.endDate) ? options.endDate.unix() : undefined
        };

        return sandbox.http.get(url, data);
    };

    EventCalendarViewModel.prototype.renderCalendar = function () {
        this.$selector.fullCalendar({
            header: {
                left: 'prevYear prev',
                center: 'title',
                right: 'next nextYear'
            },
            
            theme: true,
            themeButtonIcons: {
                prev: 'custom fa fa-angle-left',
                next: 'custom fa fa-angle-right',
                prevYear: 'custom fa fa-angle-double-left',
                nextYear: 'custom fa fa-angle-double-right'
            },

            events: this.calendarEvents()
        });
    };

    EventCalendarViewModel.prototype.setupObservables = function () {
        this.events = ko.observableArray([]);
        
        this.calendarEvents = ko.computed(function () {
            var data = [];
            this.events().forEach(function (event) {
                data.push({
                    title: event.name,
                    start: sandbox.date.parseUnix(event.date).format('YYYY-MM-DD')
                });
            });
            return data;
        }, this);

        this.calendarEvents.subscribe(function () { this.renderCalendar(); }, this);
    };

    return EventCalendarViewModel;
});