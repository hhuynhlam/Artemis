'use strict';

define(function (require) {
    var $ = require('jquery');
    var hopscotch = require('hopscotch');

    var pages = {
        profile: require('json!services/tour/pages/profile.json')
    };

    var tour = {
        visitedPages: {
            /**
             *      About               00000001
             *      Calendar            00000010
             *      Dashboard           00000100
             *      Edit Profile        00001000
             *      Event Detail        00010000
             *      Event List          00100000
             *      Member List         01000000
             *      Send Email          10000000
             */
        
             ABOUT: 1,
             CALENDAR: 2,
             DASHBOARD: 4,
             EDIT_PROFILE: 8,
             EVENT_DETAIL: 16,
             EVENT_LIST: 32,
             MEMBER_LIST: 64,
             SEND_EMAIL: 128
        },

        start: function (page) {
            var tour = pages[page];
            tour.onShow = function () {
                $('.hopscotch-next').addClass('btn').addClass('btn-success');
                $('.hopscotch-prev').addClass('btn').addClass('btn-default');
            };
            tour.onEnd = function () { hopscotch.endTour(); };

            hopscotch.startTour(pages[page], 0);
        }
    };

    return tour;
});