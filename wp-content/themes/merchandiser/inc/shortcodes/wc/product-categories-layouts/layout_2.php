<div class="categories_layout_2">

	<div class="woocommerce">
		
		<ul class="shortcode_products visible" <?php echo $paddings1; ?> >

			<?php

			foreach ( $product_categories as $category ) {
				   
				$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				
				?>

				<?php if ($gutter): ?>
				<div <?php echo ent2ncr($paddings2); ?>>
				<?php endif; ?>

				<?php if (esc_url($image)): ?>

					<li class="category_item">
						
						<a class="cat_link" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
							<div class="category_thumbnail" style="background: url(<?php echo esc_url($image); ?>)"></div>
						</a>
						
						<div class="category_name">
							<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
								<?php echo esc_html($category->name); ?> <span class="count"><?php echo ent2ncr($category->count); ?></span>
							</a>
						</div>

					</li>

				<?php else: ?>

					<li class="category_item">
						
						<a class="cat_link" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
							<div class="category_thumbnail" style="background: #F7F7F7;"></div>
						</a>
						
						<div class="category_name">
							<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
								<?php echo esc_html($category->name); ?> <span class="count"><?php echo ent2ncr($category->count); ?></span>
							</a>
						</div>

					</li>

				<?php endif; ?>

				<?php if ($gutter): ?>
				</div>
				<?php endif; ?>

			<?php

			}		

			?>

		</ul>
		
	</div>

</div>