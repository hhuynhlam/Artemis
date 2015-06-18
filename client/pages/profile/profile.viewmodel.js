'use strict';

define(function (require) {
	var $ = require('jquery');
	var auth = require('auth');
	var ko = require('knockout');
	var sandbox = require('sandbox');

	var confirmTemplate = require('text!pages/profile/templates/save-confirm.html');
	require('k/kendo.window.min');

	var ProfileViewModel = function () {

		var currentUser = auth.currentUser();
		this.currentUser = currentUser;
		
		this.formViewModel = {
			phone: ko.observable(currentUser.phone),
			email: ko.observable(currentUser.email),
			shirtSize: ko.observable(currentUser.shirt_size),
			schoolAddress: ko.observable(currentUser.temp_address),
			permAddress: ko.observable(currentUser.perm_address),
			newPassword: ko.observable(''),
			isDirty: ko.observable(false)
		};

		// setup submit actions for each form inputs
		sandbox.util.forIn(this.formViewModel, function (val, key) {
			var oldValue;

			if (!val.subscribe || key === 'isDirty') { return; }	// not all properties
			
			// get old value of observable
			val.subscribe(function (oldVal) { oldValue = oldVal; }, this, 'beforeChange');
			
			// compare new value to old value
			val.subscribe(function (newVal) {
				if (oldValue !== newVal) { this.formViewModel.isDirty(true); }
			}, this);
		}, this);
	};

	ProfileViewModel.prototype.reset = function () {
		this.formViewModel.phone(this.currentUser.phone);
		this.formViewModel.email(this.currentUser.email);
		this.formViewModel.shirtSize(this.currentUser.shirt_size);
		this.formViewModel.schoolAddress(this.currentUser.temp_address);
		this.formViewModel.permAddress(this.currentUser.perm_address);
		this.formViewModel.newPassword('');
		this.formViewModel.isDirty(false);
	};
	
	ProfileViewModel.prototype.save = function () {
		var submit = sandbox.msg.subscribe('profile.save', function () {
			sandbox.msg.dispose(submit, cancel);
		});

		var cancel = sandbox.msg.subscribe('profile.cancel', function () {
			sandbox.msg.dispose(submit, cancel);
		});

		this.setupConfirmModal();
	};

	ProfileViewModel.prototype.setupConfirmModal = function () {
		var $modal = $('#ConfirmModal'),
			$kendoWindow = $modal.data('kendoWindow'),
			$cancel, $confirm;
			
		if ($kendoWindow) { 
			$kendoWindow.open();
		} else {

			// init modal
			$modal.html(confirmTemplate);
			$modal.kendoWindow({ modal: true });
			$kendoWindow = $modal.data('kendoWindow');

			// setup selectors
			$cancel = $('#ConfirmModal .cancel');
			$confirm = $('#ConfirmModal .confirm');

			// setup click bindings
			$cancel.on('click', function() { 
				sandbox.msg.publish('profile.cancel');
				$kendoWindow.close();
			});	
			$confirm.on('click', function() {
				sandbox.msg.publish('profile.save');
				$kendoWindow.close();
			});
		}
		
		$kendoWindow.center();
	};

	return ProfileViewModel;
});