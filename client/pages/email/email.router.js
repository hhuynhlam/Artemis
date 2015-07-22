'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var EmailViewModel = require('email.viewmodel');
    var NavbarViewModel = require('navbar.viewmodel');

    var emailRouter = function (app) {   
        
        app.get('/#/email', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); return; }
            require(['text!pages/email/email.html'], function (template) {
                context.swap(sandbox.util.template(template));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new EmailViewModel(), document.getElementById('Email'));
            });
        });

        app.get('/#/email/:emails', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); return; }
            require(['text!pages/email/email.html'], function (template) {
                context.swap(sandbox.util.template(template));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new EmailViewModel(this.params.emails), document.getElementById('Email'));
            }.bind(this));
        });

    };

    return emailRouter;

});