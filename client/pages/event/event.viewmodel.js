'use strict';

define(function (require) {
	var $ = require('jquery');
	var constant = require('constant');
	var ko = require('knockout');
	var moment = require('moment');
	var utils = require('utils');

	// Locals
	var _increment = 20;
	var _limit = 20;
	var _offset = 0;

	var eventViewModel = {

		events: ko.observableArray([]),
		eventLoading: ko.observable(true),
		pageLoading: ko.observable(true),

		loadFellowships: function () {
			var self = this;
			var getEvents = utils.getEvents(constant.FELLOWSHIP, _limit, _offset);
			
			self.eventLoading(true);

			getEvents.done(function (data) {
				data.forEach(function (e) {

					// convert to formatted date string from unix timestamp
					e.date = moment.unix(e.date).format('MM/DD/YYYY');
					self.events.push(e);
				});

				_offset += _increment;
				self.eventLoading(false);
				self.pageLoading(false);
			});

			getEvents.fail(function (error) {
				self.eventLoading(false);
				self.pageLoading(false);
				console.error('error: ' + error);
			});
		}

	};

	// Computed Observables
	eventViewModel.loaderEnabled = ko.computed(function () {
		return eventViewModel.pageLoading() || eventViewModel.eventLoading();
	});
	
	// Init
	(function init() {
		eventViewModel.loadFellowships();
		
		// lazy load events
		$(window).on("scroll", function() {
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();
			
			// scroll is pass document height
			if (scrollPosition > (scrollHeight + 40) ) {
				eventViewModel.loadFellowships();
			}
		});
	})();

	return eventViewModel;

});