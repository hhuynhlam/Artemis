'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var homeRouter = function (app) {   
        
        app.get('/#/', function (context) {
            require([
                'navbar.viewmodel',
                'home.viewmodel', 
                'text!pages/home/home.html'
            ], function (NavbarViewModel, HomeViewModel, homeTemplate) {
                context.swap(sandbox.util.template(homeTemplate));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new HomeViewModel(), document.getElementById('Home'));
            });
        });

    };

    return homeRouter;

});