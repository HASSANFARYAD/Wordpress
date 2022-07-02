<?php
namespace Mediavine\MCP;

/**
 * Safely implodes an array that may contain nested arrays
 *
 * @param string $glue          what to place between imploded values
 * @param array $orig_array     the array to be imploded, may contain nested arrays
 * @return string   safely imploded array/multi-dimensional array
 */
function multi_implode( $glue = '', $orig_array = array() ) {
	foreach ( $orig_array as $ind => $value ) {
		if ( is_array( $value ) ) {
			$orig_array[ $ind ] = multi_implode( '', $value );
		}
	}

	return implode( $glue, $orig_array );
}

/**
 * Checks that the parsed route matches a string
 *
 * @param string $needle
 * @param \WP $query Current WordPress environment instance (passed by reference)
 * @return bool Matching route
 */
function check_parse_route( $needle, $query ) {
	if ( ! property_exists( $query, 'query_vars' ) || ! is_array( $query->query_vars ) ) {
		return false;
	}

	$query_vars_as_string = multi_implode( '', $query->query_vars );
	$query_request        = ( ! empty( $query->request ) ) ? $query->request : '';

	if ( in_array( $needle, array( $query_vars_as_string, $query_request ), true ) ) {
		return true;
	}

	return false;
}

/**
 * Process redirect after user hits the specific url.
 *
 * If user hits this and site id is missing will redirect to home.
 *
 * @return string|void Return $url if testing and site_id set
 */
function fire_redirect( $url = '' ) {
	if ( ! empty( $url ) ) {
		// Return early when testing so headers aren't thrown
		if ( defined( 'MV_TESTING_BYPASS_REDIRECTS' ) ) {
			return $url;
		}

		\wp_safe_redirect( $url, 301 );
		exit();
	}

	// Return early when testing so headers aren't thrown
	if ( defined( 'MV_TESTING_BYPASS_REDIRECTS' ) ) {
		return;
	}

	\wp_safe_redirect( '/', 302 );
	exit();
}
