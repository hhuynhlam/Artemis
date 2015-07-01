'use strict';

define(function (require) {
    var NavbarViewModel = require('navbar.viewmodel');

    describe('NavBarViewModel', function() {
        it('can be instantiated', function () {
            var navbarViewModel = new NavbarViewModel();

            expect(typeof navbarViewModel).toBe('object');
            expect(navbarViewModel.currentUser).toBeDefined();
            expect(navbarViewModel.loggedIn).toBeDefined();
            expect(typeof navbarViewModel.logout).toBe('function');
        });
    });
});