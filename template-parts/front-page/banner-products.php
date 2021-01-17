<?php
/**
 *  The banner product template part for front page
 *
 * @package advance-ecommerce
 */
$banner_product_section = get_option( 'front_page_banner_product_section', [] );
if ( empty( $banner_product_section ) || ! class_exists( 'WooCommerce' ) ) return;

$banner_products = $banner_product_section['banner_products'] ?? [];
?>
<section>
    <div class="container">
        <div class="row row-sm banner_products">

			<?php foreach ( $banner_products as $banner_product ) :
				$product = wc_get_product( $banner_product );
				?>
                <div class="col-lg-6">
                    <div class="banner-product bg-grey"
                         style="background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $product->get_image_id() ) ); ?>);background-position : 50%;">
                        <h2>
							<?php echo esc_html( $product->get_name() ) ?>
                        </h2>
                        <div class="ml-3 primary-background">
                            <h3 class="skew-box">Starting from</h3>
                            <h4 class="skew-box">
                                <span class=" product-price">
                                    <?php
									echo get_woocommerce_currency_symbol();
									echo esc_html( $product->get_price() );
									?>
                                </span>
								<?php if ( $product->is_on_sale() ): ?>
                                    <span class="old-price">
                                        <?php
										echo get_woocommerce_currency_symbol();
										echo esc_html( $product->get_regular_price() );
										?>
                                    </span>
								<?php endif; ?>
                            </h4>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>

        </div>
    </div>
</section>
