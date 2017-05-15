jQuery(function($) {
	
	"use strict";

	$(".products, .add_to_cart_inline").on("click", ".add_to_cart_button.product_type_simple", function(e) {
		
		$("body").addClass("offcanvas_for_cart");
		$("body").removeClass("offcanvas_for_quickview");

		window.offcanvas_right();
	});

});