<?php
namespace Mediavine\MCP;

class Ad_Settings {

	public static $instance;

	/**
	 * Makes sure class is only instantiated once
	 *
	 * @return object Instantiated class
	 */
	static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Hooks to be run on class instantiation
	 *
	 * @return void
	 */
	function init() {
		add_shortcode( 'mv_ad_settings', array( $this, 'ad_settings_shortcode' ) );
	}

	/**
	 * Normalizes the attributes after they have been added by gutenberg
	 *
	 * @param [type] $atts
	 * @return void
	 */
	public function normalize_attributes( $atts ) {
		if ( ! empty( $atts['embedcode'] ) ) {
			$atts['embedcode'] = urldecode( $atts['embedcode'] );
		}

		return $atts;
	}

	/**
	 * Render markup via shortcode to control Mediavine ad settings
	 *
	 * @param  array $atts Attributes from post shortcode
	 * @return string HTML to render div for Mediavine ad settings
	 */
	public function ad_settings_shortcode( $atts ) {
		if ( is_admin() ) {
			return '';
		}

		if ( empty( $atts['embedcode'] ) ) {
			return '';
		}

		$atts = $this->normalize_attributes( $atts );

		// Don't output if past expires date
		if ( ! empty( $atts['disableuntil'] ) && date( 'Y-m-d' ) > $atts['disableuntil'] ) {
			return;
		}

		return $atts['embedcode'];
	}
}
