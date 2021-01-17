<?php

namespace Theme\Ajax;

use Theme\Traits\Singleton;

class Ajax {
	use Singleton;

	public function __construct () {
		add_action( 'wp_enqueue_scripts', [ $this, 'localize_script' ] );

		add_action( 'wp_ajax_add_to_cart_popup', [ $this, 'add_to_cart_popup' ] );
		add_action( 'wp_ajax_nopriv_add_to_cart_popup', [ $this, 'add_to_cart_popup' ] );

		add_action( 'wp_ajax_product_quick_view_popup', [ $this, 'product_quick_view_popup' ] );
		add_action( 'wp_ajax_nopriv_product_quick_view_popup', [ $this, 'product_quick_view_popup' ] );

		add_action( 'wp_ajax_remove_cart_item', [ $this, 'remove_cart_item' ] );
		add_action( 'wp_ajax_nopriv_remove_cart_item', [ $this, 'remove_cart_item' ] );

		add_action( 'wp_ajax_header_cart', [ $this, 'header_cart' ] );
		add_action( 'wp_ajax_nopriv_header_cart', [ $this, 'header_cart' ] );
	}

	public function localize_script () {
		$data = [
			'ajaxUrl' => admin_url( '/admin-ajax.php' )
		];
		wp_localize_script( 'custom-script', 'paths', $data );
	}

	public function add_to_cart_popup () {
		$product_id = $_GET['product_id'] ?? 0;
		if ( $product_id ) {
			$product = wc_get_product( $product_id );
			include __DIR__ . '/templates/add-to-cart-popup.php';
		}
		die;
	}

	public function product_quick_view_popup () {
		$product_id = $_GET['product_id'] ?? 0;
		if ( $product_id ) {
			$product = wc_get_product( $product_id );
			include __DIR__ . '/templates/product-quick-view-popup.php';
		}
		die;
	}

	public function remove_cart_item () {
		$cart_item_key = $_POST['cart_item_key'] ?? '';
		global $woocommerce;
		$cart = [];
		if ( $cart_item_key ) {
			$removed = $woocommerce->cart->remove_cart_item( $cart_item_key );
			if ( $removed ) {
				$cart = [
					'remove_cart_item'    => true,
					'cart_contents_count' => $woocommerce->cart->cart_contents_count,
					'cart_total'          => $woocommerce->cart->get_cart_total(),
				];
			} else {
				$cart = [
					'remove_cart_item'    => false,
					'cart_contents_count' => $woocommerce->cart->cart_contents_count,
					'cart_total'          => $woocommerce->cart->get_cart_total(),
				];
			}
		} else {
			$cart = [
				'remove_cart_item'    => false,
				'cart_contents_count' => $woocommerce->cart->cart_contents_count,
				'cart_total'          => $woocommerce->cart->get_cart_total(),
			];
		}

		echo wp_json_encode( $cart );
		die;
	}

	public function header_cart () {
		get_template_part( '/template-parts/header/cart' );
		die;
	}
}
