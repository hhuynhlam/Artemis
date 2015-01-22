'use strict';

define(function (require) {
	var $ = require('jquery');
	require('jquery-cookie');

	var utils = {

		// Cookies
		createCookie: function (name, value, expires, path) {
			return $.cookie(name, value, { expires: expires, path: path });
		},

		deleteCookie: function (name) {
			return $.removeCookie(name); 
		},

		// Auth
		login: function (username, password, md5Password) {
			var _data = {
				username: username
			};

			if (password) { _data.password = password; }
			if (md5Password) { _data.md5_password = md5Password; }

			return $.get('http://localhost/server/index.php/login', _data);
		},

		logout: function () {
			return this.deleteCookie('aphiorhorhoLoggedIn');
		},

		resetCurrentUser: function (password) {
			var currentUser = this.getCurrentUser();
			var user = currentUser.username;
			var md5_pass = currentUser.password; 
			utils.logout();

			return (password) ? utils.login(user, password, null) : utils.login(user, null, md5_pass);
		},

		appendApiKey: function (data) {
			data.apiKey = 'A197638E4B52E74DCA5A2E58A8172';
			return data;
		},

		createUserCookie: function (data) {
			return this.createCookie('aphiorhorhoLoggedIn', JSON.stringify(data), 1, '/');
		},

		getCurrentUser: function () {
			var user = $.cookie('aphiorhorhoLoggedIn');
			return (user) ? JSON.parse($.cookie('aphiorhorhoLoggedIn')) : false;
		},

		isAuthenticated: function () {
			return $.cookie('aphiorhorhoLoggedIn') ? true : false;
		},

		// Page
		pageRendering: function () {
			$('#loader').show();
			$('#view').hide();
		},

		pageReady: function () {
			$('#loader').hide();
			$('#view').fadeIn(500);
		},

		// Profile
		updateUser: function (userData) {
			userData = this.appendApiKey(userData);
			return $.post('http://localhost/server/index.php/member/update', userData);
		}

	};

	return utils;
});