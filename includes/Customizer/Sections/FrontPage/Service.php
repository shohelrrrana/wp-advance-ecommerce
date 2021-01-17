<?php
/**
 * Service class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class Service extends FrontPage {
	protected $section     = 'front_page_service_section';
	protected $option_name = 'front_page_service_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Service section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'repeater',
			'label'           => esc_html__( 'Service items', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'row_label'       => [
				'type'  => 'field',
				'field' => 'title',
			],
			'button_label'    => esc_html__( 'Add new item', 'advance-ecommerce' ),
			'settings'        => 'service_items',
			'fields'          => [
				'icon'     => [
					'type'    => 'select',
					'label'   => esc_html__( 'Icon', 'advance-ecommerce' ),
					'choices' => [
						'icon-shipping'       => 'Shipping icon',
						'icon-money'          => 'Money icon',
						'icon-support'        => 'Support icon',
						'icon-secure-payment' => 'Secure payment icon',
					]
				],
				'title'    => [
					'type'  => 'text',
					'label' => esc_html__( 'Title', 'advance-ecommerce' )
				],
				'subtitle' => [
					'type'  => 'text',
					'label' => esc_html__( 'Subtitle', 'advance-ecommerce' )
				]
			],
			'partial_refresh' => array(
				$this->section . 'service_items' => array(
					'selector'        => '.service_items',
					'render_callback' => '__return_true'
				)
			)
		] );
	}

}