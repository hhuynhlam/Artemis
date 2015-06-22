'use strict';

define(function (require) {
    var moment = require('moment');

    var date = {
        parseUnix: moment.unix,
        toUnix: function (date) { return (date) ? moment(new Date(date)).unix() : moment(Date.now()).unix(); }
    };

    return date;
});