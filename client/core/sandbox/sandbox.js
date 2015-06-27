'use strict';

define(function (require) {
    var constant = require('core/sandbox/constant/constant');
    var storage = require('core/sandbox/storage/storage');
    var crypto = require('core/sandbox/crypto/crypto');
    var date = require('core/sandbox/date/date');
    var http = require('core/sandbox/http/http');
    var msg = require('core/sandbox/msg/msg');
    var promise = require('core/sandbox/promise/promise');
    var util = require('core/sandbox/util/util');

    return {
        constant: constant,
        storage: storage,
        crypto: crypto,
        date: date,
        http: http,
        msg: msg,
        promise: promise,
        util: util
    };
});