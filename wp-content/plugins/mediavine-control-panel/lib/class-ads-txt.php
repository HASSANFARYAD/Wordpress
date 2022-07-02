<?php
namespace Mediavine\MCP;

class Ads_Txt {

	/** @var null|self  */
	public static $instance = null;

	/** @var string|null  */
	public $document_root = null;

	/**
	 * Singleton factory.
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance                = new self();
			self::$instance->document_root = self::$instance->get_root_path();
		}
		return self::$instance;
	}

	/**
	 * Link functions to WP Lifecycle.
	 */
	public function init() {
		// Remove potential Ads.txt Manager conflict
		$this->remove_ads_txt_plugin_conflicts();

		add_action( 'init', array( $this, 'create_rewrites' ) );
		add_action( 'get_ad_text_cron_event', array( $this, 'write_ad_text_file' ) );
		add_action( 'wp_ajax_mv_adtext', array( $this, 'write_ad_text_ajax' ) );
		add_action( 'wp_ajax_mv_disable_adtext', array( $this, 'disable_ad_text_ajax' ) );
		add_action( 'wp_ajax_mv_enable_adtext', array( $this, 'enable_ad_text_ajax' ) );

		add_filter( 'allowed_redirect_hosts', array( $this, 'allowed_hosts' ) );
	}

	/**
	 * Gets the root path for ads.txt file write
	 *
	 * @return string
	 */
	public function get_root_path() {
		$root_path = ABSPATH;
		if ( ! empty( $_SERVER['DOCUMENT_ROOT'] ) ) {
			$root_path = $_SERVER['DOCUMENT_ROOT']; // phpcs:disable WordPress.VIP.ValidatedSanitizedInput.MissingUnslash, WordPress.VIP.ValidatedSanitizedInput.InputNotSanitized
		}

		// Allow for root path override
		if ( defined( 'MVCP_ROOT_PATH' ) ) {
			$root_path = MVCP_ROOT_PATH;
		}

		return trailingslashit( $root_path );
	}

	/**
	 * Uses filters to specifically prevent conflicts with other third-party plugins.
	 *
	 * We only unhook if we have a Mediavine Site ID and if ads.txt is enabled.
	 * Currently affects the following plugins:
	 * - Ads.txt Manager
	 * - Redirection
	 *
	 * @return void
	 */
	public function remove_ads_txt_plugin_conflicts() {
		// We only want to proceed if we have a site ID and ads.txt is enabled
		if (
			empty( get_option( 'MVCP_site_id' ) ) ||
			! $this->is_ads_txt_enabled()
		) {
			return;
		}

		// Unhooks Ads.txt Manager plugin from affecting Ads.txt redirect.
		remove_action( 'init', 'tenup_display_ads_txt' );

		// Prevents Redirection plugin from overriding /ads.txt redirects
		add_filter( 'redirection_url_target', array( $this, 'remove_redirection_ads_txt' ), 10, 2 );
	}

	/**
	 * Removes the /ads.txt redirect from the Redirection plugin if it exists.
	 *
	 * @param string $target_url Destination URL for a redirect
	 * @param string $source_url Matched URL that triggers redirect
	 * @return bool|string False if source is /ads.txt. Initial target if no match.
	 */
	public function remove_redirection_ads_txt( $target_url, $source_url ) {
		if ( '/ads.txt' === $source_url ) {
			$target_url = false;
		}

		return $target_url;
	}

	/**
	 * Retrieves the HTTP code of a URL through a cURL request.
	 *
	 * @param string $url
	 * @return int
	 */
	public function get_curl_http_code( $url ) {
		$curl_handle = curl_init( $url );
		curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true );
		curl_exec( $curl_handle );
		$http_code = curl_getinfo( $curl_handle, CURLINFO_RESPONSE_CODE );
		curl_close( $curl_handle );

		return $http_code;
	}

	/**
	 * Checsk if the home URL contains a subdirectory, buy checking for a forward slash
	 *
	 * @return boolean
	 */
	public function does_home_url_contain_subdirectory() {
		if ( false === strpos( home_url(), '/' ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Checks if the site has the ability to redirect txt files.
	 *
	 * Potentially expensive procedure, so we store the result as an option.
	 *
	 * @return boolean
	 */
	public function can_txt_files_be_redirected() {
		// Prevent recursion from timing out a server with our check
		// phpcs:disable
		if ( isset( $_GET['mcp'] ) && 'checking-redirection' === $_GET['mcp'] ) {
			wp_die( 'If you got this error, then you are doing something you are not supposed to be doing.' );
		}
		// phpcs:enable

		// Have we performed and stored this check before?
		$previous_check = get_option( 'mv_mcp_txt_redirections_allowed' );
		if ( false !== $previous_check ) {
			return (bool) $previous_check;
		}

		// Does the WP home url have a subdirectory? If it does, we know we are not working with
		// the root domain and don't want to attempt to rely on WP to perform the redirects.
		if ( $this->does_home_url_contain_subdirectory() ) {
			return false;
		}

		// Check that the server is not intercepting txt files before WordPress
		$likely_has_no_duplicates  = uniqid( '/this-will-404-' );
		$definitely_a_404_txt_file = home_url() . $likely_has_no_duplicates . '.txt?mcp=checking-redirection';

		// Make sure we can perform this check. Some servers have weird adjustments to curl.
		// If we can't perform the check, then we take no chances and use the write method.
		if ( ! function_exists( 'curl_init' ) || ! function_exists( 'curl_getinfo' ) ) {
			update_option( 'mv_mcp_txt_redirections_allowed', 0 );

			return false;
		}

		/**
		 * Filters the http code. This filter is only used for phpunit testing.
		 *
		 * @param int $http_code
		 */
		$http_code = apply_filters( 'mv_cp_http_code', $this->get_curl_http_code( $definitely_a_404_txt_file ) );

		// If the url doesn't return a 500, then WP redirects don't work with txt files.
		// Don't proceed. We purposefully exit the page with `wp_die`, so we know it should be 500.
		if ( 500 !== $http_code ) {
			update_option( 'mv_mcp_txt_redirections_allowed', 0 );

			return false;
		}

		update_option( 'mv_mcp_txt_redirections_allowed', 1 );

		return true;
	}

	/**
	 * Checks if the Ads.txt method has been forced to write through an enabled setting.
	 *
	 * @return boolean
	 */
	public function is_ads_txt_write_forced() {
		// For some reason the setting is set to true as a string, so let's fix that
		$ads_txt_write_forced = get_option( 'MVCP_ads_txt_write_forced' );
		if ( 'true' === $ads_txt_write_forced ) {
			$ads_txt_write_forced = true;
		}

		return $ads_txt_write_forced;
	}

	/**
	 * Gets the ads.txt method of retrieval.
	 *
	 * 'redirect' uses a 301 method. 'write' writes the ads.txt file to the domain root and
	 * schedules an event to check Mediavine's servers and update ads.txt info accordingly.
	 *
	 * @param string $home_url The home url of the site to parse
	 * @return string The ads.txt retrieval method
	 */
	public function get_ads_txt_method( $home_url = '' ) {
		$ads_txt_method = 'redirect';

		if ( empty( $home_url ) ) {
			$home_url = home_url();
		}

		$parsed_url = parse_url( $home_url );
		if ( array_key_exists( 'path', $parsed_url ) ) {
			$ads_txt_method = 'write';
		}

		// Check that redirection of text files works
		if ( ! $this->can_txt_files_be_redirected() ) {
			$ads_txt_method = 'write';
		}

		// Check if write method is forced by hidden setting
		if ( $this->is_ads_txt_write_forced() ) {
			$ads_txt_method = 'write';
		}

		/**
		 * Filters the method used to retrieve ads.txt files.
		 *
		 * @param array $ads_txt_method Supports 'redirect' or 'write'
		 */
		$ads_txt_method = apply_filters( 'mv_cp_ads_txt_method', $ads_txt_method );

		// No need for an ads.txt file if we are rewriting
		if ( 'redirect' === $ads_txt_method ) {
			$this->remove_adstxt();
			wp_clear_scheduled_hook( 'get_ad_text_cron_event' );
		}

		return $ads_txt_method;
	}

	/**
	 * Checks if ads.txt method is set to redirect.
	 *
	 * @return boolean
	 */
	public function has_ads_txt_redirect() {
		return 'redirect' === $this->get_ads_txt_method();
	}

	/**
	 * Checks if ads.txt support is enabled.
	 *
	 * @return boolean
	 */
	public function is_ads_txt_enabled() {
		return ! get_option( '_mv_mcp_adtext_disabled' );
	}

	/**
	 * Checks if writable ads.txt are enabled.
	 *
	 * @return boolean
	 */
	public function is_ads_txt_writeable_enabled() {
		// Is ads.txt disabled
		if ( ! $this->is_ads_txt_enabled() ) {
			return false;
		}

		// Does this install allow redirects
		if ( $this->has_ads_txt_redirect() ) {
			return false;
		}

		return true;
	}

	/**
	 * Checks if redirected ads.txt are enabled.
	 *
	 * @return boolean
	 */
	public function is_ads_txt_redirect_enabled() {
		// Is ads.txt disabled
		if ( ! $this->is_ads_txt_enabled() ) {
			return false;
		}

		// Does this install allow redirects
		if ( ! $this->has_ads_txt_redirect() ) {
			return false;
		}

		return true;
	}

	/**
	 * Adds scheduled event to write ads.txt file.
	 *
	 * @return void
	 */
	public function add_ads_txt_write_event() {
		// Only proceed if scheduled event doesn't already exist
		if ( false !== wp_next_scheduled( 'get_ad_text_cron_event' ) ) {
			return;
		}

		wp_schedule_event( time(), 'daily', 'get_ad_text_cron_event' );
	}

	/**
	 * Schedules ads.txt write event if ads.txt is enabled and method is set to write.
	 *
	 * @return void
	 */
	public function add_ads_txt_writable_fallback_if_no_redirect() {
		// Check that we can't redirect and that ads.txt is enabled
		if ( ! $this->is_ads_txt_writeable_enabled() ) {
			return;
		}

		// Site ID must be set
		if ( empty( get_option( 'MVCP_site_id' ) ) ) {
			return;
		}

		$this->add_ads_txt_write_event();
	}

	/**
	 * Parse sitemap route to identify if it should be pass to `fire_redirect()`.
	 *
	 * @param \WP $query Current WordPress environment instance (passed by reference)
	 */
	public function parse_ads_txt_route( $query ) {
		if ( ! check_parse_route( 'ads.txt', $query ) ) {
			return;
		}

		// Get URL from site ID
		$site_id = get_option( 'MVCP_site_id' );
		if ( ! empty( $site_id ) ) {
			$url = 'https://adstxt.mediavine.com/sites/' . $site_id . '/ads.txt';
			fire_redirect( $url );
		}

		return;
	}

	/**
	 * Adds rewrite rules for directing ads.txt to mediavine servers.
	 */
	public function create_rewrites() {
		// Only add rewrite rule if checks pass
		if ( ! $this->is_ads_txt_redirect_enabled() ) {
			return;
		}

		add_action( 'parse_request', array( $this, 'parse_ads_txt_route' ) );
	}

	/**
	 * Adds 'adstxt.mediavine.com' to allowed hosts for redirects.
	 *
	 * @param array $hosts
	 * @return array Hosts
	 */
	function allowed_hosts( $hosts ) {
		$hosts[] = 'adstxt.mediavine.com';

		return $hosts;
	}

	/**
	 *
	 *
	 * @return string
	 */
	public function get_root_url() {
		$root_url = get_home_url();
		if ( defined( 'MVCP_ROOT_URL' ) ) {
			$root_url = MVCP_ROOT_URL;
		}
		return $root_url;
	}

	/**
	 *
	 *
	 * @return bool
	 */
	public function ads_txt_exists() {
		return file_exists( realpath( $this->document_root . 'ads.txt' ) );
	}

	/**
	 *
	 *
	 * @return bool
	 */
	public function has_contents() {
		return filesize( realpath( $this->document_root . 'ads.txt' ) ) > 0;
	}

	/**
	 *
	 *
	 * @return bool
	 */
	public function remove_adstxt() {
		if ( true === $this->ads_txt_exists() ) {
			return unlink( realpath( $this->document_root . 'ads.txt' ) );
		}
		return false;
	}

	/**
	 *
	 */
	public function remove_if_empty() {
		if ( true === $this->ads_txt_exists() ) {
			if ( ! $this->has_contents() ) {
				unlink( realpath( $this->document_root . 'ads.txt' ) );
			}
		}
	}

	/**
	 *
	 *
	 * @return bool[]
	 */
	public function enable_ad_text() {
		$worked = true;

		// We only write to the ads.txt file if redirects are disabled
		if ( ! $this->has_ads_txt_redirect() ) {
			$worked = $this->write_ad_text_file();
			$this->remove_if_empty();
			$this->add_ads_txt_write_event();
		}

		delete_option( '_mv_mcp_adtext_disabled' );
		$data = array( 'success' => $worked );
		return $data;
	}

	/**
	 *
	 *
	 * @return bool
	 */
	public function disable_adstxt() {
		wp_clear_scheduled_hook( 'get_ad_text_cron_event' );
		return true;
	}

	/**
	 *
	 *
	 * @param null $slug
	 * @param bool $live_site
	 * @return bool|string
	 */
	public function get_ad_text( $slug = null, $live_site = false ) {
		if ( ! $slug ) {
			$slug = \MV_Control_Panel::$mvcp->option( 'site_id' );
		}

		$url = 'https://adstxt.mediavine.com/sites/' . $slug . '/ads.txt';

		if ( $live_site ) {
			$url = $this->get_root_url() . '/ads.txt';
		}

		$request = wp_remote_get( $url );

		// Try again with non-https if error (prevent cURL error 35: SSL connect error)
		if ( is_wp_error( $request ) && ! $live_site && ! empty( $request->errors['http_request_failed'] ) ) {
			$url     = 'http://adstxt.mediavine.com/sites/' . $slug . '/ads.txt';
			$request = wp_remote_get( $url );
		}

		$code    = wp_remote_retrieve_response_code( $request );
		$ad_text = wp_remote_retrieve_body( $request );

		if ( $code >= 200 && $code < 400 ) {
			return $ad_text;
		}

		return false;
	}

	/**
	 *
	 *
	 * @param null $slug
	 * @return bool|string|void
	 */
	public function write_ad_text_file( $slug = null ) {
		$ad_text = $this->get_ad_text( $slug );

		// Better failure messages
		if ( false === $ad_text ) {
			return __( 'Cannot connect to Mediavine Ads.txt file.', 'mcp' );
		}
		if ( empty( $ad_text ) || strlen( $ad_text ) <= 0 ) {
			return __( 'Mediavine Ads.txt file empty.', 'mcp' );
		}

		$fp = fopen( $this->document_root . 'ads.txt', 'w' );
		fwrite( $fp, $ad_text );
		fclose( $fp );

		// Remove autoupdate transient if it exists
		delete_transient( 'mv_ad_text_autoupdate_failed' );

		// Run match ads.txt check to set correct transient
		$this->match_ad_text_file();

		return true;
	}

	/**
	 *
	 */
	public function enable_ad_text_ajax() {
		$data = $this->enable_ad_text();
		$this->respond_json_and_die( $data );
	}

	/**
	 *
	 */
	public function disable_ad_text_ajax() {
		$worked = $this->disable_adstxt();
		$this->remove_adstxt();
		add_option( '_mv_mcp_adtext_disabled', true );
		$data = array( 'success' => $worked );
		$this->respond_json_and_die( $data );
	}

	/**
	 *
	 */
	public function write_ad_text_ajax() {
		$worked = $this->write_ad_text_file();
		$this->remove_if_empty();
		$data = array( 'error' => $worked );
		if ( true === $worked ) {
			$data = array( 'success' => $worked );
			// Add a scheduled event if redirects are disabled
			if ( ! $this->has_ads_txt_redirect() ) {
				$this->add_ads_txt_write_event();
			}
		}
		$this->respond_json_and_die( $data );
	}

	/**
	 *
	 *
	 * @param $data
	 */
	public function respond_json_and_die( $data ) {
		try {
			header( 'Pragma: no-cache' );
			header( 'Cache-Control: no-cache' );
			header( 'Expires: Thu, 01 Dec 1994 16:00:00 GMT' );
			header( 'Connection: close' );

			header( 'Content-Type: application/json' );

			// response body is optional //
			if ( isset( $data ) ) {
				// adapt_json_encode will handle data escape //
				echo wp_json_encode( $data );
			}
		} catch ( Exception $e ) {
				header( 'Content-Type: text/plain' );
				echo esc_html( 'Exception in respond_and_die(...): ' . $e->getMessage() );
		}

		die();
	}

	/**
	 *
	 *
	 * @return bool
	 */
	public function match_ad_text_file() {
		$ad_text_match   = false;
		$site_id         = \MV_Control_Panel::$mvcp->option( 'site_id' );
		$mv_ad_text      = $this->trim_ad_text( $this->get_ad_text( $site_id ) );
		$current_ad_text = $this->trim_ad_text( $this->get_ad_text( $site_id, true ) );

		if ( $mv_ad_text === $current_ad_text ) {

			$ad_text_match = true;

			// Remove autoupdate transient if match passes
			delete_transient( 'mv_ad_text_autoupdate_failed' );

		}

		// Set transient
		set_transient( 'mv_ad_text_match', $ad_text_match, 12 * HOUR_IN_SECONDS );

		return $ad_text_match;
	}

	/**
	 * Matches ads.txt file with Mediavine servers.
	 */
	public function match_ad_text_notice() {
		$site_id       = \MV_Control_Panel::$mvcp->option( 'site_id' );
		$enabled       = $this->is_ads_txt_enabled();
		$ad_text_match = get_transient( 'mv_ad_text_match' );

		if ( $site_id ) {
			// Only check if no match transient exists
			if ( false === $ad_text_match ) {
				$ad_text_match = $this->match_ad_text_file();
			}

			// Only proceed if files don't match
			if ( empty( $ad_text_match ) ) {
				$worked                       = false;
				$autoupdate_previously_failed = get_transient( 'mv_ad_text_autoupdate_failed' );

				// Try to update ads.txt and autoupdate didn't fail recently
				if ( $enabled && ! $autoupdate_previously_failed ) {
					$worked = $this->write_ad_text_file();

					// Retry matched check after autoupdate
					$ad_text_match = $this->match_ad_text_file();

					// If ads.txt didn't update pause autoupdater from trying for 12 hours
					if ( true !== $worked ) {
						set_transient( 'mv_ad_text_autoupdate_failed', true, 12 * HOUR_IN_SECONDS );
					}
				}

				// Only display notice if ads.txt still doesn't match
				if ( empty( $ad_text_match ) ) {
					// Don't display notice if multisite with ads.txt disabled
					if ( ! $enabled && is_multisite() ) {
						return;
					}

					// Add update_ads_text param on url string to give instructions
					$url   = esc_url( 'https://help.mediavine.com/advanced/ads-txt-help/setting-up-your-adstxt-file' );
					$class = 'notice notice-error';
					/* translators: %s: url */
					$message = sprintf( __( '<span style="font-size: 1.5em;">The automatic Ads.txt update failed due to settings on your server. You\'ll need to <a href="%s" target="_blank">update this manually by FOLLOWING THESE INSTRUCTIONS</a>. <strong>This impacts your revenue and needs to be updated ASAP.</strong></span>', 'mcp' ), $url );

					printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
				}
			}
		}
	}

	/**
	 * Trim all whitespace and normalize line breaks.
	 */
	public function trim_ad_text( $ad_text ) {
		$ad_text = trim( preg_replace( '~\r\n?~', "\n", $ad_text ) );
		return $ad_text;
	}
}
