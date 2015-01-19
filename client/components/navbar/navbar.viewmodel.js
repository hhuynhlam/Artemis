'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
	var utils = require('utils');

	var navbarViewModel = function () {

		var self = this;

		self.currentUser = utils.getCurrentUser();
		self.loggedIn = utils.isAuthenticated();
		self.showLogout = ko.observable(false);

		self.logout = function () {
			window.location.replace('/#/logout');
		};

		self.toggleLogout = function (data, event) {
			event.preventDefault();
			self.showLogout( !self.showLogout() );
		};
		
	};

	return navbarViewModel;
});