<?php

/******************************************************************************/
/* Theme Setup ****************************************************************/
/******************************************************************************/

if ( ! function_exists('getbowtied_theme_setup') ) :
function getbowtied_theme_setup() {

	load_theme_textdomain( 'getbowtied', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );

	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	// Remove Woocommerce Styles
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	// Menus
	register_nav_menus( array(
		'primary' 		=> esc_html__('Primary Menu', 'getbowtied'),
		'footer' 		=> esc_html__('Footer Menu', 'getbowtied'),
		'my-account'	=> esc_html__('My Account Menu', 'getbowtied')
	));

	// WooCommerce Number of products displayed per page
	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . getbowtied_theme_option('products_per_page', '12') . ';' ), 20 );

	// Limit number of displayed cross-sells products
	add_filter('woocommerce_cross_sells_total', 'cartCrossSellTotal');
	function cartCrossSellTotal($total) {
		$total = '2';
		return $total;
	}

}
add_action( 'after_setup_theme', 'getbowtied_theme_setup' );
endif;

if ( ! isset($content_width) ) $content_width = 640; //pixels