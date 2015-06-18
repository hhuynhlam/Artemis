'use strict';

define(function () {
    var auth = require('auth');
    var ko = require('knockout');

	var NavbarViewModel = function () {
		this.currentUser = auth.currentUser() || {};
        this.loggedIn = auth.isLoggedIn();
        this.showLogout = ko.observable(false);
    };

    NavbarViewModel.prototype.logout = function () { 
        auth.logout(); 
        window.location.replace(window.env.CLIENT_HOST);
    };
    
    NavbarViewModel.prototype.toggleLogout = function () { this.showLogout(!this.showLogout()); };

	return NavbarViewModel;
});