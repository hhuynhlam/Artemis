'use strict';

define(function (require) {
	var ko = require('knockout');
	var sandbox = require('sandbox');

	var EventViewModel = function () {
		this.events = ko.observableArray([]);
		
		this.formattedEvents = ko.computed(function () {
			var result = [];
			this.events().forEach(function (e) {
				e.date = sandbox.date.parseUnix(e.date).format('MM/DD/YYYY');
				result.push(e);
			});
			return result;
		}, this);

		// init events
		this.getEvents({
			type: sandbox.constant.eventType.SERVICE,
			limit: 20
		})
		.then(function (events) {
			this.events(events);
		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get events (', err, ')');
		})
		.done();
	};

	EventViewModel.prototype.getEvents = function (options) {
		var data, url;
		options = options || {};
        
        url = window.env.SERVER_HOST + '/event';
        data = {
        	apiKey: window.env.API_KEY,
        	event_code: options.type,
        	limit: options.limit,
        	offset: options.offset,
        	startDate: (options.startDate) ? sandbox.date.toUnix(options.startDate) : undefined,
        	endDate: (options.endDate) ? sandbox.date.toUnix(options.endDate) : undefined
        };

        return sandbox.http.get(url, data);
	};

	return EventViewModel;
});