jQuery(function($) {
	
	"use strict";

	//=============================================================================
	//  yith wishlist counter
	//=============================================================================

	if ($('.wishlist_items_number').length ) {


		var wishlistCounter = 0;

		/*
		**	Check for Yith cookie
		*/
		if ( $.cookie("yith_wcwl_products") ) {
			var products = JSON.parse($.cookie("yith_wcwl_products"));
			wishlistCounter =  Object.keys(products).length;
		} else 	{
			wishlistCounter = Number($('.wishlist_items_number').html());
		}

		// /*
		// **	Increment counter on add
		// */
		$('body').on( 'added_to_wishlist' , function(){
			wishlistCounter++;
			getbowtied_update_wishlist_count(wishlistCounter);
		});

		/*
		**	Decrement counter on remove
		*/
		$('body').on( 'removed_from_wishlist' , function(){
			wishlistCounter--;
			getbowtied_update_wishlist_count(wishlistCounter);
		});

		function getbowtied_update_wishlist_count(count) {
			if ( Number.isInteger(count) && count >=0 ) {
				$('.wishlist_items_number').html(count);
			} 
		}

		getbowtied_update_wishlist_count(wishlistCounter);

	}

	//=============================================================================
	//  END yith wishlist counter
	//=============================================================================

});