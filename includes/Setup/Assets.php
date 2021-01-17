<?php

namespace Theme\Setup;

use Theme\Traits\Singleton;

/**
 * Class Assets for load css & js
 *
 * @package Theme\Setup
 */
class Assets {
	use Singleton;

	/**
	 * Assets constructor.
	 */
	public function __construct () {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	/**
	 * get styles
	 * @return array[]
	 */
	public function get_styles () {
		return [
			'bootstrap-style'    => [
				'src'     => THEME_ASSETS . '/vendor/bootstrap/css/bootstrap.min.css',
				'version' => THEME_VERSION
			],
			'font-awesome-style' => [
				'src'     => THEME_ASSETS . '/vendor/font-awesome/css/font-awesome.min.css',
				'version' => THEME_VERSION
			],
			'main-style'         => [
				'src'     => THEME_ASSETS . '/css/style.min.css',
				'version' => THEME_VERSION
			],
			'theme-style'        => [
				'src'     => get_stylesheet_uri(),
				'version' => filemtime( THEME_PATH . '/style.css' )
			]
		];
	}

	/**
	 * get scripts
	 * @return array[]
	 */
	public function get_scripts () {
		return [
			'bootstrap-script'    => [
				'src'     => THEME_ASSETS . '/vendor/bootstrap/js/bootstrap.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'popper-script'       => [
				'src'     => THEME_ASSETS . '/vendor/bootstrap/js/popper.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'masonry-script'      => [
				'src'     => THEME_ASSETS . '/vendor/masonry/js/masonry.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'plugins-script'      => [
				'src'     => THEME_ASSETS . '/vendor/plugins.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'countdown-script'    => [
				'src'     => THEME_ASSETS . '/vendor/countdown.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'nouislider-script'   => [
				'src'     => THEME_ASSETS . '/vendor/nouislider.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'isotope-docs-script' => [
				'src'     => THEME_ASSETS . '/vendor/isotope-docs.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'main_init-script'    => [
				'src'     => THEME_ASSETS . '/js/main_init.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'main-script'         => [
				'src'     => THEME_ASSETS . '/js/main.min.js',
				'version' => THEME_VERSION,
				'deps'    => [ 'jquery' ],
			],
			'custom-script'       => [
				'src'     => THEME_ASSETS . '/js/custom.js',
				'version' => filemtime( THEME_PATH . '/assets/js/custom.js' ),
				'deps'    => [ 'jquery' ],
			]
		];
	}

	/**
	 * Enqueue assets
	 * @return void
	 */
	public function enqueue_assets () {
		$styles  = $this->get_styles();
		$scripts = $this->get_scripts();

		foreach ( $styles as $handle => $style ) {
			wp_enqueue_style( $handle, $style['src'], null, $style['version'] );
		}

		foreach ( $scripts as $handle => $script ) {
			wp_enqueue_script( $handle, $script['src'], $script['deps'], $script['version'], true );
		}
	}

}