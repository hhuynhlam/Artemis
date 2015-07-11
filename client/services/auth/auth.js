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
                if (user.length !== 0) {
                    sandbox.storage.cookie.set( 'apo_user', JSON.stringify(user[0]));
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
            sandbox.storage.cookie.remove('apo_user');
        },

        isLoggedIn: function () {
           return (this.currentUser()) ? true : false;
        },

        currentUser: function () {
            var user = sandbox.storage.cookie.read('apo_user');
            return (user) ? JSON.parse(user) : null;
        },

        setCurrentUser: function (user) {
            sandbox.storage.cookie.set('apo_user', JSON.stringify(user[0]));
        }
    };

    return auth;
});