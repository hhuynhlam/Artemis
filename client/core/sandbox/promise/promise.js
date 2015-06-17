'use strict';

define(function (require) {
    var q = require('Q');

    var promise = {
        defer: q.defer()
    };

    return promise;
});