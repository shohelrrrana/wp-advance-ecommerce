<?php
/**
 * Kirki Setup class file
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer;

use Theme\Traits\Singleton;

class Customizer {
	protected $config = 'theme_customizer_config';
	use Singleton;

	public function __construct () {
		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}
		//Load the class methods
		$this->config();
		$this->load_panels();
		$this->load_sections();
	}

	public function config () {
		\Kirki::add_config( $this->config, [
			'capability'  => 'edit_theme_options',
			'option_type' => 'option',
		] );
	}

	public function load_panels () {
		//Load panels
		\Theme\Customizer\Panels\ThemeOptions::get_instance();
		\Theme\Customizer\Panels\FrontPage::get_instance();
		\Theme\Customizer\Panels\Common::get_instance();
	}

	public function load_sections () {
		//Theme option sections
		\Theme\Customizer\Sections\ThemeOptions\Typography::get_instance();

		//Common page sections
		\Theme\Customizer\Sections\Common\Subscribe::get_instance();

		//Front page sections
		\Theme\Customizer\Sections\FrontPage\Sortable::get_instance();
		\Theme\Customizer\Sections\FrontPage\HomeSlider::get_instance();
		\Theme\Customizer\Sections\FrontPage\Service::get_instance();
		\Theme\Customizer\Sections\FrontPage\Product::get_instance();
		\Theme\Customizer\Sections\FrontPage\BannerProduct::get_instance();
		\Theme\Customizer\Sections\FrontPage\Category::get_instance();
		\Theme\Customizer\Sections\FrontPage\OfferBanner::get_instance();
	}

}