'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var sandbox = require('sandbox');
    require('k/kendo.grid.min');

    // chapter docs
    var documents = require('json!static/document.json');

    var MemberDocsViewModel = function () {
        this.minutes = ko.observableArray([]);
        this.newsletters = ko.observableArray([]);

        this.$minutesGrid = $('#MinutesGrid');
        this.$newslettersGrid = $('#NewslettersGrid');
        this.$documentsGrid = $('#DocumentsGrid');

        this.getDbDocs()
        .then(function () { 
            this.setupGrids(); 
        }.bind(this))
        .catch(function (err) {
            console.error('Error: Cannot get documents (', err, ')');
        })
        .done();
    };

    MemberDocsViewModel.prototype.getDbDocs = function () {
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
        var formatDate = function (column) { 
            return sandbox.date.parseUnix(column.Date).format('MM/DD/YYYY');
        };

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
                { field: 'Date', title: 'Date', template: formatDate }
            ],
            filterable: false,
            pageable: true,
            scrollable: false,
            selectable: false,
            sortable: true
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
                { field: 'Date', title: 'Date', template: formatDate}
            ],
            filterable: false,
            pageable: true,
            scrollable: false,
            selectable: false,
            sortable: true
        });

        // Chapter Documents
        this.$documentsGrid.kendoGrid({
            dataSource: {
                data: documents,
                schema: {
                    model: {
                        fields: {
                            Type: { type: 'string' },
                            Name: { type: 'string' },
                            'Date': { type: 'number' },
                            File: { type: 'string' }
                        }
                    }
                },
                pageSize: 25
            },
            columns: [
                { field: 'Type', title: 'Type'},
                { field: 'Name', title: 'Description'}
            ],
            filterable: false,
            pageable: true,
            scrollable: false,
            selectable: false,
            sortable: true
        });




    };

    return MemberDocsViewModel;
});