'use strict';

define(function (require) {
    var $ = require('jquery');
    var auth = require('auth');
    var hopscotch = require('hopscotch');

    var pages = {
        'member/roster': require('json!core/services/tour/pages/member-roster.json'),
        'profile': require('json!core/services/tour/pages/profile.json')
    };

    var visitedPages = {    
         // 'about': 1,
         // 'calendar': 2,
         // 'dashboard': 4,
         // 'email': 8,
         // 'eventDetail': 16,
         // 'eventList': 32,
         'member/roster': 64,
         'profile': 128
    };

    var tour = {

        start: function (page, singleRun) {
            var _tour = pages[page],
                user = auth.currentUser();

            if ( !(user.FirstTime & visitedPages[page]) || singleRun ) {
                _tour.onShow = function () {
                    $('.hopscotch-next').addClass('btn').addClass('btn-success');
                    $('.hopscotch-prev').addClass('btn').addClass('btn-default');
                };
                _tour.onEnd = function () { hopscotch.endTour(); };

                hopscotch.startTour(_tour, 0);
            }

        },

        hasTour: function (page) { return visitedPages[page]; }

    };

    return tour;
});