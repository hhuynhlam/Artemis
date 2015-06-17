'use strict';

define(function (require) {
    var sandbox = require('sandbox');

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
                sandbox.cookie.set('apo_user', JSON.stringify(user[0]), { expires: 1, path: window.env.CLIENT_HOST });
            });
        },

        logout: function () {
            sandbox.cookie.remove('apo_user', { path: window.env.CLIENT_HOST });
        },

        isLoggedIn: function () {
            return (sandbox.cookie.read('apo_user')) ? true : false;
        }
    };

    return auth;
});