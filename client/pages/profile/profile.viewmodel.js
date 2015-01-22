'use strict';

define(function (require) {
	var $ = require('jquery');
	var _ = require('lodash');
	var ko = require('knockout');
	var utils = require('utils');
	require('customBindings');

	var currentUser = ko.observable(utils.getCurrentUser());
	var changedInputs = {};

	var profileViewModel = function () {
		var self = this;

		// Input Observables
		self.username = ko.computed(function () { return currentUser().username; });
		self.phone = ko.computed(function () { return currentUser().phone; });
		self.email = ko.computed(function () { return currentUser().email; });
		self.shirtSize = ko.computed(function () { return currentUser().shirt_size; });
		self.schoolAddress = ko.computed(function () { return currentUser().temp_address; });
		self.permanentAddress = ko.computed(function () { return currentUser().perm_address; });

		// Display Observables
		self.submitEnabled = ko.observable(false);
		self.submitting = ko.observable(false);
		self.errorMessage = ko.observable('');
		self.successMessage = ko.observable('');

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
			self.successMessage('');
			self.errorMessage('');
			self.submitEnabled(false);
			self.submitting(false);
			
			$('#editProfile')[0].reset();
			$('select[name=shirt_size]').val(self.shirtSize());
		};

		self.save = function () {
			
			self.submitting(true);

			changedInputs._id = currentUser().id; // append user.id
			
			utils.updateUser(changedInputs)
				.done(function () {
					
					// remove cookie and re-login
					utils.resetCurrentUser().done(function (data) {
						
						utils.createUserCookie(data[0]);
						currentUser(utils.getCurrentUser());

						self.clean();
						self.successMessage('You have successfully updated your profile.');
						self.submitting(false);
					});
				})

				.fail(function () {
					self.errorMessage('There was an error attempting to save your profile. Please try again later.');
					self.submitting(false);
				});
		};


	};

	return profileViewModel;
});