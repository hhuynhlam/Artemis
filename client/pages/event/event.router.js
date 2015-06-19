'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var eventRouter = function (app) {   
        
        app.get('/#/event', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); }
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'event-list.viewmodel', 'text!pages/event/event-list.html'
            ], function (NavbarViewModel, navBarTemplate, EventListViewModel, eventListTemplate) {
                var partials = navBarTemplate.concat(eventListTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new EventListViewModel(), document.getElementById('Event'));
            });
        });

        app.get('/#/event/:id', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); }
            require([
                'navbar.viewmodel', 'text!components/navbar/navbar.html',
                'event-detail.viewmodel', 'text!pages/event/event-detail.html'
            ], function (NavbarViewModel, navBarTemplate, EventDetailViewModel, eventDetailTemplate) {
                var partials = navBarTemplate.concat(eventDetailTemplate);
                context.swap(sandbox.util.template(partials));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new EventDetailViewModel(this.params.id), document.getElementById('EventDetail'));
            }.bind(this));
        });

    };

    return eventRouter;

});