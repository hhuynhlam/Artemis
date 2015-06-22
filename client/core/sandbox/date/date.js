'use strict';

define(function (require) {
    var moment = require('moment');

    var date = {
        parseUnix: moment.unix,
        subHours: function (date, hours) { return moment.unix(date).subtract(hours, 'hour').unix(); },
        toUnix: function (date) { return (date) ? moment(new Date(date)).unix() : moment(Date.now()).unix(); }
    };

    return date;
});