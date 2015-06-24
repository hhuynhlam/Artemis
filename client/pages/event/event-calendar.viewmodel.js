'use strict';

define(function (require) {
    var $ = require('jquery');
    var sandbox = require('sandbox');
    require('fullcalendar');

    var EventCalendarViewModel = function () {
        this.$selector = $('#Calendar');
        this.renderCalendar();
    };

    EventCalendarViewModel.prototype.getEvents = function (start, end, timezone, callback) {
        var data, url;

        // setup http 
        url = window.env.SERVER_HOST + '/event';
        data = {
            apiKey: window.env.API_KEY,
            startDate: (start) ? start.unix() : undefined,
            endDate: (end) ? end.unix() : undefined
        };

        // execute http
        sandbox.http.get(url, data)
        .then(function (events) {
            callback(events);
        })
        .catch(function (err) {
            console.error('Error: Cannot get events (', err, ')');
        })
        .done();
    };

    EventCalendarViewModel.prototype.transformEvent = function (eventData) {
        var className;

        if (eventData.event_code & sandbox.constant.eventType.SERVICE) { className = 'event-service'; }
        else if (eventData.event_code & sandbox.constant.eventType.FELLOWSHIP) { className = 'event-fellowship'; }
        else if (eventData.event_code & sandbox.constant.eventType.GENERAL_EVENT()) { className = 'event-general-event'; }

        return {
            title: eventData.name,
            start: sandbox.date.parseUnix(eventData.date).format('YYYY-MM-DD'),
            className: className,
            url: window.env.CLIENT_HOST + '/event/' + eventData.id
        };
    };

    EventCalendarViewModel.prototype.renderCalendar = function () {
        this.$selector.fullCalendar({
            
            // style options
            header: {
                left: 'prevYear prev',
                center: 'title',
                right: 'next nextYear'
            },
            
            contentHeight: 'auto',

            theme: true,
            themeButtonIcons: {
                prev: 'custom fa fa-angle-left',
                next: 'custom fa fa-angle-right',
                prevYear: 'custom fa fa-angle-double-left',
                nextYear: 'custom fa fa-angle-double-right'
            },

            // event rendering options
            events: this.getEvents,
            eventDataTransform: this.transformEvent,
            lazyFetching: true

            // TODO: handle < 992px for better responsiveness
            // handleWindowResize: true,
            // windowResize: function(view) {
            //     debugger;
            // },
        });
    };

    return EventCalendarViewModel;
});