'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var aboutRouter = function (app) {   
        
        app.get('/#/about', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'about.viewmodel', 'text!pages/about/about.html'
            ], function (NavbarViewModel, navBarTemplate, AboutViewModel, aboutTemplate) {
                var partials = navBarTemplate.concat(aboutTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new AboutViewModel(), document.getElementById('About'));
            });
        });

    };

    return aboutRouter;

});