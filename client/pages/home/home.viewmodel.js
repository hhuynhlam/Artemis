'use strict';

define(function (require) {
	var ko = require('knockout');

	var HomeViewModel = function () {

		this.name = ko.observable('Kat');

	};

	return HomeViewModel;
});