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

        app.get('/#/about/contact', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'about.viewmodel', 'text!pages/about/templates/contact.html'
            ], function (NavbarViewModel, navBarTemplate, AboutViewModel, aboutTemplate) {
                var partials = navBarTemplate.concat(aboutTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new AboutViewModel(), document.getElementById('Contact'));
            });
        });

        app.get('/#/about/history', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'about.viewmodel', 'text!pages/about/templates/history.html'
            ], function (NavbarViewModel, navBarTemplate, AboutViewModel, aboutTemplate) {
                var partials = navBarTemplate.concat(aboutTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new AboutViewModel(), document.getElementById('History'));
            });
        });

        app.get('/#/about/links', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'about.viewmodel', 'text!pages/about/templates/links.html'
            ], function (NavbarViewModel, navBarTemplate, AboutViewModel, aboutTemplate) {
                var partials = navBarTemplate.concat(aboutTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new AboutViewModel(), document.getElementById('AffiliateLinks'));
            });
        });

        app.get('/#/about/rush', function (context) {
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'about.viewmodel', 'text!pages/about/templates/rush.html'
            ], function (NavbarViewModel, navBarTemplate, AboutViewModel, aboutTemplate) {
                var partials = navBarTemplate.concat(aboutTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new AboutViewModel(), document.getElementById('Rush'));
            });
        });

    };

    return aboutRouter;

});