<?php
/**
 * Sortable class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class Sortable extends FrontPage {
	private $section = 'sortable_front_page_sections';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Ordering and Visibility Sections', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'     => 'sortable',
			'settings' => 'sortable_front_page_sections',
			'label'    => esc_html__( 'Ordering and Visibility', 'advance-ecommerce' ),
			'section'  => $this->section,
			'default'  => [
				'service',
				'products',
				'banner-products',
				'category',
				'offer-banner',
			],
			'choices'  => [
				'service'         => esc_html__( 'Service Section', 'advance-ecommerce' ),
				'products'        => esc_html__( 'Products Section', 'advance-ecommerce' ),
				'banner-products' => esc_html__( 'Banner Products Section', 'advance-ecommerce' ),
				'category'        => esc_html__( 'Category Section', 'advance-ecommerce' ),
				'offer-banner'    => esc_html__( 'Offer Banner Section', 'advance-ecommerce' ),
			],
		] );
	}

}