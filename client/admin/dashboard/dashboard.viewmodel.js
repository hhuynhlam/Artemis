'use strict';

define(function (require) {
    var $ = require('jquery');
    var ko = require('knockout');
    var AddEventViewModel = require('admin/tools/AddEvent/AddEvent.viewmodel');
    var AddPledgesViewModel = require('admin/tools/AddPledges/AddPledges.viewmodel');

    var AdminDashboardViewModel = function () {
        var $widgetContainer = $('#AdminWidgets');
        this.widgets = ko.observableArray([]);

        // check views for role's tools
        require(['json!admin/views/webmaster.json'], function (metaData) {
            metaData.tools.forEach(function (t) {
                
                // require template
                require([t.template], function (template) {
                    $widgetContainer.append(template);
                
                    // apply ko bindings to widget
                    ko.applyBindings(new this[t.viewmodel](), document.getElementById(t.id));
                }.bind(this));

            }, this);
        }.bind(this));
    };

    AdminDashboardViewModel.prototype.AddEventViewModel = AddEventViewModel;
    AdminDashboardViewModel.prototype.AddPledgesViewModel = AddPledgesViewModel;

    return AdminDashboardViewModel;
});