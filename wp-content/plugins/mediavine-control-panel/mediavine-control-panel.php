<?php
/**
 * Primary file for MCP.
 *
 * @category     WordPress_Plugin
 * @package      Mediavine Control Panel
 * @author       Mediavine
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link         https://www.mediavine.com
 *
 * Plugin Name: Mediavine Control Panel
 * Plugin URI: https://www.mediavine.com/
 * Description: Manage your ads, analytics and more with our lightweight plugin!
 * Version: 2.8.0
 * Requires at least: 4.4
 * Requires PHP: 5.6
 * Author: mediavine
 * Author URI: https://www.mediavine.com
 * Text Domain: mcp
 * License: GPL2
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This plugin requires WordPress' );
}

// Autoload via Composer.
require_once __DIR__ . '/vendor/autoload.php';

add_action( 'admin_notices', 'mcp_incompatible_notice' );

if ( mcp_is_compatible() ) {
	// Define correct basename for usage in plugin
	if ( ! defined( 'MCP_PLUGIN_DIR' ) ) {
		define( 'MCP_PLUGIN_DIR', __DIR__ );
	}
	if ( ! defined( 'MCP_PLUGIN_BASE' ) ) {
		define( 'MCP_PLUGIN_BASE', plugin_basename( __FILE__ ) );
	}

	/**
	 * Extends core WP functions that only work in admin to front-end.
	 *
	 * Using `get_plugins()` and `is_plugin_active()` in AMP functionality.
	 * Using `deactivate_plugins()` in version check.
	 *
	 * @todo Remove this or put it downstream where it's used. We want to limit this, not make it global.
	 */
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if ( class_exists( 'MV_Control_Panel' ) ) {
		// instantiate the plugin class.
		$mvcp = new MV_Control_Panel();
		$mvcp->init();
	}
}
