<?php
namespace Mediavine\MCP;

class Video {

	/** @var self|null */
	public static $instance;

	/** @var string  */
	private $api_route = 'mv-video';

	/** @var string  */
	private $api_version = 'v1';

	/** @var null  */
	private $api = null;

	/**
	 * Makes sure class is only instantiated once.
	 *
	 * @return self Instantiated class
	 */
	static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Hooks to be run on class instantiation.
	 */
	function init() {
		$this->api      = new Video_API();
		$this->featured = Video_Featured::get_instance();

		add_shortcode( 'mv_video', array( $this, 'video_script_shortcode' ) );
		add_action( 'rest_api_init', array( $this, 'routes' ) );
	}

	/**
	 * Parse Content and Replace Embed with new Shortcode.
	 *
	 * @param  string $content String content block, presumably post_content
	 * @param  string $slug Slug for a Mediavine Video
	 * @param  string $shortcode The created shortcode to replace the original embed
	 * @return string Content with the tags repaced with a shortcode
	 */
	public static function replace_embed( $content, $slug, $shortcode ) {

		$re = '/&lt;div id="' . $slug . '".*?\s?\n?.*?&lt;\/script&gt;/Um';

		preg_match_all( $re, $content, $matches, PREG_SET_ORDER, 0 );
		if ( isset( $matches[0] ) ) {
			foreach ( $matches[0] as $match ) {
				$content = preg_replace( $re, $shortcode, $content );
			}
		}

		$re = '/<div id="' . $slug . '".*?\s?\n?.*?<\/script>/Um';

		preg_match_all( $re, $content, $matches, PREG_SET_ORDER, 0 );

		if ( isset( $matches[0] ) ) {
			foreach ( $matches[0] as $match ) {
				$content = preg_replace( $re, $shortcode, $content );
			}
		}
		$re = '/<script[^>]+mediavine.com\/videos\/' . $slug . '.*?<\/script>/Um';

		preg_match_all( $re, $content, $matches, PREG_SET_ORDER, 0 );

		if ( isset( $matches[0] ) ) {
			foreach ( $matches[0] as $match ) {
				$content = preg_replace( $re, $shortcode, $content );
			}
		}

		return $content;
	}

	/**
	 * SQL Query to Find Embeds using HTML and Script tags.
	 *
	 * @param array
	 * @return array|object|null Database query results.
	 */
	public static function find_legacy_video_embeds( $params = null ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'posts';
		$video_url  = $wpdb->esc_like( '//video.mediavine.com/videos' );
		$video_url  = '%' . $video_url . '%';
		$script_url = $wpdb->esc_like( '//scripts.mediavine.com/videos' );
		$script_url = '%' . $script_url . '%';
		// @codingStandardsIgnoreStart
		$video_posts = $wpdb->get_results( $wpdb->prepare( "SELECT id, post_title AS title, post_type as type FROM {$table_name} WHERE (post_type NOT IN ('revision', 'attachment', 'nav_menu_item') AND ( (post_content LIKE %s) OR (post_content LIKE %s) ) )", array( $video_url, $script_url ) ) );
		// @codingStandardsIgnoreEnd
		return $video_posts;
	}

	/**
	 * Parse Tag Embeds to Shortcodes.
	 *
	 * @param array $data API data including id, title, type
	 * @return boolean true if succesfully replaced
	 */
	public static function parse_to_shortcode( $data ) {
		$post = get_post( $data['id'] );

		if ( empty( $post ) ) {
			return false;
		}

		$content          = $post->post_content;
		$video_in_content = true;

		while ( $video_in_content ) {
			$get_embed = '/&lt;div id=".{20}".*?\s?\n?.*?&lt;\/script&gt;/Um';
			preg_match( $get_embed, $content, $embed_match, PREG_OFFSET_CAPTURE, 0 );

			if ( isset( $embed_match[0][0] ) ) {
				$parts = '/\.mediavine.com\/videos\/(?P<slug>\S+)\.js|data-ratio="(?P<ratio>\S+)"|data-sticky="(?P<sticky>\S+)"|data-volume="(?P<volume>\S+)"/mU';

				preg_match_all( $parts, $embed_match[0][0], $matches, PREG_SET_ORDER, 0 );

				if ( empty( $matches ) ) {
					return false;
				}

				$attributes = array();
				$slug       = null;
				foreach ( $matches as $match ) {
					if ( ! empty( $match['ratio'] ) ) {
						$attributes[] = 'aspectRatio="' . $match['ratio'] . '"';
					}
					if ( ! empty( $match['slug'] ) ) {
						$slug         = $match['slug'];
						$attributes[] = 'key="' . $match['slug'] . '"';
					}
					if ( ! empty( $match['volume'] ) ) {
						$attributes[] = 'volume="' . $match['volume'] . '"';
					}
					if ( ! empty( $match['sticky'] ) ) {
						$attributes[] = 'sticky="true"';
					}
				}

				if ( $slug ) {
					$shortcode = '[mv_video ' . implode( ' ', $attributes ) . ']';
					$content   = self::replace_embed( $content, $slug, $shortcode );
				} else {
					$video_in_content = false;
				}
			} else {
				$video_in_content = false;
			}
		}

		$video_in_content = true;
		while ( $video_in_content ) {
			$get_embed = '/<div id=".{20}".*?\s?\n?.*?<\/script>/Um';
			preg_match( $get_embed, $content, $embed_match, PREG_OFFSET_CAPTURE, 0 );

			if ( isset( $embed_match[0][0] ) ) {
				$parts = '/\.mediavine.com\/videos\/(?P<slug>\S+)\.js|data-ratio="(?P<ratio>\S+)"|data-sticky="(?P<sticky>\S+)"/mU';

				preg_match_all( $parts, $embed_match[0][0], $matches, PREG_SET_ORDER, 0 );

				if ( empty( $matches ) ) {
					return false;
				}

				$attributes = array();
				$slug       = null;
				foreach ( $matches as $match ) {
					if ( ! empty( $match['ratio'] ) ) {
						$attributes[] = 'aspectRatio="' . $match['ratio'] . '"';
					}
					if ( ! empty( $match['slug'] ) ) {
						$slug         = $match['slug'];
						$attributes[] = 'key="' . $match['slug'] . '"';
					}
					if ( ! empty( $match['sticky'] ) ) {
						$attributes[] = 'sticky="true"';
					}
				}

				if ( $slug ) {
					$shortcode = '[mv_video ' . implode( ' ', $attributes ) . ']';
					$content   = self::replace_embed( $content, $slug, $shortcode );
				} else {
					$video_in_content = false;
				}
			} else {
				$video_in_content = false;
			}
		}

		$video_in_content = true;
		while ( $video_in_content ) {
			$get_embed = '/<script[^>]+mediavine.com\/videos\/([^\.]+).*?<\/script>/';
			preg_match( $get_embed, $content, $embed_match );

			if ( isset( $embed_match ) ) {
				$slug         = $embed_match[1];
				$attributes[] = 'key="' . $slug . '"';
				$shortcode    = '[mv_video ' . implode( ' ', $attributes ) . ']';
				$content      = self::replace_embed( $content, $slug, $shortcode );
			}
			$video_in_content = false;
		}

		$post->post_content = $content;

		$updated_post = wp_update_post( $post );

		if ( $updated_post ) {
			return true;
		}
		return false;

	}

	/**
	 * Add position styles to the default WP safe styles filter.
	 *
	 * WordPress blocks all position styles when running thorugh `wp_kses` of any sort,
	 * so we need to allow those styles.
	 *
	 * @param array $styles WP Safe styles
	 * @return array WP safe styles with postion styles added
	 */
	function add_position_styles( $styles ) {
		$position_styles = array(
			'position',
			'top',
			'bottom',
			'left',
			'right',
		);
		$styles          = array_merge( $styles, $position_styles );

		return $styles;
	}

	/**
	 * Create the markup for embedded Mediavine Videos
	 *
	 * @param  array $settings contains necessary variables for creation of embed
	 * @return string HTML to render div tag for Mediavine Videos
	 */
	function video_markup_template( $settings ) {
		if ( empty( $settings['key'] ) ) {
			return '';
		}

		// Don't output video tag if Relevanssi search result
		if ( is_search() && function_exists( 'relevanssi_init' ) ) {
			return '';
		}

		// Output placeholder if admin ads are disabled and user hss admin rights
		if ( 'true' === get_option( 'MVCP_disable_admin_ads' ) && current_user_can( 'edit_posts' ) ) {
			$placeholder = '
			<div class="mv-video-id-placeholder" style="height:0;padding-top:56.25%;position:relative;background:#000;">
				<div style="position:absolute;top:0;bottom:0;left:0;right:0;display:flex;justify-content:center;align-items:center;">
					<div style="text-align:center;color:#fff;">
						<strong style="display:block;font-size:1.1em;">' . __( 'Mediavine Video Placeholder', 'mediavine' ) . '</strong>' . __( 'Video only displays when ad script wrapper is loaded on page', 'mediavine' ) .
					'</div>
				</div>
			</div>';

			// We need to modify the safe styles added so `wp_kses` doesn't remove them
			add_filter( 'safe_style_css', array( $this, 'add_position_styles' ) );

			return $placeholder;
		}

		$settings_markup    = ' data-video-id="' . $settings['key'] . '"';
		$requested_settings = array(
			'ratio',
			'volume',
			'sticky',
			'disable_optimize',
			'disable_autoplay',
			'jsonld',
			'featured',
		);
		foreach ( $requested_settings as $setting ) {
			if ( ! empty( $settings[ $setting ] ) ) {
				$settings_markup .= ' ' . trim( $settings[ $setting ] );
			}
		}

		$template = '<div class="mv-video-target mv-video-id-' . $settings['key'] . '"' . $settings_markup . '></div>';

		return $template;
	}

	/**
	 * Helper function to normalize video shortcode attributes.
	 *
	 * Sets undefined values to false and changes single attribute values to associative attributes
	 *
	 * @param array $attributes Attributes array to be normalized
	 * @return array Normalized attributes array
	 */
	public function normalize_attributes( $attributes ) {
		foreach ( $attributes as $key => &$value ) {
			if ( 'undefined' === $value ) {
				$value = 'false';
			}

			// Fixes issue where attributes were added as a single attribute, rather than a key value attribute
			$normalized_atts = array(
				'sticky',
				'doNotOptimizePlacement',
				'doNotAutoplayNorOptimizePlacement',
			);
			if ( in_array( $value, $normalized_atts, true ) ) {
				// Only replace value if it doesn't already exist
				if ( ! isset( $attributes[ $value ] ) ) {
					$attributes[ $value ] = 'true';
				}
				unset( $attributes[ $key ] );
			}
		}

		return $attributes;
	}

	/**
	 * Returns the allowed HTML for video markup to be used in wp_kses.
	 *
	 * @return array
	 */
	public function allowed_video_html() {
		$allowed_html = array(
			'div'    => array(
				'id'                        => array(),
				'class'                     => array(),
				'data-video-id'             => array(),
				'data-playlist-id'          => array(),
				'data-value'                => array(),
				'data-sticky'               => array(),
				'data-autoplay'             => array(),
				'data-ratio'                => array(),
				'data-volume'               => array(),
				'data-disable-auto-upgrade' => array(),
				'data-disable-optimize'     => array(),
				'data-disable-autoplay'     => array(),
				'data-disable-jsonld'       => array(),
				'data-force-optimize'       => array(),
				'style'                     => array(),
			),
			'strong' => array(
				'style' => array(),
			),
		);

		return $allowed_html;
	}

	/**
	 * Render markup via shortcode to display Mediavine Videos.
	 *
	 * @param  array $attributes Attributes from post shortcode
	 * @return string HTML to render div and script tag for Mediavine Videos
	 */
	function video_script_shortcode( $attributes ) {
		if ( is_admin() ) {
			return '';
		}

		if ( empty( $attributes['key'] ) ) {
			return '';
		}

		// Normalize attributes
		$attributes = $this->normalize_attributes( $attributes );

		$settings = array(
			'disable_optimize' => '',
			'disable_autoplay' => '',
			'sticky'           => '',
			'ratio'            => '',
			'jsonld'           => '',
			'volume'           => 'data-volume="70"',
		);

		if ( isset( $attributes['key'] ) ) {
			$settings['key'] = $attributes['key'];
		}

		if ( isset( $attributes['sticky'] ) && ( 'true' === $attributes['sticky'] ) ) {
			$settings['sticky']           = 'data-sticky="1" data-autoplay="1"';
			$settings['disable_optimize'] = 'data-disable-optimize="1"';
		}

		if ( isset( $attributes['donotoptimizeplacement'] ) && ( 'true' === $attributes['donotoptimizeplacement'] ) ) {
			$settings['disable_optimize'] = 'data-disable-optimize="1"';
		}

		if ( isset( $attributes['donotautoplaynoroptimizeplacement'] ) && ( 'true' === $attributes['donotautoplaynoroptimizeplacement'] ) ) {
			$settings['disable_optimize'] = 'data-disable-optimize="1"';
			$settings['disable_autoplay'] = 'data-disable-autoplay="1"';
		}

		if (
			isset( $attributes['jsonld'] ) &&
			( 'false' === $attributes['jsonld'] )
		) {
			$settings['jsonld'] = 'data-disable-jsonld="true"';
		}

		if ( isset( $attributes['ratio'] ) ) {
			$settings['ratio'] = 'data-ratio="' . $attributes['ratio'] . '"';
		}

		if ( isset( $attributes['volume'] ) ) {
			$settings['volume'] = 'data-volume="' . $attributes['volume'] . '"';
		}

		$template = $this->video_markup_template( $settings );

		return wp_kses( $template, $this->allowed_video_html() );
	}

	/**
	 * Create Routes for Settings API.
	 */
	function routes() {
		$route_namespace = $this->api_route . '/' . $this->api_version;

		register_rest_route(
			$route_namespace, '/videos/find-tags', array(
				'methods'             => 'GET',
				'callback'            => array( $this->api, 'find_legacy_embeds' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);

		register_rest_route(
			$route_namespace, '/videos/replace-tags', array(
				'methods'             => 'POST',
				'callback'            => array( $this->api, 'replace_legacy_embed' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
	}
}
