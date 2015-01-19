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
		login: function (username, password) {
			var _data = {
				username: username,
				password: password
			};

			return $.get('http://localhost/server/index.php/login', _data);
		},

		logout: function () {
			return this.deleteCookie('aphiorhorhoLoggedIn');
		},

		createUser: function (data) {
			return this.createCookie('aphiorhorhoLoggedIn', JSON.stringify(data), 1, '/');
		},

		getCurrentUser: function () {
			var user = $.cookie('aphiorhorhoLoggedIn');
			return (user) ? JSON.parse($.cookie('aphiorhorhoLoggedIn')) : false;
		},

		isAuthenticated: function () {
			return $.cookie('aphiorhorhoLoggedIn') ? true : false;
		},

		serverAuthenticate: function () {
			$.get('http://localhost/server/index.php/?apiKey=RI$1h7Kztf2]%%22qmI%5S9CphFZJ35t');
		},

		isServerAuthenticated: function () {
			return $.cookie('aphiorhorhoAuthenticated') ? true : false;
		},

		// Page
		pageRendering: function () {
			$('#loader').show();
			$('#view').hide();
		},

		pageReady: function () {
			$('#loader').hide();
			$('#view').fadeIn(500);
		}

	};

	return utils;
});