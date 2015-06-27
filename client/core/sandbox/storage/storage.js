'use strict';

define(function (require) {
    var store = require('storage');

    var localStorage = {
        read: function (name) { return store.get(name); },
        remove: function (name) { store.remove(name); },
        set: function (name, val) { store.set(name, val); }
    };

    return localStorage;
});