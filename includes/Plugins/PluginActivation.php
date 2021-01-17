<?php

namespace Theme\Plugins;

class PluginActivation {
	use \Theme\Traits\Singleton;

	public function __construct () {
		add_action( 'tgmpa_register', [ $this, 'theme_plugin_activation' ] );
	}

	public function theme_plugin_activation () {
		tgmpa( $this->get_plugins(), $this->get_config() );
	}

	public function get_plugins () {
		return [
			[
				'name'     => __( 'Kirki Customizer Framework', 'advance_ecommerce' ),
				'slug'     => 'kirki',
				'source'   => 'https://downloads.wordpress.org/plugin/kirki.3.1.5.zip',
				'required' => true,
			],
			[
				'name'     => __( 'One Click Demo Import', 'advance_ecommerce' ),
				'slug'     => 'one-click-demo-import',
				'source'   => 'https://downloads.wordpress.org/plugin/one-click-demo-import.2.6.1.zip',
				'required' => true,
			],
			[
				'name'     => __( 'WooCommerce', 'advance_ecommerce' ),
				'slug'     => 'woocommerce',
				'required' => true,
			],
			[
				'name'     => __( 'YITH WooCommerce Wishlist', 'advance_ecommerce' ),
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => true,
			],
			[
				'name'     => __( 'MC4WP: Mailchimp for WordPress', 'advance_ecommerce' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => true,
			],
		];
	}

	public function get_config () {
		return [
			'id'          => 'advance_ecommerce_plugins_activation',
			'menu'        => 'advance_ecommerce-plugins-activation',
			'parent_slug' => 'themes.php',
			'has_notices' => true,

		];
	}
}

