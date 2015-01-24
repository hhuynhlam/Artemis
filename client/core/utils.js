'use strict';

define(function (require) {
	var $ = require('jquery');
	var md5 = require('md5');
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
		login: function (username, password, md5Enabled) {
			var _data = {
				username: username,
				password: (md5Enabled) ? md5(password) : password
			};

			return $.get('http://localhost/server/index.php/login', _data);
		},

		logout: function () {
			return this.deleteCookie('aphiorhorhoLoggedIn');
		},

		isAuthenticated: function () {
			return $.cookie('aphiorhorhoLoggedIn') ? true : false;
		},
		
		// User
		resetCurrentUser: function (newPassword) {
			var currentUser = this.getCurrentUser();
			utils.logout();

			return (newPassword) ? utils.login(currentUser.username, newPassword, true) : utils.login(currentUser.username, currentUser.password, false);
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

		// Page
		pageRendering: function () {
			$('.loader').show();
			$('#view').hide();
		},

		pageReady: function () {
			$('.loader').hide();
			$('#view').fadeIn(500);
		},

		// Event
		getEvents: function (type, limit, offset) {
			var _data = {
				event_code: type,
				limit: limit,
				offset: offset
			};

			_data = this.appendApiKey(_data);
			
			return $.get('http://localhost/server/index.php/event', _data);
		},

		// Profile
		updateUser: function (userData) {
			userData = this.appendApiKey(userData);

			if (userData && userData.password) {
				userData.password = md5(userData.password);
			}
			
			return $.post('http://localhost/server/index.php/member/update', userData);
		}

	};

	return utils;
});