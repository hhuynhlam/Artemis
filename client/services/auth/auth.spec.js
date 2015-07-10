'use strict';

define(function (require) {
    var auth = require('auth');
    var sandbox = require('sandbox');

    describe('Auth', function() {
        it('can auth', function () {
            expect(auth.login).toBeDefined();
            expect(auth.logout).toBeDefined();
            expect(auth.isLoggedIn).toBeDefined();
            expect(auth.currentUser).toBeDefined();
            expect(auth.setCurrentUser).toBeDefined();
        });

        // @TODO: test auth.login
        
        it('can logout', function () {
            sandbox.storage.local.set('apo_user', {});    
            auth.logout();
            expect(sandbox.storage.local.read('apo_user')).toBeNull();
        });

        it('can check if logged in and timeout', function () {
            var current = sandbox.date.toUnix(),
                timeout = sandbox.date.addMinutes(current, 20);

            expect(auth.isLoggedIn()).toBe(false);

            sandbox.storage.local.set('apo_user', JSON.stringify({ data: {}, timeout: current })); 
            expect(auth.isLoggedIn()).toBe(false);
            
            sandbox.storage.local.set('apo_user', JSON.stringify({ data: {}, timeout: timeout })); 
            expect(auth.isLoggedIn()).toBe(true);
        });

        it('can get setCurrentUser', function () {
            var user = [{ name: 'Lionel Richie' }];
            auth.setCurrentUser(user);
            expect(JSON.parse(window.localStorage.apo_user).data).toEqual(user[0]);
        });

        it('can get currentUser', function () {
            var user = [{ name: 'Lionel Richie' }];
            auth.setCurrentUser(user);
            expect(auth.currentUser()).toEqual(user[0]);
        });
    });
});