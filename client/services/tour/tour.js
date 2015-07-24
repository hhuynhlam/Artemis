'use strict';

define(function (require) {
    var $ = require('jquery');
    var hopscotch = require('hopscotch');

    var pages = {
        profile: require('json!services/tour/pages/profile.json')
    };

    var tutorial = {
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

    return tutorial;
});