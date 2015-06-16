require.config({
    baseUrl: '',
    paths: {

        // Viewmodels
        'navbar.viewmodel'              : 'components/navbar/navbar.viewmodel',
        
        'home.viewmodel'                : 'pages/home/home.viewmodel',

        // Routes
        'home.router'                   : 'pages/home/home.router',

        // Core
        'sandbox'                       : 'core/sandbox/sandbox',

        // Vendor
        'bootstrap'                     : 'vendor/bower_components/bootstrap/dist/js/bootstrap.min',
        'jquery'                        : 'vendor/bower_components/jquery/dist/jquery.min',
        'k'                             : 'vendor/bower_components/kendo-ui-core/js',
        'knockout'                      : 'vendor/bower_components/knockout/dist/knockout',
        'lodash'                        : 'vendor/bower_components/lodash/dist/lodash.min',
        'sammy'                         : 'vendor/bower_components/sammy/lib/min/sammy-0.7.6.min',

        // RequireJS Plugins
        'async'                         : 'vendor/bower_components/requirejs-plugins/src/async',
        'font'                          : 'vendor/bower_components/requirejs-plugins/src/font',
        'goog'                          : 'vendor/bower_components/requirejs-plugins/src/goog',
        'image'                         : 'vendor/bower_components/requirejs-plugins/src/image',
        'json'                          : 'vendor/bower_components/requirejs-plugins/src/json',
        'markdownConverter'             : 'vendor/bower_components/requirejs-plugins/lib/Markdown.Converter',
        'mdown'                         : 'vendor/bower_components/requirejs-plugins/src/mdown',
        'noext'                         : 'vendor/bower_components/requirejs-plugins/src/noext',
        'propertyParser'                : 'vendor/bower_components/requirejs-plugins/src/propertyParser',
        'text'                          : 'vendor/bower_components/requirejs-plugins/lib//text'
    },
    
    shim: {
        'jquery'                        : { exports: 'jQuery' },
        'bootstrap'                     : { deps: ['jquery'] },
        'k/kendo.core.min'              : { deps: ['jquery'] },
        'sammy'                         : { deps: ['jquery'] }
    },

    map: {
        '*': {
            'css'                       : 'vendor/bower_components/require-css/css.min',   // RequireJS CSS Plugin
            'kendo'                     : 'k/kendo.core.min'
        }
    }
});