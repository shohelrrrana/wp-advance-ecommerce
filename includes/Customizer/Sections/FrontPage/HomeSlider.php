<?php
/**
 * home_slider class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class HomeSlider extends FrontPage {
	protected $section     = 'front_page_home_slider_section';
	protected $option_name = 'front_page_home_slider_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Home slider section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'toggle',
			'settings'        => 'display_section',
			'label'           => esc_html__( 'Display home slider section', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'default'         => '1',
			'partial_refresh' => [
				$this->section . 'display_section' => [
					'selector'        => '#home_slider',
					'render_callback' => '__return_true'
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'repeater',
			'label'           => esc_html__( 'Home Sliders', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'row_label'       => [
				'type'  => 'field',
				'field' => 'title',
			],
			'button_label'    => esc_html__( 'Add new slide', 'advance-ecommerce' ),
			'settings'        => 'home_slides',
			'partial_refresh' => [
				$this->section . 'home_slides' => [
					'selector'        => '.home_slides',
					'render_callback' => '__return_true'
				]
			],
			'fields'          => [
				'slide_align' => [
					'type'    => 'select',
					'label'   => esc_html__( 'Slide align', 'advance-ecommerce' ),
					'choices' => [
						'align-left'  => esc_html__( 'Align left', 'advance-ecommerce' ),
						'align-right' => esc_html__( 'Align right', 'advance-ecommerce' ),
					],
				],
				'bg_image'    => [
					'type'  => 'image',
					'label' => esc_html__( 'Background image', 'advance-ecommerce' )
				],
				'title'       => [
					'type'  => 'text',
					'label' => esc_html__( 'Title', 'advance-ecommerce' )
				],
				'subtitle'    => [
					'type'  => 'text',
					'label' => esc_html__( 'Subtitle', 'advance-ecommerce' )
				],
				'price'       => [
					'type'  => 'text',
					'label' => esc_html__( 'Price', 'advance-ecommerce' )
				],
				'btn_title'   => [
					'type'  => 'text',
					'label' => esc_html__( 'Button title', 'advance-ecommerce' )
				],
				'btn_link'    => [
					'type'  => 'text',
					'label' => esc_html__( 'Button link', 'advance-ecommerce' )
				],
			]
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'repeater',
			'label'           => esc_html__( 'Flash product sliders', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'row_label'       => [
				'type'  => 'field',
				'field' => 'title',
			],
			'button_label'    => esc_html__( 'Add new slide', 'advance-ecommerce' ),
			'settings'        => 'flash_product_slides',
			'partial_refresh' => [
				$this->section . 'flash_product_slides' => [
					'selector'        => '.flash_product_slides',
					'render_callback' => '__return_true'
				]
			],
			'fields'          => [
				'title'          => [
					'type'  => 'text',
					'label' => esc_html__( 'Title', 'advance-ecommerce' )
				],
				'product'        => [
					'type'    => 'select',
					'label'   => esc_html__( 'Title', 'advance-ecommerce' ),
					'choices' => \Kirki_Helper::get_posts( [
						'post_type'   => 'product',
						'numberposts' => 9999,
						'meta_key'    => '_sale_price',
						'orderby'     => 'meta_value_num',
						'order'       => 'desc',
					] )
				],
				'offer_end_date' => [
					'type'  => 'date',
					'label' => esc_html__( 'Offer end date', 'advance-ecommerce' )
				],
			]
		] );
	}

}