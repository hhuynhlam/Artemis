'use strict';

define(function (require) {
    var _ = require('lodash');

    var utils = {

        template: _.template,


        // Formatting
        // nl2br: function (str, is_xhtml) {   
        //     var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
        //     return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
        // },

        // // Cookies
        // createCookie: function (name, value, expires, path) {
        //     return $.cookie(name, value, { expires: expires, path: path });
        // },

        // deleteCookie: function (name, path) {
        //     return $.removeCookie(name, { path: path }); 
        // },

        // // Auth
        // login: function (username, password, md5Enabled) {
        //     var _data = {
        //         username: username,
        //         password: (md5Enabled) ? md5(password) : password
        //     };

        //     return $.get(env.SERVER_ROOT + '/login', _data);
        // },

        // logout: function () {
        //     return this.deleteCookie('aphiorhorhoLoggedIn', env.CLIENT_ROOT + '/');
        // },

        // isAuthenticated: function () {
        //     return $.cookie('aphiorhorhoLoggedIn') ? true : false;
        // },
        
        // // User
        // resetCurrentUser: function (newPassword) {
        //     var currentUser = this.getCurrentUser();
        //     utils.logout();

        //     return (newPassword) ? utils.login(currentUser.username, newPassword, true) : utils.login(currentUser.username, currentUser.password, false);
        // },

        // appendApiKey: function (data) {
        //     data.apiKey = 'A197638E4B52E74DCA5A2E58A8172';
        //     return data;
        // },

        // createUserCookie: function (data) {
        //     return this.createCookie('aphiorhorhoLoggedIn', JSON.stringify(data), 1, env.CLIENT_ROOT + '/');
        // },

        // getCurrentUser: function () {
        //     var user = $.cookie('aphiorhorhoLoggedIn');
        //     return (user) ? JSON.parse($.cookie('aphiorhorhoLoggedIn')) : false;
        // },

        // // Page
        // pageRendering: function () {
        //     $('.loader').show();
        //     $('#view').hide();
        // },

        // pageReady: function () {
        //     $('.loader').hide();
        //     $('#view').fadeIn(500);
        // },

        // // Event
        // getEvent: function (id) {
        //     var _data = {
        //         id: id,
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/event', _data);
        // },

        // getEvents: function (type, startDate, endDate, limit, offset) {
        //     var _data = {
        //         limit: limit,
        //         offset: offset
        //     };

        //     if (type) {
        //         _data.event_code = type;
        //     }

        //     if (startDate) {
        //         _data.startDate = startDate.unix();
        //     }

        //     if (endDate) {
        //         _data.endDate = endDate.unix();
        //     }

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/event', _data);
        // },

        // // Shifts
        // getShifts: function (eventId) {
        //     var _data = {
        //         event: eventId,
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/shift', _data);
        // },

        // getSignups: function (shiftId) {
        //     var _data = {
        //         shift: shiftId,
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/shift/signups', _data);
        // },

        // getUserSignups: function (userId, eventId) {
        //     var _data = {
        //         event: eventId,
        //         user: userId
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/shift/user/signups', _data);
        // },

        // addUserSignups: function (userId, eventId, shiftId, driver, timestamp) {
        //     var _data = {
        //         user: userId,
        //         shift: shiftId,
        //         event: eventId,
        //         driver: driver,
        //         timestamp: timestamp
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.post(env.SERVER_ROOT + '/shift/user/signups/add', _data);
        // },

        // removeUserSignups: function (userId, eventId, shiftId) {
        //     var _data = {
        //         user: userId,
        //         shift: shiftId,
        //         event: eventId
        //     };

        //     _data = this.appendApiKey(_data);
            
        //     return $.get(env.SERVER_ROOT + '/shift/user/signups/delete', _data);
        // },

        // // Profile
        // updateUser: function (userData) {
        //     userData = this.appendApiKey(userData);

        //     if (userData && userData.password) {
        //         userData.password = md5(userData.password);
        //     }
            
        //     return $.post(env.SERVER_ROOT + '/member/update', userData);
        // }

    };

    return utils;
});