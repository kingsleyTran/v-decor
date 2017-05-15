<?php

// Customizer / WP Methods

add_action('customize_register','getbowtied_customizer');
function getbowtied_customizer( $wp_customize ) {
    
    // Remove Sections

    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('header_image');


    // Remove Control

    $wp_customize->remove_control('display_header_text');

    
    // Add Panels

    $wp_customize->add_panel( 'panel_header', array(
        'title'          => esc_html__('Header', 'getbowtied'),
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
    ) );

}

// Remove Customize Pages

add_action('admin_menu', 'getbowtied_remove_customize_pages');
function getbowtied_remove_customize_pages(){
    global $submenu;
    //echo "<pre>";
    //print_r($submenu);
    //echo "</pre>";
    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}

// Kirki

add_filter( 'kirki/config', 'getbowtied_kirki_update_url' );
function getbowtied_kirki_update_url( $config ) {
    $config['url_path'] = get_template_directory_uri() . '/framework/inc/kirki/';
    return $config;
}


// Custom Controls

add_action( 'customize_register', 'kirki_custom_control_separator' );
function kirki_custom_control_separator( $wp_customize ) {

    class Kirki_Control_Separator extends WP_Customize_Control {
        public $type = 'separator';
        public function render_content() { ?>
            <hr />
            <?php
        }
    }

    add_filter( 'kirki/control_types', function( $controls ) {
        $controls['separator'] = 'Kirki_Control_Separator';
        return $controls;
    } );

}


// Controls

if ( class_exists( 'Kirki' ) ) {
    
    // **************************************
    // Configs
    // **************************************

    Kirki::add_config( 'merchandiser', array(
        'capability'        => 'edit_theme_options',
        'option_type'       => 'theme_mod',
        'disable_output'    => true ,
    ) );

    // **************************************
    // Sections
    // **************************************

    Kirki::add_section( 'header_style', array(
        'title'          => esc_attr__( 'Header Styles', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'panel_header',
    ) );

    Kirki::add_section( 'header_logo', array(
        'title'          => esc_attr__( 'Header Logo', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'panel_header',
    ) );

    Kirki::add_section( 'header_elements', array(
        'title'          => esc_attr__( 'Header Elements', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'panel_header',
    ) );

    Kirki::add_section( 'header_stickiness', array(
        'title'          => esc_attr__( 'Header Stickiness', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'panel_header',
    ) );

    Kirki::add_section( 'header_transparency', array(
        'title'          => esc_attr__( 'Header Transparency', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'panel'          => 'panel_header',
    ) );

    Kirki::add_section( 'fonts', array(
        'title'          => esc_attr__( 'Fonts', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'styling', array(
        'title'          => esc_attr__( 'Styling', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'blog', array(
        'title'          => esc_attr__( 'Blog', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'shop', array(
        'title'          => esc_attr__( 'Shop', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

     Kirki::add_section( 'product_category', array(
        'title'          => esc_attr__( 'Product Category', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'product', array(
        'title'          => esc_attr__( 'Product Page', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'footer', array(
        'title'          => esc_attr__( 'Footer', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'social_media', array(
        'title'          => esc_attr__( 'Social Media', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_section( 'custom_code', array(
        'title'          => esc_attr__( 'Custom Code', 'getbowtied' ),
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
    ) );

    // **************************************
    // Fields
    // **************************************

    // Header

    // header_style

    Kirki::add_field( 'kirki_demo', array(
        'type'        => 'radio-image',
        'settings'    => 'header_layout',
        'label'       => esc_attr__( 'Header Layout', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => 'header_2',
        'priority'    => 10,
        'choices'     => array(
            'header_1' => get_template_directory_uri() . '/images/customiser/header_logo-left.png',
            'header_2' => get_template_directory_uri() . '/images/customiser/header_logo-center.png',
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_644825',
        'section'     => 'header_style',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'header_navigation_style',
        'label'       => esc_attr__( 'Navigation Style', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => 'slices',
        'priority'    => 10,
        'choices'     => array(
            'flyout' => get_template_directory_uri() . '/images/customiser/menu_classic-dropdown.png',
            'slices' => get_template_directory_uri() . '/images/customiser/menu_fullwidth-dropdown.png',
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_145415',
        'section'     => 'header_style',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'header_navigation_alignment',
        'label'       => esc_attr__( 'Navigation Alignment', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => 'align_left',
        'priority'    => 10,
        'choices'     => array(
            'align_left'    => esc_attr__( 'Left', 'getbowtied' ),
            'align_right'   => esc_attr__( 'Right', 'getbowtied' ),
        ),
        'required'    => array(
            array(
                'setting'  => 'header_layout',
                'operator' => '==',
                'value'    => 'header_1',                
            ),
            array(
                'setting'  => 'header_navigation_style',
                'operator' => '==',
                'value'    => 'flyout',                
            ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_568126',
        'section'     => 'header_style',
        'required'    => array(
            array(
                'setting'  => 'header_layout',
                'operator' => '==',
                'value'    => 'header_1',                
            ),
            array(
                'setting'  => 'header_navigation_style',
                'operator' => '==',
                'value'    => 'flyout',                
            ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'slider',
        'settings'    => 'header_height',
        'label'       => esc_html__( 'Header Size', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => 75,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 20,
            'max'  => 250,
            'step' => 1
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_1',
        'section'     => 'header_style',
    ) );

	Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'header_background_color',
        'label'       => esc_attr__( 'Header Background Color', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => '#23282d',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_2',
        'section'     => 'header_style',
    ) );

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'slider',
	    'settings'    => 'header_font_size',
	    'label'       => esc_html__( 'Header Font Size', 'getbowtied' ),
	    'section'     => 'header_style',
	    'default'     => 13,
	    'priority'    => 10,
	    'choices'     => array(
	        'min'  => 9,
	        'max'  => 18,
	        'step' => 1
	    ),
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_3',
        'section'     => 'header_style',
    ) );

	Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'header_font_color',
        'label'       => esc_attr__( 'Header Font Color', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => '#fff',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_1234',
        'section'     => 'header_style',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'slider',
        'settings'    => 'mobile_menu_breakpoint',
        'label'       => esc_html__( 'Mobile Menu Breakpoint', 'getbowtied' ),
        'section'     => 'header_style',
        'default'     => 1024,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 1024,
            'max'  => 1440,
            'step' => 1
        ),
    ) );

    // header_logo

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'image',
	    'settings'    => 'header_logo',
	    'label'       => esc_html__( 'Logo', 'getbowtied' ),
	    'section'     => 'header_logo',
	    'default'     => '',
	    'priority'    => 10,
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_9564878',
        'section'     => 'header_logo',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'image',
        'settings'    => 'header_alt_logo',
        'label'       => esc_html__( 'Alternative Logo', 'getbowtied' ),
        'description' => esc_html__( 'Used on mobile devices.', 'getbowtied' ),
        'section'     => 'header_logo',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_4',
        'section'     => 'header_logo',
    ) );

	Kirki::add_field( 'merchandiser', array(
	    'type'        => 'slider',
	    'settings'    => 'header_logo_height',
	    'label'       => esc_html__( 'Logo Height', 'getbowtied' ),
	    'section'     => 'header_logo',
	    'default'     => 75,
	    'priority'    => 10,
	    'choices'     => array(
	        'min'  => 20,
	        'max'  => 250,
	        'step' => 1
	    ),
	) );

    // header_elements

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_wishlist',
        'label'       => esc_attr__( 'Wishlist', 'getbowtied' ),
        'section'     => 'header_elements',
        'help'        => esc_html__( 'Requires YITH WooCommerce Wishlist Plugin', 'getbowtied' ),
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_76978',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'image',
        'settings'    => 'header_wishlist_icon',
        'label'       => esc_html__( 'Wishlist Icon', 'getbowtied' ),
        'section'     => 'header_elements',
        'default'     => get_template_directory() . '/images/wishlist.svg',
        'priority'    => 10,
    ) );

        Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_24785',
        'section'     => 'header_elements',
    ) );

	Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_search',
        'label'       => esc_attr__( 'Search', 'getbowtied' ),
        'section'     => 'header_elements',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_5',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'image',
	    'settings'    => 'header_search_icon',
	    'label'       => esc_html__( 'Search Icon', 'getbowtied' ),
	    'section'     => 'header_elements',
	    'default'     => get_template_directory() . '/images/search.svg',
	    'priority'    => 10,
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_6',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_cart',
        'label'       => esc_attr__( 'Cart', 'getbowtied' ),
        'section'     => 'header_elements',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_7',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'image',
	    'settings'    => 'header_cart_icon',
	    'label'       => esc_html__( 'Cart Icon', 'getbowtied' ),
	    'section'     => 'header_elements',
	    'default'     => get_template_directory() . '/images/cart.svg',
	    'priority'    => 10,
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_8',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_user_account',
        'label'       => esc_attr__( 'User Account', 'getbowtied' ),
        'section'     => 'header_elements',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_9',
        'section'     => 'header_elements',
    ) );

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'image',
	    'settings'    => 'header_user_account_icon',
	    'label'       => esc_html__( 'User Account Icon', 'getbowtied' ),
	    'section'     => 'header_elements',
	    'default'     => get_template_directory() . '/images/profile.svg',
	    'priority'    => 10,
	) );

    // header_stickiness

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_sticky',
        'label'       => esc_attr__( 'Sticky Header', 'getbowtied' ),
        'section'     => 'header_stickiness',
        'default'     => true,
        'priority'    => 10,
    ) );

    // header_transparency

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'header_transparent',
        'label'       => esc_attr__( 'Transparent Header', 'getbowtied' ),
        'description' => esc_html__( 'Global Option', 'getbowtied' ),
        'help'        => esc_html__( 'This option here will be inherited by all pages that do not have a different setting applied individually for the header.', 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => false,
        'priority'    => 10,
    ) );


    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'header_transparent_scheme',
        'label'       => esc_attr__( 'Default Color Scheme', 'getbowtied' ),
        'description' => esc_html__( 'for the Transparent Header', 'getbowtied' ),     
        'help'        => esc_html__( 'The transparent header comes with two different color schemes: Light and Dark. For both you can choose to have a different color for the header content (navigation, icons, etc) and even a different logo. The option here sets the one you want to use as the default. The other can be set as an exception to be used by some pages only.', 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => 'dark',
        'priority'    => 10,
        'choices'     => array(
            'light'   => esc_attr__( 'Light', 'getbowtied' ),
            'dark'    => esc_attr__( 'Dark', 'getbowtied' ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_31',
        'section'     => 'header_transparency',
    ) );
    

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'header_transparent_light_color',
        'label'       => esc_attr__( 'Light Scheme: Color', 'getbowtied' ),
        'help'        => esc_html__( 'If the page you are working on has a dark background, using a dark color for the menu items would make it unreadable and that is where the Light color scheme comes in. (E.g.: White text on a Black background.)' , 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => '#fff',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'image',
        'settings'    => 'header_transparent_light_logo',
        'label'       => esc_html__( 'Light Scheme: Alternative Logo', 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_33',
        'section'     => 'header_transparency',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'header_transparent_dark_color',
        'label'       => esc_attr__( 'Dark Scheme: Color', 'getbowtied' ),
        'help'        => esc_html__( 'If the page you are working on has a light backgeround, using a light color for the menu items as well would make it unreadable and that is where the Dark color scheme comes in. (E.g.: Black text on a White background.)' , 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => '#000',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'image',
        'settings'    => 'header_transparent_dark_logo',
        'label'       => esc_html__( 'Dark Scheme: Alternative Logo', 'getbowtied' ),
        'section'     => 'header_transparency',
        'default'     => '',
        'priority'    => 10,
    ) );

	// Fonts

	Kirki::add_field( 'merchandiser', array(
	    'type'        => 'slider',
	    'settings'    => 'font_size',
	    'label'       => esc_html__( 'Base Font Size', 'getbowtied' ),
	    'help'        => esc_attr__( 'The Base Font Size refers to the size applied to the paragraph text. All other elements, such as headings, links, buttons, etc will adjusted automatically to keep the hierarchy of font sizes based on this one size. Easy-peasy!', 'getbowtied' ),
	    'section'     => 'fonts',
	    'default'     => 18,
	    'priority'    => 10,
	    'choices'     => array(
	        'min'  => 8,
	        'max'  => 32,
	        'step' => 1
	    ),
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_10',
        'section'     => 'fonts',
    ) );

	Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'primary_color',
        'label'       => esc_attr__( 'Base Font Color', 'getbowtied' ),
        'section'     => 'fonts',
        'default'     => '#000',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_11',
        'section'     => 'fonts',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'headings_letter_spacing',
        'label'       => esc_attr__( 'Headings Letter Spacing', 'getbowtied' ),
        'section'     => 'fonts',
        'default'     => 'normal',
        'priority'    => 10,
        'choices'     => array(
            'tide' => get_template_directory_uri() . '/images/customiser/letterspacing_tight.png',
            'normal' => get_template_directory_uri() . '/images/customiser/letterspacing_normal.png',
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_12',
        'section'     => 'fonts',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'default_theme_fonts',
        'label'       => esc_attr__( 'Font Source', 'getbowtied' ),
        'section'     => 'fonts',
        'default'     => 'default_fonts',
        'priority'    => 10,
        'choices'     => array(
            'default_fonts' => esc_attr__( 'Theme Defaults', 'getbowtied' ),
            'google_fonts'  => esc_attr__( 'Google Webfonts', 'getbowtied' ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_56924',
        'section'     => 'fonts',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'default_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'radio',
        'settings'    => 'default_fonts_variant',
        'label'       => '',
        'section'     => 'fonts',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => array(
            '1'         => esc_attr__( 'Poppins / PT Serif', 'getbowtied' ),
            '2'         => esc_attr__( 'Arca Majora / Radnika', 'getbowtied' ),
        ),
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'default_fonts',     
            ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_56925',
        'section'     => 'fonts',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'     => 'select',
        'settings' => 'main_font',
        'label'    => esc_attr__( 'Main Font', 'getbowtied' ),
        'description' => esc_html__( 'Used for titles and Headings.', 'getbowtied' ),
        'section'  => 'fonts',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'default'     => 'Roboto',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',     
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'main_font_variants',
        'label'    => esc_attr__( 'Main Font Variants', 'getbowtied' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_all_variants(),
        'default'     => array('regular'),
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_56625',
        'section'     => 'fonts',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'     => 'select',
        'settings' => 'secondary_font',
        'label'    => esc_attr__( 'Secondary Font', 'getbowtied' ),
        'description' => esc_html__( 'Used for body / paragraph text.', 'getbowtied' ),
        'section'  => 'fonts',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'default'     => 'Roboto',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'secondary_font_variants',
        'label'    => esc_attr__( 'Secondary Font Variants', 'getbowtied' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_all_variants(),
        'default'     => array('regular'),
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_36625',
        'section'     => 'fonts',
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',           
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'toggle',
        'settings'    => 'use_main_font_subsets',
        'label'       => esc_html__( 'Include Subsets', 'getbowtied' ),
        'section'     => 'fonts',
        'default'     => '0',
        'priority'    => 10,
        'required'    => array(
            array(
                'setting'  => 'default_theme_fonts',
                'operator' => '==',
                'value'    => 'google_fonts',
            ),
        ),
    ) );

    Kirki::add_field( '', array(
        'type'        => 'multicheck',
        'settings'    => 'google_fonts_subsets',
        'label'       => esc_html__( 'Font Subsets', 'getbowtied' ),
        'section'     => 'fonts',
        'priority'    => 10,
        'choices'     => Kirki_Fonts::get_google_font_subsets(),
        'required'    => array(
            array(
                'setting'  => 'use_main_font_subsets',
                'operator' => '==',
                'value'    => '1',           
            ),
        ),
    ) );


    // Styling

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'accent_color',
        'label'       => esc_attr__( 'Accent Color', 'getbowtied' ),
        'section'     => 'styling',
        'default'     => '#ffc741',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'bg_color',
        'label'       => esc_attr__( 'Global Page Background Color', 'getbowtied' ),
        'section'     => 'styling',
        'default'     => '#fff',
        'priority'    => 10,
    ) );

    // Blog

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'blog_layout',
        'label'       => esc_attr__( 'Blog Layout', 'getbowtied' ),
        'section'     => 'blog',
        'default'     => 'blog_layout_default',
        'priority'    => 10,
        'choices'     => array(
            'blog_layout_default'   => get_template_directory_uri() . '/images/customiser/blog_layout_default.png',
            'blog_layout_1'         => get_template_directory_uri() . '/images/customiser/blog_layout_1.png',
            'blog_layout_2'         => get_template_directory_uri() . '/images/customiser/blog_layout_2.png',
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_14698',
        'section'     => 'blog',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'blog_pagination',
        'label'       => esc_attr__( 'Pagination', 'getbowtied' ),
        'section'     => 'blog',
        'default'     => 'infinite_scroll',
        'priority'    => 10,
        'choices'     => array(
            'default'           => esc_attr__( 'Classic', 'getbowtied' ),
            'load_more_button'  => esc_attr__( 'Load More', 'getbowtied' ),
            'infinite_scroll'   => esc_attr__( 'Infinite', 'getbowtied' ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_14582',
        'section'     => 'blog',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'single_post_layout',
        'label'       => esc_attr__( 'Single Post Layout', 'getbowtied' ),
        'section'     => 'blog',
        'default'     => 'single_post_2',
        'priority'    => 10,
        'choices'     => array(
            'single_post_1' => get_template_directory_uri() . '/images/customiser/blog_full-featured-image.png',
            'single_post_2' => get_template_directory_uri() . '/images/customiser/blog_boxed-featured-image.png',
        ),
    ) );

    // Shop

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'catalog_mode',
        'label'       => esc_attr__( 'Catalog Mode', 'getbowtied' ),
        'help'        => esc_html__( 'When turned on, the Catalog Mode disables the eCommerce functionality of WooCommerce by hiding the cart and add to cart buttons allowing you to use it for cataloging purposes only.', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => false,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_13',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'shop_layout_style',
        'label'       => esc_attr__( 'Shop Layout Style', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => 'regular',
        'priority'    => 10,
        'choices'     => array(
            'regular' => get_template_directory_uri() . '/images/customiser/shop_classic.png',
            'masonry_style' => get_template_directory_uri() . '/images/customiser/shop_masonry.png',
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_14',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'shop_sidebar',
        'label'       => esc_attr__( 'Shop Sidebar', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_15',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
	    'type'        => 'slider',
	    'settings'    => 'products_per_page',
	    'label'       => esc_html__( 'Number of Products per Page', 'getbowtied' ),
	    'section'     => 'shop',
	    'default'     => 12,
	    'priority'    => 10,
	    'choices'     => array(
	        'min'  => 1,
	        'max'  => 48,
	        'step' => 1
	    ),
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_16',
        'section'     => 'shop',
    ) );

	Kirki::add_field( 'merchandiser', array(
	    'type'        => 'slider',
	    'settings'    => 'products_columns',
	    'label'       => esc_html__( 'Number of Columns', 'getbowtied' ),
	    'section'     => 'shop',
	    'default'     => 4,
	    'priority'    => 10,
	    'choices'     => array(
	        'min'  => 1,
	        'max'  => 6,
	        'step' => 1
	    ),
	) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_9998',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'slider',
        'settings'    => 'products_spacing',
        'label'       => esc_html__( 'Spacing between products', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => 0,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 0,
            'max'  => 50,
            'step' => 1
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_17',
        'section'     => 'shop',
    ) );

	Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'shop_pagination',
        'label'       => esc_attr__( 'Pagination', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => 'infinite_scroll',
        'priority'    => 10,
        'choices'     => array(
            'default'   		=> esc_attr__( 'Classic', 'getbowtied' ),
            'load_more_button' 	=> esc_attr__( 'Load More', 'getbowtied' ),
            'infinite_scroll' 	=> esc_attr__( 'Infinite', 'getbowtied' ),
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_18',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'shop_product_details',
        'label'       => esc_attr__( 'Title and Price', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_19',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'shop_quick_view',
        'label'       => esc_attr__( 'Quick View', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_1999',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'shop_second_image',
        'label'       => esc_attr__( 'Show a 2nd image on hover', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_568947',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'custom_sale_label',
        'label'       => esc_attr__( 'Sale Label', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => 'Sale!',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_568948',
        'section'     => 'shop',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'custom_out_of_stock_label',
        'label'       => esc_attr__( 'Out of Stock Label', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => 'Out of stock',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_568948',
        'section'     => 'blog',
    ) );

     Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'shop_hover_shadow',
        'label'       => esc_attr__( 'Product shadow on hover', 'getbowtied' ),
        'section'     => 'shop',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_5689481',
        'section'     => 'blog',
    ) );

    // Product Category

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'slider',
        'settings'    => 'category_height',
        'label'       => esc_html__( 'Category Header Height', 'getbowtied' ),
        'description' => esc_html__( 'Spacing above and below the category description.', 'getbowtied' ),
        'section'     => 'product_category',
        'default'     => 150,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 75,
            'max'  => 200,
            'step' => 1
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_7642345',
        'section'     => 'product_category',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-buttonset',
        'settings'    => 'category_transparency',
        'label'       => esc_attr__( 'Shop Category Page Color Scheme', 'getbowtied' ),
        'section'     => 'product_category',
        'default'     => 'transparency_light',
        'priority'    => 10,
        'choices'     => array(
            'inherit'           => esc_attr__( 'Inherit', 'getbowtied' ),
            'no_transparency'  => esc_attr__( 'No Transparency', 'getbowtied' ),
            'transparency_light'   => esc_attr__( 'Light', 'getbowtied' ),
            'transparency_dark'   => esc_attr__( 'Dark', 'getbowtied' ),
        ),
    ) );

    // Product

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'radio-image',
        'settings'    => 'product_image_gallery',
        'label'       => esc_attr__( 'Product Image Gallery', 'getbowtied' ),
        'section'     => 'product',
        'default'     => 'half_page',
        'priority'    => 10,
        'choices'     => array(
            'classic' => get_template_directory_uri() . '/images/customiser/product-gallery_classic.png',
            'half_page' => get_template_directory_uri() . '/images/customiser/product-gallery_half-page.png',           
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_product_1',
        'section'     => 'product',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'product_image_zoom',
        'label'       => esc_attr__( 'Enable image zoom', 'getbowtied' ),
        'section'     => 'product',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_product_2',
        'section'     => 'product',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'related_products',
        'label'       => esc_attr__( 'Show Related Products', 'getbowtied' ),
        'section'     => 'product',
        'default'     => true,
        'priority'    => 10,
    ) );

    // Footer

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'footer_sticky',
        'label'       => esc_attr__( 'Sticky Footer', 'getbowtied' ),
        'section'     => 'footer',
        'default'     => false,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'switch',
        'settings'    => 'back_to_top',
        'label'       => esc_attr__( 'Back To Top Button', 'getbowtied' ),
        'section'     => 'footer',
        'default'     => true,
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_20',
        'section'     => 'footer',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'footer_background_color',
        'label'       => esc_attr__( 'Footer Background Color', 'getbowtied' ),
        'section'     => 'footer',
        'default'     => '#000',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'color',
        'settings'    => 'footer_font_color',
        'label'       => esc_attr__( 'Footer Font Color', 'getbowtied' ),
        'section'     => 'footer',
        'default'     => '#fff',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'separator',
        'settings'    => 'separator_21',
        'section'     => 'footer',
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'textarea',
        'settings'    => 'footer_copyright',
        'label'       => esc_attr__( 'Footer Copyright', 'getbowtied' ),
        'section'     => 'footer',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Social Media

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'facebook_link',
        'label'       => esc_attr__( 'Facebook', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => 'http://www.getbowtied.com/',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'twitter_link',
        'label'       => esc_attr__( 'Twitter', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => 'http://www.getbowtied.com/',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'pinterest_link',
        'label'       => esc_attr__( 'Pinterest', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'linkedin_link',
        'label'       => esc_attr__( 'LinkedIn', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'googleplus_link',
        'label'       => esc_attr__( 'Google+', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'rss_link',
        'label'       => esc_attr__( 'RSS', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'tumblr_link',
        'label'       => esc_attr__( 'Tumblr', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'instagram_link',
        'label'       => esc_attr__( 'Instagram', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'youtube_link',
        'label'       => esc_attr__( 'Youtube', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'vimeo_link',
        'label'       => esc_attr__( 'Vimeo', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'behance_link',
        'label'       => esc_attr__( 'Behance', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'dribbble_link',
        'label'       => esc_attr__( 'Dribbble', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'flickr_link',
        'label'       => esc_attr__( 'Flickr', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'git_link',
        'label'       => esc_attr__( 'Git', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'skype_link',
        'label'       => esc_attr__( 'Skype', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'weibo_link',
        'label'       => esc_attr__( 'Weibo', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'foursquare_link',
        'label'       => esc_attr__( 'Foursquare', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'text',
        'settings'    => 'soundcloud_link',
        'label'       => esc_attr__( 'Soundcloud', 'getbowtied' ),
        'section'     => 'social_media',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Custom Code

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'code',
        'settings'    => 'custom_css',
        'label'       => esc_attr__( 'Custom CSS', 'getbowtied' ),
        'section'     => 'custom_code',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'css',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'code',
        'settings'    => 'header_js',
        'label'       => esc_attr__( 'Header JavaScript Code', 'getbowtied' ),
        'section'     => 'custom_code',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'javascript',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );

    Kirki::add_field( 'merchandiser', array(
        'type'        => 'code',
        'settings'    => 'footer_js',
        'label'       => esc_attr__( 'Footer JavaScript Code', 'merchandiser' ),
        'section'     => 'custom_code',
        'default'     => '',
        'priority'    => 10,
        'choices'     => array(
            'language' => 'javascript',
            'theme'    => 'monokai',
            'height'   => 150,
        ),
    ) );

}
