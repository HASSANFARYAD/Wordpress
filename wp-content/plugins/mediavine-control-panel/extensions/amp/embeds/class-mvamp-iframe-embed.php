<?php

class MVAMP_IFrame_Embed extends AMP_Base_Embed_Handler {

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
		return array( 'amp-iframe' => 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js' );
	}
}


