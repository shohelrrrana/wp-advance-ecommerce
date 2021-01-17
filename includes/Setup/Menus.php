<?php
/**
 * Menu class file for handle navigation
 *
 * @package advance-ecommerce
 */

namespace Theme\Setup;

use Theme\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct () {
		add_action( 'init', [ $this, 'register_menus' ] );
		// add_filter( 'nav_menu_css_class', [$this, 'add_class_to_all_menu_list'] );
		// add_filter( 'nav_menu_link_attributes', [$this, 'add_class_to_all_menu_anchors'] );
	}

	/**
	 * Register menus
	 *
	 * @return void
	 */
	public function register_menus () {
		register_nav_menus( [
			'HEADER_MENU' => __( 'Header Menu', 'advance-ecommerce' ),
			'FOOTER_MENU' => __( 'Footer Menu', 'advance-ecommerce' ),
		] );
	}

	/**
	 * Add css class to all menu list items
	 *
	 * @param $classes
	 *
	 * @return array[]
	 */
	public function add_class_to_all_menu_list ( $classes ) {
		$classes[] = 'nav-item';
		return $classes;
	}

	/**
	 * add css class to all menu anchor tags
	 *
	 * @param $attr
	 *
	 * @return array[]
	 */
	public function add_class_to_all_menu_anchors ( $attr ) {
		$attr['class'] = 'nav-link';
		return $attr;
	}
}