'use strict';

define(function (require) {
    var auth = require('auth');
    var modal = require('modal');
    var tour = require('tour');

	var NavbarViewModel = function () {
		this.currentUser = auth.currentUser() || {};
        this.loggedIn = auth.isLoggedIn();
        this.helpTarget = window.location.hash.substr(2);
    };

    NavbarViewModel.prototype.logout = function () {
        var selector = '#LogoutModal',
            $kendoWindow = $(selector).data('kendoWindow');
            
        if ($kendoWindow) { 
            $kendoWindow.open();
        } else {
            modal('logoutConfirm', {
                selector: selector,
                cancel: true,
                confirm: function () { 
                    auth.logout(); 
                    window.location.replace(window.env.CLIENT_HOST);
                }
            });
        }
    };

    NavbarViewModel.prototype.help = function () {
        tour.start(this.helpTarget);
    };

	return NavbarViewModel;
});