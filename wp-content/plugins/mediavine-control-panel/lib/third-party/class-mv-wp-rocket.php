<?php
/**
 * @file Handles integration between MCP and WP Rocket.
 */

namespace Mediavine\MCP\ThirdParty;

class MV_WP_Rocket {

	/** @var self|null */
	protected static $instance;

	/**
	 * Makes sure class is only instantiated once.
	 *
	 * @return self Instantiated class
	 *
	 * @codeCoverageIgnore
	 */
	static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Hooks to be run on class instantiation.
	 *
	 * @codeCoverageIgnore
	 */
	public function init() {
		add_filter( 'rocket_delay_js_exclusions', array( $this, 'add_rocket_js_exclusions' ) );
		add_filter( 'rocket_exclude_defer_js', array( $this, 'add_rocket_js_exclusions' ) );
		add_filter( 'rocket_defer_inline_exclusions', array( $this, 'add_rocket_js_exclusions' ) );
	}

	/**
	 * Exclude scripts from WP Rocket JS delay and defer.
	 *
	 * @return array
	 */
	public function add_rocket_js_exclusions( $excluded = array() ) {
		// Fail gracefully in case WP Rocket decides to change how the parameter
		// gets passed in the future.
		if ( ! is_array( $excluded ) ) {
			return $excluded;
		}

		$excluded[] = 'mediavine';
		$excluded[] = 'social-pug';
		return $excluded;
	}
}
