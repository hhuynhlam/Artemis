'use strict';

define(function (require) {
    var $ = require('jquery');
    var sandbox = require('sandbox');
    require('k/kendo.editor.min');

    var Editor = function (options) {
        var $selector = $(options.selector),
            phCallback;
        
        // setup placeholder callback
        if (options.placeholder) {
            phCallback = function (e) {
                var content = $(e.sender.body).html();
                if (sandbox.util.trim(content) === options.placeholder || 
                    sandbox.util.trim(content) === options.placeholder + '<br class="k-br">') {

                    // clear out placeholder
                    $(e.sender.body).html('');
                }
            };
        }

        // setup editor
        $selector.kendoEditor({
            change: options.onChange,
            select: function (e) {
                if(phCallback) { phCallback(e); }
                if(options.onSelect) { options.onSelect(e); }
            },
            tools: [
                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript',
                'fontName', 'fontSize', 'foreColor', 'backColor',
                'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',
                'insertUnorderedList', 'insertOrderedList', 'indent', 'outdent',
                'createLink', 'unlink', 'insertImage'
            ]
        });

        // init placeholder text
        if (options.placeholder) { $($selector.data('kendoEditor').body).html(options.placeholder); }
    };

    return Editor;
});