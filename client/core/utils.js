'use strict';

define(function (require) {
	var $ = require('jquery');
	require('jquery-cookie');

	var utils = {

		// Cookies Utils
		createCookie: function (name, value, expires, path) {
			return $.cookie(name, value, { expires: expires, path: path });
		},

		createLoggedInCookie: function () {
			return this.createCookie('aphiorhorhoLoggedIn', 'wakawaka', 1, '/');
		},

		isAuthenticated: function () {
			return $.cookie('aphiorhorhoLoggedIn') ? true : false;
		},

		isServerAuthenticated: function () {
			return $.cookie('aphiorhorhoAuthenticated') ? true : false;
		},

		serverAuthenticate: function () {
			$.get('http://localhost/server/index.php/?apiKey=RI$1h7Kztf2]%%22qmI%5S9CphFZJ35t');
		},

	};

	return utils;
});