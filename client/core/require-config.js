require.config({
    baseUrl: '',
    paths: {
        // Core
        'customBindings' : 'core/customBindings',
        'templateRenderer' : 'core/templateRenderer',
        'utils' : 'core/utils', 

        // Vendor
        'bootstrap': 'vendor/bower_components/bootstrap/dist/js/bootstrap.min',
        'jquery': 'vendor/bower_components/jquery/dist/jquery.min',
        'jquery-cookie': 'vendor/bower_components/jquery.cookie/jquery.cookie',
        'knockout': 'vendor/bower_components/knockout/dist/knockout',
        'lodash': 'vendor/bower_components/lodash/dist/lodash.min',
        'mustache' : 'vendor/bower_components/mustache.js/mustache.min',
        'sammy': 'vendor/bower_components/sammy/lib/min/sammy-0.7.6.min',
        'sammy-mustache': 'vendor/bower_components/sammy/lib/min/plugins/sammy.mustache-0.7.6.min'

    },
    shim: {
        'bootstrap': { deps: ['jquery'] },
        'mustache': { deps: ['jquery'] },
        'sammy': { deps: ['jquery'] },
        'sammy-mustache': { deps: ['sammy', 'mustache'] }
    }
});