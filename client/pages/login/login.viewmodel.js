'use strict';

define(function (require) {
	var auth = require('auth');
	var ko = require('knockout');

	var LoginViewModel = function () {
		this.password = ko.observable('');
		this.username = ko.observable('');

		this.cancel = function () {
			// window.location.href = env.CLIENT_ROOT + '/#/';
		};

		this.submit = function () {
			auth.login(this.username(), this.password())
			.then(function () {
				window.location.replace(window.env.CLIENT_HOST);
			})
			.catch(function (err) {
				console.error('Error: Could not login (', err ,')');
			})
			.done();
		}.bind(this);
		
	};

	return LoginViewModel;
});