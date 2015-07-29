'use strict';

define(function (require) {
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');

	var DashboardViewModel = function () {
        this.currentUser = auth.currentUser();
        this.content = ko.observable({});

        this.getContent();
	};

    // Get Content
    DashboardViewModel.prototype.getContent = function () {
        var url = window.env.SERVER_HOST + '/content',
            data = {
                apiKey: window.env.API_KEY,
                id: this.currentUser.Id
            };

        sandbox.http.get(url, data)
        .then(function (content) {
            var announcements = sandbox.util.find(content, function (c) { return c.name === 'announcements'; }),
                committeeTimes = sandbox.util.find(content, function (c) { return c.name === 'committee'; });

            // unescape html
            announcements = (announcements) ? sandbox.util.unescape(announcements.content) : '';
            committeeTimes = (committeeTimes) ? sandbox.util.unescape(committeeTimes.content) : '';

            this.content({ announcements: announcements, committeeTimes: committeeTimes });

        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get content (', err, ')');
        })
        .done();
    };

	return DashboardViewModel;
});