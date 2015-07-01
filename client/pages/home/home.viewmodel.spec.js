'use strict';

define(function (require) {
    var HomeViewModel = require('home.viewmodel');

    describe('HomeViewModel', function() {
        it('can be instantiated', function () {
            var homeViewModel = new HomeViewModel();
            expect(typeof homeViewModel).toBe('object');
            expect(homeViewModel.loggedIn).toBeDefined();
        });
    });
});