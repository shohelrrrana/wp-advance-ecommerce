<?php

/**
 * ---------------------------------------------------------------------
 * Advance Single Product Tags
 * --------------------------------------------------------------------
 */

function advance_template_single_product_title ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	printf( '<h1 class="product-title">%s</h1>', esc_html( $product->get_name() ) );
}

function advance_template_single_product_gallery ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	$featured_image       = wp_get_attachment_image_url( get_post_thumbnail_id( $product->get_id() ), 'full' );
	$featured_image_small = wp_get_attachment_image_url( get_post_thumbnail_id( $product->get_id() ), 'thumbnail' );
	$gallery_ids          = $product->get_gallery_image_ids();
	?>
    <div class="col-lg-5 col-md-6 product-single-gallery">
        <div class="product-slider-container product-item">
            <div class="product-single-carousel owl-carousel owl-theme">
				<?php if ( ! empty( $gallery_ids ) ): ?>
					<?php foreach ( $gallery_ids

									as $image_id ) :
						$image_url = wp_get_attachment_image_url( $image_id );
						?>
                        <div class="product-item">
                            <img class="product-single-image"
                                 src="<?php echo esc_url( $image_url ); ?>"
                                 data-zoom-image="<?php echo esc_url( $image_url ); ?>">
                        </div>
					<?php endforeach; ?>
				<?php else:; ?>
                    <img class="product-single-image"
                         src="<?php echo esc_url( $featured_image ); ?>"
                         data-zoom-image="<?php echo esc_url( $featured_image ); ?>">
				<?php endif; ?>
            </div>

        </div>

        <div class="prod-thumbnail row owl-dots" id="carousel-custom-dots">
			<?php if ( ! empty( $gallery_ids ) ): ?>
				<?php foreach ( $gallery_ids

								as $image_id ) :
					$image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
					?>
                    <div class="col owl-dot">
                        <img src="<?php echo esc_url( $image_url ); ?>">
                    </div>
				<?php endforeach; ?>
			<?php else: ?>
                <div class="col owl-dot">
                    <img src="<?php echo esc_url( $featured_image_small ); ?>">
                </div>
			<?php endif; ?>
        </div>
    </div>
	<?php
}


function advance_template_single_product_add_to_cart ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	if ( ! $product->is_in_stock() ) {
		printf( '<button class="btn-disabled" disabled>%s</button>', __( 'Stock Out', 'advance-ecommerce' ) );
		return;
	}

	if ( $product->is_type( 'simple' ) ) {
		advance_template_single_product_simple_add_to_cart( $product );
	} elseif ( $product->is_type( 'variable' ) ) {
		advance_template_single_product_variable_add_to_cart( $product );
	} else {
		woocommerce_template_single_add_to_cart();
	}
}

function advance_template_single_product_simple_add_to_cart ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	?>
    <form class="cart" action="<?php echo esc_url( $product->get_permalink() ); ?>" method="post"
          enctype='multipart/form-data'>

		<?php advance_template_product_quantity(); ?>

        <button
                type="submit"
                name="add-to-cart"
                value="<?php echo esc_attr( $product->get_id() ); ?>"
                class="single_add_to_cart_button paction add-cart"
        >
			<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
        </button>
    </form>
	<?php
}

function advance_template_single_product_variable_add_to_cart ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	$attributes           = $product->get_attributes();
	$available_variations = $product->get_available_variations();
	$variation_id         = $available_variations[0]['variation_id'];
	$variations_attr      = wc_esc_json( wp_json_encode( $product->get_available_variations() ) );
	?>
    <form
            class="variations_form cart"
            action="<?php echo esc_url( $product->get_permalink() ); ?>"
            method="post"
            enctype='multipart/form-data'
            data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
            data-product_variations="<?php echo $variations_attr; ?>"
    >
        <table class="variations">
            <tbody>
			<?php foreach ( $attributes as $attribute_name => $attribute ) : ?>
				<?php if ( strtolower( $attribute_name ) == 'size' ): ?>
                    <div class="product-filters-container">
                        <div class="product-single-filter">
                            <label><?php echo esc_html( ucfirst( $attribute_name ) ); ?>:</label>
                            <ul class="config-size-list">
                                <input type="hidden" name="attribute_<?php echo esc_attr( $attribute_name ); ?>"
                                       id="attribute_size" value="">
								<?php foreach ( $attribute['options'] as $option ): ?>
                                    <li>
                                        <a href="#"><?php echo esc_html( $option ); ?></a>
                                    </li>
								<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
				<?php elseif ( strtolower( $attribute_name ) == 'color' || strtolower( $attribute_name ) == 'colors' ): ?>
                    <div class="product-filters-container">
                        <div class="product-single-filter">
                            <label><?php echo esc_html( ucfirst( $attribute_name ) ); ?>:</label>
                            <ul class="config-swatch-list">
                                <input type="hidden" name="attribute_<?php echo esc_attr( $attribute_name ); ?>"
                                       id="attribute_color" value="">
								<?php foreach ( $attribute['options'] as $option ): ?>
                                    <li>
                                        <a href="#"
                                           style="background-color: <?php echo esc_attr( strtolower( $option ) ); ?>;">
											<?php echo esc_html( $option ); ?>
                                        </a>
                                    </li>
								<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
				<?php else: ?>
                    <tr>
                        <td class="label">
                            <label for="<?php echo esc_attr( $attribute_name ); ?>">
								<?php echo $attribute_name; ?>
                            </label>
                        </td>
                        <td class="value">
							<?php
							wc_dropdown_variation_attribute_options(
								array(
									'options'   => $attribute['options'],
									'attribute' => $attribute_name,
									'product'   => $product,
									'class'     => 'form-control',
								)
							);

							?>
                        </td>
                    </tr>
				<?php endif; endforeach; ?>
            </tbody>
        </table>

        <div class="single_variation_wrap">
			<?php advance_template_product_quantity(); ?>

            <button type="submit" class="single_add_to_cart_button paction add-cart">
				<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
            </button>

            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>">
            <input type="hidden" name="product_id" value="<?php echo esc_attr( $product->get_id() ); ?>">
            <input type="hidden" name="variation_id" class="variation_id"
                   value="<?php echo esc_attr( $variation_id ); ?>">
        </div>
    </form>
	<?php
}

function advance_template_single_product_share ( $product = null ) {
	if ( is_null( $product ) ) global $product;
	$url  = $product->get_permalink();
	$name = $product->get_name();
	?>
    <div id="social-share">
        <strong><span>Sharing is caring</span></strong> <i class="fa fa-share-alt"></i>&nbsp;&nbsp;
        <ul>
            <li>
                <a href="//www.facebook.com/sharer.php?u=<?php echo esc_url( $url ) ?>" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="//plus.google.com/share?url=<?php echo esc_url( $url ) ?>" target="_blank">
                    <i class="fa fa-google-plus"></i>
                </a>
            </li>
            <li>
                <a href="//twitter.com/intent/tweet?text=<?php echo esc_attr( $name ) ?>&url=<?php echo esc_url( $url ); ?>&via=YOUR_TWITTER_HANDLE_HERE"
                   target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>

            </li>
            <li>
                <a href="//www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( $url ); ?>" target="_blank">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li>
                <a href="whatsapp://send?text=<?php echo esc_url( $url ); ?>" target="_blank">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </li>
        </ul>
    </div>
	<?php
}


