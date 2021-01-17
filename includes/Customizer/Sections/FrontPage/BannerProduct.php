<?php
/**
 * banner_product class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class BannerProduct extends FrontPage {
	protected $section     = 'front_page_banner_product_section';
	protected $option_name = 'front_page_banner_product_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Banner product section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'select',
			'label'           => esc_html__( 'Banner products', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'banner_products',
			'multiple'        => 4,
			'partial_refresh' => [
				$this->section . 'banner_products' => [
					'selector'        => '.banner_products',
					'render_callback' => '__return_true'
				]
			],
			'choices'         => \Kirki_Helper::get_posts( [
				'post_type'   => 'product',
				'numberposts' => 9999,
				'meta_key'    => '_sale_price',
				'orderby'     => 'meta_value_num',
				'order'       => 'desc',
			] )
		] );
	}

}