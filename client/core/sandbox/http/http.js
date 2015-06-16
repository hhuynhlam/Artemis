'use strict';

define(function (require) {
    var $ = require('jquery');

    var http = {
        
        get: $.get,

        post: $.post,

        put: function (url, data) {
            return $.ajax({
                type: 'PUT',
                url: url,
                data: data
            });
        },

        'delete': function (url) {
            return $.ajax({
                type: 'DELETE',
                url: url
            });
        }
    };

    return http;
});