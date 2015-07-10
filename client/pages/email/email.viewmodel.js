'use strict';

define(function (require) {
    var $ = require('jquery');
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var dropdown = require('dropdown');
    var editor = require('editor');
    var multiSelect = require('multi-select');

	var EmailViewModel = function () {
        this.currentUser = auth.currentUser();
        this.emails = ko.observable({});
        this.selectedMembers = ko.observableArray([]);
        this.isEmailFormComplete = ko.computed(function() { 
            return this.selectedMembers().length && this.subject() && this.message(); 
        }, this);

        this.sendAs = [];

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
        this.from = ko.observable(this.currentUser.Email);

        // init
        this.getExcommContacts();
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

    EmailViewModel.prototype.getExcommContacts = function () {
        var data, url;

        url = window.env.SERVER_HOST + '/contact/excomm';
        data = { apiKey: window.env.API_KEY };

        return sandbox.http.get(url, data)
        .then(function (contactInfos) {
            contactInfos.forEach(function (info) {
                if(info.position & this.currentUser.Position) {
                    this.sendAs.push(info);
                }
            }, this);

            this.setUpDropDownList();
        }.bind(this));
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
            message: this.message(),
            from: this.from()
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

    EmailViewModel.prototype.setUpDropDownList = function () {        
        dropdown({
            selector: '.sendAs',
            textField: 'address',
            valueField: 'address',
            dataSource: this.sendAs,
            optionLabel: 'Self',
            onChange: function (e) {
                this.from( (e.sender.value()) ? e.sender.value() : this.currentUser.Email);
            }.bind(this)
        });
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