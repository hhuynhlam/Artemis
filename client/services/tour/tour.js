'use strict';

define(function (require) {
    var $ = require('jquery');
    var auth = require('auth');
    var hopscotch = require('hopscotch');

    var pages = {
        'member/roster': require('json!services/tour/pages/member-roster.json'),
        'profile': require('json!services/tour/pages/profile.json')
    };

    var visitedPages = {
        /**
         *      about               00000001
         *      calendar            00000010
         *      dashboard           00000100
         *      email               00001000
         *      eventDetail         00010000
         *      eventList           00100000
         *      member/roster       01000000
         *      profile             10000000
         */
    
         'about': 1,
         'calendar': 2,
         'dashboard': 4,
         'email': 8,
         'eventDetail': 16,
         'eventList': 32,
         'member/roster': 64,
         'profile': 128
    };

    var tour = {

        start: function (page) {
            var _tour = pages[page],
                user = auth.currentUser();

            if ( !(user.FirstTime & visitedPages[page]) ) {
                _tour.onShow = function () {
                    $('.hopscotch-next').addClass('btn').addClass('btn-success');
                    $('.hopscotch-prev').addClass('btn').addClass('btn-default');
                };
                _tour.onEnd = function () { hopscotch.endTour(); };

                hopscotch.startTour(_tour, 0);   
            }
        }

    };

    return tour;
});