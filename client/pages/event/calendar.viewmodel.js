'use strict';

define(function (require) {
	var $ = require('jquery');
	var constant = require('constant');
	var env = require('env');
	var moment = require('moment');
	var utils = require('utils');
	require('fullcalendar');

	var calendarViewModel = {
		
		// Calendar
		initCalendar: function () {

			var _getEventType = function (eventCode) {

				if (parseInt(eventCode) & constant.MEETING & constant.OTHER) {
					return 'event_other';
				}
				else if (parseInt(eventCode) & constant.FELLOWSHIP) {
					return 'event_fellowship';
				}
				else if (parseInt(eventCode) & constant.SERVICE) {
					return 'event_service';
				}
				else if (parseInt(eventCode) & constant.INTERCHAPTER_HOME & constant.INTERCHAPTER_AWAY) {
					return 'event_interchapter';
				}

			};

			// load events
			var renderEvents = function (start, end, timezone, callback) {
				var _events = [];
				var loadEvents = utils.getEvents(null, start, end);
				
				loadEvents.done(function (events) {
					
					events.forEach(function (e) {
						_events.push({
							id: e.id,
							className: _getEventType(e.event_code),
							title: e.name,
							start: moment.unix(e.date)
						});
					});

					callback(_events);

				});		
			};

			// init calendar
			$('#eventCalendar').fullCalendar({
				editable: false,
				eventClick: function (e) {
					window.location.href = env.CLIENT_ROOT + '/#/event/' + e.id;
				},
				events: renderEvents,
				fixedWeekCount: false,
		        header:{
		          right: 'prev,next'
		        }
			});

		}

	};

	return calendarViewModel;
});