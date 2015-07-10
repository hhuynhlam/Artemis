'use strict';

define(function (require) {
    var sandbox = require('sandbox');
    var TIME_OUT = 20;      // logged-in time-out in minutes

    var _appendTimeout = function (data) {
        var current = sandbox.date.toUnix(),
            timeout = sandbox.date.addMinutes(current, TIME_OUT);
        return JSON.stringify({ data: data, timeout: timeout });
    };

    var auth = {
        login: function (user, pass) {
            var url = window.env.SERVER_HOST + '/login',
                data = {
                    username: user,
                    password: sandbox.crypto.encrypt(pass),
                    apiKey: window.env.API_KEY
                };

            return sandbox.http.get(url, data)
            .then(function (user) {
                if (user.length !== 0) {
                    sandbox.storage.local.set( 'apo_user', _appendTimeout(user[0]) );
                    return user;
                } else {
                    console.error('Error: Could not login (Incorrect username and/or password)');
                }
            })
            .catch(function (err) {
                console.error('Server Error: Could not login (', err ,')');
            });
        },

        logout: function () {
            sandbox.storage.local.remove('apo_user');
        },

        isLoggedIn: function () {
            var current = sandbox.date.toUnix(),
                session = sandbox.storage.local.read('apo_user'),
                timeout = (session) ? JSON.parse(session).timeout : null;

            if (!timeout || current >= timeout) {
                this.logout();
                return false;
            } else {
                return true;
            }
        },

        currentUser: function () {
            var user = sandbox.storage.local.read('apo_user');
            return (user) ? JSON.parse(user).data : null;
        },

        setCurrentUser: function (user) {
            sandbox.storage.local.set('apo_user', _appendTimeout(user[0]));
        }
    };

    return auth;
});