<?php


namespace Theme\WooCommerce;


use Theme\Traits\Singleton;

class SingleProductFilter {
	use Singleton;

	public function __construct () {
		//Add actions
		add_action( 'woocommerce_before_single_product_summary', [ $this, 'advance_before_single_product_summary_start_wrap' ] );
		add_action( 'woocommerce_after_single_product_summary', [ $this, 'advance_after_single_product_summary_end_wrap' ] );

		add_action( 'advance_single_product_thumbnails', [ $this, 'advance_template_single_product_gallery' ], 20 );

		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_single_product_summary_start_wrap' ], 1 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_single_product_summary_end_wrap' ], 150 );


		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_title' ], 5 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_price' ], 15 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_excerpt' ], 20 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_add_to_cart' ], 25 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_wishlist' ], 30 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_meta' ], 35 );
		add_action( 'woocommerce_single_product_summary', [ $this, 'advance_template_single_product_share' ], 40 );


		//remove actions
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

	public function advance_before_single_product_summary_start_wrap () {
		?>
        <div class="container">
        <div class="row row-sm">
        <div class="col-lg-9 col-xl-10">
        <div class="product-single-container product-single-default">
        <div class="row">
		<?php
		do_action( 'advance_single_product_thumbnails' );
	}

	public function advance_after_single_product_summary_end_wrap () {
		?>
        </div>
        </div>
        </div>
        </div>
        </div>
		<?php
	}

	public function advance_single_product_summary_start_wrap () {
		echo '<div class="product-single-details">';
	}

	public function advance_single_product_summary_end_wrap () {
		echo '</div>';
	}

	public function advance_template_single_product_gallery () {
		advance_template_single_product_gallery();
	}

	public function advance_template_single_product_title () {
		advance_template_single_product_title();
	}

	public function advance_template_single_product_price () {
		advance_template_product_price();
	}

	public function advance_template_single_product_excerpt () {
		advance_template_product_short_desc();
	}

	public function advance_template_single_product_add_to_cart () {
		advance_template_single_product_add_to_cart();
	}

	public function advance_template_single_product_wishlist () {
		advance_template_product_add_to_wishlist( null, 'Add To Wishlist' );
	}

	public function advance_template_single_product_meta () {
		woocommerce_template_single_meta();
	}

	public function advance_template_single_product_share () {
		advance_template_single_product_share();
	}
}