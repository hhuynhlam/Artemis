'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
    var modal = require('modal');
    var role = require('role');
	var sandbox = require('sandbox');
    var tour = require('tour');
	require('k/kendo.grid.min');
    require('k/kendo.toolbar.min');

	var MemberListViewModel = function () {
		this.$selector = $('#RosterGrid'); 
        this.$toolbar = $('#RosterToolbar');

        // Grid Observables
		this.members = ko.observableArray([]);
        this.selectedMembers = ko.observableArray([]);
        
        // Toolbar Observables
        this.enableViewProfile = ko.computed(function () { 
            var enable = this.selectedMembers().length === 1,
                $kendoToolbar = this.$toolbar.data('kendoToolBar');

            if (enable && $kendoToolbar) { $('#ViewProfileButton').removeAttr('disabled'); }
            else if ($kendoToolbar) { $('#ViewProfileButton').attr('disabled', 'disabled'); }
            
            return enable; 
        }, this);
        this.enableEmailSelected = ko.computed(function () { 
            var enable = this.selectedMembers().length > 0,
                $kendoToolbar = this.$toolbar.data('kendoToolBar');

            if (enable && $kendoToolbar) { $('#EmailSelectedButton').removeAttr('disabled'); }
            else if ($kendoToolbar) { $('#EmailSelectedButton').attr('disabled', 'disabled'); }

            return enable;  
        }, this);
        this.showToolbar = ko.computed(function () { return this.enableEmailSelected() || this.enableViewProfile(); }, this);

		// init events
		this.getMembers()
		.then(function (members) {
			members.forEach(function (m) { this.formatMemberData(m); }, this);
            this.setupGrid();
		}.bind(this))
		.catch(function (err) {
			console.error('Error: Cannot get members (', err, ')');
		})
		.done();

        this.setupToolbar();
        tour.start('memberList');
	};

    // Grid
	MemberListViewModel.prototype.getMembers = function () {
		var data, url;

        url = window.env.SERVER_HOST + '/member/list';
        data = { 
            apiKey: window.env.API_KEY, 
            select: [
                'Id', 
                'FirstName', 
                'LastName',
                'Birthday', 
                'Position', 
                'Class', 
                'Family', 
                'Email', 
                'Phone',
                'ShirtSize',
                'TempAddress',
                'PermAddress'
            ]
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
                            Id: { type: 'number' },
                            Status: { type: 'string' },
                            FirstName: { type: 'string' },
                            LastName: { type: 'string' },
                            Birthday: { type: 'string' },
                            Class: { type: 'string' },
                            Family: { type: 'string' },
                            Position: { type: 'number' },
                            Phone: { type: 'string' },
                            Email: { type: 'string' },
                            ShirtSize: { type: 'string' },
                            TempAddress: { type: 'string' },
                            PermAddress: { type: 'string' }
                        }
                    }
                }
                // pageSize: 20
            },
            columns: [
                { hidden: true, field: 'Id', attributes: { 'data-id': 'memberId' } },
                { field: 'Status', title: 'Status'},
                { field: 'Name', title: 'Name'},
                { field: 'Class', title: 'Class'},
                { field: 'Family', title: 'Family'},
                { field: 'Position', title: 'Position', filterable: false, sortable: false, template: this.formatPosition },
                { field: 'Phone', title: 'Phone', width: '150px' },
                { field: 'Email', title: 'Email'}
            ],
            filterable: {
            	extra: false
            },
            pageable: false,
            selectable: false,
            scrollable: false,
            sortable: true,
            dataBound: this.onDataBound.bind(this)
		});
        
        this.makeGridResponsive();
	};

	MemberListViewModel.prototype.refreshGrid = function (newData) {
		var $grid = this.$selector.data('kendoGrid');
		$grid.dataSource.data(newData);
		$grid.refresh();
	};

    MemberListViewModel.prototype.onDataBound = function () {

        // on row click
        this.$selector.find('tbody > tr').on('click', function (e) {
            $(e.currentTarget).toggleClass('k-state-selected');
            this.updateGridSelected();   
        }.bind(this));
    };

    MemberListViewModel.prototype.updateGridSelected = function () {
        var selected = this.$selector.find('tbody > tr.k-state-selected'),
            data = this.$selector.data('kendoGrid').dataSource.data(),
            dataItems = [];

        // foreach selected, find data for it
        sandbox.util.forEach(selected, function (s) {
            var id = $(s).find('td[data-id="memberId"]').html(),
                dataItem = sandbox.util.find(data, function (d) { return d.Id === parseInt(id); }); 
            dataItems.push(dataItem);
        }, this);

        // update selectedMembers data
        this.selectedMembers(dataItems);
    };

    // Toolbar
    MemberListViewModel.prototype.setupToolbar = function () {
        this.$toolbar.kendoToolBar({
            items: [{ 
                type: 'button',
                id: 'ViewProfileButton', 
                text: 'View Profile', 
                attributes: { 'class': 'btn btn-success' },
                click: this.viewProfile.bind(this) 
            }, { 
                type: 'button', 
                id: 'EmailSelectedButton',
                text: 'Email Selected', 
                attributes: { 'class': 'btn btn-info' },
                click: this.emailSelected.bind(this)
            }],
            resizable: false
        });
    };

    MemberListViewModel.prototype.viewProfile = function () {
        var id = 'ProfileModal',
            selector = '#' + id,
            $kendoWindow = $(selector).data('kendoWindow');
            
        if ($kendoWindow) { 
            $kendoWindow.destroy(); 
            $('#MemberList .container').append('<div id="' + id + '"></div>');
        } 

        modal('profileView', {
            selector: selector,
            cancel: true,
            data: this.selectedMembers()[0]
        });
    };

    MemberListViewModel.prototype.emailSelected = function () {
        var emailString = this.selectedMembers().map(function (el) {
            return el.Id;
        }, this)
        . join('&');

        window.location.href = window.env.CLIENT_HOST + '/email/' + emailString;
    };
    
    // Util
    MemberListViewModel.prototype.formatMemberData = function (member) {
        
        // set status
        if(member.Position & sandbox.constant.role.ACTIVE || member.Position & sandbox.constant.role.PROBATIONARY) {
            member.Status = 'Active';
        } else if (member.Position & sandbox.constant.role.ALUMNUS) {
            member.Status = 'Alumni';
        } else if (member.Position & sandbox.constant.role.AFFILIATE) {
            member.Status = 'Affiliate';
        }

        // parse birthday
        if(member.Birthday) {
            member.Birthday = sandbox.date.parseUnix(member.Birthday).format('MMM D, YYYY');
        }

        // add to list if has status
        if(member.Status) {
            this.trimWhiteSpace(member);
            member.Name = member.FirstName + ' ' + member.LastName;
            this.members.push(member); 
        }
    };

    MemberListViewModel.prototype.formatPosition = function (dataItem) {
        var roles = role.getPositionRoles(dataItem.Position);
        return roles.join(', ');
    };

    MemberListViewModel.prototype.makeGridResponsive = function () {
        $(window).on('resize', function() {
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