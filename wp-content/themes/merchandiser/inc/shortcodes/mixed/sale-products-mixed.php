<?php

// [sale_products_mixed]
function getbowtied_shortcode_sale_products_mixed($atts, $content = null) {
	extract(shortcode_atts(array(
		'widget_title' => '',
		'per_page'  => '4',
		'columns'  => '4',
		'layout'  => 'listing',
        'orderby' => 'date',
        'order' => 'desc',
		'show_product_details' => 'false',
		'gutter' => '0'
	), $atts));
	ob_start();

	if ($widget_title != '') {
		echo '<h3 class="shortcode_title">' . $widget_title . '</h3>';
	}

	if ($show_product_details == 'true')
	{
		// 
	} elseif ($show_product_details == 'false')
	{
		echo '<div class="hide_product_details">';
	}

    if ($layout == "masonry") {
		echo do_shortcode('[sale_products_list gutter="'.$gutter.'" per_page="'.$per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'"]');
	} else {
		echo '<div class="shortcode_gutter" data-gutter="'.$gutter.'">';
		echo do_shortcode('[sale_products per_page="'.$per_page.'" columns="'.$columns.'" orderby="'.$orderby.'" order="'.$order.'"]');
		echo '</div>';
	}

	if ($show_product_details == 'true')
	{
		// 
	} elseif ($show_product_details == 'false')
	{
		echo '</div>';
	}

	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("sale_products_mixed", "getbowtied_shortcode_sale_products_mixed");