'use strict';

define(function (require) {
	var ko = require('knockout');
	var utils = require('utils');

	var loginViewModel = function () {

		var self = this;
		self.password = ko.observable('');
		self.showError = ko.observable(false);
		self.submitting = ko.observable(false);		
		self.username = ko.observable('');

		this.submit = function () {

			self.submitting = ko.observable(true);	

			utils.login( self.username(), self.password() ).done(function (data) {
				
				if (data && data.length === 1) {
					utils.createUser(data[0]);
					window.location.replace('/#/');
				}
				else {
					self.showError(true);
				}

				self.submitting = ko.observable(false);	
				
			});

		};
		
	};

	return loginViewModel;
});