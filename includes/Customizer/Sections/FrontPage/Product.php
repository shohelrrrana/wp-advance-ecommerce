<?php
/**
 * Product class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class Product extends FrontPage {
	protected $section     = 'front_page_product_section';
	protected $option_name = 'front_page_product_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Product section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'repeater',
			'label'           => esc_html__( 'Product sections', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'row_label'       => [
				'type'  => 'field',
				'field' => 'section_title',
			],
			'button_label'    => esc_html__( 'Add new section', 'advance-ecommerce' ),
			'settings'        => 'product_sections',
			'fields'          => [
				'section_title'            => [
					'type'  => 'text',
					'label' => esc_html__( 'Section title', 'advance-ecommerce' )
				],
				'show_product_by'          => [
					'type'    => 'select',
					'label'   => esc_html__( 'Show product by', 'advance-ecommerce' ),
					'choices' => [
						'popularity' => __( 'Popularity', 'advance-ecommerce' ),
						'date'       => __( 'Latest', 'advance-ecommerce' ),
						'price'      => __( 'Price low to high', 'advance-ecommerce' ),
						'price-desc' => __( 'Price high to low', 'advance-ecommerce' ),
					]
				],
				/*'show_product_by_category' => [
					'type'    => 'select',
					'label'   => esc_html__( 'Show product by category', 'advance-ecommerce' ),
					'choices' => \Kirki_Helper::get_terms( [ 'taxonomy' => 'product_cat', 'number' => 999 ] )
				],*/
			],
			'partial_refresh' => array(
				$this->section . 'product_items' => array(
					'selector'        => '.product_sections',
					'render_callback' => '__return_true'
				)
			)
		] );
	}

}