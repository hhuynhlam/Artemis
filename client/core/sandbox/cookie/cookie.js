'use strict';

define(function (require) {
    var $ = require('jquery');
    require('cookie');

    var cookie = {
        read: function (name) { return $.cookie(name); },
        remove: function (name, options) { $.removeCookie(name, options); },
        set: function (name, val, options) { $.cookie(name, val, options); }
    };

    return cookie;
});