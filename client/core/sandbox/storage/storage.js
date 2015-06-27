'use strict';

define(function (require) {
    var store = require('store');

    var storage = {
        read: function (name) { return store.get(name); },
        remove: function (name) { store.remove(name); },
        set: function (name, val) { store.set(name, val); }
    };

    return storage;
});