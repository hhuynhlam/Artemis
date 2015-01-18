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

		// routes
		this.get('/', function (context) {

			templateRenderer.renderClean(context, 'components/navbar/navbar.viewmodel', 'components/navbar/navbar.mustache', '#navbar');
			templateRenderer.renderAfter(context, 'pages/home/home.viewmodel', 'pages/home/home.mustache', '#home');
		
		});

		// this.get('/#/event', function () {
		// 	if(!utils.isAuthenticated()) {
		// 		this.redirect('#/login');
		// 	}
		// });
		
		this.get('/#/login', function () {

			utils.createLoggedInCookie();
			console.log('logged in...');
			this.redirect('/');
		
		});

	});

	// run app
	$(function() {
        app.run();
    });
});