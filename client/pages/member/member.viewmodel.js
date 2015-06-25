'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
	var sandbox = require('sandbox');
	require('datatable');

	var MemberViewModel = function () {
		this.actives = ko.observableArray([]);
		this.alumni = ko.observableArray([]);
		this.affiliates = ko.observableArray([]);

		// init events
		this.getMembers()
		.then(function (members) {
			
			// members.forEach(function (m) {
			// 	if(m.position & sandbox.constant.role.ACTIVE) { this.actives.push(m); }
			// 	else if(m.position & sandbox.constant.role.ALUMNUS) { this.alumni.push(m); }
			// 	else if(m.position & sandbox.constant.role.AFFILIATE) { this.affiliates.push(m); }
			// }, this);
			
			var $selector = $('#RosterGrid');
			$selector.dataTable({
		        data: members,
		        columns: [
		            { 'title': 'Name' },
		            { 'title': 'Class' },
		            { 'title': 'Family' },
		            { 'title': 'Position'},
		            { 'title': 'Phone'},
		            { 'title': 'Email'}
		        ]
		    });   

		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get events (', err, ')');
		})
		.done();
	};

	MemberViewModel.prototype.getMembers = function () {
		var data, url;

        url = window.env.SERVER_HOST + '/member/list';
        data = { apiKey: window.env.API_KEY };

        return sandbox.http.get(url, data);
	};

	return MemberViewModel;
});