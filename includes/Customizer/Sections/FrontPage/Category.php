<?php
/**
 * Category class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\FrontPage;

use Theme\Customizer\Panels\FrontPage;

class Category extends FrontPage {
	protected $section     = 'front_page_category_section';
	protected $option_name = 'front_page_category_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'category section', 'advance-ecommerce' ),
			'panel'    => $this->panel,
			'priority' => 160,
		] );
	}

	public function register_fields () {
		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Section title', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'section_title',
			'partial_refresh' => [
				$this->section . 'section_title' => [
					'selector'        => '#category_section .section_title',
					'render_callback' => function () {
						return get_option( $this->section )['section_title'];
					}
				]
			],
		] );
	}

}