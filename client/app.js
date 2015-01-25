'use strict';

define(function (require) {
	var $ = require('jquery');
	var mustache = require('sammy-mustache');
	var templateRenderer = require('templateRenderer');
	var sammy = require('sammy');
	var utils = require('utils');
	require('customBindings');

	// define a new Sammy.Application bound to the #view DOM
	var app = sammy('#view', function() {

		// load mustache templating engine
		this.use(mustache, 'mustache');

		// -- Routes -- //
		// Home		
		this.get('/#/', function (context) {

			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/home/home.viewmodel', 'pages/home/home.mustache', '#home')
				.done(function () {
					utils.pageReady();
				});
		});

		// About
		this.get('/#/about', function (context) {
			
			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/about/about.viewmodel', 'pages/about/about.mustache', '#about')
				.done(function () {
					utils.pageReady();
				});
		});

		this.get('/#/about/rushinfo', function (context) {
			
			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/about/about.viewmodel', 'pages/about/information.mustache', '#rush-info')
				.done(function () {
					utils.pageReady();
				});
		});

		this.get('/#/about/rushhistory', function (context) {
			
			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/about/about.viewmodel', 'pages/about/history.mustache', '#rush-history')
				.done(function () {
					utils.pageReady();
				});
		});

		this.get('/#/about/links', function (context) {
			
			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/about/about.viewmodel', 'pages/about/links.mustache', '#affiliate-links')
				.done(function () {
					utils.pageReady();
				});
		});

		this.get('/#/about/contact', function (context) {
			
			utils.pageRendering();

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/about/about.viewmodel', 'pages/about/contact.mustache', '#contact')
				.done(function () {
					utils.pageReady();
				});
		});

		// Event
		this.get('/#/event', function (context) {
			
			if(!utils.isAuthenticated()) {
				this.redirect('#/login');
			}
			else {
				utils.pageRendering();

				templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
				templateRenderer.renderAfter(context, 'pages/event/event.viewmodel', 'pages/event/list.mustache', '#event')
					.done(function () {
						utils.pageReady();
					});
			}

		});

		this.get('/#/event/calendar', function (context) {
			
			if(!utils.isAuthenticated()) {
				this.redirect('#/login');
			}
			else {
				utils.pageRendering();

				templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
				templateRenderer.renderAfter(context, 'pages/event/event.viewmodel', 'pages/event/calendar.mustache', '#calendar')
					.done(function (viewModel) {

						utils.pageReady();
						viewModel.initCalendar(); // can only init calendar on visible DOM

					});
			}

		});

		this.get('/#/event/:id', function (context) {
			var self = this;

			if(!utils.isAuthenticated()) {
				this.redirect('#/login');
			}
			else {
				utils.pageRendering();

				templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
				templateRenderer.renderAfter(context, 'pages/event/event.viewmodel', 'pages/event/detail.mustache', '#detail')
					.done(function (viewModel) {

						viewModel.initDetails(self.params.id)
							.done(function () {
								utils.pageReady();
							})
							.fail(function () {
								console.error('Error initializing event details');
							});

					});				
			}

		});

		// Profile
		this.get('/#/profile', function (context) {
			
			if(!utils.isAuthenticated()) {
				this.redirect('#/login');
			}
			else {
				utils.pageRendering();

				templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
				templateRenderer.renderAfter(context, 'pages/profile/profile.viewmodel', 'pages/profile/profile.mustache', '#profile')
					.done(function () {
						utils.pageReady();
					});
			}

		});
		

		// Auth
		this.get('/#/login', function (context) {
			
			if(utils.isAuthenticated()) {
				this.redirect('/#/');
			}
			else {
				utils.pageRendering();

				templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
				templateRenderer.renderAfter(context, 'pages/login/login.viewmodel', 'pages/login/login.mustache', '#login')
					.done(function () {
						utils.pageReady();
					});
			}
		
		});

		this.get('/#/logout', function () {

			utils.logout();
			this.redirect('/#/');
		
		});

		// 404 Error
		this.notFound = function () {
			window.location.replace('/#/');
		};

	});

	// run app
	$(function() {

        // Override this function so that Sammy doesn't mess with forms
	    app._checkFormSubmission = function() { return (false); };
        app.run();
    });
});