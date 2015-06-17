'use strict';

define(function () {
    var auth = require('auth');
    var ko = require('knockout');

	var NavbarViewModel = function () {
		this.currentUser = auth.currentUser() || {};
        this.loggedIn = auth.isLoggedIn();
        this.showLogout = ko.observable(false);

        this.logout = function () { 
            auth.logout(); 
            window.location.replace(window.env.CLIENT_HOST);
        };
        
        this.toggleLogout = function () { this.showLogout(!this.showLogout()); }.bind(this);
	};

	return NavbarViewModel;
});