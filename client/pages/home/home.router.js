'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var homeRouter = function (app) {   
        
        app.get('/#/', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'home.viewmodel', 'text!pages/home/home.html'
            ], function (NavbarViewModel, navBarTemplate, HomeViewModel, homeTemplate) {
                var partials = navBarTemplate.concat(homeTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new HomeViewModel(), document.getElementById('Home'));
            });
        });

    };

    return homeRouter;

});