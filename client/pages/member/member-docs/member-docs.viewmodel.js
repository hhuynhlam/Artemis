'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    require('k/kendo.grid.min');

    var MemberDocsViewModel = function () {
        this.minutes = ko.observableArray([]);
        this.newsletters = ko.observableArray([]);

        this.$minutesGrid = $('#MinutesGrid');
        this.$newslettersGrid = $('#NewslettersGrid');

        this.getDocs()
        .then(function () { 
            this.setupGrids(); 
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get documents (', err, ')');
        })
        .done();
    };

    MemberDocsViewModel.prototype.getDocs = function () {
        var url = window.env.SERVER_HOST + '/document',
            data = { apiKey: window.env.API_KEY };

        return sandbox.http.get(url, data)
        .then(function (docs) {
            docs.forEach(function (doc) {
                if(doc.Type === 'minutes') { this.minutes.push(doc); }
                if(doc.Type === 'newsletter') { this.newsletters.push(doc); }
            }, this);
        }.bind(this));
    };

    MemberDocsViewModel.prototype.setupGrids = function () {
        
        // Minutes
        this.$minutesGrid.kendoGrid({
            dataSource: {
                data: this.minutes(),
                schema: {
                    model: {
                        fields: {
                            Type: { type: 'string' },
                            Name: { type: 'string' },
                            'Date': { type: 'number' },
                            Term: { type: 'number' },
                            File: { type: 'string' },
                            Uploaded: { type: 'number' }
                        }
                    }
                },
                pageSize: 10
            },
            columns: [
                { field: 'Name', title: 'Description'},
                { field: 'File', title: 'File'},
                { field: 'Date', title: 'Date'}
            ],
            filterable: {
                extra: false
            },
            pageable: true,
            selectable: false,
            scrollable: false
        });

        // Newsletters
        this.$newslettersGrid.kendoGrid({
            dataSource: {
                data: this.newsletters(),
                schema: {
                    model: {
                        fields: {
                            Type: { type: 'string' },
                            Name: { type: 'string' },
                            'Date': { type: 'number' },
                            Term: { type: 'number' },
                            File: { type: 'string' },
                            Uploaded: { type: 'number' }
                        }
                    }
                },
                pageSize: 10
            },
            columns: [
                { field: 'Name', title: 'Description'},
                { field: 'File', title: 'File'},
                { field: 'Date', title: 'Date'}
            ],
            filterable: {
                extra: false
            },
            pageable: true,
            selectable: false,
            scrollable: false
        });
    };

    return MemberDocsViewModel;
});