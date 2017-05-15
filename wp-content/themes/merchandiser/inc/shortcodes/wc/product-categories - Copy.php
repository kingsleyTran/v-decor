<?php
	
function getbowtied_shortcode_product_categories( $atts ) {

	extract( shortcode_atts( array(
		'layout'	 => '',
		'number'     => 12,
		'columns'	 => '4',
		'gutter'	 => '0',
		'orderby'    => 'name',
		'order'      => '',
		'hide_empty' => 1,
		'parent'     => ''
	), $atts ) );

	if ( isset( $atts[ 'ids' ] ) ) {
		$ids = explode( ',', $atts[ 'ids' ] );
		$ids = array_map( 'trim', $ids );
	} else {
		$ids = array();
	}

	$hide_empty = ( $hide_empty == true || $hide_empty == 1 ) ? 1 : 0;

	// get terms and workaround WP bug with parents/pad counts
	$args = array(
		'orderby'    => $orderby,
		'order'      => $order,
		'hide_empty' => $hide_empty,
		'include'    => $ids,
		'pad_counts' => true,
		'child_of'   => $parent
	);

	$product_categories = get_terms( 'product_cat', $args );

	if ( $parent !== "" ) {
		$product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );
	}

	if ( $hide_empty ) {
		foreach ( $product_categories as $key => $category ) {
			if ( $category->count == 0 ) {
				unset( $product_categories[ $key ] );
			}
		}
	}

	if ( $number ) {
		$product_categories = array_slice( $product_categories, 0, $number );
	}

	if ($gutter) {
		
		$paddings1 = 'style="margin-left:'. ($gutter/2) .'px; margin-right:'. ($gutter/2) .'px"';
		$paddings2 = 'style="margin-left:'. ($gutter/2) .'px; margin-right:'. ($gutter/2) .'px; margin-bottom:'. ($gutter) .'px; display: block; overflow:hidden; position:relative;"';
	
	} else {
		
		$paddings1 = '';
		$paddings2 = '';

	}

	if ( $product_categories ) {

		switch ($layout)
		{        
		    case "default":
		        require_once('product-categories-layouts/default.php');
		        break;
		    case "layout_1":
		        require_once('product-categories-layouts/layout_1.php');
		        break;
		    case "layout_2":
		        require_once('product-categories-layouts/layout_2.php');
		        break;
		    case "layout_3":
		        require_once('product-categories-layouts/layout_3.php');
		        break;
		    case "layout_4":
		        require_once('product-categories-layouts/layout_4.php');
		        break;
		    default:
		        require_once('product-categories-layouts/default.php');
		        break;
		}		

		woocommerce_reset_loop();

	}
}

add_shortcode("product_categories_grid", "getbowtied_shortcode_product_categories");