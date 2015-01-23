'use strict';

define(function () {

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
			require([viewModel, 'jquery', 'knockout'], function (ViewModel, $, ko) {
				var _viewModel = (ViewModel instanceof Function) ? new ViewModel() : ViewModel;

				// render mustache template with viewmodel
				context.render(viewTemplate, _viewModel)
					.appendTo(context.$element())
					.then(function () {

						// clean ko bindings from home
						if ($(domID)[0]) {
							ko.cleanNode($(domID)[0]);
							ko.applyBindings(_viewModel, $(domID)[0]);
						}

					});
			});	
		}
	};
	
	return templateRenderer;
});