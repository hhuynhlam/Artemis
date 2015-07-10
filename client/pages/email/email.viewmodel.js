'use strict';

define(function (require) {
    var ko = require('knockout');
    var sandbox = require('sandbox');

    var multiSelect = require('multi-select');

    var $ = require('jquery');
    require('k/kendo.editor.min');

	var EmailViewModel = function () {
        this.emails = ko.observable({});
        this.selectedMembers = ko.observableArray([]);

        // Email Form Observables
        this.to = ko.computed(function () {
            var result = [];
            this.selectedMembers().forEach(function (member) {
                result.push(this.emails[member]);
            }, this);
            return result;
        }, this);

        this.subject = ko.observable('');
        this.message = ko.observable('');

        this.getMembers()
        .then(function (members) {
            this.setUpMultiSelect(members);
            this.setUpEditor();
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get members (', err, ')');
        })
        .done();
	};

    EmailViewModel.prototype.getMembers = function () {
        var data, url;

        url = window.env.SERVER_HOST + '/member/list';
        data = { 
            apiKey: window.env.API_KEY, 
            select: ['Id', 'FirstName', 'LastName','Email']
        };

        return sandbox.http.get(url, data)
        .then(function (members) {
            members.forEach(function (m) {
                m.Name = m.FirstName + ' ' + m.LastName;
                this.emails[m.Id] = m.Email;
            }, this);

            return members;
        }.bind(this));
    };

    EmailViewModel.prototype.setUpEditor = function () {
        var $selector = $('#MessageBody');
        $selector.kendoEditor();
        $($selector.data('kendoEditor').body).html('Message: (Required)');
    };

    EmailViewModel.prototype.setUpMultiSelect = function (members) {
        multiSelect({
            selector: '#ToAddresses',
            textField: 'Name',
            valueField: 'Id',
            data: members,
            onChange: function () {
                var selected = $('#ToAddresses').data('kendoMultiSelect').value();
                this.selectedMembers(selected);
            }.bind(this)
        });
    };


	return EmailViewModel;
});