'use strict';

define(function (require) {
    var EmailViewModel = require('email.viewmodel');

    describe('EmailViewModel', function() {
        it('can be instantiated', function () {
            var emailViewModel = new EmailViewModel();
            expect(typeof emailViewModel).toBe('object');
        });
    });
});