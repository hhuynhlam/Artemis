'use strict';

define(function (require) {
	var ko = require('knockout');

	var homeViewModel = function () {

		this.name = ko.observable('Kat');

	};

	return homeViewModel;
});