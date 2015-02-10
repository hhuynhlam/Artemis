'use strict';

define(function () {
	var $ = require('jquery');

	var templateRenderer = {
		
		renderClean : function (context, viewModel, viewTemplate, domID) {
			require([viewModel, 'jquery', 'knockout'], function (ViewModel, $, ko) {
				var _viewModel = new ViewModel();

				// render mustache template with viewmodel
				context.partial(viewTemplate, _viewModel, function () {

					// clean ko bindings from home
					ko.cleanNode($(domID)[0]);
					ko.applyBindings(_viewModel, $(domID)[0]);

				});
			});	
		},

		renderAfter : function (context, viewModel, viewTemplate, domID) {
			var promise = $.Deferred();

			require([viewModel, 'jquery', 'knockout'], function (ViewModel, $, ko) {
				var _viewModel = (ViewModel instanceof Function) ? new ViewModel() : ViewModel;

				// render mustache template with viewmodel
				context.render(viewTemplate, _viewModel)
					.appendTo(context.$element())
					.then(function () {

						// FIXME: Hack for domID not existing
						while (!$(domID)[0]) {
							setTimeout(1000);
							//window.location.reload();
						}

						// clean ko bindings
						ko.cleanNode($(domID)[0]);
						ko.applyBindings(_viewModel, $(domID)[0]);

						promise.resolve(_viewModel);

					});
			});	

			return promise;
		}
	};
	
	return templateRenderer;
});