'use strict';

define(function (require) {
	var ko = require('knockout');
	var sammy = require('sammy');
	require('bootstrap');

	// set environment variables
	window.env = window.env || require('json!env.json');

	var AppViewModel = function () {
		this.isReady = ko.observable(false);
	};

	// define a new Sammy.Application bound to the #MainView DOM
	var app = sammy('#MainView');

	// -- Routes -- //
	require('home.router')(app);
	require('login.router')(app);

	// 404 Error
	app.notFound = function () {
		window.location.replace('/#/');
	};

	// Override this function so that Sammy doesn't mess with forms
    app._checkFormSubmission = function() { return false; };


	// run app
	$(function() { 
		ko.applyBindings(new AppViewModel(), document.getElementById('MainView'));
		app.run(); 
	});
});