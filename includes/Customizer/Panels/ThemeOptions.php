<?php
/**
 * Front_Page class file for customizer
 *
 * @package advance-ecommerce
 */

namespace Theme\Customizer\Panels;

use Theme\Customizer\Customizer;

class ThemeOptions extends Customizer {
    protected $panel = 'theme_typography_panel';

    public function __construct() {
        //Load panel
        $this->register_panel();
    }

    public function register_panel() {
        \Kirki::add_panel( $this->panel, [
            'priority' => 10,
            'title'    => esc_html__( 'Theme Options', 'advance-ecommerce' ),
        ] );
    }

}