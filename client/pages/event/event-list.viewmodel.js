'use strict';

define(function (require) {
    var _LIMIT = 50;
	var ko = require('knockout');
	var sandbox = require('sandbox');

	var EventListViewModel = function () {
		this.events = ko.observableArray([]);
        this.isMore = ko.observable(true);
        this.loadOffset = ko.observable(_LIMIT);
		
		this.formattedEvents = ko.computed(function () {
			var result = [];
			this.events().forEach(function (e) {
				e.date = (e.date) ? sandbox.date.parseUnix(e.date).format('MM/DD/YYYY') : '';
				result.push(e);
			});
			return result;
		}, this);

		// init events
		this.getEvents({
			limit: _LIMIT
		})
		.then(function (events) {
			this.events(events);
		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get events (', err, ')');
		})
		.done();
	};

	EventListViewModel.prototype.getEvents = function (options) {
		var data, url;
		options = options || {};
        
        url = window.env.SERVER_HOST + '/event';
        data = {
        	apiKey: window.env.API_KEY,
        	event_code: options.type,
        	limit: options.limit,
        	offset: options.offset,
        	startDate: sandbox.date.toUnix(options.startDate),
        	endDate: (options.endDate) ? sandbox.date.toUnix(options.endDate) : undefined
        };

        return sandbox.http.get(url, data);
	};

    EventListViewModel.prototype.seeMore = function () {
        if(!this.isMore()) { return; }

        this.getEvents({
            limit: _LIMIT,
            offset: this.loadOffset()
        })
        .then(function (events) {
            if(events.length) {
                this.loadOffset(this.loadOffset() + _LIMIT);
                events.forEach(function (e) { this.events.push(e); }, this);
            } else {
                this.isMore(false);
            }
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get more events (', err, ')');
        })
        .done();
    };

	return EventListViewModel;
});