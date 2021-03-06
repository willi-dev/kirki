<?php
/**
 * Override field methods
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.3.2
 */

/**
 * Field overrides.
 */
class Kirki_Field_Sortable extends Kirki_Field {

	/**
	 * Sets the control type.
	 *
	 * @access protected
	 */
	protected function set_type() {

		$this->type = 'kirki-sortable';

	}

	/**
	 * Sets the $sanitize_callback.
	 *
	 * @access protected
	 */
	protected function set_sanitize_callback() {

		$this->sanitize_callback = array( 'Kirki_Field_Sortable', 'sanitize' );

	}

	/**
	 * Sanitizes sortable values.
	 *
	 * @static
	 * @access public
	 * @param array $value The checkbox value.
	 * @return bool
	 */
	public static function sanitize( $value = array() ) {

		if ( is_string( $value ) || is_numeric( $value ) ) {
			return array(
				esc_attr( $value ),
			);
		}
		$sanitized_value = array();
		foreach ( $value as $sub_value ) {
			$sanitized_value[] = esc_attr( $sub_value );
		}
		return $sanitized_value;

	}
}
