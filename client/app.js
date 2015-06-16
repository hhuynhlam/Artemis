'use strict';

define(function (require) {
	var $ = require('jquery');
	var env = require('env');
	var ko = require('knockout');
	var sammy = require('sammy');
	var sandbox = require('sandbox');

	// define a new Sammy.Application bound to the #MainView DOM
	var app = sammy('#MainView');

		// -- Routes -- //
		// Home		
		app.get('/#/', function (context) {
			require([
				'navbar.viewmodel', 'text!components/navbar/navbar.html',
				'home.viewmodel', 'text!pages/home/home.html'
			], function (NavbarViewModel, navBarTemplate, HomeViewModel, homeTemplate) {
				var partials = navBarTemplate.concat(homeTemplate);
				context.swap(sandbox.util.template(partials));

				// apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new HomeViewModel(), document.getElementById('Home'));
			});
		});

		// 404 Error
		app.notFound = function () {
			window.location.replace(env.CLIENT_ROOT + '/#/');
		};

		// Override this function so that Sammy doesn't mess with forms
	    app._checkFormSubmission = function() { return (false); };


	// run app
	$(function() { app.run(); });
});