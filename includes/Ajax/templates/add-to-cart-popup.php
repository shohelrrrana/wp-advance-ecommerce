<?php
$name      = $product->get_name();
$image_url = wp_get_attachment_image_url( $product->get_image_id() );
$cart_page = get_page_by_title( 'Cart' );
$cart_url  = get_permalink( $cart_page );
?>
<div class="popup-wrapper">
    <div class="popup add-cart-box text-center">
        <p>
			<?php _e( 'You\'ve just added this product to the', 'advance-ecommerce' ); ?>
            <br>
			<?php _e( 'cart:', 'advance-ecommerce' ); ?>
        </p>
        <h4 id="productTitle" class="text-center">
			<?php echo esc_html( $name ); ?>
        </h4>
        <img src="<?php echo esc_url( $image_url ); ?>" id="productImage" width="100" height="100"
             alt="adding cart image">
        <div class="btn-actions">
            <a href="<?php echo esc_url( $cart_url ); ?>" class="cartUrl mr-3">
                <button class="btn-primary">
					<?php _e( 'Go to cart page', 'advance-ecommerce' ); ?>
                </button>
            </a>
            <a href="#" class="close-popup">
                <button class="btn-primary">
					<?php _e( 'Continue', 'advance-ecommerce' ); ?>
                </button>
            </a>
        </div>
    </div>
</div>