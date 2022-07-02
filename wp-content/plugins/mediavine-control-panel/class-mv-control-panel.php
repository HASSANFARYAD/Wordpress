<?php

use Mediavine\MCP\Ads_Txt;
use Mediavine\MCP\Upstream;

/**
 * Primary class for MCP.
 *
 * @category     WordPress_Plugin
 * @package      Mediavine Control Panel
 * @author       Mediavine
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link         https://www.mediavine.com
 */
class MV_Control_Panel extends MV_Base {

	const VERSION = '2.8.0';

	const DB_VERSION = '2.8.0';

	const TEXT_DOMAIN = 'mediavine';

	const PLUGIN_DOMAIN = 'mv_recipe_cards';

	const PREFIX = '_mv_';

	const PLUGIN_FILE_PATH = __FILE__;

	const PLUGIN_ACTIVATION_FILE = 'mediavine-control-panel.php';

	public $api_route = 'mv-control-panel';

	public $api_version = 'v1';

	public static $extensions = array();

	/** @var bool  */
	public $should_disable_ads = false;

	/** @var string[]  */
	public $pagebuilders = array(
		'divi-builder/divi-builder.php',
		'thrive-visual-editor/thrive-visual-editor.php',
		'elementor/elementor.php',
		'live-composer-page-builder/live-composer-page-builder.php',
	);

	/**
	 * Globalized variables.
	 *
	 * @since 4.6.0
	 * @var array
	 */
	public $globals = array(
		'did_append_adhesion' => false,
	);

	/**
	 * Map of file names to Class Names.
	 *
	 * @since 4.6.0
	 * @var array
	 */
	public $extension_map = array(
		array(
			'folder_name'    => 'amp',
			'file_name'      => 'class-mvamp',
			'extension_name' => 'amp',
			'class_name'     => 'MVAMP',
		),
		array(
			'folder_name'    => 'security',
			'file_name'      => 'class-mv-security',
			'extension_name' => 'security',
			'class_name'     => 'MV_Security',
		),
		array(
			'folder_name'    => 'debug',
			'file_name'      => 'class-mv-debug',
			'extension_name' => 'debug',
			'class_name'     => 'MV_Debug',
		),
	);

	/**
	 * Default Settings types.
	 *
	 * @since 4.6.0
	 * @var array
	 */
	public $settings = array(
		'include_script_wrapper' => 'bool',
		'site_id'                => 'string',
		'disable_admin_ads'      => 'bool',
		'has_loaded_before'      => 'bool',
	);

	/**
	 * Plugin default settings.
	 *
	 * @since 4.6.0
	 * @var array
	 */
	public $settings_defaults = array(
		'include_script_wrapper' => false,
		'site_id'                => '',
		'disable_admin_ads'      => false,
		'has_loaded_before'      => false,
	);

	/**
	 * Plugin Prefix.
	 *
	 * @since 4.6.0
	 * @var string
	 */
	public $setting_prefix = 'MVCP_';

	/**
	 * Array of Class Extensions.
	 *
	 * @since 4.6.0
	 * @var array
	 */
	private $_extensions = array();

	/**
	 * Constructor for initializing state and dependencies.
	 *
	 * @ignore
	 * @since 1.0
	 */
	public function __construct() {
		parent::__construct( $this );
	}

	/**
	 * Bootstrap.
	 */
	public function init() {
		$this->init_views();
		$this->load_extensions();

		// Sites in launch mode should not enable any features but the web wrapper and Dashboard auth.
		if ( ! Upstream::is_launch_mode_enabled() ) {
			Ads_Txt::get_instance()->init();
			\Mediavine\MCP\AMP_Web_Stories::get_instance()->init();
			\Mediavine\MCP\Video_Sitemap::get_instance()->init();
		}

		// Set hook for checking for launch mode (if the custom event is active).
		Upstream::get_instance()->init();

		// Installation and uninstallation hooks.
		register_activation_hook( $this::get_activation_path(), array( $this, 'primary_plugin_activation' ) );
		add_action( 'plugins_loaded', array( $this, 'plugin_updated' ), 10, 2 );
		register_deactivation_hook( $this::get_activation_path(), array( $this, 'plugin_deactivation' ) );

		// Cached data clears
		add_action( '_core_updated_successfully', array( $this, 'clear_cached_data' ) );
		add_action( 'update_option_MVCP_site_id', array( $this, 'clear_cached_data' ) );

		if ( function_exists( 'rest_api_init' ) ) {  // This can be removed (WP 4.4 min)
			\Mediavine\MCP\Settings::get_instance()->init();
			\Mediavine\MCP\MV_Identity::get_instance()->init();
			\Mediavine\MCP\Video::get_instance()->init();
			\Mediavine\MCP\Ad_Settings::get_instance()->init();

			$MVCP_Admin = new Mediavine\Control_Panel\Admin_Init();
			$MVCP_Admin->init();
		}

		// Check for third party plugins and apply integration functionality.
		add_action( 'plugins_loaded', array( $this, 'setup_third_party' ) );
	}

	/**
	 * Reliably return the base directory for plugin, important in order to enqueue files elsewhere.
	 *
	 * @return string plugin directory url based on this plugin directory
	 */
	public static function assets_url() {
		return plugin_dir_url( __FILE__ );
	}

	/**
	 *
	 *
	 * @return string
	 */
	public static function get_activation_path() {
		return dirname( __FILE__ ) . '/' . self::PLUGIN_ACTIVATION_FILE;
	}

	/**
	 * Clears stored cached data values.
	 */
	public function clear_cached_data() {
		delete_option( 'mv_mcp_adunit_name' );
		delete_option( 'mv_mcp_txt_redirections_allowed' );
	}

	/**
	 * Runs at activation of MCP plugin
	 */
	public function primary_plugin_activation() {
		$this->plugin_activation();
		flush_rewrite_rules();
	}

	/**
	 * Actions to be run when plugin is activated or updated.
	 */
	public function plugin_activation() {
		// Turn on upstream checking as fallback to make sure we get at least one good reply.
		Upstream::start_mode_checking();
		Upstream::start_mcm_status_checking();
		// Force the first check.
		Upstream::get_instance()->check_mode_task();

		if ( ! Upstream::is_launch_mode_enabled() ) {
			Ads_Txt::get_instance()->add_ads_txt_writable_fallback_if_no_redirect();
		}

		$this->clear_cached_data();
	}

	/**
	 * Runs after all plugins have loaded so actions can be run after MCP has been updated.
	 */
	public function plugin_updated() {
		// This runs after all plugins are loaded so it can run after update
		// Check version instead of DB_VERSION for non-custom tables support
		if ( get_option( 'mv_mcp_version' ) === self::VERSION ) {
			return;
		}
		$this->plugin_activation();

		update_option( 'mv_mcp_version', self::VERSION );
	}

	/**
	 *
	 */
	public function plugin_deactivation() {
		Upstream::reset_upstream_checking(); // Failsafe to disable Launch Mode (will re-check when re-enabled).
		wp_clear_scheduled_hook( 'get_ad_text_cron_event' );
		flush_rewrite_rules();
	}

	/**
	 * Load admin settings views.
	 *
	 * @since 1.0
	 */
	public function init_views() {
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'mv_admin_enqueue_scripts' ) );
		add_filter( 'post_class', array( $this, 'add_post_class' ), 10, 3 );
		add_action( 'admin_notices', array( $this, 'amp_analytics_notice' ) );
	}

	/**
	 * Add notice about official AMP plugin breaking our ability to record those stats.
	 */
	public function amp_analytics_notice() {
		if ( $this->option( 'use_analytics' ) && $this->hasAMPOfficial() ) {
			echo '<div class="notice notice-warning is-dismissible">
            <p><strong>Mediavine Control Panel</strong> &raquo; Due to changes in AMP 2.1.2+, MCP will no longer be able to provide your AMP analytics implementation. If you are seeing this message, you’ll need to <a href="https://amp-wp.org/documentation/getting-started/analytics/">set up analytics with the AMP plugin</a> and disable the Enable AMP Google Analytics setting in MCP as soon as possible.</p>
            </div>';
		}
	}

	/**
	 * Add class 'mv-content-wrapper' to all posts' wrappers for ad targeting.
	 *
	 * @param array $classes Classes to be used.
	 * @param string $class Class being added when filter triggered. (Not used)
	 * @param int $post_id Current post. (Not used)
	 * @return array Classes to be used.
	 */
	public function add_post_class( $classes, $class, $post_id ) {
		if ( is_singular() && ! in_array( 'mv-content-wrapper', $classes, true ) ) {
			$classes[] = 'mv-content-wrapper';
		}
		return $classes;
	}

	/**
	 * Loop extensions and call 'load_extension'.
	 *
	 * @since 1.0
	 */
	private function load_extensions() {
		foreach ( $this->extension_map as $extension ) {
			try {
				$this->load_extension_class( $extension['extension_name'], $extension['class_name'] );
			} catch ( Exception $e ) {
				// TODO: Error handling.
			}
		}
	}


	/**
	 * Add extension on to primary class.
	 *
	 * @since 1.0
	 * @param string $extension_name Extension name string.
	 * @param string $class_name Class Name.
	 */
	private function load_extension_class( $extension_name, $class_name ) {
		$instance                            = new $class_name();
		self::$extensions[ $extension_name ] = $instance;
	}

	/**
	 * Initialize admin UI.
	 *
	 * @since 1.0
	 */
	public function admin_init() {
		add_filter( 'plugin_action_links_' . MCP_PLUGIN_BASE, array( $this, 'add_action_links' ) );

		$this->initialize_settings();
		$this->get_extension( 'amp' )->initialize_settings();
		$this->get_extension( 'security' )->initialize_settings();
	}

	/**
	 *
	 */
	public function mv_should_disable_ads() {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		$disable_admin_ads = $this->option( 'disable_admin_ads' );
		if ( $disable_admin_ads ) {
			$this->should_disable_ads = true;
			return;
		}

		foreach ( $this->pagebuilders as $item ) {
			$this->should_disable_ads = is_plugin_active( $item );
			if ( true === $this->should_disable_ads ) {
				break;
			}
		}

	}

	/**
	 *
	 *
	 * @param $hook
	 */
	public function mv_admin_enqueue_scripts( $hook ) {
		if ( 'settings_page_mediavine_amp_settings' !== $hook ) {
			return;
		}

		$data                 = array();
		$current_user         = wp_get_current_user();
		$data['email']        = $current_user->user_email;
		$data['access_token'] = null;
		$data['site_info']    = '';

		$token_data = \Mediavine\MCP\Settings::read( 'mcp-services-api-token' );

		if ( isset( $token_data->value ) ) {
			$data['access_token'] = $token_data->value;
		}

		if ( isset( $token_data->data->email ) ) {
			$data['email'] = $token_data->data->email;
		}

		if ( ! empty( $current_user ) ) {
			$data['site_info'] = esc_html( $current_user->display_name ) . ' | Site: ' . esc_url( site_url() );
		}
	}

	/**
	 * Adds links to plugins page.
	 *
	 * @since 1.0
	 * @param array $links WP array of links used for admin menus.
	 */
	public function add_action_links( $links ) {
		return array_merge(
			$links, array(
				'<a href="' . admin_url( 'options-general.php?page=mediavine_amp_settings' ) . '">Settings</a>',
				'<a href="https://help.mediavine.com/">Support</a>',
			)
		);
	}

	/**
	 * Add MCP settings page to admin menu.
	 *
	 * @since 1.0
	 */
	public function admin_menu() {
		$redirect_url = admin_url() . '/options-general.php?page=mediavine_amp_settings';
		add_menu_page(
			'Support',
			'Support',
			'manage_options',
			$redirect_url,
			'',
			'data:image/svg+xml;base64,' . base64_encode( '<svg viewBox="0 0 36 24" xmlns="http://www.w3.org/2000/svg"><path fill="white" d="M33.013 1.768c-.91.271-2.621.942-3.287 2.284-.627 1.262-.213 2.997.164 4 .91-.27 2.625-.941 3.291-2.285.667-1.342.167-3.11-.168-3.999zm-3.996 8.05l-.26-.514c-.068-.137-1.676-3.385-.409-5.936C29.614.817 33.172.133 33.323.105L33.89 0l.26.515c.069.137 1.676 3.384.409 5.936-1.265 2.55-4.824 3.235-4.975 3.263l-.567.105zM7.68 7.986h.01v15.743a7.877 7.877 0 0 1-7.68-7.497H0V.488a7.878 7.878 0 0 1 7.68 7.498zm9.036 0h.009v15.743a7.877 7.877 0 0 1-7.68-7.497h-.01V.488c4.139.1 7.488 3.383 7.68 7.498zm9.035 0h.01v15.743a7.877 7.877 0 0 1-7.68-7.497h-.01V.488a7.878 7.878 0 0 1 7.68 7.498z"></path></svg>' )
		);

		add_options_page(
			'Mediavine Control Panel',
			'Mediavine Control Panel',
			'edit_posts',
			'mediavine_amp_settings',
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Enqueue Mediavine Script Wrapper.
	 *
	 * @since 1.0
	 */
	public function enqueue_scripts() {
		$this->mv_should_disable_ads();
		$site_id     = $this->option( 'site_id' );
		$use_wrapper = $this->option( 'include_script_wrapper' );
		$customizer  = false;
		$amp         = false;

		if ( function_exists( 'is_customize_preview' ) && is_customize_preview() ) {
			$customizer = true;
		}

		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			$amp = true;
		}

		if ( $site_id && $use_wrapper && ! $customizer && ! $amp && ! $this->should_disable_ads ) {
			$this->mv_enqueue_script(
				array(
					'handle' => 'mv-script-wrapper',
					'src'    => 'https://scripts.mediavine.com/tags/' . $site_id . '.js',
					'attr'   => array(
						'async'          => 'async',
						'data-noptimize' => '1',
						// This disables Cloudflare Rocket Loader.
						// @see https://support.cloudflare.com/hc/en-us/articles/200169436-How-can-I-have-Rocket-Loader-ignore-specific-JavaScripts-
						'data-cfasync'   => 'false',
					),
				)
			);

		}

		if ( $this->get_extension( 'amp' )->option( 'disable_amphtml_link' ) ) {
			// Remove the AMP frontend action right before wp_head fires.
			remove_action( 'wp_head', 'amp_add_amphtml_link' );
			remove_action( 'wp_head', 'amp_frontend_add_canonical' );
		}
	}

	/**
	 * Render Settings for MCP.
	 *
	 * @since 1.0
	 */
	public function render_settings_page() {

		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_die( esc_html( 'You do not have sufficient permissions to access this page.' ) );
		}

		if ( isset( $_GET['refresh_launch_status'] ) ) { // phpcs:disable
			// Force the synchronous launch mode check.
			Upstream::get_instance()->check_mode_task();
			// Clear status so that it gets auto-populated again.
			Upstream::clear_launch_mode_cache();
		}

		include( sprintf( '%s/views/settings.php', dirname( __FILE__ ) ) );
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
	 * Checks for Web Stories Plugin.
	 *
	 * @since 2.6
	 *
	 * @return bool
	 */
	public function has_web_stories() {
		return class_exists( 'Web_Stories_Compatibility' );
	}

	/**
	 * Returns Extension class for use.
	 *
	 * @since 1.0
	 *
	 * @param string $name Name of extension to return.
	 */
	public function get_extension( $name ) {
		if ( array_key_exists( $name, self::$extensions ) ) {
			return self::$extensions[ $name ];
		}

		return false;
	}

	/**
	 * Check for third party plugins and apply integration functionality.
	 */
	public function setup_third_party() {
		if ( defined( 'WP_ROCKET_VERSION' ) ) {
			\Mediavine\MCP\ThirdParty\MV_WP_Rocket::get_instance()->init();
		}

		// @todo: Refactor other existing third party integration to be here (AMP, WS, etc.)
	}
}
