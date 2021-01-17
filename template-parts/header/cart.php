<?php
if ( ! class_exists( 'WooCommerce' ) ) return;
global $woocommerce;
$cart         = $woocommerce->cart;
?>
<div class="dropdown cart-dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" data-display="static">
        <i class="minicart-icon"></i>
        <span class="cart-count">
                        <?php echo esc_html( $cart->cart_contents_count ); ?>
                    </span>
    </a>

    <div class="dropdown-menu">
        <div class="dropdownmenu-wrapper">
            <div class="dropdown-cart-header">
                            <span>
                                <?php echo esc_html( $cart->cart_contents_count ); ?>
                                &nbsp;
                                <?php _e( 'Items', 'advance-ecommerce' ); ?>
                            </span>
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Cart' ) ) ); ?>">
					<?php _e( 'View Cart', 'advance-ecommerce' ); ?>
                </a>
            </div><!-- End .dropdown-cart-header -->
            <div class="dropdown-cart-products">
				<?php
				foreach ( $cart->get_cart() as $cart_item ) :
					$product_id = $cart_item['product_id'];
					$key = $cart_item['key'];
					$quantity = $cart_item['quantity'];
					$total = $cart_item['line_total'];
					$product = $cart_item['data'];
					$name = $product->get_name();
					$permalink = $product->get_permalink();
					?>
                    <div class="product">
                        <div class="product-details">
                            <h4 class="product-title">
                                <a href="<?php echo esc_url( $permalink ); ?>">
									<?php echo esc_html( $name ); ?>
                                </a>
                            </h4>

                            <span class="cart-product-info">
                                                    <span class="cart-product-qty">
                                                        <?php echo esc_html( $quantity ); ?>
                                                    </span>
                                                    x&nbsp;
                                                    <?php
													echo get_woocommerce_currency_symbol();
													echo esc_html( $total );
													?>
                                                </span>
                        </div><!-- End .product-details -->

                        <figure class="product-image-container">
                            <a href="<?php echo esc_url( $permalink ); ?>" class="product-image">
                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $product_id ) ); ?>"
                                     alt="product">
                            </a>
                            <a href="<?php echo wc_get_cart_remove_url( $key ); ?>" class="btn-remove"
                               title="Remove Product" data-cart_item_key="<?php echo esc_attr( $key ); ?>">
                                <i class="icon-retweet"></i>
                            </a>
                        </figure>
                    </div>
				<?php endforeach; ?>

            </div>

            <div class="dropdown-cart-total">
                            <span>
                                <?php _e( 'Total', 'advance-ecommerce' ); ?>
                            </span>
                <span class="cart-total-price">
                                <?php echo wp_kses_post( $cart->get_cart_total() ); ?>
                            </span>
            </div>

            <div class="dropdown-cart-action">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Checkout' ) ) ); ?>"
                   class="btn btn-block">
					<?php _e( 'Checkout', 'advance-ecommerce' ); ?>
                </a>
            </div>

        </div><!-- End .dropdownmenu-wrapper -->
    </div><!-- End .dropdown-menu -->
</div><!-- End .dropdown -->