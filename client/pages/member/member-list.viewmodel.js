'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
    var role = require('role');
	var sandbox = require('sandbox');
	require('k/kendo.grid.min');

	var MemberListViewModel = function () {
		this.$selector = $('#RosterGrid'); 

		this.members = ko.observableArray([]);

		// init events
		this.getMembers()
		.then(function (members) {
			members.forEach(function (m) {
                if(m.Position & sandbox.constant.role.ACTIVE || m.Position & sandbox.constant.role.PROBATIONARY) {
                    m.Status = 'Active';
                    this.trimWhiteSpace(m);
                    this.members.push(m);
                } else if (m.Position & sandbox.constant.role.ALUMNUS) {
                    m.Status = 'Alumni';
                    this.trimWhiteSpace(m);
                    this.members.push(m);
                } else if (m.Position & sandbox.constant.role.AFFILIATE) {
                    m.Status = 'Affiliate';
                    this.trimWhiteSpace(m);
                    this.members.push(m);
                }        
            }, this);

            this.setupGrid();
		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get members (', err, ')');
		})
		.done();
	};

	MemberListViewModel.prototype.getMembers = function () {
		var data, url;

        url = window.env.SERVER_HOST + '/member/list';
        data = { 
            apiKey: window.env.API_KEY, 
            select: ['FirstName', 'LastName', 'Position', 'Class', 'Family', 'Email', 'Phone']
        };

        return sandbox.http.get(url, data);
	};

	MemberListViewModel.prototype.setupGrid = function () {
		this.$selector.kendoGrid({
			dataSource: {
                data: this.members(),
                schema: {
                    model: {
                        fields: {
                            Status: { type: "string" },
                            FirstName: { type: "string" },
                            LastName: { type: "string" },
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
            columns: [
                { field: "Status", title: "Status"},
                { field: "FirstName", title: "First Name"},
                { field: "LastName", title: "Last Name"},
                { field: "Class", title: "Class"},
                { field: "Family", title: "Family"},
                { field: "Position", title: "Position", filterable: false, sortable: false, template: this.formatPosition },
                { field: "Phone", title: "Phone"},
                { field: "Email", title: "Email"}
            ],
            filterable: {
            	extra: false
            },
            pageable: true,
            selectable: 'row',
            scrollable: false,
            sortable: true,
            change: function () {
            	// do something when selected
            }
		});
        
        this.makeGridResponsive();
	};

	MemberListViewModel.prototype.refreshGrid = function (newData) {
		var $grid = this.$selector.data('kendoGrid');
		$grid.dataSource.data(newData);
		$grid.refresh();
	};

    MemberListViewModel.prototype.formatPosition = function (dataItem) {
        var roles = role.getPositionRoles(dataItem.Position);
        return roles.join(", ");
    };

    MemberListViewModel.prototype.makeGridResponsive = function () {
        $(window).on("resize", function() {
            if ($(window).width() < 992) {
                this.$selector.data('kendoGrid').resize();
            }
        }.bind(this));
    };

    MemberListViewModel.prototype.trimWhiteSpace = function (m) {
        m.FirstName = sandbox.util.trim(m.FirstName);
        m.LastName = sandbox.util.trim(m.LastName);
    };

	return MemberListViewModel;
});