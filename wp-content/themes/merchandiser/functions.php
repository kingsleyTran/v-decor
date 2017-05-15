<?php

// =============================================================================
// Settings
// =============================================================================

// Paths

$theme_path 			= get_template_directory();
$framework_path 		= $theme_path . '/framework';





// =============================================================================
// Framework Functions
// =============================================================================

require_once( $framework_path		 		. '/inc/kirki/kirki.php' );
require_once( $framework_path 				. '/functions/helpers.php' );
require_once( $framework_path 				. '/functions/ajax-setup.php' );




// =============================================================================
// Theme Functions
// =============================================================================

// Body Classes
require_once( $theme_path 					. '/functions/body-classes.php' );

// Customiser
require_once( $theme_path 					. '/inc/customiser/customiser-backend.php' );
require_once( $theme_path 					. '/inc/customiser/customiser.php' );

// Theme Setup
require_once( $theme_path 					. '/functions/theme-setup.php' );

// Enqueue Styles & Scripts
require_once( $theme_path 					. '/functions/enqueue-font-awesome.php' );
require_once( $theme_path 					. '/functions/enqueue-default-fonts.php' );
require_once( $theme_path 					. '/functions/enqueue-google-fonts.php' );
require_once( $theme_path 					. '/functions/enqueue-styles.php' );
require_once( $theme_path 					. '/functions/enqueue-scripts.php' );

// WP
require_once( $theme_path 					. '/functions/wp/actions.php' );
require_once( $theme_path 					. '/functions/wp/filters.php' );
require_once( $theme_path 					. '/functions/wp/post-meta.php' );
require_once( $theme_path 					. '/functions/wp/post-footer.php' );
require_once( $theme_path 					. '/functions/wp/post-navigation-single.php' );
require_once( $theme_path 					. '/functions/wp/post-navigation-archive.php' );
require_once( $theme_path 					. '/functions/wp/comments.php' );
require_once( $theme_path 					. '/functions/wp/archive-title.php' );

// WC
require_once( $theme_path 					. '/functions/wc/actions.php' );
require_once( $theme_path 					. '/functions/wc/filters.php' );
require_once( $theme_path 					. '/functions/wc/add-to-cart-fragments.php' );
require_once( $theme_path 					. '/functions/wc/remove-tabs-titles.php' );
require_once( $theme_path 					. '/functions/wc/single-product-share.php' );
require_once( $theme_path 					. '/functions/wc/quick-view.php' );
require_once( $theme_path 					. '/functions/wc/custom-sale-label.php' );

// VC
require_once( $theme_path 					. '/functions/vc/init.php' );
require_once( $theme_path 					. '/functions/vc/filters.php' );
require_once( $theme_path 					. '/functions/vc/remove-frontend-links.php' );

// Shortcodes
require_once( $theme_path 					. '/inc/shortcodes/shortcodes.php' );

// Widgets Areas
require_once( $theme_path 					. '/inc/widgets/widgets-areas.php' );

// Meta Boxes
require_once( $theme_path 					. '/inc/metaboxes/page.php' );
require_once( $theme_path 					. '/inc/metaboxes/post.php' );

// Addons
require_once( $theme_path 					. '/inc/addons/woocommerce-header-category-image.php' );



// =============================================================================
// Require GetBowtied tools
// =============================================================================

if ( is_admin() ) 
{
	if ( ! class_exists('Getbowtied_Admin_Pages') )
	{
		require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
		require_once( get_template_directory() . '/inc/tgm/plugins.php' );
	}
}

// =============================================================================
// Theme Welcome Page
// =============================================================================

if (is_admin()):
	require_once ( $theme_path . '/inc/admin/admin.php');
endif;

// =============================================================================
// Force GetBowtied tools update ( 1.0.1 > 1.1 )
// =============================================================================

if ( is_admin() ) 
{
	if ( ! class_exists( 'GetbowtiedToolsUpdater') ) {
		require_once( get_template_directory() . '/inc/plugins/plugin-updater.php');

		$plugin_update = new GetbowtiedToolsUpdater('1.0.1', 'https://my.getbowtied.com/getbowtied-tools/update.php', 'getbowtied-tools/index.php');
	}
}
