<?php
/**
 * Subscribe class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Sections\Common;

use Theme\Customizer\Panels\Common;

class Subscribe extends Common {
	protected $section     = 'common_subscribe_section';
	protected $option_name = 'common_subscribe_section';

	public function __construct () {
		//Load section & fields
		$this->register_section();
		$this->register_fields();
	}

	public function register_section () {
		\Kirki::add_section( $this->section, [
			'title'    => esc_html__( 'Subscribe section', 'advance-ecommerce' ),
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
					'selector'        => '#subscribe_section .section_title',
					'render_callback' => function () {
						return get_option( $this->section )['section_title'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Content subtitle', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'content_subtitle',
			'partial_refresh' => [
				$this->section . 'content_subtitle' => [
					'selector'        => '#subscribe_section .content_subtitle',
					'render_callback' => function () {
						return get_option( $this->section )['content_subtitle'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Content Title', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'content_title',
			'partial_refresh' => [
				$this->section . 'content_title' => [
					'selector'        => '#subscribe_section .content_title',
					'render_callback' => function () {
						return get_option( $this->section )['content_title'];
					}
				]
			],
		] );

		\Kirki::add_field( $this->config, [
			'type'            => 'text',
			'label'           => esc_html__( 'Mailchimp form shortcode', 'advance-ecommerce' ),
			'section'         => $this->section,
			'option_name'     => $this->option_name,
			'priority'        => 10,
			'settings'        => 'form_shortcode',
			'partial_refresh' => [
				$this->section . 'form_shortcode' => [
					'selector'        => '#subscribe_section .form_shortcode',
					'render_callback' => '__return_true'
				]
			],
		] );

	}
}