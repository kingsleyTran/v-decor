<?php

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {

	//==============================================================================
	// Show Woocommerce Cart Widget Everywhere
	//==============================================================================

	if ( ! function_exists('getbowtied_woocommerce_widget_cart_everywhere') ) :
	function getbowtied_woocommerce_widget_cart_everywhere() { 
	    return false; 
	};
	add_filter( 'woocommerce_widget_cart_is_hidden', 'getbowtied_woocommerce_widget_cart_everywhere', 10, 1 );
	endif;

	
	
	//==============================================================================
	// WooCommerce Cross Sell Columns
	//==============================================================================	

	if ( ! function_exists('getbowtied_cross_sells_columns') ) :
	function getbowtied_cross_sells_columns( $columns ) {
		return 3;
	}
	add_filter( 'woocommerce_cross_sells_columns', 'getbowtied_cross_sells_columns' );
	endif;


	//==============================================================================
	// WooCommerce Number of Related Products
	//==============================================================================

	if ( ! function_exists('woocommerce_output_related_products_merch_shortcode') ) :
	function woocommerce_output_related_products_merch_shortcode() {
		$atts = array(
			'posts_per_page' => '3',
			'orderby'        => 'rand'
		);
		woocommerce_related_products($atts);
	}
	endif;

	


	//==============================================================================
	// WooCommerce Post Count Filter
	//==============================================================================

	if ( ! function_exists('categories_postcount_filter') ) :
	function categories_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('wp_list_categories','categories_postcount_filter');
	endif;


	//==============================================================================
	// WooCommerce Layered Nav Filter
	//==============================================================================

	if ( ! function_exists('layered_nav_postcount_filter') ) :
	function layered_nav_postcount_filter($variable) {
		$variable = str_replace('(', '', $variable);
		$variable = str_replace(')', '', $variable);
		return $variable;
	}
	add_filter('woocommerce_layered_nav_count','layered_nav_postcount_filter');
	endif;


	//==============================================================================
	// WooCommerce Reviews Tab
	//==============================================================================

	if ( ! function_exists('getbowtied_rename_reviews_tab') ) :
	function getbowtied_rename_reviews_tab($tabs) {
		global $product, $post;
		$reviews_tab_title = esc_html__( 'Reviews', 'woocommerce' ) . '<sup>' . $product->get_review_count() . '</sup>';
		return $reviews_tab_title;
	}
	add_filter( 'woocommerce_product_reviews_tab_title', 'getbowtied_rename_reviews_tab', 98);
	endif;


	//==============================================================================
	// WooCommerce Breadcrumb
	//==============================================================================

	if ( ! function_exists('getbowtied_custom_breadcrumb') ) :
	function getbowtied_custom_breadcrumb($defaults) {
		$defaults['delimiter'] = '<span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;</span>';
		$defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb">';
		return $defaults;
	}
	add_filter( 'woocommerce_breadcrumb_defaults', 'getbowtied_custom_breadcrumb' );
	endif;
	
}