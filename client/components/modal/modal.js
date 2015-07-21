'use strict';

define(function (require) {
    var $ = require('jquery');
    var sandbox = require('sandbox');
    require('k/kendo.window.min');

    var templates = {
        logoutConfirm: require('text!components/modal/templates/logout-confirm.html'),
        profileView: require('text!components/modal/templates/profile-view.html'),
        saveConfirm: require('text!components/modal/templates/save-confirm.html'),
        signupDriver: require('text!components/modal/templates/signup-driver.html')
    };

    var Modal = function (templateName, options) {
        var $modal = $(options.selector || '#Modal'),
            $kendoWindow, $cancel, $confirm, innerHtml;
        
        if(options.data) { innerHtml = fillData(options.data, templates[templateName]); }
        else { innerHtml = templates[templateName]; }

        // init modal
        $modal.html(innerHtml);
        $modal.kendoWindow({ title: false, modal: true });
        $kendoWindow = $modal.data('kendoWindow');

        // setup selectors
        $cancel = (options.cancel) ? $(options.selector + ' .cancel') : undefined;
        $confirm = (options.confirm) ? $(options.selector + ' .confirm') : undefined;

        // setup click bindings
        if($cancel) {
            $cancel.on('click', function() { 
                if (typeof options.cancel === 'function') { options.cancel(); }
                $kendoWindow.close();
            }); 
        }

        if($confirm) {
            $confirm.on('click', function() {
                var val;
                if(templateName === 'signupDriver') { val = $('#Driver').val(); }
                if (typeof options.confirm === 'function') { options.confirm((val) ? parseInt(val) : null); }
                $kendoWindow.close();
            }); 
        }
        
        $kendoWindow.center();
    };

    var fillData = function (data, template) {
        var interpolate = sandbox.util.template(template);
        return interpolate(data);
    };

    return Modal;
});