<?php

// =============================================================================
// Enqueue Scripts
// =============================================================================

if ( ! function_exists('getbowtied_scripts') ) :
function getbowtied_scripts() {	

	if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE) // If VC exists/active load scripts after VC
	{
		$dependencies = array('jquery', 'wpb_composer_front_js');
	}
	else // Do not depend on VC
	{
		$dependencies = array('jquery');
	}

	wp_enqueue_script('getbowtied-scripts', get_template_directory_uri() . '/js/scripts-dist.js', $dependencies, getbowtied_theme_version(), TRUE);

	// Send variables to js
	$getbowtied_scripts_vars_array = array(
		
		'ajax_load_more_locale' 	=> esc_html__( 'Load More Items', 'getbowtied' ),
		'ajax_loading_locale' 		=> esc_html__( 'Loading', 'getbowtied' ),
		'ajax_no_more_items_locale' => esc_html__( 'No more items available.', 'getbowtied' ),

		'blog_pagination_type' 		=> getbowtied_theme_option( 'blog_pagination', 'infinite_scroll' ),
		'blog_layout' 				=> getbowtied_theme_option( 'blog_layout', 'blog_layout_default' ),

		'shop_pagination_type' 		=> getbowtied_theme_option( 'shop_pagination', 'infinite_scroll' ),
		'shop_layout_style' 		=> getbowtied_theme_option( 'shop_layout_style', 'regular' ),

	);
	
	wp_localize_script( 'getbowtied-scripts', 'getbowtied_scripts_vars', $getbowtied_scripts_vars_array );

	if (is_singular() && comments_open() && get_option( 'thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

}
add_action( 'wp_enqueue_scripts', 'getbowtied_scripts' );
endif;