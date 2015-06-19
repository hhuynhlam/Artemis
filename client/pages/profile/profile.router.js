'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var profileRouter = function (app) {   
        
        app.get('/#/profile', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); }
            else {
                require([
                    'navbar.viewmodel',
                    'profile.viewmodel', 
                    'text!pages/profile/profile.html'
                ], function (NavbarViewModel, ProfileViewModel, profileTemplate) {
                    context.swap(sandbox.util.template(profileTemplate));

                    // apply ko bindings
                    ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                    ko.applyBindings(new ProfileViewModel(), document.getElementById('Profile'));
                });
            }
        });

    };

    return profileRouter;

});