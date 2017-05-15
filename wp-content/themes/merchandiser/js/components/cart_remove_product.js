jQuery(function($) {
	
	"use strict";

	$('.woocommerce-cart .shop_table .cart_item').each(function() {
		$(this).find('.product-remove a').appendTo( $(this).children('.product-subtotal') );
	});

});