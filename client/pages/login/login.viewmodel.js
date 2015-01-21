'use strict';

define(function (require) {
	var ko = require('knockout');
	var utils = require('utils');

	var loginViewModel = function () {

		var self = this;
		self.errorMessage = ko.observable('');
		self.password = ko.observable('');
		self.submitting = ko.observable(false);		
		self.username = ko.observable('');

		this.submit = function () {

			self.submitting = ko.observable(true);	

			utils.login( self.username(), self.password() )
				
				.success(function (data) {
				
					if (data && data.length === 1) {
						utils.createUserCookie(data[0]);
						window.location.replace('/#/');
					}
					else {
						self.errorMessage('Username and/or Password does not match.');
					}

					self.submitting = ko.observable(false);	
					
				})
				
				.fail(function () {

					self.errorMessage('Cannot connect to host. Please try again later.');

				});

		};
		
	};

	return loginViewModel;
});