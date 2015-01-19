'use strict';

define(function (require) {
	var ko = require('knockout');

	var aboutViewModel = function () {

		this.name = ko.observable('Kat');

	};

	return aboutViewModel;
});