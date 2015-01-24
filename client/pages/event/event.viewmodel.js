'use strict';

define(function (require) {
	var $ = require('jquery');
	var constant = require('constant');
	var ko = require('knockout');
	var moment = require('moment');
	var utils = require('utils');
	require('customBindings');

	// Locals
	var _increment = 40;
	var _limit = 40;
	var _offset = 0;

	var eventViewModel = {

		events: ko.observableArray([]),
		eventLoading: ko.observable(true),
		filter: ko.observable(0),
		pageLoading: ko.observable(true),
		title: ko.observable('Events'),
		
		general: ['general'],
		services: ['service', 'community', 'campus', 'fraternity', 'nation', 'fundraiser', 'general_service'],
		fellowships: ['fellowship', 'crazy', 'cool', 'sexy'],
		interchapters: ['interchapter', 'interchapter_home', 'interchapter_away'],

		// Filter Events
		filterEvents: function (viewmodel, event) {
			var self, filterArray, selectedFilters;
			
			// only if the thing being clicked is not disabled
			if( !$('#' + event.currentTarget.id).hasClass('disabled') ) {
				self = this;
				filterArray = [];
				selectedFilters = $('.active');
				
				// reset filters and offset
				self.filter(0);
				_offset = 0;

				// select all active filters
				selectedFilters.each(function () {
					filterArray.push(this.id);
				});

				// add to filter for each active filter
				filterArray.forEach(function (f) {
					switch(f) {
						case 'general':
							self.filter( self.filter() + constant.OTHER + constant.MEETING );
							break;
						case 'fellowship':
							self.filter( self.filter() + constant.FELLOWSHIP );
							break;
						case 'service':
							self.filter( self.filter() + constant.SERVICE );
							break;
						case 'interchapter':
							self.filter( self.filter() + constant.INTERCHAPTER_AWAY + constant.INTERCHAPTER_HOME );
							break;
					}
				});

				// clear events
				self.events([]);
				self.loadEvents( self.filter() );

			}

		},

		// Loading events
		loadEvents: function (type) {
			var self = this;
			var getEvents = (type) ? utils.getEvents(type, _limit, _offset) : utils.getEvents(null, _limit, _offset);
			
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
		},

		showFilters: function () {
			$('.filter-collapse').toggle();
		},

	};

	// Computed Observables
	eventViewModel.loaderEnabled = ko.computed(function () {
		return eventViewModel.pageLoading() || eventViewModel.eventLoading();
	});
	
	// Init
	(function init() {
		eventViewModel.loadEvents();
		
		// lazy load events
		$(window).on("scroll", function() {
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();
			
			// scroll is pass document height
			if (scrollPosition > (scrollHeight + 40) ) {
				eventViewModel.loadEvents( eventViewModel.filter() );
			}
		});
	})();

	return eventViewModel;

});