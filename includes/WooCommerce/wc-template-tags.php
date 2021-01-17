<?php

/**
 * ---------------------------------------------------------------------
 * Advance Shop Tags
 * --------------------------------------------------------------------
 */


function advance_template_header_shop_filter () {
	?>
    <nav class="toolbox mb-4">
        <div class="toolbox-left">
            <div class="toolbox-item toolbox-sort">
                <div class="select-custom">
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby form-control" aria-label="Shop order">
                            <option value="menu_order" selected="selected">
								<?php _e( 'Default sorting', 'advance-ecommerce' ); ?>
                            </option>
                            <option value="popularity">
								<?php _e( 'Sort by popularity', 'advance-ecommerce' ); ?>
                            </option>
                            <option value="rating">
								<?php _e( 'Sort by average rating', 'advance-ecommerce' ); ?>
                            </option>
                            <option value="date">
								<?php _e( 'Sort by latest', 'advance-ecommerce' ); ?>
                            </option>
                            <option value="price">
								<?php _e( 'Sort by price: low to high', 'advance-ecommerce' ); ?>
                            </option>
                            <option value="price-desc">
								<?php _e( 'Sort by price: high to low', 'advance-ecommerce' ); ?>
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="toolbox-item toolbox-show">
            <label>
				<?php woocommerce_result_count(); ?>
            </label>
        </div>

        <div class="layout-modes">
            <a href="" class="layout-btn btn-grid active" title="Grid">
                <i class="icon-mode-grid"></i>
            </a>
            <a href="" class="layout-btn btn-list" title="List">
                <i class="icon-mode-list"></i>
            </a>
        </div><!-- End .layout-modes -->
    </nav>
	<?php
}

function advance_template_product_thumbnail ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	printf( '<a href="%s">%s</a>', $product->get_permalink(), $product->get_image() );
}

function advance_template_product_sale_badge ( $product = null ) {
	if ( is_null( $product ) ) global $product;
	if ( ! $product->is_on_sale() ) return;

	$price         = intval( $product->get_price() );
	$regular_price = intval( $product->get_regular_price() );

	if ( $price && $regular_price ):
		$discount_percentage = intval( ( ( $regular_price - $price ) / $regular_price ) * 100 );
		?>
        <div class="label-group">
            <span class="product-label label-cut"><?php echo esc_html( $discount_percentage ) . __( '% off', 'advance-ecommerce' ); ?></span>
        </div>
	<?php
	endif;

}

function advance_template_product_title ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	printf( '<h2 class="product-title"><a href="%s">%s</a></h2>', esc_attr( $product->get_permalink() ), esc_html( $product->get_name() ) );
}

function advance_template_product_rating ( $product = null ) {
	if ( is_null( $product ) ) global $product;


	if ( ! wc_review_ratings_enabled() ) {
		return;
	}

	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();

	if ( $rating_count > 0 ) : ?>
        <div class="ratings-container">
            <div class="woocommerce-product-rating">
				<?php echo wc_get_rating_html( $average, $rating_count ); ?>
				<?php if ( comments_open() && ! is_shop() ) : ?>
                    <a href="#reviews" class="woocommerce-review-link"
                       rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>
                        )</a>
				<?php endif ?>
            </div>
        </div>

	<?php endif; ?>
	<?php
}

function advance_template_product_price ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	$price         = $product->get_price();
	$regular_price = $product->get_regular_price();
	$sale_price    = $product->get_sale_price();
	?>
    <div class="price-box">
		<?php if ( $sale_price ): ?>
            <span class="old-price">
                <?php
				echo get_woocommerce_currency_symbol();
				echo esc_html( $regular_price );
				?>
            </span>
		<?php endif; ?>
        <span class="product-price">
            <?php
			echo get_woocommerce_currency_symbol();
			echo esc_html( $price );
			?>
        </span>
    </div>
	<?php
}

function advance_template_product_short_desc ( $product = null ) {
	if ( is_null( $product ) ) global $product;

	printf( '<div class="product-desc"><p>%s</p></div>', wp_kses_post( $product->get_short_description() ) );
}

function advance_template_product_add_to_cart ( $product = null, $show_icon = true ) {
	if ( is_null( $product ) ) global $product;

	$id              = $product->get_id();
	$name            = $product->get_name();
	$add_to_cart_url = $product->add_to_cart_url();
	$sku             = $product->get_sku();

	global $woocommerce;
	$cartProducts     = $woocommerce->cart->get_cart();
	$is_added_in_cart = false;
	foreach ( $cartProducts as $cartProduct ) {
		if ( $cartProduct['product_id'] === $id ) {
			$is_added_in_cart = true;
		}
	}

	$dynamic_classes = "product_type_{$product->get_type()} ";
	if ( $product->get_type() == 'simple' ) {
		$dynamic_classes = "ajax_add_to_cart ";
	}
	if ( $show_icon ) {
		$dynamic_classes .= "btn-icon btn-add-cart";
	} else {
		$dynamic_classes .= "paction add-cart";
	}
	?>
    <div class="btn-icon-group">
		<?php if ( $is_added_in_cart === false ): ?>
            <a
                    href="<?php echo esc_url( $add_to_cart_url ); ?>"
                    data-quantity="1"
                    class="add_to_cart_button <?php echo esc_attr( $dynamic_classes ); ?>"
                    data-product_id="<?php echo esc_attr( $id ); ?>"
                    data-product_sku="<?php echo esc_attr( $sku ); ?>"
                    aria-label="Add “<?php echo esc_attr( $name ) ?>” to your cart"
                    rel="nofollow"
				<?php if ( $product->get_type() == 'simple' ): ?>
                    data-toggle="modal"
                    data-target="#addCartModal"
				<?php endif; ?>
            >
				<?php echo $show_icon ? '<i class="icon-bag" ></i >' : esc_html( $product->add_to_cart_text() ); ?>
            </a>
		<?php endif; ?>
        <button class="added-cart <?php echo $is_added_in_cart ? esc_attr( 'show' ) : esc_attr( 'hide' ); ?>" disabled>
			<?php _e( 'Added in cart', 'advance-ecommerce' ); ?>
        </button>
    </div>
	<?php if ( is_shop() ): ?>
        <button data-product_id="<?php echo esc_attr( $id ); ?>" class="btn-quickview" title="Quick View">
			<?php _e( 'Quick View', 'advance-ecommerce' ); ?>
        </button>
	<?php
	endif;
}

function advance_template_product_category_list ( $product = null ) {
	if ( is_null( $product ) ) global $product;
	?>
    <div class="category-wrap">
        <div class="category-list">
			<?php echo wc_get_product_category_list( $product->get_id() ) ?>
        </div>
		<?php advance_template_product_add_to_wishlist(); ?>
    </div>
	<?php
}

function advance_template_product_add_to_wishlist ( $product = null, $title = '' ) {
	if ( is_null( $product ) ) global $product;
	if ( class_exists( 'YITH_WCWL' ) ) {
		echo do_shortcode( "[yith_wcwl_add_to_wishlist product_id='{$product->get_id()}' label='{$title}']" );
	}
}


function advance_template_product_quantity () {
	?>
    <div class="product-single-qty">
        <span class="decrease">
            <i class="fa fa-minus"></i>
        </span>
        <input class="value quantity" value="1" min="1" max="10" name="quantity"/>
        <span class="increase">
            <i class="fa fa-plus"></i>
        </span>
    </div>
	<?php
}
