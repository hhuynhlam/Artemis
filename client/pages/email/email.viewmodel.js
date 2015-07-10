'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var editor = require('editor');
    var multiSelect = require('multi-select');

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

        // init
        this.setUpEditor();

        this.getMembers()
        .then(function (members) {
            this.setUpMultiSelect(members);
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

    EmailViewModel.prototype.sendEmail = function () {
        var data, url;

        url = window.env.SERVER_HOST + '/email';
        data = { 
            apiKey: window.env.API_KEY,
            to: this.to(),
            subject: this.subject(),
            message: this.message()
        };

        sandbox.http.post(url, data)
        .then(function () {
            console.log('Mail sent successfully');
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot send email (', err, ')');
        })
        .done();
    };

    EmailViewModel.prototype.setUpEditor = function () {
        editor({
            selector: '#MessageBody',
            placeholder: 'Message:',
            onChange: function (e) {
                this.message($(e.sender.body).html());
            }.bind(this)
        });
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