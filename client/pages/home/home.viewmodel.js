'use strict';

define(function (require) {
    var auth = require('auth');

	var HomeViewModel = function () {
        this.loggedIn = auth.isLoggedIn();
	};

	return HomeViewModel;
});