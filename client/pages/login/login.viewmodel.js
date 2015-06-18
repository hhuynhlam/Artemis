'use strict';

define(function (require) {
	var auth = require('auth');
	var ko = require('knockout');

	var LoginViewModel = function () {
		this.password = ko.observable('');
		this.username = ko.observable('');
	};

	LoginViewModel.prototype.cancel = function () {
		window.location.href = window.env.CLIENT_HOST;
	};

	LoginViewModel.prototype.submit = function () {
		auth.login(this.username(), this.password())
		.then(function (user) {
			if (user) { window.location.replace(window.env.CLIENT_HOST); }
			else {
				console.log('do something with unsuccessful login here');
			}
		})
		.done();
	};

	return LoginViewModel;
});