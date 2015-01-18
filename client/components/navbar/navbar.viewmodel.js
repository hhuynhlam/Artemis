'use strict';

define(function (require) {
	//var ko = require('knockout');
	var utils = require('utils');
	// require('customBindings');

	var navbarViewModel = function () {

		this.loggedIn = utils.isAuthenticated();
		
	};

	return navbarViewModel;
});