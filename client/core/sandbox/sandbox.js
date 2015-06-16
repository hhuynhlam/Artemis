'use strict';

define(function (require) {
    var http = require('core/sandbox/http/http');
    var promise = require('core/sandbox/promise/promise');
    var util = require('core/sandbox/util/util');

    return {
        http: http,
        promise: promise,
        util: util
    };
});