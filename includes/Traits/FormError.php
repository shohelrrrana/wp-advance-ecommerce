<?php


namespace Theme\Traits;

/**
 * Class Form_Error for handle error message
 *
 * @package Theme\Traits
 */
trait FormError {
	/**
	 * Holds the error
	 *
	 * @var array
	 */
	public $errors = [];

	/**
	 * check if the form has error
	 *
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function has_error ( $key ) {
		return isset( $this->errors[ $key ] );
	}

	/**
	 * Get the error message
	 *
	 * @param string $key
	 *
	 * @return string|boolean
	 */
	public function get_error ( $key ) {
		if ( $this->has_error( $key ) ) {
			return $this->errors[ $key ];
		}
		return false;
	}

}