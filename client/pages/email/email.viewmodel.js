'use strict';

define(function (require) {
    var $ = require('jquery');
    var auth = require('auth');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    var dropdown = require('dropdown');
    var editor = require('editor');
    var multiSelect = require('multi-select');

	var EmailViewModel = function (emails) {
        this.currentUser = auth.currentUser();
        this.queryEmails = (emails) ? emails.split('&') : '';

        // email lists
        this.activeEmails = ko.observableArray([]);
        this.alumniEmails = ko.observableArray([]);
        this.affiliateEmails = ko.observableArray([]);

        this.emails = ko.observable({});
        this.selectedMembers = ko.observableArray([]);
        this.isEmailFormComplete = ko.computed(function() { 
            return this.selectedMembers().length && this.subject() && this.message(); 
        }, this);

        // show/hide to addresses
        this.showToAddress = ko.observable(true);
        this.showToAddress.subscribe(function (val) {
            var multiselect = $('#ToAddresses').data('kendoMultiSelect');
            if (!multiselect) { return; }
            
            // update placeholder
            if (!val) { 
                multiselect.setOptions({ placeholder: 'Disabled.' });
                multiselect._placeholder();
            }
            else { 
                multiselect.setOptions({ placeholder: 'To:' });
                multiselect._placeholder();
            }

            // reset value
            multiselect.value(null);
        });

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
        this.setUpSendToGroup();

        this.getMembers()
        .then(function (members) {
            this.setUpChooseAddress(members);
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get members (', err, ')');
        })
        .done();
	};

    EmailViewModel.prototype.getExcommContacts = function () {
        var data, url;
        
        this.sendAs = [];
        
        url = window.env.SERVER_HOST + '/contact/excomm';
        data = { apiKey: window.env.API_KEY };

        return sandbox.http.get(url, data)
        .then(function (contactInfos) {
            contactInfos.forEach(function (info) {
                if(info.position & this.currentUser.Position) {
                    this.sendAs.push(info);
                }
            }, this);

            this.setUpSendAsList();
        }.bind(this));
    };

    EmailViewModel.prototype.getMembers = function () {
        var data, url;

        url = window.env.SERVER_HOST + '/member/list';
        data = { 
            apiKey: window.env.API_KEY, 
            select: ['Id', 'FirstName', 'LastName','Email', 'Position', 'EmailList']
        };

        return sandbox.http.get(url, data)
        .then(function (members) {
            members.forEach(function (m) {

                // populate mailing list
                if( (m.Position & sandbox.constant.role.ACTIVE || m.Position & sandbox.constant.role.PROBATIONARY) && m.EmailList ) {
                    this.activeEmails.push(m.Id);
                } else if ( (m.Position & sandbox.constant.role.ALUMNUS) && m.EmailList ) {
                    this.alumniEmails.push(m.Id);
                } else if ( (m.Position & sandbox.constant.role.AFFILIATE) && m.EmailList ) {
                    this.affiliateEmails.push(m.Id);
                }

                // construct name and fill out email lookup table
                m.Name = m.FirstName + ' ' + m.LastName;
                this.emails[m.Id] = m.Email;
            }, this);

            if(this.queryEmails) { this.selectedMembers(this.queryEmails); }
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
            sandbox.notification.success('SendEmailSuccess', 'Sent email successfully.');
        }.bind(this))
        .catch(function () {
            sandbox.notification.error('SendEmailError', 'There was a problem sending email.');
        })
        .done();
    };

    EmailViewModel.prototype.setUpSendAsList = function () {        
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

    EmailViewModel.prototype.setUpSendToGroup = function () {
        var _dataSource = [
            { title: 'Actives', value: 'activeEmails' },
            { title: 'Alumni', value: 'alumniEmails' },
            { title: 'Affiliates', value: 'affiliateEmails' }
        ];

        dropdown({
            selector: '.toGroup',
            textField: 'title',
            valueField: 'value',
            dataSource: _dataSource,
            optionLabel: ' ',
            onChange: function (e) {
                var selected = e.sender.value();
                if (selected) { 
                    this.showToAddress(false);
                    this.selectedMembers(this[selected]()); 
                } else {
                    this.showToAddress(true);
                    this.selectedMembers([]);
                }
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

    EmailViewModel.prototype.setUpChooseAddress = function (members) {
        multiSelect({
            selector: '#ToAddresses',
            textField: 'Name',
            valueField: 'Id',
            data: members,
            value: this.queryEmails,
            onChange: function () {
                var selected = $('#ToAddresses').data('kendoMultiSelect').value();
                this.selectedMembers(selected);
            }.bind(this)
        });
    };

	return EmailViewModel;
});