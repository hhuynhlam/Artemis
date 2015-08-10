'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var NavbarViewModel = require('navbar.viewmodel');
    var MemberListViewModel = require('member-list.viewmodel');
    var MemberDocsViewModel = require('member-docs.viewmodel');

    var memberRouter = function (app) {   
        
        app.get('/#/member/docs', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); return; }
            else {
                require(['text!pages/member/member-docs/member-docs.html'], function (template) {
                    context.swap(sandbox.util.template(template));

                    // apply ko bindings
                    ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                    ko.applyBindings(new MemberDocsViewModel(), document.getElementById('MemberDocs'));
                });
            }
        });

        app.get('/#/member/roster', function (context) {
            if(!auth.isLoggedIn()) { window.location.replace(window.env.CLIENT_HOST + '/login'); return; }
            else {
                require(['text!pages/member/member-list/member-list.html'], function (template) {
                    context.swap(sandbox.util.template(template));

                    // apply ko bindings
                    ko.applyBindings(new NavbarViewModel(), document.getElementById('Navbar'));
                    ko.applyBindings(new MemberListViewModel(), document.getElementById('MemberList'));
                });
            }
        });

    };

    return memberRouter;

});