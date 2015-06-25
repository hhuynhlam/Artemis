'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
	var sandbox = require('sandbox');
	require('k/kendo.grid.min');

	var MemberViewModel = function () {
		this.actives = ko.observableArray([]);
		this.alumni = ko.observableArray([]);
		this.affiliates = ko.observableArray([]);


		var $selector = $('#RosterGrid'); 

		// init events
		this.getMembers()
		.then(function (members) {
			var data = [];

			members.forEach(function (m) {
				// if(m.position & sandbox.constant.role.ACTIVE) { this.actives.push(m); }
				// else if(m.position & sandbox.constant.role.ALUMNUS) { this.alumni.push(m); }
				// else if(m.position & sandbox.constant.role.AFFILIATE) { this.affiliates.push(m); }
				data.push({
					Name: m.first_name + ' ' + m.last_name,
					Class: m.class_name,
					Family: m.family,
					Position: m.position,
					Phone: m.phone,
					Email: m.email
				});	

			}, this);
			
			$selector.kendoGrid({
				dataSource: {
                    data: data,
                    schema: {
                        model: {
                            fields: {
                                Name: { type: "string" },
                                Class: { type: "string" },
                                Family: { type: "string" },
                                Position: { type: "number" },
                                Phone: { type: "string" },
                                Email: { type: "string" },

                            }
                        }
                    },
                    pageSize: 20
                },
                scrollable: true,
                sortable: true,
                filterable: true,
                columns: [
                    'Name',
	                'Class',
	                'Family',
	                'Position',
	                'Phone',
	                'Email'
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