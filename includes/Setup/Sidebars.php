<?php
/**
 * Sidebars class file
 *
 * @package advance-ecommerce
 */

namespace Theme\Setup;

use Theme\Traits\Singleton;

class Sidebars {
	use Singleton;

	protected function __construct () {
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
	}

	public function register_sidebars () {
		register_sidebar( [
			'name'          => __( 'Blog Sidebar', 'advance-ecommerce' ),
			'id'            => 'blog-sidebar',
			'description'   => __( 'Widgets in this area will be shown on blog page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );

		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( [
				'name'          => __( 'Shop Sidebar', 'advance-ecommerce' ),
				'id'            => 'shop-sidebar',
				'description'   => __( 'Widgets in this area will be shown on shop page.', 'advance-ecommerce' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			] );
		}

		register_sidebar( [
			'name'          => __( 'Footer #1', 'advance-ecommerce' ),
			'id'            => 'footer-one',
			'description'   => __( 'Widgets in this area will be footer on page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );

		register_sidebar( [
			'name'          => __( 'Footer #2', 'advance-ecommerce' ),
			'id'            => 'footer-two',
			'description'   => __( 'Widgets in this area will be footer on page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );

		register_sidebar( [
			'name'          => __( 'Footer #3', 'advance-ecommerce' ),
			'id'            => 'footer-three',
			'description'   => __( 'Widgets in this area will be footer on page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );

		register_sidebar( [
			'name'          => __( 'Footer #4', 'advance-ecommerce' ),
			'id'            => 'footer-four',
			'description'   => __( 'Widgets in this area will be footer on page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );

		register_sidebar( [
			'name'          => __( 'Footer Bottom Area', 'advance-ecommerce' ),
			'id'            => 'footer-bottom',
			'description'   => __( 'Widgets in this area will be footer on page.', 'advance-ecommerce' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		] );
	}
}