'use strict';

define(function (require) {
	var $ = require('jquery');
	var auth = require('auth');
	var ko = require('knockout');
	var modal = require('modal');
	var sandbox = require('sandbox');

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
		var cancel, submit;

		submit = sandbox.msg.subscribe('profile.save', function () {
			var url = window.env.SERVER_HOST + '/member/update',
				userData = this.serializeUserData();
			
			sandbox.http.post(url, userData)
			.then(function (user) {
				auth.logout();
				auth.setCurrentUser(user);
				this.currentUser = auth.currentUser();
			}.bind(this))
			.catch(function (err) {
				console.error('Error: There was a problem saving profile (', err, ')');
			})
			.done();

			sandbox.msg.dispose(submit, cancel);
		}, this);

		cancel = sandbox.msg.subscribe('profile.cancel', function () {
			sandbox.msg.dispose(submit, cancel);
		});

		this.setupConfirmModal();
	};

	ProfileViewModel.prototype.serializeUserData = function () {
		return {
			apiKey: window.env.API_KEY,
			_id: this.currentUser.id,
			phone: this.formViewModel.phone(),
			email: this.formViewModel.email(),
			shirt_size: this.formViewModel.shirtSize(),
			temp_address: this.formViewModel.schoolAddress(),
			perm_address: this.formViewModel.permAddress(),
			password: (this.formViewModel.newPassword()) ? sandbox.crypto.encrypt(this.formViewModel.newPassword()) : undefined
		};
	};

	ProfileViewModel.prototype.setupConfirmModal = function () {
		var selector = '#ConfirmModal',
			$kendoWindow = $(selector).data('kendoWindow');
			
		if ($kendoWindow) { 
			$kendoWindow.open();
		} else {
			modal('saveConfirm', {
				selector: selector,
				cancel: function () { sandbox.msg.publish('profile.cancel'); },
				confirm: function () { sandbox.msg.publish('profile.save'); }
			});
		}
	};

	return ProfileViewModel;
});