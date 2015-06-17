'use strict';

define(function (require) {
    var cookie = require('core/sandbox/cookie/cookie');
    var crypto = require('core/sandbox/crypto/crypto');
    var http = require('core/sandbox/http/http');
    var promise = require('core/sandbox/promise/promise');
    var util = require('core/sandbox/util/util');

    return {
        cookie: cookie,
        crypto: crypto,
        http: http,
        promise: promise,
        util: util
    };
});