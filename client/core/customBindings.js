'use strict';

define(function (require) {
	var $ = require('jquery');
	var ko = require('knockout');

	// smoothScrolling on the same page
	ko.bindingHandlers.smoothScroll = {
	    init: function(element, valueAccessor) {
			$(element).click(function (event) {
				event.preventDefault();
				var targetHash = valueAccessor(),
				targetTop = (!targetHash) ? 0 : $(targetHash)[0].offsetTop;

				$('html, body').animate({
				    scrollTop: targetTop - 50
				 }, {
				 	duration: 1000,
				 	queue: false
				 });
			});
	    }
	};
});