'use strict';

define(function (require) {
    var role = require('role');

    describe('Role', function() {
        it('has role ', function () {
            expect(role.getAllRoles).toBeDefined();
            expect(role.getPositionRoles).toBeDefined();
        });
    });
});