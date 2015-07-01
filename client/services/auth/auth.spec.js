'use strict';

define(function (require) {
    var auth = require('auth');

    describe('Auth', function() {
        it('can auth', function () {
            expect(auth.login).toBeDefined();
            expect(auth.logout).toBeDefined();
            expect(auth.isLoggedIn).toBeDefined();
            expect(auth.currentUser).toBeDefined();
            expect(auth.setCurrentUser).toBeDefined();
        });
    });
});