<?php
/**
* This file represents an example of the code that themes would use to register
* the required plugins.
*
* It is expected that theme authors would copy and paste this code into their
* functions.php file, and amend to suit.
*
* @package    TGM-Plugin-Activation
* @subpackage Example
* @version    2.4.1
* @author     Thomas Griffin
* @author     Gary Jones
* @copyright  Copyright (c) 2011, Thomas Griffin
* @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
* @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
*/

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'seolounge_register_required_plugins' );
function seolounge_register_required_plugins() {
	$plugins = array(

		// Contact Form 7.
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => true,
		),

		// WooCommerce.
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),

	);

	$args = array(
		'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . network_site_url(),
		'timeout'    => 30,
	);

	$response = wp_remote_get( 'https://api.radiantthemes.com/plugins/seolounge/version.php', $args );

	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( 'success' === get_option( 'radiant_purchase_validation', '' ) ) {
		$updated_plugin_list = array_merge( $data, $plugins );
	} else {
		$updated_plugin_list = $plugins;
	}


	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> true,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);

	tgmpa( $updated_plugin_list, $config );

}
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( $disable_updater = true );
}
