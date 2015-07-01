'use strict';

define(function (require) {
    var LoginViewModel = require('login.viewmodel');

    describe('LoginViewModel', function() {
        it('can be instantiated', function () {
            var loginViewModel = new LoginViewModel();
            expect(typeof loginViewModel).toBe('object');
            expect(loginViewModel.cancel).toBeDefined();
            expect(loginViewModel.submit).toBeDefined();
        });
    });
});