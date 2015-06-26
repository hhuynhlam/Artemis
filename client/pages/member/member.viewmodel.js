'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
	var sandbox = require('sandbox');
	require('k/kendo.grid.min');

	var MemberViewModel = function () {
		this.$selector = $('#RosterGrid'); 

		this.actives = ko.observableArray([]);
		this.alumni = ko.observableArray([]);
		this.affiliates = ko.observableArray([]);
		this.view = ko.observable('Active');

		// init events
		this.getMembers()
		.then(function (members) {
			members.forEach(function (m) {
				if(m.Position & sandbox.constant.role.ACTIVE) { this.actives.push(m); }
				else if(m.Position & sandbox.constant.role.ALUMNUS) { this.alumni.push(m); }
				else if(m.Position & sandbox.constant.role.AFFILIATE) { this.affiliates.push(m); }
			}, this);

			this.setupGrid();
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

	MemberViewModel.prototype.setupGrid = function () {
		this.$selector.kendoGrid({
			dataSource: {
                data: this.actives(),
                schema: {
                    model: {
                        fields: {
                            FirstName: { type: "string" },
                            LastName: { type: "string" },
                            ClassName: { type: "string" },
                            Family: { type: "string" },
                            Position: { type: "number" },
                            Phone: { type: "string" },
                            Email: { type: "string" },
                        }
                    }
                },
                pageSize: 20
            },
            columns: [
                { field: "FirstName", title: "First Name"},
                { field: "LastName", title: "Last Name"},
                { field: "ClassName", title: "Class"},
                { field: "Family", title: "Family"},
                { field: "Position", title: "Position"},
                { field: "Phone", title: "Phone"},
                { field: "Email", title: "Email"}
            ],
            filterable: {
            	extra: false
            },
            mobile: true,
            pageable: true,
            selectable: 'row',
            scrollable: true,
            sortable: true,
            change: function () {
            	// do something when selected
            }
		});
	};

	MemberViewModel.prototype.refreshGrid = function (newData) {
		var $grid = this.$selector.data('kendoGrid');
		$grid.dataSource.data(newData);
		$grid.refresh();
	};

	MemberViewModel.prototype.switchToActives = function () {
		this.view('Active');
		this.refreshGrid(this.actives());
	};

	MemberViewModel.prototype.switchToAlumni = function () {
		this.view('Alumnus');
		this.refreshGrid(this.alumni());
	};

	MemberViewModel.prototype.switchToAffiliates = function () {
		this.view('Affiliate');
		this.refreshGrid(this.affiliates());
	};

	return MemberViewModel;
});