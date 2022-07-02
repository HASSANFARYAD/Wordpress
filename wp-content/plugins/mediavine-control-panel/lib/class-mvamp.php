<?php

class MVAMP extends MV_Extension {

	/** @var string[]  */
	public $settings = array(
		'analytics_code'       => 'string',
		'ad_frequency'         => 'string',
		'ad_offset'            => 'string',
		'use_analytics'        => 'bool',
		'ua_code'              => 'string',
		'disable_amphtml_link' => 'bool',
		'disable_in_content'   => 'bool',
		'disable_sticky'       => 'bool',
		'disable_amp_consent'  => 'bool',
		'enable_web_story_ads' => 'bool',
	);

	/** @var array  */
	public $settings_defaults = array(
		'analytics_code'       => '',
		'ad_frequency'         => 6,
		'ad_offset'            => 6,
		'use_analytics'        => false,
		'ua_code'              => '',
		'disable_amphtml_link' => false,
		'disable_in_content'   => false,
		'disable_sticky'       => false,
		'disable_amp_consent'  => false,
		'enable_web_story_ads' => true,
	);

	/** @var string  */
	public $setting_prefix = 'MVCP_';

	/**
	 * MVAMP constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 *
	 */
	public function init() {
		// TODO: Move this to its own file
		// Add video sitemap setting here because we aren't doing things a normal WP way
		$this->settings['video_sitemap_enabled']          = 'bool';
		$this->settings_defaults['video_sitemap_enabled'] = 'true';

		// Add forced ads.txt write setting here because we aren't doing things a normal WP way
		$this->settings['ads_txt_write_forced']          = 'bool';
		$this->settings_defaults['ads_txt_write_forced'] = false;

		$this->init_views();
		$this->init_plugin_filters();
	}

	/**
	 *
	 */
	public function init_views() {
		add_action( 'wp_head', array( $this, 'add_missing_official_amp_css_action' ) );
		add_action( 'amp_post_template_css', array( $this, 'amp_post_template_css' ) );
		add_action( 'wp_footer', array( $this, 'amp_transitional_template_analytics' ), 555 );
	}

	/**
	 *
	 */
	public function init_plugin_filters() {
		add_filter( 'amp_content_sanitizers', array( $this, 'load_sanitizer' ), 10, 2 );
		add_filter( 'amp_content_embed_handlers', array( $this, 'load_embeds' ), 10, 2 );

		if ( ! class_exists( 'Ampforwp_Init' ) && $this->option( 'use_analytics' ) ) {
			add_filter( 'amp_post_template_analytics', array( $this, 'amp_post_template_analytics' ), 10, 2 );
		}
	}

	/**
	 * Adds 'amp_post_template_css' hook to paired mode templates.
	 *
	 * For some reason this hook doesn't exist in the official
	 * AMP plugin as of version 1.0 on paired templates, and we
	 * need it to add our consent CS
	 */
	public function add_missing_official_amp_css_action() {
		if (
			$this->hasAMPOfficial() &&
			version_compare( $this->AMPOfficialVersion(), '1.0.0', '>=' ) &&
			AMP_Theme_Support::is_paired_available()
		) {
			echo '<style amp-custom>';
			do_action( 'amp_post_template_css' );
			echo '</style>';
		}
	}

	/**
	 * Use the amp plugin hook rather than enqueue style.
	 *
	 * @see https://github.com/Automattic/amp-wp#custom-css
	 */
	public function amp_post_template_css() {
		require( MCP_PLUGIN_DIR . '/extensions/amp/styles/ad-wrapper.css' );
	}

	/**
	 * Checks for AMP Plugins.
	 *
	 * @since 1.0
	 */
	public function hasAMP() {
		return $this->hasAMPOfficial() || $this->hasAMPForWP();
	}

	/**
	 * Checks for Official AMP Plugin.
	 *
	 * @since 1.9.4
	 */
	public function hasAMPOfficial() {
		return is_plugin_active( 'amp/amp.php' );
	}

	/**
	 * Gets version of Official AMP Plugin
	 *
	 * @return string plugin version
	 */
	public function AMPOfficialVersion() {
		$plugin_data    = get_plugins();
		$amp            = $plugin_data['amp/amp.php'];
		$plugin_version = $amp['Version'];
		return $plugin_version;
	}

	/**
	 * Checks for AMP Plugin 'AMP for WP'.
	 *
	 * @since 1.0
	 */
	public function hasAMPForWP() {
		return is_plugin_active( 'accelerated-mobile-pages/accelerated-moblie-pages.php' );
	}

	/**
	 * Add analytics to Transitional/Standard pages.
	 */
	public function amp_transitional_template_analytics() {
		// Skip if AMP Official isn't active
		if ( ! $this->hasAMPOfficial() || version_compare( $this->AMPOfficialVersion(), '1.0.0', '<=' ) ) {
			return;
		}

		// Skip if we can't access what we need in the AMP plugin since this becomes pointless.
		if ( ! class_exists( 'AMP_Theme_Support' )
			|| ! function_exists( 'amp_add_custom_analytics' )
			|| ! function_exists( 'amp_print_analytics' ) ) {
			return;
		}

		if ( method_exists( 'AMP_Theme_Support', 'is_customize_preview_iframe' ) ) {
			// Skip if user is in Customizer preview iframe
			if ( AMP_Theme_Support::is_customize_preview_iframe() ) {
				return;
			}
		}

		// Set mode depending on the version of AMP
		if ( defined( 'AmpProject\AmpWP\Option::THEME_SUPPORT' ) ) {
			// AMP 2.0.0+
			$mode = AMP_Options_Manager::get_option( AmpProject\AmpWP\Option::THEME_SUPPORT );
		} elseif ( method_exists( 'AMP_Theme_Support', 'get_support_mode_added_via_option' ) ) {
			// before AMP 2.0.0
			$mode = AMP_Theme_Support::get_support_mode_added_via_option();
		} else {
			// We've entered the Twilight Zone, back away slowly.
			return;
		}

		if ( in_array( $mode, array( AMP_Theme_Support::STANDARD_MODE_SLUG, AMP_Theme_Support::TRANSITIONAL_MODE_SLUG ), true ) ) {
			/**
			 * @uses amp_post_template_analytics filter
			 */
			$analytics = amp_add_custom_analytics();
			amp_print_analytics( $analytics );
		}
	}

	/**
	 *
	 *
	 * @param $embed_handler_classes
	 * @param null $post
	 * @return mixed
	 */
	function load_embeds( $embed_handler_classes, $post = null ) {
		if ( ! $this->hasAMPForWP() && ! $this->option( 'disable_amp_consent' ) ) {
			require_once( MCP_PLUGIN_DIR . '/extensions/amp/embeds/class-mvamp-geo-embed.php' );
			require_once( MCP_PLUGIN_DIR . '/extensions/amp/embeds/class-mvamp-consent-embed.php' );

			$embed_handler_classes['MVAMP_Geo_Embed']     = array();
			$embed_handler_classes['MVAMP_Consent_Embed'] = array();
		}

		require_once( MCP_PLUGIN_DIR . '/extensions/amp/embeds/class-mvamp-iframe-embed.php' );
		require_once( MCP_PLUGIN_DIR . '/extensions/amp/embeds/class-mvamp-sticky-ad-embed.php' );
		require_once( MCP_PLUGIN_DIR . '/extensions/amp/embeds/class-mvamp-ad-embed.php' );

		$embed_handler_classes['MVAMP_iFrame_Embed']    = array();
		$embed_handler_classes['MVAMP_Sticky_Ad_Embed'] = array();
		$embed_handler_classes['MVAMP_Ad_Embed']        = array();

		return $embed_handler_classes;
	}

	/**
	 *
	 *
	 * @param $sanitizer_classes
	 * @param null $post
	 * @return mixed
	 */
	function load_sanitizer( $sanitizer_classes, $post = null ) {
		require_once( MCP_PLUGIN_DIR . '/extensions/amp/sanitizers/class-mvamp-sanitizer.php' );

		$sanitizer_classes['MVAMP_Sanitizer'] = array(
			'site_id'             => MV_Control_Panel::$mvcp->option( 'site_id' ),
			'use_analytics'       => $this->option( 'use_analytics' ),
			'ad_offset'           => $this->option( 'ad_offset' ),
			'ad_frequency'        => $this->option( 'ad_frequency' ),
			'ua_code'             => $this->option( 'ua_code' ),
			'disable_in_content'  => $this->option( 'disable_in_content' ),
			'disable_sticky'      => $this->option( 'disable_sticky' ),
			'disable_amp_consent' => $this->option( 'disable_amp_consent' ),
			'did_append_adhesion' => MV_Control_Panel::$mvcp->globals['did_append_adhesion'],
		);

		return $sanitizer_classes;
	}

	/**
	 *
	 *
	 * @param $analytics
	 * @return array
	 */
	public function amp_post_template_analytics( $analytics ) {
		if ( ! is_array( $analytics ) ) {
			$analytics = array();
		}

		$analytics['mv-googleanalytics'] = array(
			'type'        => 'googleanalytics',
			'attributes'  => array(
				'id' => 'mvanalytics',
			),
			'config_data' => array(
				'vars'     => array(
					'account' => $this->option( 'ua_code' ),
				),
				'triggers' => array(
					'trackPageview' => array(
						'on'      => 'visible',
						'request' => 'pageview',
					),
				),
			),
		);

		return $analytics;
	}
}
