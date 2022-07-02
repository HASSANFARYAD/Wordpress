<?php

class MVAMP_Geo_Embed extends AMP_Base_Embed_Handler {

	/**
	 *
	 */
	public function register_embed() {
	}

	/**
	 *
	 */
	public function unregister_embed() {
	}

	/**
	 *
	 *
	 * @return string[]
	 */
	public function get_scripts() {
		return array( 'amp-geo' => 'https://cdn.ampproject.org/v0/amp-geo-0.1.js' );
	}
}


