'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var DashboardViewModel = require('dashboard.viewmodel');
    var NavbarViewModel = require('navbar.viewmodel');

    var dashboardRouter = function (app) {   
        
        app.get('/#/dashboard', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); return; }
            require(['text!pages/dashboard/dashboard.html'], function (template) {
                context.swap(sandbox.util.template(template));

                // apply ko bindings
                ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                ko.applyBindings(new DashboardViewModel(), document.getElementById('Dashboard'));
            });
        });
        
    };

    return dashboardRouter;

});