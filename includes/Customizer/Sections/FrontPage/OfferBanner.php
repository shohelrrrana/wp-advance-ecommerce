<?php
/**
 * OfferBanner class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class OfferBanner extends FrontPage {
	protected $section     = 'front_page_offer_banner_section';
	protected $option_name = 'front_page_offer_banner_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Offer banner section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'image',
			'label'           => esc_html__( 'Section image', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'section_image',
			'partial_refresh' => [
				$this->section . 'section_image' => [
					'selector'        => '#offer_banner_section .section_image',
					'render_callback' => '__return_true'
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Section subtitle', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'section_subtitle',
			'partial_refresh' => [
				$this->section . 'section_subtitle' => [
					'selector'        => '#offer_banner_section .section_subtitle',
					'render_callback' => function () {
						return get_option( $this->section )['section_subtitle'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Section title', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'section_title',
			'partial_refresh' => [
				$this->section . 'section_title' => [
					'selector'        => '#offer_banner_section .section_title',
					'render_callback' => function () {
						return get_option( $this->section )['section_title'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Offer title', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'offer_title',
			'partial_refresh' => [
				$this->section . 'offer_title' => [
					'selector'        => '#offer_banner_section .offer_title',
					'render_callback' => function () {
						return get_option( $this->section )['offer_title'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Offer discount', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'offer_discount',
			'partial_refresh' => [
				$this->section . 'offer_discount' => [
					'selector'        => '#offer_banner_section .offer_discount',
					'render_callback' => function () {
						return get_option( $this->section )['offer_discount'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Button title', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'button_title',
			'partial_refresh' => [
				$this->section . 'button_title' => [
					'selector'        => '#offer_banner_section .button_title',
					'render_callback' => function () {
						return get_option( $this->section )['button_title'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Button link', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'button_link',
			'partial_refresh' => [
				$this->section . 'button_link' => [
					'selector'        => '#offer_banner_section .button_link',
					'render_callback' => function () {
						return get_option( $this->section )['button_link'];
					}
				]
			],
		] );
	}

}