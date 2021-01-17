<?php
/**
 *  The home slider template part for front page
 *
 * @package advance-ecommerce
 */
$home_slider_section = get_option( 'front_page_home_slider_section', [] );
if ( empty( $home_slider_section ) ) return;

$home_slides          = $home_slider_section['home_slides'] ?? [];
$flash_product_slides = $home_slider_section['flash_product_slides'] ?? [];
?>
<section id="home_slider">
    <div class="container">
        <div class="row row-sm">
            <div class="col-lg-9">
                <div class="home-slider home_slides owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                            'items' : 1,
                            'margin' : 0,
                            'nav' : true,
                            'dots' : false
                        }">

					<?php foreach ( $home_slides as $home_slide ) : ?>
                        <div class="home-slide"
                             style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $home_slide['bg_image'] ) ); ?>);">
                            <div class="slide-content <?php echo $home_slide['slide_align'] == 'align-right' ? '' : 'content-left'; ?>">
                                <h2 class="text-left">
									<?php echo esc_html( $home_slide['title'] ); ?>
                                </h2>
                                <div class="skew-box-group">
                                    <span class="skew-box">
                                        <?php echo esc_html( $home_slide['subtitle'] ); ?>
                                    </span>
                                    <span class="skew-box">
                                         <?php echo esc_html( $home_slide['price'] ); ?>
                                    </span>
                                </div>
                                <a href="<?php echo esc_url( $home_slide['btn_link'] ); ?>">
                                    <button class="btn">
										<?php echo esc_html( $home_slide['btn_title'] ); ?>
                                    </button>
                                </a>
                            </div>
                        </div>
					<?php endforeach; ?>

                </div>
            </div>

			<?php if ( class_exists( 'WooCommerce' ) ): ?>
                <div class="col-lg-3">
                    <div class="product-slider flash_product_slides owl-carousel owl-theme" data-toggle="owl">
						<?php
						foreach ( $flash_product_slides

						as $product_slide ) :
						$product = wc_get_product( $product_slide['product'] );
						?>
                        <div class="product-slide">
                            <h3><?php echo esc_html( $product_slide['title'] ); ?></h3>
                            <div class="product-default">
                                <figure>
									<?php
									advance_template_product_thumbnail( $product );
									?>
                                </figure>
                                <div class="product-details"
								<?php
								advance_template_product_title( $product );
								advance_template_product_rating( $product );
								advance_template_product_price( $product );
								?>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="count-down-panel text-center">
                            <h4><?php _e( 'OFFER ENDS IN:', 'advance-ecommerce' ); ?>
                                <span class="countdown">
                                <?php echo esc_html( $product_slide['offer_end_date'] ); ?>
                            </span>
                            </h4>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
			<?php endif; ?>

        </div>
    </div>
    </div>
</section>