<?php

// =============================================================================
// Enqueue Google Fonts
// =============================================================================

if ( ! function_exists('getbowtied_google_fonts') ) :
function getbowtied_google_fonts() {

	if ( getbowtied_theme_option( 'default_theme_fonts', 'default_fonts' ) == 'google_fonts' ) :

		$main_font 					= getbowtied_theme_option( 'main_font', 'Roboto');
		$main_font_variants 		= getbowtied_theme_option( 'main_font_variants', array('400'));

		$secondary_font 			= getbowtied_theme_option( 'secondary_font', 'Roboto');		
		$secondary_font_variants 	= getbowtied_theme_option( 'secondary_font_variants', array('400'));

		$google_fonts_subsets 		= getbowtied_theme_option( 'google_fonts_subsets', '');

		$main_family = FALSE;
		$secondary_family = FALSE;
		$font_family = FALSE;
		$subsets = 'latin';

		if (!empty($main_font) )
		{
			$main_family = $main_font.':';
			foreach ($main_font_variants as $variant)
			{
				$main_family .= $variant.',';
			}

			$main_family = rtrim($main_family, ',');
		} 

		if (!empty($secondary_font) )
		{
			$secondary_family = $secondary_font.':';
			foreach ($secondary_font_variants as $variant)
			{
				$secondary_family .= $variant.',';
			}

			$secondary_family = rtrim($secondary_family, ',');
		}

		if ( !empty($main_family) && !empty($secondary_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $main_family.'|'.$secondary_family ) );
		}
		elseif ( !empty($main_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $main_family ) );
		}
		elseif ( !empty($secondary_family) )
		{
			$font_family = str_replace( '%2B', '+', urlencode( $secondary_family ) );
		}



		if (!empty($google_fonts_subsets ))
		{
			$subsets .= ','.urlencode( implode( ',', $google_fonts_subsets ) );
		}


		if ( !empty($font_family) ):
			$query_args = array(
				'family' => $font_family,
				'subset' => $subsets
			);

			$fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
			wp_enqueue_style( 'getbowtied_google_fonts', $fonts_url, array(), null );

		endif;

	endif;
}            
add_action('wp_head', 'getbowtied_google_fonts', 0);
endif;