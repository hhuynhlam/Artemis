'use strict';

define(function (require) {
	var $ = require('jquery');
	var auth = require('auth');
	var ko = require('knockout');
	var modal = require('modal');
	var sandbox = require('sandbox');

	var ProfileViewModel = function () {
		this.currentUser = auth.currentUser();
		this.upcomingEvents = ko.observableArray([]);

		this.formViewModel = {
			phone: ko.observable(this.currentUser.phone),
			email: ko.observable(this.currentUser.email),
			shirtSize: ko.observable(this.currentUser.shirt_size),
			schoolAddress: ko.observable(this.currentUser.temp_address),
			permAddress: ko.observable(this.currentUser.perm_address),
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

		// get upcoming events
		this.getUpcomingEvents();
	};

	// Edit Profile
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
				this.formViewModel.isDirty(false);
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

	// Upcoming Events
	ProfileViewModel.prototype.getUpcomingEvents = function () {
		var url = window.env.SERVER_HOST + '/signup/user',
			data = {
				apiKey: window.env.API_KEY,
				id: this.currentUser.id
			};

		sandbox.http.get(url, data)
		.then(function (events) {
			this.upcomingEvents(this.formatData(events));
		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get upcoming events (', err, ')');
		})
		.done();
	};

	ProfileViewModel.prototype.formatData = function (events) {
		events.forEach(function (e) {
			if (e.start_time) { e.start_time = sandbox.date.parseUnix(e.start_time).format('h:mm A'); }
			if (e.end_time) { e.end_time = sandbox.date.parseUnix(e.end_time).format('h:mm A'); }
			if (e.date) { e.date = sandbox.date.parseUnix(e.date).format('MM/DD/YYYY'); }
		});

		return events;
	};

	return ProfileViewModel;
});