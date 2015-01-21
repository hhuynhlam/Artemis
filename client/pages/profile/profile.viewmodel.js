'use strict';

define(function (require) {
	var _ = require('lodash');
	var ko = require('knockout');
	var utils = require('utils');
	require('customBindings');

	var profileViewModel = function () {

		// Local Variables
		var self = this;
		var currentUser = utils.getCurrentUser();
		var changedInputs = {};

		// Input Observables
		self.username = ko.observable(currentUser.username);
		self.phone = ko.observable(currentUser.phone);
		self.email = ko.observable(currentUser.email);
		self.shirtSize = ko.observable(currentUser.shirt_size);
		self.schoolAddress = ko.observable(currentUser.temp_address);
		self.permanentAddress = ko.observable(currentUser.perm_address);

		// Display Observables
		self.submitEnabled = ko.observable(false);

		self.toggleSubmit = function (data, element) {
			
			if (element.target.value) {
				changedInputs[element.target.name] = element.target.value;

				if( !_.isEmpty(changedInputs) ) {
					self.submitEnabled(true);
				}
			}
			else if (!element.target.value) {
				delete changedInputs[element.target.name];
				
				if ( _.isEmpty(changedInputs) ) {
					self.submitEnabled(false);
				}
			}
			
		};

		self.clean = function () {
			self.shirtSize(currentUser.shirt_size);
		};

		self.save = function () {

			changedInputs._id = currentUser.id; // append user.id
			
			utils.updateUser(changedInputs)
				.success(function (data) {
					console.log(data);
				})
				.fail(function () {
					console.log('error');
				});

			// prevent default submit action	
			return false;
		};


	};

	return profileViewModel;
});