'use strict';

define(function (require) {
    var _ = require('lodash');

    var utils = {

        assign: _.assign,
        find: _.find,
        findIndex: _.findIndex,
        forIn: _.forIn,
        template: _.template,


        // Formatting
        // nl2br: function (str, is_xhtml) {   
        //     var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
        //     return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
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
        // }

    };

    return utils;
});