'use strict';

define(function (require) {
    var moment = require('moment');

    var date = {
        parseUnix: moment.unix,
        toUnix: function (date) { return moment(new Date(date)).unix(); }
    };

    return date;
});