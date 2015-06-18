'use strict';

define(function (require) {
	var auth = require('auth');
	var ko = require('knockout');
	var sandbox = require('sandbox');

	var ProfileViewModel = function () {

		var currentUser = auth.currentUser();
		
		this.formViewModel = {
			phone: ko.observable(currentUser.phone),
			email: ko.observable(currentUser.email),
			shirtSize: ko.observable(currentUser.shirt_size),
			schoolAddress: ko.observable(currentUser.temp_address),
			permAddress: ko.observable(currentUser.perm_address),
			newPassword: ko.observable('')
		};
	};

	ProfileViewModel.prototype.toggleSubmit = function (data, element) {
		
		// if (element.target.value) {
		// 	changedInputs[element.target.name] = element.target.value;

		// 	if( !_.isEmpty(changedInputs) ) {
		// 		self.submitEnabled(true);
		// 	}
		// }
		// else if (!element.target.value) {
		// 	delete changedInputs[element.target.name];
			
		// 	if ( _.isEmpty(changedInputs) ) {
		// 		self.submitEnabled(false);
		// 	}
		// }
		
	};

	ProfileViewModel.prototype.clean = function () {
		// self.successMessage('');
		// self.errorMessage('');
		// self.submitEnabled(false);
		// self.submitting(false);

		// changedInputs = {};

		// $('#editProfile')[0].reset();
		// $('select[name=shirt_size]').val(self.shirtSize());
	};
	
	ProfileViewModel.prototype.save = function () {
		
		// // check confirmation password
		// if ( md5(self.confirmPassword()) !== currentUser().password ) {
		// 	self.confirmError(true);
		// 	self.confirmPassword('');
		// }

		// else {
		// 	self.confirmPassword('');
		// 	self.confirmEnabled(false);
		// 	self.submitting(true);
			
		// 	changedInputs._id = currentUser().id; // append id
			
		// 	utils.updateUser(changedInputs)
		// 		.done(function () {
					
		// 			// remove cookie and re-login
		// 			utils.resetCurrentUser(self.password()).done(function (data) {
						
		// 				utils.createUserCookie(data[0]);
		// 				currentUser(utils.getCurrentUser());

		// 				self.clean();
		// 				self.successMessage('You have successfully updated your profile.');
		// 			});
		// 		})

		// 		.fail(function () {
		// 			self.errorMessage('There was an error attempting to save your profile. Please try again later.');
		// 			self.successMessage('');
		// 			self.submitting(false);
		// 		});
		// }
		
	};

	return ProfileViewModel;
});