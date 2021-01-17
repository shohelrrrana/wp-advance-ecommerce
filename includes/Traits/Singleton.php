<?php

namespace Theme\Traits;

/**
 * Trait Singleton
 *
 * @package Theme\Traits
 */
trait Singleton {
	/**
	 * put classes instance
	 *
	 * @var array
	 */
	private static $instance = [];

	/**
	 * Get the class instance
	 *
	 * @return object
	 */
	final static function get_instance () {
		$called_class = get_called_class();

		if ( ! isset( self::$instance[ $called_class ] ) ) {
			self::$instance[ $called_class ] = new $called_class;
		}
		return self::$instance[ $called_class ];
	}
}