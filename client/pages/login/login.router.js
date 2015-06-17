'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var loginRouter = function (app) {   
        
        app.get('/#/login', function (context) {
            if(auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST); }
            else {
                require([
                    'navbar.viewmodel', 'text!components/navbar/navbar.html',
                    'login.viewmodel', 'text!pages/login/login.html'
                ], function (NavbarViewModel, navBarTemplate, LoginViewModel, loginTemplate) {
                    var partials = navBarTemplate.concat(loginTemplate);
                    context.swap(sandbox.util.template(partials));

                    // apply ko bindings
                    ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                    ko.applyBindings(new LoginViewModel(), document.getElementById('Login'));
                });
            }
        });

    };

    return loginRouter;

});