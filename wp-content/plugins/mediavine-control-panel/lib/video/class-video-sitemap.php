<?php
namespace Mediavine\MCP;

class Video_Sitemap {

	/** @var null|self  */
	public static $instance = null;

	/**
	 * Singleton factory.
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Link functions to WP Lifecycle.
	 */
	function init() {
		add_action( 'init', array( $this, 'create_rewrites' ) );
		add_action( 'update_option_MVCP_video_sitemap_enabled', 'flush_rewrite_rules' );

		add_filter( 'allowed_redirect_hosts', array( $this, 'allowed_hosts' ) );
	}

	/**
	 * Adds 'dashboard.mediavine.com' to allowed hosts for redirects.
	 *
	 * @param array $hosts
	 * @return array Hosts
	 */
	function allowed_hosts( $hosts ) {
		$hosts[] = 'sitemaps.mediavine.com';

		return $hosts;
	}

	/**
	 * Detects setting for video sitemap.
	 *
	 * @return bool
	 */
	public static function is_video_sitemap_enabled() {
		// For some reason the setting is set to true as a string, so let's fix that
		// Also, if the setting hasn't been set yet, then we want default true
		$video_sitemap_enabled = get_option( 'MVCP_video_sitemap_enabled' );
		if ( false === $video_sitemap_enabled || 'true' === $video_sitemap_enabled ) {
			$video_sitemap_enabled = true;
		}

		return $video_sitemap_enabled;
	}

	/**
	 * Adds rewrite rules for catching 'mv-video-sitemap'.
	 */
	public function create_rewrites() {
		if ( $this::is_video_sitemap_enabled() ) {
			add_action( 'parse_request', array( $this, 'parse_sitemap_route' ) );
		}
	}

	/**
	 * Gets the sitemap URL from the site ID.
	 *
	 * @return string|null Sitemap URLbased of the ID. Null if no site id.
	 */
	public function get_sitemap_url() {
		$url     = null;
		$site_id = get_option( 'MVCP_site_id' );
		if ( ! empty( $site_id ) ) {
			$url = 'https://sitemaps.mediavine.com/sites/' . $site_id . '/video-sitemap.xml';
		}

		return $url;
	}

	/**
	 * Parse sitemap route to identify if it should be pass to `fire_redirect()`.
	 *
	 * @param \WP $query Current WordPress environment instance (passed by reference)
	 * @return bool
	 */
	public function parse_sitemap_route( $query ) {
		if ( ! check_parse_route( 'mv-video-sitemap', $query ) ) {
			return false;
		}

		// Get URL from site ID
		$url = $this->get_sitemap_url();
		if ( ! empty( $url ) ) {
			fire_redirect( $url );
		}

		return true;
	}
}
