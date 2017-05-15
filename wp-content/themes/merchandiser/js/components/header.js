jQuery(function($) {
	
	"use strict";

	window.header_sticky_scroll = function() {
		if (Foundation.utils.is_large_up()) {
			if ($(document).scrollTop() > 0) {
				$('body.header-transparent.header-sticky').addClass("header-sticky-scroll");
			} else {
				$('body.header-transparent.header-sticky').not(".no-transparency-lock").removeClass("header-sticky-scroll");
			}
		} else {
			$('body.header-transparent.header-sticky').addClass("header-sticky-scroll");
		}
	}

	window.header_sticky_scroll();

	

	$(window).resize(function() {
		
		window.header_sticky_scroll();
	
	});

	$(window).scroll(function() {

		window.header_sticky_scroll();

	})

})