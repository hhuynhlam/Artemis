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

	// placeholder binding
	ko.bindingHandlers.placeholder = {
	    update: function(element, valueAccessor) {
	    	var value = ko.unwrap(valueAccessor());
			$(element).attr('placeholder', value);
	    }
	};

	// toggle active
	ko.bindingHandlers.eventFilter = {
		init: function(element, valueAccessor) {
			$(element).click(function () {
				
				var conflicts;
				
				if ( !$(element).hasClass('disabled') ) {

					conflicts = valueAccessor().conflicts;

					$(element).toggleClass('active');
					conflicts.forEach(function (c) {
						c.forEach(function (i) {
							$('#' + i).toggleClass('disabled');
						});
					});

				} 
			
			});
		}
	};
});