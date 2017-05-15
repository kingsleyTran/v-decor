<div class="categories_layout_default">

	<div class="woocommerce">
			
		<ul class="shortcode_products visible products masonry_columns_<?php echo $columns; ?>" <?php echo $paddings1; ?> data-columns>

			<?php

			foreach ( $product_categories as $category ) {
				   
				$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				
				?>

				<?php if ($gutter): ?>
				<div <?php echo ent2ncr($paddings2); ?>>
				<?php endif; ?>

					<li class="category_item">
						
						<?php if (esc_url($image)): ?>
							<div class="category_thumbnail">
								<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
									<img src="<?php echo esc_url($image); ?>" alt="<?php echo ent2ncr($category->slug); ?>" /> 
								</a>
							</div>
						<?php endif; ?>
						
						<div class="category_name">
							<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
								<?php echo esc_html($category->name); ?> <span class="count"><?php echo ent2ncr($category->count); ?></span>
							</a>
						</div>

					</li>

				<?php if ($gutter): ?>
				</div>
				<?php endif; ?>

			<?php

			}		

			?>

		</ul>
		
	</div>

</div>