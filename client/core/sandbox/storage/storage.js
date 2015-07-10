'use strict';

define(function () {

    var storage = {

        local: {
            read: function (name) { return window.localStorage.getItem(name); },
            remove: function (name) { window.localStorage.removeItem(name); },
            set: function (name, val) { window.localStorage.setItem(name, val); }
        },

        session: {
            read: function (name) { return window.sessionStorage.getItem(name); },
            remove: function (name) { window.sessionStorage.removeItem(name); },
            set: function (name, val) { window.sessionStorage.setItem(name, val); }
        }
        
    };

    return storage;
});