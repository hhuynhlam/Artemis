'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');
	var mustache = require('sammy-mustache');
	var sammy = require('sammy');

	// define a new Sammy.Application bound to the #view DOM
	var app = sammy('#view', function() {
		
		// load mustache templating engine
		this.use(mustache, 'mustache');

		this.get('/', function (context) {
			
			require(['pages/home/home.viewmodel'], function (ViewModel) {
				var viewModel = new ViewModel();

				// render mustache template with viewmodel
				context.partial('pages/home/home.mustache', viewModel, function () {

					// clean ko bindings from current context
					ko.cleanNode(context.$element()[0]);
					ko.applyBindings(viewModel, context.$element()[0]);
				});
			});
		
		});

	});

	// run app
	$(function() {
        app.run();
    });
});