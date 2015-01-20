'use strict';

define(function (require) {
	var ko = require('knockout');
	var utils = require('utils');
	require('customBindings');

	var profileViewModel = function () {

		var self = this;
		var currentUser = utils.getCurrentUser();

		self.username = ko.observable(currentUser.username);
		self.phone = ko.observable(currentUser.phone);
		self.email = ko.observable(currentUser.email);
		self.shirtSize = ko.observable(currentUser.shirt_size);
		self.schoolAddress = ko.observable(currentUser.temp_address);
		self.permanentAddress = ko.observable(currentUser.perm_address);

		self.submitEnabled = ko.observable(false);

		self.toggleSubmit = function (data, element) {
			if (element.target.value && !self.submitEnabled()) {
				self.submitEnabled(true);
			}
			else if (!element.target.value && self.submitEnabled()) {
				self.submitEnabled(false);
			}
			
		};

		self.save = function () {
			
		};


	};

	return profileViewModel;
});