<?php
namespace Mediavine\MCP;

/**
 * Gets the `<amp-geo>` json
 *
 * @return string
 */
function get_geo_json() {
	$geo_template = '<script type="application/json">
		{
			"ISOCountryGroups": {
				"eu": ["at", "be", "bg", "cy", "cz", "de", "dk", "ee", "es", "fi", "fr", "gb", "gr", "hu", "hr", "ie", "it", "lt", "lu", "lv", "mt", "nl", "pl", "pt", "ro", "se", "si", "sk", "uk"]
			}
		}
	</script>';

	return $geo_template;
}

/**
 * Gets the `<amp-geo>` markup
 *
 * @return string
 */
function get_amp_geo_markup() {
	$amp_geo_markup = '<amp-geo layout="nodisplay">' . get_geo_json() . '</amp-geo>';

	return $amp_geo_markup;
}

/**
 * Gets the adunit name for a Mediavine publisher.
 *
 * This is stored as an option so we can keep this up to date if needed without hammering our
 * servers, and to not waste resources. The option is cleared with every reactivation and
 * update of MCP, as well as with core WP updates.
 *
 * @return string
 */
function get_adunit_name() {
	$adunit_name = get_option( 'mv_mcp_adunit_name' );

	// If we need to regenerate the transient
	if ( false === $adunit_name ) {
		$slug = \MV_Control_Panel::$mvcp->option( 'site_id' );
		$url  = 'https://reporting.mediavine.com/api/v1/sites?slug=' . $slug;

		/**
		 * Filters the endpoint url used to retrieve adunit name.
		 *
		 * @param array $url Supports 'redirect' or 'write'
		 */
		$url = apply_filters( 'mv_cp_adunit_endpoint_url', $url );

		// Set authorization token to get data from "public" MCP endpoint
		$args = array(
			'headers' => array(
				'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjozNTgyLCJqd3Rfc2VjcmV0IjoiN2M3NTIyYmUtNGRhYy00Yzk1LTgwM2EtNDFiMzQ0MzlkNzMwIiwiY2xpZW50X2FwcGxpY2F0aW9uX2lkIjoibWNwIn0.gYwxrrPVzBHyMBI6PpslDBeECLbV-KNv8uLejteWsdU',
			),
		);

		$response = wp_remote_get( $url, $args );

		$body = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( ! empty( $body['sites'][0]['adunit'] ) ) {
			$adunit_name = $body['sites'][0]['adunit'];

			// Store as option
			update_option( 'mv_mcp_adunit_name', $adunit_name );
		}
	}

	return $adunit_name;
}
