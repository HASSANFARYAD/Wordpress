<?php
namespace Mediavine\Control_Panel;

class Admin_Init extends \MV_Control_Panel {

	/**
	 * Admin_Init constructor.
	 */
	function __construct() {
		$this->nonce_key = __NAMESPACE__ . '_nonce';
	}

	/**
	 *
	 *
	 * @return array
	 */
	private static function localize() {
		$access_token = null;
		$token_id     = null;

		$token_data = \Mediavine\MCP\Settings::read( 'mcp-services-api-token' );

		if ( isset( $token_data->value ) ) {
			$access_token = $token_data->value;
			$token_id     = $token_data->id;
		}

		$user = wp_get_current_user();

		$idstring = \base64_encode(
			wp_json_encode(
				array(
					'login' => $user->user_login,
					'id'    => $user->ID,
				)
			)
		);

		return array(
			'root'              => esc_url_raw( rest_url() ),
			'nonce'             => wp_create_nonce( 'wp_rest' ),
			'asset_url'         => self::assets_url() . 'admin/ui/build/',
			'admin_url'         => esc_url_raw( admin_url() ),
			'mcp_api_token'     => $access_token,
			'platform_auth_url' => 'https://localhost:3000/#auth=' . $idstring . '&redirect=' . esc_url_raw( admin_url() . 'options-general.php?page=mediavine_amp_settings' ),
			'platform_api_root' => 'https://publisher-identity.mediavine.com/',
		);
	}

	/**
	 *
	 *
	 * @param $hook
	 */
	function admin_enqueue( $hook ) {
		// Globally unique handle for script
		$handle = '/mv-mcp.js';

		// Get script URL, or local URL if in dev mode
		$script_url = self::assets_url() . 'admin/ui/build/app.build.' . self::VERSION . '.js';
		if ( apply_filters( 'mv_create_dev_mode', false ) ) {
			$script_url = '//localhost:3001/app.build.' . self::VERSION . '.js';
		}

		// Get correct dependencies based of it we're in Gutenberg or not
		$deps = array();
		if ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
			$deps = array_merge( $deps, array( 'wp-plugins', 'wp-i18n', 'wp-element' ) );
		}

		// Register script
		wp_register_script( self::PLUGIN_DOMAIN . $handle, $script_url, $deps, self::VERSION, true );
		wp_localize_script( self::PLUGIN_DOMAIN . $handle, 'mvMCPApiSettings', self::localize() );
		wp_enqueue_script( self::PLUGIN_DOMAIN . $handle );

		// Pull Proxima Nova from CDN using correct protocol
		$proxima_nova_cdn = 'http://cdn.mediavine.com/fonts/ProximaNova/stylesheet.css';
		if ( is_ssl() ) {
			$proxima_nova_cdn = 'https://cdn.mediavine.com/fonts/ProximaNova/stylesheet.css';
		}

		// This handle should match other plugins so we only render one copy
		wp_enqueue_style( 'mv-font/proxima-nova', $proxima_nova_cdn );
	}

	/**
	 *
	 *
	 * @param $id
	 */
	function video_shortcode_div( $id ) {
		if ( 'content' !== $id ) {
			return;
		}
		?>
			<div data-shortcode="mv_video"></div>
			<div data-shortcode="mv_playlist"></div>
		<?php
	}

	/**
	 *
	 *
	 * @param $mceInit
	 * @return mixed
	 */
	function add_tmce_stylesheet( $mceInit ) {
		if ( empty( $mceInit['content_css'] ) ) {
			$mceInit['content_css'] = '';
		}
		$mceInit['content_css'] .= ', ' . self::assets_url() . 'admin/ui/public/mcp-tinymce.css?' . '0.1.1';

		return $mceInit;
	}

	/**
	 * Gets the value of a field after validating nonce.
	 *
	 * @param array $field Key to check from $_POST array
	 * @param string|int $action Should give context to what is taking place and be the same when nonce was created.
	 * @return mixed $value
	 */
	private function field_value( $field, $action = -1 ) {
		if ( empty( $_POST[ $this->nonce_key ] ) ) {
			return null;
		}

		if ( ! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_POST[ $this->nonce_key ] ) ),
			$action
		) ) {
			die();
		}

		$value = isset( $_POST[ $field ] ) ? sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) : null;

		if ( is_null( $value ) || empty( $value ) ) {
			return null;
		}

		return $value;
	}

	/**
	 * Renders a div for the React app for category settings to render from.
	 *
	 * The React app will render an input with name="mv_category_video_settings"
	 * which is submitted via the form. The result is a JSON blob matching one of
	 * the following formats:
	 *
	 * - Video: { slug: 'slug', title: 'Title', type: 'video' }
	 * - Playlist: { slug: 1, title: 'Title', type: 'playlist' }
	 * - Up next playlist: { slug: 'playlist_upnext', title: 'Up Next Playlist', type: 'playlist' }
	 *
	 * If the user selects "none" as an option, the form value is an empty string.
	 */
	function category_edit_form( $category ) {
		$meta = get_term_meta( $category->term_id, 'mv_category_video_settings', true );
		?>
			<div
				id="mv-category-settings"
				data-mv-initial-value="<?php echo esc_attr( $meta ); ?>"
			></div>
			<?php wp_nonce_field( 'category_video', $this->nonce_key ); ?>
		<?php
	}

	/**
	 * Callback to save Category video settings when a user saves a category.
	 */
	function save_category_meta( $term_id ) {
		if ( empty( $_POST[ $this->nonce_key ] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $this->nonce_key ] ) ), 'category_video' ) ) {
			return false;
		}

		$value = $this->field_value( 'mv_category_video_settings', 'category_video' );
		update_term_meta( $term_id, 'mv_category_video_settings', $value );
	}

	/**
	 *
	 *
	 * @param $categories
	 * @return array
	 */
	function block_categories( $categories ) {
		$merged = array_merge(
			$categories,
			array(
				array(
					'slug'  => 'mediavine-control-panel',
					'title' => __( 'Mediavine Control Panel', 'mediavine' ),
					'icon'  => '',
				),
				array(
					'slug'  => 'mediavine-video',
					'title' => __( 'Mediavine Video', 'mediavine' ),
					'icon'  => 'video',
				),
			)
		);
		return $merged;
	}

	/**
	 *
	 */
	function init() {
		add_action( 'media_buttons', array( $this, 'video_shortcode_div' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'add_tmce_stylesheet' ) );
		add_action( 'category_edit_form', array( $this, 'category_edit_form' ), 10 );
		add_action( 'edited_category', array( $this, 'save_category_meta' ), 10, 2 );
		add_action( 'create_category', array( $this, 'save_category_meta' ), 10, 2 );
		add_filter( 'block_categories', array( $this, 'block_categories' ), 10, 1 );
	}
}
