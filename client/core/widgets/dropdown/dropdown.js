'use strict';

define(function (require) {
    var $ = require('jquery');
    require('k/kendo.dropdownlist.min');

    var Dropdown = function (options) {
        var $selector = $(options.selector);

        $selector.kendoDropDownList({
            dataTextField: options.textField,
            dataValueField: options.valueField,
            dataSource: options.dataSource,
            optionLabel: options.optionLabel,
            change: options.onChange
        });
    };

    return Dropdown;
});