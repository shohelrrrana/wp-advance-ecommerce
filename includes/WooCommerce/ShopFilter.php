<?php

namespace Theme\WooCommerce;

use Theme\Traits\Singleton;

class ShopFilter {
	use Singleton;

	public function __construct () {
		//Add Actions
		add_action( 'woocommerce_before_main_content', [ $this, 'before_main_content_start_wrap' ] );
		add_action( 'woocommerce_after_main_content', [ $this, 'after_main_content_close_wrap' ] );

		add_action( 'woocommerce_before_shop_loop', [ $this, 'advance_template_header_shop_filter' ] );
		add_action( 'woocommerce_before_shop_loop', [ $this, 'before_shop_loop_start_wrap' ] );
		add_action( 'woocommerce_after_shop_loop', [ $this, 'after_shop_loop_end_wrap' ] );

		add_action( 'woocommerce_before_shop_loop_item', [ $this, 'before_shop_loop_item_start_wrap' ], 5 );
		add_action( 'woocommerce_after_shop_loop_item', [ $this, 'after_shop_loop_item_close_wrap' ], 50 );

		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'advance_product_figure_start_wrap' ], 1 );
		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'advance_product_figure_end_wrap' ], 150 );
		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_product_details_start_wrap' ], 1 );
		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_product_details_end_wrap' ], 150 );

		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'advance_template_product_thumbnail' ] );
		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'advance_template_product_sale_badge' ], 15 );
		add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'advance_template_product_add_to_cart' ], 20 );

		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_template_product_category_list' ], 10 );
		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_template_product_title' ], 15 );
		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_template_product_rating' ], 20 );
		add_action( 'woocommerce_shop_loop_item_title', [ $this, 'advance_template_product_price' ], 25 );

		add_action( 'advance_shop_sidebar', [ $this, 'advance_shop_sidebar' ] );


		//Remove Actions
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

		remove_action( 'woocommerce_before_shop_loop', 'wc_setup_loop', 10 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		//add filters
		add_filter( 'woocommerce_breadcrumb_defaults', [ $this, 'customize_breadcrumbs' ] );
		add_filter( 'yith_wcwl_show_add_to_wishlist', '__return_false' );

	}

	public function customize_breadcrumbs ( $defaults ) {
		$defaults['wrap_before'] = '<nav aria-label="breadcrumb" class="breadcrumb-nav">';
		$defaults['wrap_after']  = '</nav>';
		$defaults['delimiter']   = ' <i class="fa fa-angle-right"></i> ';
		$defaults['home']        = 'Home';

		return $defaults;
	}

	public function before_main_content_start_wrap () {
		echo "<section class='main'>";
		echo "<div class='container'>";
	}

	public function after_main_content_close_wrap () {
		echo "</div>";
		echo "</section>";
	}

	public function before_shop_loop_start_wrap () {
		echo '<div class="row">';

		if ( is_active_sidebar( 'shop-sidebar' ) ) {
			echo '<div class="col-md-3">';
			do_action( 'advance_shop_sidebar' );
			echo '</div>';
		}

		echo is_active_sidebar( 'shop-sidebar' ) ? '<div class="col-md-9">' : '<div class="col-md-12">';
	}

	public function after_shop_loop_end_wrap () {
		echo '</div>';
		echo '</div>';
	}

	public function advance_shop_sidebar () {
		get_sidebar();
	}

	public function advance_template_header_shop_filter () {
		advance_template_header_shop_filter();
	}

	public function before_shop_loop_item_start_wrap () {
		echo '<div class="product-default inner-quickview inner-icon">';
	}

	public function after_shop_loop_item_close_wrap () {
		echo '</div>';
	}

	public function advance_product_figure_start_wrap () {
		echo '<figure>';
	}

	public function advance_product_figure_end_wrap () {
		echo '</figure>';
	}

	public function advance_product_details_start_wrap () {
		echo '<div class="product-details">';
	}

	public function advance_product_details_end_wrap () {
		echo '</div>';
	}

	public function advance_template_product_thumbnail () {
		advance_template_product_thumbnail();
	}

	public function advance_template_product_sale_badge () {
		advance_template_product_sale_badge();
	}

	public function advance_template_product_add_to_cart () {
		advance_template_product_add_to_cart();
	}

	public function advance_template_product_category_list () {
		advance_template_product_category_list();
	}

	public function advance_template_product_title () {
		advance_template_product_title();
	}

	public function advance_template_product_rating () {
		advance_template_product_rating();
	}

	public function advance_template_product_price () {
		advance_template_product_price();
	}


}