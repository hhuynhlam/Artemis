'use strict';

define(function (require) {
    var hopscotch = require('hopscotch');

    var pages = {
        profile: require('json!services/tour/pages/profile.json')
    };

    var tutorial = {
        start: function (page) {
            var tour = pages[page];
            tour.onEnd = function () { hopscotch.endTour(); };

            hopscotch.startTour(pages[page], 0);
        }
    };

    return tutorial;
});