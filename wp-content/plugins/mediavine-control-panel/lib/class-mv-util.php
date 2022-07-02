<?php

/**
 * Small Utility Class
 */
class MV_Util {

	/**
	 * Remove null variables.
	 *
	 * @since 1.0
	 * @param array $array loopable variables.
	 * @return array
	 */
	public static function filter_null( $array ) {
		return array_filter(
			$array, function ( $var ) {
				return ! is_null( $var );
			}
		);
	}

	/**
	 * Get value or return null.
	 *
	 * @since 1.0
	 * @param array  $array list of variables.
	 * @param string $index index being looked for.
	 * @return null|array
	 */
	public static function get_or_null( $array, $index ) {
		if ( array_key_exists( $index, $array ) ) {
			return $array[ $index ];
		}

		return null;
	}
}
