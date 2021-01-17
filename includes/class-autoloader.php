<?php
/**
 * Autoload class file
 *
 * @package advance-ecommerce
 */

namespace Theme\Helpers;

final class Autoloader {
	static $instance       = null;
	static $namespace_root = 'Theme';
	static $root_path      = 'includes';

	public function __construct () {
		spl_autoload_register( [ $this, 'load' ] );
	}

	final private function load ( $resource ) {
		//trim slash
		$resource = trim( $resource, '\\' );
		$resource = str_replace( '\\', '/', $resource );

		//Trim Root Namespace
		$resource = explode( '/', $resource );
		if ( isset( $resource[0] ) && $resource[0] == static::$namespace_root ) {
			array_shift( $resource );
		}
		$resource = join( '/', $resource );

		$resource_path = get_template_directory() . '/' . trim( self::$root_path, '/' ) . '/' . $resource . '.php';

		if ( ! empty( $resource_path ) && file_exists( $resource_path ) ) {
			require_once $resource_path;
		}
	}

	/**
	 * initializes a singleton instance
	 *
	 * @return Autoloader
	 */
	public static function get_instance () {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}

/**
 * Initializes the autoloader class
 * @return Autoloader
 */
function autoloader () {
	return Autoloader::get_instance();
}

//Run the autoloader
autoloader();