<?php 
if( ! class_exists( 'Getbowtied_Admin_Pages' ) ) {

	class Getbowtied_Admin_Pages {		
	
		// =============================================================================
		// Construct
		// =============================================================================

		function __construct() {	

			add_action( 'admin_menu', 				array( $this, 'getbowtied_theme_admin_menu' ) );
			add_action( 'admin_enqueue_scripts', 	array( $this, 'getbowtied_theme_admin_pages' ) );

		}

		function getbowtied_theme_admin_menu() {			
			$getbowtied_menu_welcome = add_menu_page(
				getbowtied_parent_theme_name(),
				getbowtied_parent_theme_name(),
				'administrator',
				'getbowtied_theme',
				array( $this, 'getbowtied_theme_welcome_page' ),
				'',
				3
			);
		}

		function getbowtied_admin_menu() {						
			$getbowtied_welcome = add_submenu_page(
				'getbowtied_theme',
				__( 'Get Bowtied', 'getbowtied' ),
				__( 'Get Bowtied', 'getbowtied' ),
				'administrator',
				'getbowtied',
				array( $this, 'getbowtied_welcome_page' )
			);
		}

		function getbowtied_theme_welcome_page() 
		{
			require_once 'welcome_theme.php';
		}

		// =============================================================================
		// Styles / Scripts
		// =============================================================================

		function getbowtied_theme_admin_pages() {
			wp_enqueue_style(	"getbowtied_theme_admin_css",				get_template_directory_uri(). "/css/wp-admin.css", 	false, '1.0', "all" );
		}

	}
	
	new Getbowtied_Admin_Pages;

}