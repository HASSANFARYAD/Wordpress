<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * @package seolounge
 */

// Check if Redux installed.
if ( ! class_exists( 'Redux' ) ) {
	return;
}
// This is your option name where all the Redux data is stored.
$opt_name = 'seolounge_theme_option';

/**
 * SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = array(
	// TYPICAL -> Change these values as you need/desire.
	'opt_name'             => $opt_name,
	'disable_tracking'     => true,
	'display_name'         => $theme->get( 'Name' ),
	'display_version'      => esc_html__( 'Powered By: RadiantThemes Customizer', 'seolounge' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'seolounge' ),
	'page_title'           => esc_html__( 'Theme Options', 'seolounge' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-hammer',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 61,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'dashicons-hammer',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'footer_credit'        => $theme->get( 'Name' ),
	'show_import_export'   => true,
	'show_options_object'  => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'database'             => '',
	'use_cdn'              => true,
	'ajax_save'            => true,
	'hints'                => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
);
Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 *
 * ---> START SECTIONS
 *
 */

/**
 * As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START Basic Fields.
Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'General', 'seolounge' ),
		'icon'  => 'el el-cog',
		'id'    => 'theme-general',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Layout', 'seolounge' ),
		'icon'       => 'el el-screen',
		'id'         => 'layout',
		'subsection' => true,
		'fields'     => array(

			// Layout Info.
			array(
				'id'    => 'info_layout',
				'type'  => 'info',
				'title' => esc_html__( 'Layout Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Layout Type.
			array(
				'id'       => 'layout_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Layout Type', 'seolounge' ),
				'subtitle' => esc_html__( 'Select layout type. (Please Note: Please set "Row stretch" to "Default" from WPBakery Page Builder "Row Settings"/"Section Settings" for "Boxed" layout.)', 'seolounge' ),
				'options'  => array(
					'full-width' => 'Full Width',
					'boxed'      => 'Boxed',
				),
				'default'  => 'full-width',
			),

			// Layout Type Boxed Width.
			array(
				'id'            => 'layout_type_boxed_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Boxed Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select Boxed width. Min is 1000px, Max is 1400px and Default is 1200px.', 'seolounge' ),
				'min'           => 1000,
				'step'          => 10,
				'max'           => 1400,
				'default'       => 1200,
				'display_value' => 'text',
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Boxed Background Color.
			array(
				'id'       => 'layout_type_boxed_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Boxed Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for Boxed layout. (Please Note: This can be overright by setting section background color.)', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-website-layout',
				),
				'required' => array(
					array(
						'layout_type',
						'equals',
						'boxed',
					),
				),
			),

			// Layout Type Body Background.
			array(
				'id'       => 'layout_type_body_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Body Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose a background for the theme. (Please Note: This can be overright by setting section background color.)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Color', 'seolounge' ),
		'icon'       => 'el el-brush',
		'id'         => 'color',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_color_scheme',
				'type'  => 'info',
				'title' => esc_html__( 'Color Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Color Scheme Type.
			array(
				'id'       => 'color_scheme_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Color Scheme Type', 'seolounge' ),
				'subtitle' => esc_html__( 'Select color scheme type', 'seolounge' ),
				'options'  => array(
					'predefined-color' => 'Predefined Color',
					'custom-color'     => 'Custom Color',
				),
				'default'  => 'predefined-color',
			),

			// Color Scheme Type Predefined.
			array(
                'id'       => 'color_scheme_type_predefined',
                'type'     => 'palette',
                'title'    => esc_html__( 'Select Theme Color', 'seolounge' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'seolounge' ),
                'palettes' => array(
                    '#1d4fce'     => array(
                        '#1d4fce',
                    ),
                    '#0992c9'     => array(
                        '#0992c9',
                    ),
                    '#556df4'     => array(
                        '#556df4',
                    ),
                    '#0b88ee'     => array(
                        '#0b88ee',
                    ),
                    '#3367d6'     => array(
                        '#3367d6',
                    ),
                    '#0a88ee'     => array(
                        '#0a88ee',
                    ),
                    '#253cac'     => array(
                        '#253cac',
                    ),
                    '#0a88ee'     => array(
                        '#0a88ee',
                    ),
                    '#3367d6'     => array(
                        '#3367d6',
                    ),
                    '#ff1053'     => array(
                        '#ff1053',
                    ),

                    '#556df4'     => array(
                        '#556df4',
                    ),
                    '#fe002f'     => array(
                        '#fe002f',
                    ),
                    '#1d4fce'     => array(
                        '#1d4fce',
                    ),
                    '#ff871c'     => array(
                        '#ff871c',
                    ),
                    '#fec00a'     => array(
                        '#fec00a',
                    ),
                    '#ef173b'     => array(
                        '#ef173b',
                    ),
                    '#ea0026'     => array(
                        '#ea0026',
                    ),
                    '#bf9e58'     => array(
                        '#bf9e58',
                    ),
                    '#ee363f'     => array(
                        '#ee363f',
                    ),
                    '#ef403b'     => array(
                        '#ef403b',
                    ),
                    '#27ae60'     => array(
                        '#27ae60',
                    ),
                    '#25c16f'     => array(
                        '#25c16f',
                    ),
                    '#2cb66a'     => array(
                        '#2cb66a',
                    ),
                    '#00c57c'     => array(
                        '#00c57c',
                    ),
                    '#0abc5f'     => array(
                        '#0abc5f',
                    ),
                ),
                'default'  => '#0abc5f',
                'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'predefined-color',
					),
				),
            ),

			// Color Scheme Type Custom.
			array(
				'id'       => 'color_scheme_type_custom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Select Theme Color', 'seolounge' ),
				'subtitle' => esc_html__( 'From here you can choose theme color for your website. (Please Note: This will set preset color scheme on your theme. You can replace color(s) from each element settings.)', 'seolounge' ),
				'desc'     => esc_html__( 'Select alpha value if you want to use alpha in selected areas.', 'seolounge' ),
				'default'  => array(
					'color'  => '#2b65eb',
					'alpha'  => 0.85,
				),
				'required' => array(
					array(
						'color_scheme_type',
						'equals',
						'custom-color',
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Favicon', 'seolounge' ),
		'id'     => 'favicon',
		'icon'   => 'el el-bookmark-empty',
		'subsection' => true,
		'fields' => array(

			array(
				'id'       => 'favicon',
				'type'     => 'media',
				'title'    => esc_html__( 'Favicon', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload Favicon on your website. (.ico 32x32 pixels)', 'seolounge' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/images/Favicon-Default.ico',
				),
			),

			array(
				'id'    => 'apple-icon',
				'type'  => 'media',
				'title' => esc_html__( 'Apple Touch Icon', 'seolounge' ),
				'desc'  => esc_html__( 'apple-touch-icon.png 192x192 pixels', 'seolounge' ),
				'default'  => array(
					'url' => get_template_directory_uri() . '/images/Apple-Touch-Icon-192x192-Default.png',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Fonts', 'seolounge' ),
		'id'      => 'basic-settings',
		'icon'    => 'el el-fontsize',
		'subsection' => true,
		'fields'  => array(
			array(
				'id'             => 'general_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'General', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array( 'body' ),
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Rubik',
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#0f192d',
					'line-height' => '28px',
				),
			),

			array(
				'id'             => 'h1_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H1', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H1 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h1' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '40px',
					'color'          => '#0f192d',
					'line-height'    => '48px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h2_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H2', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H2 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h2' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '40px',
					'color'          => '#0f192d',
					'line-height'    => '48px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h3_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H3', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H3 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h3' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '40px',
					'color'          => '#0f192d',
					'line-height'    => '48px',
					'letter-spacing' => '-1px',
				),
			),

			array(
				'id'             => 'h4_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H4', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H4 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h4' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '30px',
					'color'          => '#0f192d',
					'line-height'    => '35px',
				),
			),

			array(
				'id'             => 'h5_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H5', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H5 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h5' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '18px',
					'color'          => '#0f192d',
					'line-height'    => '26px',
				),
			),

			array(
				'id'             => 'h6_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'H6', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font for all H6 tags of your website.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'font-weight'    => true,
				'font-style'     => true,
				'line-height'    => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-family'    => true,
				'color'          => true,
				'all_styles'     => false,
				'output'         => array( 'h6' ),
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '15px',
					'color'          => '#0f192d',
					'line-height'    => '26px',
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Custom Slug', 'seolounge' ),
		'icon'       => 'el el-folder-open',
		'id'    	 => 'custom_slug',
		'subsection' => true,
		'fields'     => array(

			// color info.
			array(
				'id'    => 'info_change_slug',
				'type'  => 'info',
				'title' => esc_html__( 'Change Custom Post Type Slug', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),
			array(
				'id'       => 'change_slug_portfolio',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio', 'seolounge' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'seolounge' ),
				'validate' => 'no_special_chars',
				'default'  => 'project',
			),
			array(
				'id'       => 'change_slug_team',
				'type'     => 'text',
				'title'    => esc_html__( 'Team', 'seolounge' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'seolounge' ),
				'validate' => 'no_special_chars',
				'default'  => 'team',
			),
			array(
				'id'       => 'change_slug_casestudies',
				'type'     => 'text',
				'title'    => esc_html__( 'Case Study', 'seolounge' ),
				'subtitle' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'seolounge' ),
				'validate' => 'no_special_chars',
				'default'  => 'case-studies',
			),
		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Preloader', 'seolounge' ),
		'icon'       => 'el el-hourglass',
		'id'    	 => 'preloader',
		'subsection' => true,
		'fields'     => array(

			// Preloader Info.
			array(
				'id'    => 'info_preloader',
				'type'  => 'info',
				'title' => esc_html__( 'Preloader Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Preloader Switch.
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Preloader', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to activate Preloader or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Preloader Style.
			array(
				'id'       => 'preloader_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Preloader Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Preloader. (Powered By: "SpinKit")', 'seolounge' ),
				'options'  => array(
					'rotating-plane'  => 'Rotating Plane',
					'double-bounce'   => 'Double Bounce',
					'wave'            => 'Wave',
					'wandering-cubes' => 'Wandering Cubes',
					'pulse'           => 'Pulse',
					'chasing-dots'    => 'Chasing Dots',
					'three-bounce'    => 'Three Bounce',
					'circle'          => 'Circle',
					'cube-grid'       => 'Cube Grid',
					'fading-circle'   => 'Fading Circle',
					'folding-cube'    => 'Folding Cube',
				),
				'default'  => 'wave',
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Color.
			array(
				'id'       => 'preloader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Preloader Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a color for the Preloader.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-circle .sk-child:before, .sk-circle .sk-child:before, .sk-cube-grid .sk-cube, .sk-fading-circle .sk-circle:before, .sk-folding-cube .sk-cube:before',
				),
				'required' => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

			// Preloader Timeout.
			array(
				'id'            => 'preloader_timeout',
				'type'          => 'slider',
				'title'         => esc_html__( 'Preloader Timeout', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 3000ms and Default is 500ms.', 'seolounge' ),
				'min'           => 100,
				'step'          => 100,
				'max'           => 3000,
				'default'       => 500,
				'display_value' => 'text',
				'required'      => array(
					array(
						'preloader_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Page Transition', 'seolounge' ),
		'icon'       => 'el el-magic',
		'id'    	 => 'page_transition',
		'subsection' => true,
		'fields'     => array(

			// Page Transition Info.
			array(
				'id'    => 'info_page_transition',
				'type'  => 'info',
				'title' => esc_html__( 'Page Transition Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Page Transition Switch.
			array(
				'id'       => 'page_transition_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Page Transition', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to activate Page Transition or not. (Please Note: Preloader option will not work if you enable this.)', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Page Transition Background Color.
			array(
				'id'       => 'page_transition_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.page-transition-layer',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

			// Page Transition Loader Color.
			array(
				'id'       => 'page_transition_loader_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Loader Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a color for the Page Transition Loader.', 'seolounge' ),
				'default'  => array(
					'color' => '#0abc5f',
					'alpha' => 1,
				),
				'output'   => array(
					'stroke' => '.page-transition-layer-spinner .page-transition-layer-spinner-path',
				),
				'required' => array(
					array(
						'page_transition_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll To Top', 'seolounge' ),
		'icon'       => 'el el-chevron-up',
		'id'    	 => 'scroll_to_top',
		'subsection' => true,
		'fields'     => array(

			// Scroll To Top Info.
			array(
				'id'    => 'info_scroll_to_top',
				'type'  => 'info',
				'title' => esc_html__( 'Scroll To Top Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Scroll To Top Switch.
			array(
				'id'       => 'scroll_to_top_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Scroll To Top', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to activate Scroll To Top or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Scroll To Top Direction.
			array(
				'id'       => 'scroll_to_top_direction',
				'type'     => 'select',
				'title'    => esc_html__( 'Direction', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Direction of the Scroll To Top.', 'seolounge' ),
				'options'  => array(
					'left'    => 'Left',
					'right'   => 'Right',
				),
				'default'  => 'left',
				'required'      => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

			// Scroll To Top Background Color.
			array(
				'id'       => 'scroll_to_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Scroll To Top.', 'seolounge' ),
				'output'   => array(
					'background-color' => '.scrollup',
				),
				'required'      => array(
					array(
						'scroll_to_top_switch',
						'equals',
						true,
					),
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'GDPR Notice', 'seolounge' ),
		'icon'       => 'el el-exclamation-sign',
		'id'    	 => 'gdpr_notice',
		'subsection' => true,
		'fields'     => array(

			// GDPR Notice Info.
			array(
				'id'    => 'info_gdpr_notice',
				'type'  => 'info',
				'title' => esc_html__( 'GDPR Notice Options', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// GDPR Notice Switch.
			array(
				'id'       => 'gdpr_notice_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate GDPR Notice', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to activate GDPR Notice or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// GDPR Notice Background Color.
			array(
				'id'       => 'gdpr_notice_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the GDPR Notice.', 'seolounge' ),
				'default'  => array(
					'color' => '#3b4354',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.gdpr-notice',
				),
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Typography.
			array(
				'id'             => 'gdpr_notice_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'GDPR Notice Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font of GDPR Notice.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'output'         => array(
				    '.gdpr-notice p'
				),
				'units'          => 'px',
				'default'        => array(
					'font-weight' => '400',
					'font-size'   => '15px',
					'color'       => '#ffffff',
					'line-height' => '28px',
				),
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Content.
			array(
				'id'       => 'gdpr_notice_content',
				'type'     => 'textarea',
				'title'    => esc_html__( 'GDPR Notice Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on GDPR Notice.', 'seolounge' ),
				'default'  => "Our website use cookies to improve and personalize your experience and to display advertisements (if any). Our website may also include cookies from third parties like Google Adsense, Google Analytics, YouTube. By using this website, you consent to the use of cookies. We've updated our Privacy Policy, please click on the button beside to check our Privacy Policy.",
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Text.
			array(
				'id'       => 'gdpr_notice_button_text',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Button Text for GDPR Notice button.', 'seolounge' ),
				'default'  => 'Privacy Policy',
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Button Link.
			array(
				'id'       => 'gdpr_notice_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'GDPR Notice Button Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Button Link for GDPR Notice button.', 'seolounge' ),
				'default'  => '#',
				'required'      => array(
					array(
						'gdpr_notice_switch',
						'equals',
						true,
					),
				),
			),

			// GDPR Notice Remove Link.
			array(
			    'id'    => 'gdpr_notice_remove_link',
			    'type'  => 'info',
			    'style' => 'warning',
			    'desc'  => wp_kses_post( '<a href="' . esc_url( 'tools.php?page=remove_personal_data' ) . '" target="_blank">Click here</a> to forget a user.' ),
		    ),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Header', 'seolounge' ),
		'icon'  => 'el el-website',
		'id'    => 'header',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'General', 'seolounge' ),
		'icon'       => 'el el-cog-alt',
		'id'         => 'general',
		'subsection' => true,
		'fields'     => array(

			// Header Style Info.
			array(
				'id'    => 'info_header_style',
				'type'  => 'info',
				'title' => esc_html__( 'Header Style', 'seolounge' ),
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
			),

			// Header Style Options.
			array(
				'id'       => 'header-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Header Style (Header will be changed as per selection || N.B.: You can change header even from page to page).', 'seolounge' ),
				'options'  => array(
					'header-style-default' => array(
						'alt'   => esc_html__( 'Default Style', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Default.png' ),
						'title' => esc_html__( 'Default Style', 'seolounge' ),
					),
					'header-style-one'     => array(
						'alt'   => esc_html__( 'Style One', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-One.png' ),
						'title' => esc_html__( 'Style One', 'seolounge' ),
					),
					'header-style-two'     => array(
						'alt'   => esc_html__( 'Style Two', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Two.png' ),
						'title' => esc_html__( 'Style Two', 'seolounge' ),
					),
					'header-style-three'   => array(
						'alt'   => esc_html__( 'Style Three', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Three.png' ),
						'title' => esc_html__( 'Style Three', 'seolounge' ),
					),
					'header-style-four'    => array(
						'alt'   => esc_html__( 'Style Four', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Four.png' ),
						'title' => esc_html__( 'Style Four', 'seolounge' ),
					),
					'header-style-five'    => array(
						'alt'   => esc_html__( 'Style Five', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Five.png' ),
						'title' => esc_html__( 'Style Five', 'seolounge' ),
					),
					'header-style-six'     => array(
						'alt'   => esc_html__( 'Style Six', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Six.png' ),
						'title' => esc_html__( 'Style Six', 'seolounge' ),
					),
					'header-style-seven'   => array(
						'alt'   => esc_html__( 'Style Seven', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Seven.png' ),
						'title' => esc_html__( 'Style Seven', 'seolounge' ),
					),
					'header-style-eight'   => array(
						'alt'   => esc_html__( 'Style Eight', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eight.png' ),
						'title' => esc_html__( 'Style Eight', 'seolounge' ),
					),
					'header-style-nine'   => array(
						'alt'   => esc_html__( 'Style Nine', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Nine.png' ),
						'title' => esc_html__( 'Style Nine', 'seolounge' ),
					),
					'header-style-ten'   => array(
						'alt'   => esc_html__( 'Style Ten', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten', 'seolounge' ),
					),
					'header-style-eleven'   => array(
						'alt'   => esc_html__( 'Style Eleven', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Eleven.png' ),
						'title' => esc_html__( 'Style Eleven', 'seolounge' ),
					),
					'header-style-twelve'   => array(
						'alt'   => esc_html__( 'Style Twelve', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Twelve.png' ),
						'title' => esc_html__( 'Style Twelve', 'seolounge' ),
					),
					'header-style-thirteen'   => array(
						'alt'   => esc_html__( 'Style Thirteen', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Thirteen.png' ),
						'title' => esc_html__( 'Style Thirteen', 'seolounge' ),
					),
					'header-style-fourteen'   => array(
						'alt'   => esc_html__( 'Style Fourteen', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Header-Style-Fourteen.png' ),
						'title' => esc_html__( 'Style Fourteen', 'seolounge' ),
					),
				),
				'default'  => 'header-style-default',
			),
			/* ============================= */
			// START OF HEADER CART OPTIONS
			/* ============================= */

			// Header Cart Info.
			array(
				'id'    => 'header_cart_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Cart Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Cart Display.
			array(
				'id'       => 'header_cart_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Cart Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "cart" icon in header or not. (Please Note: Header "Style Default" will not work with this option.)', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			/* ============================= */
			// END OF HEADER CART OPTIONS
			/* ============================= */



			/* ============================= */
			// START OF HEADER DEFAULT OPTIONS
			/* ============================= */

			// Header Default Info.
			array(
				'id'    => 'header_default_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Default Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Default Header Main Background Color.
			array(
				'id'       => 'header_default_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header. (Applies for header "Style Default" only)', 'seolounge' ),
				'output'   => array(
					'background-color' => '.wraper_header.style-default .wraper_header_main',
				),
			),

			/* ============================= */
			// END OF HEADER DEFAULT OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER ONE OPTIONS
			/* ============================= */

			// Header One Info.
			array(
				'id'    => 'header_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header One Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header One Floating.
			array(
				'id'       => 'header_one_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header One Header Main Background Color.
			array(
				'id'       => 'header_one_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .wraper_header_main',
				),
			),

			// Header One Header Main Border Color.
			array(
				'id'       => 'header_one_header_main_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.2,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-one .wraper_header_main',
				),
			),

			// Header One Sticky.
			array(
				'id'       => 'header_one_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header One Sticky Header Main Background Color.
			array(
				'id'       => 'header_one_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-one .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_one_sticky',
						'equals',
						true,
					),
				),
			),

			// Header One Logo.
			array(
				'id'       => 'header_one_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header One Retina Logo.
			array(
				'id'       => 'header_one_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),
			
			// Header One Logo Width.
			array(
				'id'            => 'header_one_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header One Menu Typography.
			array(
				'id'             => 'header_one_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header One Submenu Typography.
			array(
				'id'             => 'header_one_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#0c121f',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header One Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_one_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header One Action Button Size.
			array(
				'id'            => 'header_one_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header One Action Button Cart Icon Color.
			array(
				'id'       => 'header_one_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-one .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header One Search Display.
			array(
				'id'       => 'header_one_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header One Action Button Search Icon Color.
			array(
				'id'       => 'header_one_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-one .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_one_search_display',
						'equals',
						true,
					),
				),
			),

			// Header One Search Style.
			array(
				'id'       => 'header_one_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_one_search_display',
						'equals',
						true,
					),
				),
			),

			// Header One Search Background Color.
			array(
				'id'       => 'header_one_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_one_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-one',
				),
			),

			// Header One Hamburger Display.
			array(
				'id'       => 'header_one_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header One Hamburger Mobile.
			array(
				'id'       => 'header_one_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Icon Style.
			array(
				'id'       => 'header_one_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_one_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-one .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Width.
			array(
				'id'            => 'header_one_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Hamburger Background.
			array(
				'id'       => 'header_one_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-one"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_one_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Display.
			array(
				'id'       => 'header_one_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header One Mobile Menu Icon Color.
			array(
				'id'       => 'header_one_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-one .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Background Color.
			array(
				'id'       => 'header_one_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-one"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Typography.
			array(
				'id'             => 'header_one_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-one"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header One Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_one_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-one"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_one_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER TWO OPTIONS
			/* ============================= */

			// Header Two Info.
			array(
				'id'    => 'header_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Two Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Two Floating.
			array(
				'id'       => 'header_two_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Two Header Main Background Color.
			array(
				'id'       => 'header_two_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .wraper_header_main',
				),
			),

			// Header Two Sticky.
			array(
				'id'       => 'header_two_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Two Sticky Header Main Background Color.
			array(
				'id'       => 'header_two_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-two .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_two_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Two Logo.
			array(
				'id'       => 'header_two_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Two Retina Logo.
			array(
				'id'       => 'header_two_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".  ', 'seolounge' ),
			),
			
			// Header Two Logo Width.
			array(
				'id'            => 'header_two_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Two Menu Typography.
			array(
				'id'             => 'header_two_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Two Submenu Typography.
			array(
				'id'             => 'header_two_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#454545',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Two Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_two_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Two Action Button Size.
			array(
				'id'            => 'header_two_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Two Action Button Cart Icon Color.
			array(
				'id'       => 'header_two_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-two .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Two Search Display.
			array(
				'id'       => 'header_two_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Two Action Button Search Icon Color.
			array(
				'id'       => 'header_two_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-two .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_two_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Search Style.
			array(
				'id'       => 'header_two_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_two_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Search Background Color.
			array(
				'id'       => 'header_two_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_two_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-two',
				),
			),

			// Header Two Hamburger Display.
			array(
				'id'       => 'header_two_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Two Hamburger Mobile.
			array(
				'id'       => 'header_two_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Icon Style.
			array(
				'id'       => 'header_two_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_two_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-two .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Width.
			array(
				'id'            => 'header_two_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 460px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 460,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Hamburger Background.
			array(
				'id'       => 'header_two_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-two"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_two_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Display.
			array(
				'id'       => 'header_two_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Two Mobile Menu Icon Color.
			array(
				'id'       => 'header_two_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-two .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Background Color.
			array(
				'id'       => 'header_two_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-two"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Typography.
			array(
				'id'             => 'header_two_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-two"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Two Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_two_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-two"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_two_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER THREE OPTIONS
			/* ============================= */

			// Header Three Info.
			array(
				'id'    => 'header_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Three Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Three Floating.
			array(
				'id'       => 'header_three_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Three Header Top Background Color.
			array(
				'id'       => 'header_three_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-three .wraper_header_top',
				),
			),

			// Header Three Header Top Border Color.
			array(
				'id'       => 'header_three_header_top_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Border Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.1,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-three .wraper_header_top',
				),
			),

			// Header Three Header Top Contact Phone.
			array(
				'id'       => 'header_three_header_top_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Phone', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( 'Call Us: 888-123-4567', 'seolounge' ),
			),

			// Header Three Header Top Contact Phone.
			array(
				'id'       => 'header_three_header_top_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Email', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( 'Email Us: info@example.com', 'seolounge' ),
			),

			// Header Three Header Main Background Color.
			array(
				'id'       => 'header_three_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-three .wraper_header_main',
				),
			),

			// Header Three Header Main Border Color.
			array(
				'id'       => 'header_three_header_main_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.1,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-three .wraper_header_main',
				),
			),

			// Header Three Sticky.
			array(
				'id'       => 'header_three_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Three Sticky Header Main Background Color.
			array(
				'id'       => 'header_three_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-three .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_three_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Three Logo.
			array(
				'id'       => 'header_three_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Three Retina Logo.
			array(
				'id'       => 'header_three_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),
			
			// Header Three Logo Width.
			array(
				'id'            => 'header_three_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Three Menu Typography.
			array(
				'id'             => 'header_three_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Three Submenu Typography.
			array(
				'id'             => 'header_three_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#0c121f',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Three Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_three_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Three Action Button Size.
			array(
				'id'            => 'header_three_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Three Action Button Cart Icon Color.
			array(
				'id'       => 'header_three_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-three .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Three Search Display.
			array(
				'id'       => 'header_three_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Three Action Button Search Icon Color.
			array(
				'id'       => 'header_three_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-three .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_three_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Search Style.
			array(
				'id'       => 'header_three_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_three_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Search Background Color.
			array(
				'id'       => 'header_three_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_three_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-three',
				),
			),

			// Header Three Hamburger Display.
			array(
				'id'       => 'header_three_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Three Hamburger Mobile.
			array(
				'id'       => 'header_three_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_three_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Hamburger Icon Style.
			array(
				'id'       => 'header_three_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_three_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_three_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-three .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_three_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Hamburger Width.
			array(
				'id'            => 'header_three_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_three_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Hamburger Background.
			array(
				'id'       => 'header_three_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-three"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_three_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Mobile Menu Display.
			array(
				'id'       => 'header_three_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Three Mobile Menu Icon Color.
			array(
				'id'       => 'header_three_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-three .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_three_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Mobile Menu Background Color.
			array(
				'id'       => 'header_three_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-three"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_three_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Mobile Menu Typography.
			array(
				'id'             => 'header_three_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-three"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_three_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Three Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_three_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-three"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_three_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER THREE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER FOUR OPTIONS
			/* ============================= */

			// Header Four Info.
			array(
				'id'    => 'header_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Four Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Four Floating.
			array(
				'id'       => 'header_four_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Four Header Main Background Color.
			array(
				'id'       => 'header_four_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-four .wraper_header_main',
				),
			),

			// Header Four Sticky.
			array(
				'id'       => 'header_four_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Four Sticky Header Main Background Color.
			array(
				'id'       => 'header_four_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-four .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_four_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Four Logo.
			array(
				'id'       => 'header_four_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website. (Applies for header "Style Four" only.)', 'seolounge' ),
			),

			// Header Four Retina Logo.
			array(
				'id'       => 'header_four_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),
			
			// Header Four Logo Width.
			array(
				'id'            => 'header_four_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Four Menu Typography.
			array(
				'id'             => 'header_four_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '17px',
					'color'          => '#ffffff',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Four Submenu Typography.
			array(
				'id'             => 'header_four_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#0c121f',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Four Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_four_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-four .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Four Action Button Size.
			array(
				'id'            => 'header_four_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 20px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 20,
				'display_value' => 'text',
			),

			// Header Four Action Button Cart Icon Color.
			array(
				'id'       => 'header_four_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-four .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Four Hamburger Display.
			array(
				'id'       => 'header_four_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Four Hamburger Mobile.
			array(
				'id'       => 'header_four_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_four_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Hamburger Icon Style.
			array(
				'id'       => 'header_four_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_four_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_four_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-four .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_four_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Hamburger Width.
			array(
				'id'            => 'header_four_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_four_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Hamburger Background.
			array(
				'id'       => 'header_four_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-four"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_four_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Mobile Menu Display.
			array(
				'id'       => 'header_four_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Four Mobile Menu Icon Color.
			array(
				'id'       => 'header_four_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-four .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_four_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Mobile Menu Background Color.
			array(
				'id'       => 'header_four_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-four"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_four_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Mobile Menu Typography.
			array(
				'id'             => 'header_four_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-four"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_four_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Four Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_four_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-four"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_four_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER FOUR OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER FIVE OPTIONS
			/* ============================= */

			// Header Five Info.
			array(
				'id'    => 'header_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Five Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Five Floating.
			array(
				'id'       => 'header_five_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Five Header Main Background Color.
			array(
				'id'       => 'header_five_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.75,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-five .wraper_header_main',
				),
			),

			// Header Five Sticky.
			array(
				'id'       => 'header_five_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Five Sticky Header Main Background Color.
			array(
				'id'       => 'header_five_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-five .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_five_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Five Logo.
			array(
				'id'       => 'header_five_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Five Retina Logo.
			array(
				'id'       => 'header_five_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),
			
			// Header Five Logo Width.
			array(
				'id'            => 'header_five_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Five Menu Typography.
			array(
				'id'             => 'header_five_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '16px',
					'color'          => '#0c121f',
					'line-height'    => '28px',
				),
				'output'         => array(
					'.wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Five Submenu Typography.
			array(
				'id'             => 'header_five_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#0c121f',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Five Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_five_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-five .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Five Action Button Size.
			array(
				'id'            => 'header_five_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Five Action Button Cart Icon Color.
			array(
				'id'       => 'header_five_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#454545',
				'output'   => array(
					'.wraper_header.style-five .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Five Search Display.
			array(
				'id'       => 'header_five_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Five Search Style.
			array(
				'id'       => 'header_five_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_five_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Action Button Search Icon Color.
			array(
				'id'       => 'header_five_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#454545',
				'output'   => array(
					'.wraper_header.style-five .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_five_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Search Background Color.
			array(
				'id'       => 'header_five_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_five_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-five',
				),
			),

			// Header Five Hamburger Display.
			array(
				'id'       => 'header_five_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Five Hamburger Mobile.
			array(
				'id'       => 'header_five_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_five_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Hamburger Icon Style.
			array(
				'id'       => 'header_five_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_five_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_five_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#454545',
				'output'   => array(
					'.wraper_header.style-five .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_five_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Hamburger Width.
			array(
				'id'            => 'header_five_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_five_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Hamburger Background.
			array(
				'id'       => 'header_five_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-five"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_five_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Mobile Menu Display.
			array(
				'id'       => 'header_five_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Five Mobile Menu Icon Color.
			array(
				'id'       => 'header_five_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-five .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_five_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Mobile Menu Background Color.
			array(
				'id'       => 'header_five_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-five"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_five_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Mobile Menu Typography.
			array(
				'id'             => 'header_five_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-five"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_five_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Five Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_five_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-five"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_five_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER FIVE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER SIX OPTIONS
			/* ============================= */

			// Header Six Info.
			array(
				'id'    => 'header_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Six Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Six Floating.
			array(
				'id'       => 'header_six_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Six Header Main Background Color.
			array(
				'id'       => 'header_six_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .wraper_header_main',
				),
			),

			// Header Six Sticky.
			array(
				'id'       => 'header_six_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Six Sticky Header Main Background Color.
			array(
				'id'       => 'header_six_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-six .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_six_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Six Logo.
			array(
				'id'       => 'header_six_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Six Retina Logo.
			array(
				'id'       => 'header_six_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),

			// Header Six Action Button Size.
			array(
				'id'            => 'header_six_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Six Action Button Cart Icon Color.
			array(
				'id'       => 'header_six_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-six .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Six Search Display.
			array(
				'id'       => 'header_six_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Six Action Button Search Icon Color.
			array(
				'id'       => 'header_six_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-six .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_six_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Search Style.
			array(
				'id'       => 'header_six_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_six_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Six Search Background Color.
			array(
				'id'       => 'header_six_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_six_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-six',
				),
			),

			// Header Six Menu.
			array(
				'id'       => 'header_six_menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want to display menu or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Six Menu Icon Color.
			array(
				'id'       => 'header_six_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-six .header_main_action ul > li.header-full-width-menu i',
				),
				'required' => array(
					array(
						'header_six_menu',
						'equals',
						true,
					),
				),
			),

			// Header Six Menu Typography.
			array(
				'id'             => 'header_six_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Cinzel',
					'font-weight'    => '400',
					'font-size'      => '28px',
					'color'          => '#ffffff',
					'line-height'    => '30px',
				),
				'output'         => array(
					'.wraper_header.style-six .top-bar-menu .menu-minimal-header-menu-container',
				),
				'required' => array(
					array(
						'header_six_menu',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER SIX OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER SEVEN OPTIONS
			/* ============================= */

			// Header Seven Info.
			array(
				'id'    => 'header_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Seven Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Seven Floating.
			array(
				'id'       => 'header_seven_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Seven Header Main Background Color.
			array(
				'id'       => 'header_seven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-seven .wraper_header_main',
				),
			),

			// Header Seven Sticky.
			array(
				'id'       => 'header_seven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Seven Sticky Header Main Background Color.
			array(
				'id'       => 'header_seven_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-seven .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_seven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Seven Logo.
			array(
				'id'       => 'header_seven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Seven Retina Logo.
			array(
				'id'       => 'header_seven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),

			// Header Seven Menu.
			array(
				'id'       => 'header_seven_menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want to display menu or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Seven Menu Typography.
			array(
				'id'             => 'header_seven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Cinzel',
					'font-weight'    => '400',
					'font-size'      => '28px',
					'color'          => '#ffffff',
					'line-height'    => '30px',
				),
				'output'         => array(
					'.wraper_header.style-seven .top-bar-menu .menu-minimal-header-menu-container',
				),
				'required' => array(
					array(
						'header_seven_menu',
						'equals',
						true,
					),
				),
			),

			// Header Seven Action Button Size.
			array(
				'id'            => 'header_seven_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Seven Action Button Cart Icon Color.
			array(
				'id'       => 'header_seven_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#0c121f',
				'output'   => array(
					'.wraper_header.style-seven .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Seven Search Display.
			array(
				'id'       => 'header_seven_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Seven Action Button Search Icon Color.
			array(
				'id'       => 'header_seven_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#0c121f',
				'output'   => array(
					'.wraper_header.style-seven .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_seven_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Search Style.
			array(
				'id'       => 'header_seven_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_seven_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Search Background Color.
			array(
				'id'       => 'header_seven_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_seven_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-seven',
				),
			),

			// Header Seven Hamburger Display.
			array(
				'id'       => 'header_seven_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Seven Hamburger Mobile.
			array(
				'id'       => 'header_seven_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_seven_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Hamburger Icon Style.
			array(
				'id'       => 'header_seven_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_seven_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_seven_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#0c121f',
				'output'   => array(
					'.wraper_header.style-seven .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_seven_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Hamburger Width.
			array(
				'id'            => 'header_seven_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_seven_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Seven Hamburger Background.
			array(
				'id'       => 'header_seven_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-seven"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_seven_hamburger_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER SEVEN OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER EIGHT OPTIONS
			/* ============================= */

			// Header Eight Info.
			array(
				'id'    => 'header_eight_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eight Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Eight Floating.
			array(
				'id'       => 'header_eight_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Eight Header Main Background Color.
			array(
				'id'       => 'header_eight_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .wraper_header_main',
				),
			),

			// Header Eight Header Main Border Color.
			array(
				'id'       => 'header_eight_header_main_border_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Border Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.07,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_header.style-eight .wraper_header_main',
				),
			),

			// Header Eight Sticky.
			array(
				'id'       => 'header_eight_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Eight Sticky Header Main Background Color.
			array(
				'id'       => 'header_eight_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eight .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_eight_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eight Logo.
			array(
				'id'       => 'header_eight_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Eight Retina Logo.
			array(
				'id'       => 'header_eight_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),

			// Header Eight Action Button Size.
			array(
				'id'            => 'header_eight_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Action Button Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 20px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 20,
				'display_value' => 'text',
			),

			// Header Eight Action Button Cart Icon Color.
			array(
				'id'       => 'header_eight_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#030712',
				'output'   => array(
					'.wraper_header.style-eight .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Eight Search Display.
			array(
				'id'       => 'header_eight_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eight Action Button Search Icon Color.
			array(
				'id'       => 'header_eight_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#030712',
				'output'   => array(
					'.wraper_header.style-eight .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_eight_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Search Style.
			array(
				'id'       => 'header_eight_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_eight_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Search Background Color.
			array(
				'id'       => 'header_eight_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_eight_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-eight',
				),
			),

			// Header Eight Hamburger Display.
			array(
				'id'       => 'header_eight_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eight Hamburger Mobile.
			array(
				'id'       => 'header_eight_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_eight_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Hamburger Icon Style.
			array(
				'id'       => 'header_eight_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_eight_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_eight_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#030712',
				'output'   => array(
					'.wraper_header.style-eight .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_eight_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Hamburger Width.
			array(
				'id'            => 'header_eight_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_eight_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Eight Hamburger Background.
			array(
				'id'       => 'header_eight_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-eight"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_eight_hamburger_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER EIGHT OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER NINE OPTIONS
			/* ============================= */

			// Header Nine Info.
			array(
				'id'    => 'header_nine_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Nine Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Nine Floating.
			array(
				'id'       => 'header_nine_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Nine Header Main Background Color.
			array(
				'id'       => 'header_nine_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-nine .wraper_fullwidth_menu',
				),
			),

			// Header Nine Logo.
			array(
				'id'       => 'header_nine_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Nine Retina Logo.
			array(
				'id'       => 'header_nine_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),

			// Header Nine Header Main Contact Email.
			array(
				'id'       => 'header_nine_header_main_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Email', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Nine" only.', 'seolounge' ),
				'default'  => esc_html__( 'Email Us: info@example.com', 'seolounge' ),
			),

			// Header Nine Menu Typography.
			array(
				'id'             => 'header_nine_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '700',
					'font-size'      => '40px',
					'color'          => '#252525',
					'line-height'    => '47px',
					'letter-spacing' => '-1px',
				),
				'output'         => array(
					'.wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav',
				),
			),

			// Header Nine Submenu Typography.
			array(
				'id'             => 'header_nine_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#252525',
					'line-height'    => '23px',
				),
				'output'         => array(
					'.wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav ul li ul',
				),
			),

			// Header Nine Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_nine_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav ul li a:hover, .wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav ul li.current-menu-item > a, .wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav ul li.current-menu-parent > a, .wraper_header.style-nine .wraper_fullwidth_menu .full-inner nav ul li.current-menu-ancestor > a'),
			),

			// Header Nine Action Button Size.
			array(
				'id'            => 'header_nine_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Cart Icon Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Nine Action Button Cart Icon Color.
			array(
				'id'       => 'header_nine_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#030712',
				'output'   => array(
					'.wraper_header.style-nine .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Nine Search Display.
			array(
				'id'       => 'header_nine_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Nine Action Button Search Icon Color.
			array(
				'id'       => 'header_nine_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#030712',
				'output'   => array(
					'.wraper_header.style-nine .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_nine_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Nine Search Style.
			array(
				'id'       => 'header_nine_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_nine_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Nine Search Background Color.
			array(
				'id'       => 'header_nine_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_nine_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-nine',
				),
			),

			/* ============================= */
			// END OF HEADER NINE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER TEN OPTIONS
			/* ============================= */

			// Header Ten Info.
			array(
				'id'    => 'header_ten_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Ten Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Ten Floating.
			array(
				'id'       => 'header_ten_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Ten Header Top Background Color.
			array(
				'id'       => 'header_ten_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_top',
				),
			),

			// Header Ten Header Top Contact Phone.
			array(
				'id'       => 'header_ten_header_top_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Phone', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( 'Call Us: <a href="tel:888-123-4567">888-123-4567</a>', 'seolounge' ),
			),

			// Header Ten Header Top Contact Email.
			array(
				'id'       => 'header_ten_header_top_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Email', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( 'Email Us: <a href="mailto:info@example.com">info@example.com</a>', 'seolounge' ),
			),

			// Header Ten Logo.
			array(
				'id'       => 'header_ten_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Ten Retina Logo.
			array(
				'id'       => 'header_ten_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),

			// Header Ten Header Main Background Color.
			array(
				'id'       => 'header_ten_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#bf9e58',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .wraper_header_main',
				),
			),

			// Header Ten Sticky.
			array(
				'id'       => 'header_ten_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Ten Sticky Header Main Background Color.
			array(
				'id'       => 'header_ten_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#bf9e58',
					'alpha' => 0.9,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-ten .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_ten_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Ten Menu Typography.
			array(
				'id'             => 'header_ten_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '500',
					'font-size'      => '13px',
					'color'          => '#ffffff',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Ten Submenu Typography.
			array(
				'id'             => 'header_ten_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Rubik',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#454545',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Ten Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_ten_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-ten .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Ten Action Button Size.
			array(
				'id'            => 'header_ten_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 18px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 18,
				'display_value' => 'text',
			),

			// Header Ten Action Button Cart Icon Color.
			array(
				'id'       => 'header_ten_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-ten .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Ten Search Display.
			array(
				'id'       => 'header_ten_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Ten Action Button Search Icon Color.
			array(
				'id'       => 'header_ten_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-ten .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_ten_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Search Style.
			array(
				'id'       => 'header_ten_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_ten_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Search Background Color.
			array(
				'id'       => 'header_ten_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_ten_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-ten',
				),
			),

			// Header Ten Hamburger Display.
			array(
				'id'       => 'header_ten_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Ten Hamburger Mobile.
			array(
				'id'       => 'header_ten_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_ten_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Hamburger Icon Style.
			array(
				'id'       => 'header_ten_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_ten_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_ten_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-ten .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_ten_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Hamburger Width.
			array(
				'id'            => 'header_ten_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 600px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 600,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_ten_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Hamburger Background.
			array(
				'id'       => 'header_ten_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-ten"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_ten_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Display.
			array(
				'id'       => 'header_ten_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Ten Mobile Menu Icon Color.
			array(
				'id'       => 'header_ten_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-ten .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Background Color.
			array(
				'id'       => 'header_ten_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-ten"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Typography.
			array(
				'id'             => 'header_ten_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-ten"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Ten Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_ten_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-ten"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_ten_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER TEN OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER ELEVEN OPTIONS
			/* ============================= */

			// Header Eleven Info.
			array(
				'id'    => 'header_eleven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Eleven Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Eleven Floating.
			array(
				'id'       => 'header_eleven_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eleven Header Main Background Color.
			array(
				'id'       => 'header_eleven_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .wraper_header_main',
				),
			),

			// Header Eleven Sticky.
			array(
				'id'       => 'header_eleven_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Eleven Sticky Header Main Background Color.
			array(
				'id'       => 'header_eleven_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_eleven_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Logo.
			array(
				'id'       => 'header_eleven_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Eleven Retina Logo.
			array(
				'id'       => 'header_eleven_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".  ', 'seolounge' ),
			),
			
			// Header Eleven Logo Width.
			array(
				'id'            => 'header_eleven_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Eleven Menu Typography.
			array(
				'id'             => 'header_eleven_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#0c121f',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Eleven Submenu Typography.
			array(
				'id'             => 'header_eleven_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#454545',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Eleven Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_eleven_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-eleven .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Eleven Action Button One Display.
			array(
				'id'       => 'header_eleven_action_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Action Button One', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Action Button One" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eleven Action Button One Color.
			array(
				'id'       => 'header_eleven_action_button_one_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Action Button One Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for Action Button One.', 'seolounge' ),
				'default'  => array(
					'color' => '#4eafcb',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .header_main_action_buttons .btn.btn-one',
				),
				'required' => array(
					array(
						'header_eleven_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Action Button One Text.
			array(
				'id'       => 'header_eleven_action_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'seolounge' ),
				'default'  => esc_html__( 'Send Free Trial', 'seolounge' ),
				'required' => array(
					array(
						'header_eleven_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Action Button One Link.
			array(
				'id'       => 'header_eleven_action_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
				'required' => array(
					array(
						'header_eleven_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Action Button Two Display.
			array(
				'id'       => 'header_eleven_action_button_two_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Action Button Two', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Action Button Two" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eleven Action Button Two Color.
			array(
				'id'       => 'header_eleven_action_button_two_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Action Button Two Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for Action Button Two.', 'seolounge' ),
				'default'  => array(
					'color' => '#25c16f',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-eleven .header_main_action_buttons .btn.btn-two',
				),
				'required' => array(
					array(
						'header_eleven_action_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Action Button Two Text.
			array(
				'id'       => 'header_eleven_action_button_two_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button Two Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'seolounge' ),
				'default'  => esc_html__( 'Sign Up', 'seolounge' ),
				'required' => array(
					array(
						'header_eleven_action_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Action Button Two Link.
			array(
				'id'       => 'header_eleven_action_button_two_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button Two Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Eleven" only.', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
				'required' => array(
					array(
						'header_eleven_action_button_two_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Mobile Menu Display.
			array(
				'id'       => 'header_eleven_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Eleven Mobile Menu Icon Color.
			array(
				'id'       => 'header_eleven_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-eleven .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_eleven_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Mobile Menu Background Color.
			array(
				'id'       => 'header_eleven_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-eleven"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_eleven_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Mobile Menu Typography.
			array(
				'id'             => 'header_eleven_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-eleven"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_eleven_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Eleven Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_eleven_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-eleven"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_eleven_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER ELEVEN OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF HEADER TWELVE OPTIONS
			/* ============================= */

			// Header Twelve Info.
			array(
				'id'    => 'header_twelve_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Twelve Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Twelve Floating.
			array(
				'id'       => 'header_twelve_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Twelve Header Top Background Color.
			array(
				'id'       => 'header_twelve_header_top_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Top Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for top header.', 'seolounge' ),
				'default'  => array(
					'color' => '#323232',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .wraper_header_top',
				),
			),

			// Header Twelve Header Top Contact Phone.
			array(
				'id'       => 'header_twelve_header_top_contact_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Phone', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( '888-123-4567', 'seolounge' ),
			),

			// Header Twelve Header Top Contact Phone.
			array(
				'id'       => 'header_twelve_header_top_contact_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Enter Contact Email', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Three" only.', 'seolounge' ),
				'default'  => esc_html__( 'info@example.com', 'seolounge' ),
			),

			// Header Twelve Action Button One Display.
			array(
				'id'       => 'header_twelve_action_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Action Button One', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Action Button One" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Twelve Action Button One Color.
			array(
				'id'       => 'header_twelve_action_button_one_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Action Button One Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for Action Button One.', 'seolounge' ),
				'default'  => array(
					'color' => '#0abc5f',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .header_main_action_buttons .btn.btn-one',
				),
				'required' => array(
					array(
						'header_twelve_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Action Button One Text.
			array(
				'id'       => 'header_twelve_action_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Twelve" only.', 'seolounge' ),
				'default'  => esc_html__( 'Free Site Analysis', 'seolounge' ),
				'required' => array(
					array(
						'header_twelve_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Action Button One Link.
			array(
				'id'       => 'header_twelve_action_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Twelve" only.', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
				'required' => array(
					array(
						'header_twelve_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Header Main Background Color.
			array(
				'id'       => 'header_twelve_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .wraper_header_main',
				),
			),

			// Header Twelve Sticky.
			array(
				'id'       => 'header_twelve_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Twelve Sticky Header Main Background Color.
			array(
				'id'       => 'header_twelve_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-twelve .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_twelve_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Logo.
			array(
				'id'       => 'header_twelve_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Twelve Retina Logo.
			array(
				'id'       => 'header_twelve_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".', 'seolounge' ),
			),
			
			// Header Twelve Logo Width.
			array(
				'id'            => 'header_twelve_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Twelve Menu Typography.
			array(
				'id'             => 'header_twelve_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '600',
					'font-size'      => '13px',
					'color'          => '#333333',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Twelve Submenu Typography.
			array(
				'id'             => 'header_twelve_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '12px',
					'color'          => '#333333',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Twelve Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_twelve_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-twelve .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Twelve Action Button Size.
			array(
				'id'            => 'header_twelve_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Twelve Action Button Cart Icon Color.
			array(
				'id'       => 'header_twelve_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#333333',
				'output'   => array(
					'.wraper_header.style-twelve .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Twelve Search Display.
			array(
				'id'       => 'header_twelve_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Twelve Action Button Search Icon Color.
			array(
				'id'       => 'header_twelvethreeon_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#333333',
				'output'   => array(
					'.wraper_header.style-twelve .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_twelve_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Search Style.
			array(
				'id'       => 'header_twelve_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_twelve_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Search Background Color.
			array(
				'id'       => 'header_twelve_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_twelve_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-twelve',
				),
			),

			// Header Twelve Hamburger Display.
			array(
				'id'       => 'header_twelve_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Twelve Hamburger Mobile.
			array(
				'id'       => 'header_twelve_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_twelve_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Hamburger Icon Style.
			array(
				'id'       => 'header_twelve_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_twelve_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_twelve_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#333333',
				'output'   => array(
					'.wraper_header.style-twelve .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_twelve_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Hamburger Width.
			array(
				'id'            => 'header_twelve_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 460px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 460,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_twelve_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Hamburger Background.
			array(
				'id'       => 'header_twelve_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-twelve"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_twelve_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Mobile Menu Display.
			array(
				'id'       => 'header_twelve_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Twelve Mobile Menu Icon Color.
			array(
				'id'       => 'header_twelve_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-twelve .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_twelve_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Mobile Menu Background Color.
			array(
				'id'       => 'header_twelve_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-twelve"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_twelve_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Mobile Menu Typography.
			array(
				'id'             => 'header_twelve_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-twelve"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_twelve_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Twelve Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_twelve_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-twelve"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_twelve_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER TWELVE OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER THIRTEEN OPTIONS
			/* ============================= */

			// Header Thirteen Info.
			array(
				'id'    => 'header_thirteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Thirteen Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Thirteen Floating.
			array(
				'id'       => 'header_thirteen_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Thirteen Header Main Background Color.
			array(
				'id'       => 'header_thirteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .wraper_header_main',
				),
			),

			// Header Thirteen Sticky.
			array(
				'id'       => 'header_thirteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Thirteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_thirteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_thirteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Logo.
			array(
				'id'       => 'header_thirteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Thirteen Retina Logo.
			array(
				'id'       => 'header_thirteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".  ', 'seolounge' ),
			),
			
			// Header Thirteen Logo Width.
			array(
				'id'            => 'header_thirteen_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Thirteen Menu Typography.
			array(
				'id'             => 'header_thirteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#0b1427',
					'line-height'    => '27px',
				),
				'output'         => array(
					'.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Thirteen Submenu Typography.
			array(
				'id'             => 'header_thirteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#454545',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Thirteen Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_thirteen_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-thirteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Thirteen Action Button One Display.
			array(
				'id'       => 'header_thirteen_action_button_one_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Action Button One', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Action Button One" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Thirteen Action Button One Color.
			array(
				'id'       => 'header_thirteen_action_button_one_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Action Button One Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for Action Button One.', 'seolounge' ),
				'default'  => array(
					'color' => '#0a8aff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-thirteen .header_main_action_buttons .btn.btn-one',
				),
				'required' => array(
					array(
						'header_thirteen_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Action Button One Text.
			array(
				'id'       => 'header_thirteen_action_button_one_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'seolounge' ),
				'default'  => esc_html__( 'Get Free Quote', 'seolounge' ),
				'required' => array(
					array(
						'header_thirteen_action_button_one_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Action Button One Link.
			array(
				'id'       => 'header_thirteen_action_button_one_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Action Button One Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for header "Style Thirteen" only.', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
				'required' => array(
					array(
						'header_thirteen_action_button_one_display',
						'equals',
						true,
					),
				),
			),
			
			// Header Thirteen Mobile Menu Display.
			array(
				'id'       => 'header_thirteen_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Thirteen Mobile Menu Icon Color.
			array(
				'id'       => 'header_thirteen_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'.wraper_header.style-thirteen .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_thirteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Mobile Menu Background Color.
			array(
				'id'       => 'header_thirteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-thirteen"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_thirteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Mobile Menu Typography.
			array(
				'id'             => 'header_thirteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-thirteen"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_thirteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Thirteen Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_thirteen_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-thirteen"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_thirteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER THIRTEEN OPTIONS
			/* ============================= */
			
			/* ============================= */
			// START OF HEADER FOURTEEN OPTIONS
			/* ============================= */

			// Header Fourteen Info.
			array(
				'id'    => 'header_fourteen_info',
				'type'  => 'info',
				'title' => esc_html__( 'Header Fourteen Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Header Fourteen Floating.
			array(
				'id'       => 'header_fourteen_floating',
				'type'     => 'switch',
				'title'    => esc_html__( 'Floating Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be floated (position:absolute) or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Fourteen Header Main Background Color.
			array(
				'id'       => 'header_fourteen_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fourteen .wraper_header_main',
				),
			),

			// Header Fourteen Sticky.
			array(
				'id'       => 'header_fourteen_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Sticky Option', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want the header to be "Sticky" or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Header Fourteen Sticky Header Main Background Color.
			array(
				'id'       => 'header_fourteen_sticky_header_main_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Main Header Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for main header when it is sticky.', 'seolounge' ),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_header.style-fourteen .is-sticky .wraper_header_main',
				),
				'required' => array(
					array(
						'header_fourteen_sticky',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Logo.
			array(
				'id'       => 'header_fourteen_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your website.', 'seolounge' ),
			),

			// Header Fourteen Retina Logo.
			array(
				'id'       => 'header_fourteen_retina_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Retina Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'Retina Logo should be 2x larger than original Logo. Your logo name should be "your existing logo name on "Logo" field@2x.your existing logo extension on "Logo" field". For example, if your "Logo" name is "logo.png", then your Retina logo name should be "logo@2x.png".  ', 'seolounge' ),
			),
			
			// Header Fourteen Logo Width.
			array(
				'id'            => 'header_fourteen_logo_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Set logo width. Min is 50px, Max is 500px and Default is 200px.', 'seolounge' ),
				'min'           => 50,
				'step'          => 1,
				'max'           => 500,
				'default'       => 200,
				'display_value' => 'text',
			),

			// Header Fourteen Menu Typography.
			array(
				'id'             => 'header_fourteen_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#ffffff',
					'line-height'    => '26px',
				),
				'output'         => array(
					'.wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > a',
				),
			),

			// Header Fourteen Submenu Typography.
			array(
				'id'             => 'header_fourteen_submenu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Submenu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for Submenu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => true,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'font-family'    => 'Poppins',
					'font-weight'    => '500',
					'font-size'      => '15px',
					'color'          => '#454545',
					'line-height'    => '25px',
				),
				'output'         => array(
					'.wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li a',
				),
			),

			// Header Fourteen Menu / Submenu Item Hover / Selected Color.
			array(
				'id'       => 'header_fourteen_menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Hover Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for all menu items.', 'seolounge' ),
				'validate' => 'color',
				'output'   => array(
					'.wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li:hover > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-item > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li.current-menu-parent > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li:hover > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li:hover > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-item > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li.current-menu-parent > a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li:hover a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-item a, .wraper_header.style-fourteen .nav > [class*="menu-"] > ul.menu > li > ul > li > ul > li > ul > li ul li.current-menu-parent a', 				),
			),

			// Header Fourteen Action Button Size.
			array(
				'id'            => 'header_fourteen_action_button_size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Search Icon / Mobile Menu Icon / Cart Icon / Hamburger Icon Size', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select action button size. Min is 15px, Max is 50px and Default is 17px.', 'seolounge' ),
				'min'           => 15,
				'step'          => 1,
				'max'           => 50,
				'default'       => 17,
				'display_value' => 'text',
			),

			// Header Fourteen Action Button Cart Icon Color.
			array(
				'id'       => 'header_fourteen_action_button_cart_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Cart Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select cart icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-fourteen .header_main_action ul > li.header-cart-bar i',
				),
			),

			// Header Fourteen Search Display.
			array(
				'id'       => 'header_fourteen_search_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Search', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Search" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Fourteen Action Button Search Icon Color.
			array(
				'id'       => 'header_fourteen_action_button_search_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Search Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-fourteen .header_main_action ul > li.floating-searchbar i',
				),
				'required' => array(
					array(
						'header_fourteen_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Search Style.
			array(
				'id'       => 'header_fourteen_search_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Search Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the "Search".', 'seolounge' ),
				'options'  => array(
					'floating-search' => 'Floating Search',
					'flyout-search'   => 'Flyout Search',
				),
				'default'  => 'floating-search',
				'required' => array(
					array(
						'header_fourteen_search_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Search Background Color.
			array(
				'id'       => 'header_fourteen_search_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Choose Search Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only for "Flyout Search".', 'seolounge' ),
				'required' => array(
					array(
						'header_fourteen_search_style',
						'equals',
						'flyout-search',
					),
				),
				'default'  => array(
					'color' => '#000000',
					'alpha' => 0.85,
				),
				'output'   => array(
					'background-color' => '.wraper_flyout_search.header-style-fourteen',
				),
			),

			// Header Fourteen Hamburger Display.
			array(
				'id'       => 'header_fourteen_hamburger_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option in header or not. You add/remove widgets of "Hamburger" from "Appearance > Widgets".', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Fourteen Hamburger Mobile.
			array(
				'id'       => 'header_fourteen_hamburger_mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Hamburger Menu On Mobile', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Hamburger" option on mobile or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
				'required' => array(
					array(
						'header_fourteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Hamburger Icon Style.
			array(
				'id'       => 'header_fourteen_hamburger_iconstyle',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hamburger Menu Icon', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Style of the Hamburger Menu Icon.', 'seolounge' ),
				'options'  => array(
					'ellipsis'         => 'Ellipsis',
					'three-bars'       => 'Three Bars',
					'four-bars'        => 'Four Bars',
					'four-bars-left'   => 'Four Bars Left',
					'four-bars-right'  => 'Four Bars Right',
				),
				'default'  => 'three-bars',
				'required' => array(
					array(
						'header_fourteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Action Button Hamburger Icon Color.
			array(
				'id'       => 'header_fourteen_action_button_hamburger_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select hamburger icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-fourteen .header_main_action ul > li.header-hamburger i',
				),
				'required' => array(
					array(
						'header_fourteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Hamburger Width.
			array(
				'id'            => 'header_fourteen_hamburger_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Hamburger Menu Width', 'seolounge' ),
				'subtitle'      => esc_html__( 'Select hamburger menu width. Min is 200px, Max is 800px and Default is 460px.', 'seolounge' ),
				'min'           => 200,
				'step'          => 10,
				'max'           => 800,
				'default'       => 460,
				'display_value' => 'text',
				'required' => array(
					array(
						'header_fourteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Hamburger Background.
			array(
				'id'       => 'header_fourteen_hamburger_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Hamburger Menu Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for hamburger menu.', 'seolounge' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array(
					'body[data-header-style="header-style-fourteen"] #hamburger-menu',
				),
				'required' => array(
					array(
						'header_fourteen_hamburger_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Mobile Menu Display.
			array(
				'id'       => 'header_fourteen_mobile_menu_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Mobile Menu Menu', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if you want "Mobile Menu" option in header or not.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			// Header Fourteen Mobile Menu Icon Color.
			array(
				'id'       => 'header_fourteen_mobile_menu_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select mobile menu icon color.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#ffffff',
				'output'   => array(
					'.wraper_header.style-fourteen .header_main .responsive-nav i',
				),
				'required' => array(
					array(
						'header_fourteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Mobile Menu Background Color.
			array(
				'id'       => 'header_fourteen_mobile_menu_background_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => 'body[data-header-style="header-style-fourteen"] #mobile-menu',
				),
				'required' => array(
					array(
						'header_fourteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Mobile Menu Typography.
			array(
				'id'             => 'header_fourteen_mobile_menu_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Mobile Menu Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for mobile menu.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'color'          => true,
				'units'          => 'px',
				'default'        => array(
					'google'         => true,
					'text-align'     => 'left',
					'text-transform' => 'uppercase',
					'font-family'    => 'Poppins',
					'font-weight'    => '400',
					'font-size'      => '13px',
					'color'          => '#838383',
					'line-height'    => '27px',
					'letter-spacing' => '0.5px',
				),
				'output'         => array(
					'body[data-header-style="header-style-fourteen"] .mobile-menu-nav',
				),
				'required' => array(
					array(
						'header_fourteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			// Header Fourteen Mobile Menu Close Icon Color.
			array(
				'id'       => 'header_fourteen_mobile_menu_close_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Inner Close Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies for mobile menu only.', 'seolounge' ),
				'validate' => 'color',
				'default'  => '#838383',
				'output'   => array(
					'body[data-header-style="header-style-fourteen"] .mobile-menu-close i',
				),
				'required' => array(
					array(
						'header_fourteen_mobile_menu_display',
						'equals',
						true,
					),
				),
			),

			/* ============================= */
			// END OF HEADER FOURTEEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Short Header', 'seolounge' ),
		'icon'       => 'el el-website',
		'id'         => 'inner_page_banner',
		'subsection' => true,
		'fields'     => array(

			// Short Header Style Options.
			array(
				'id'       => 'short-header',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Select Short Header', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose what kind of short header you want to set.', 'seolounge' ),
				'options'  => array(
					'Banner-With-Breadcrumb'     => array(
						'alt'   => esc_html__( 'Banner-With-Breadcrumb', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-With-Breadcrumb.png' ),
						'title' => esc_html__( 'Banner & Breadcrumb', 'seolounge' ),
					),
					'Banner-only'     => array(
						'alt'   => esc_html__( 'Banner Only', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-Only.png' ),
						'title' => esc_html__( 'Banner Only', 'seolounge' ),
					),
					'breadcrumb-only' => array(
						'alt'   => esc_html__( 'Breadcrumb-Only', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Breadcrumb-Only.png' ),
						'title' => esc_html__( 'Breadcrumb Only', 'seolounge' ),
					),
					'banner-none'   => array(
						'alt'   => esc_html__( 'Banner None', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/banners/Banner-None.png' ),
						'title' => esc_html__( 'Banner None', 'seolounge' ),
					),
				),
				'default'  => 'Banner-only',
			),
			// Inner Page Banner Info.
			array(
				'id'    => 'inner_page_banner_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Inner Page Banner', 'seolounge' ),
			),

			// Inner Page Banner Background.
			array(
				'id'       => 'inner_page_banner_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Inner Page Banner Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Inner-Banner-Background-Image.png',
					'background-size'       => 'cover',
					'background-position'   => 'center-top',
					'background-color'      => '#f2f2f2',
				),
				'output'   => array(
					'.wraper_inner_banner',
				),
			),

			// Inner Page Banner Border Bottom.
			array(
				'id'       => 'inner_page_banner_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Inner Page Banner Border Bottom', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom for Inner Page Banner.', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_inner_banner_main',
				),
			),

			// Inner Page Banner Padding.
			array(
				'id'             => 'inner_page_banner_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Inner Page Banner Padding', 'seolounge' ),
				'subtitle'       => esc_html__( 'Set padding for inner page banner area.', 'seolounge' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '90px',
					'padding-bottom' => '90px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_main > .container',
				),
			),

			// Inner Page Banner Title Font.
			array(
				'id'             => 'inner_page_banner_title_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Title Font', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner title.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '700',
					'font-size'   => '45px',
					'color'       => '#ffffff',
					'line-height' => '55px',
				),
				'output'         => array(
					'.inner_banner_main .title',
				),
			),

			// Inner Page Banner Subtitle Font.
			array(
				'id'             => 'inner_page_banner_subtitle_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Subtitle Font', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Poppins',
					'font-weight' => '400',
					'font-size'   => '18px',
					'color'       => '#ffffff',
					'line-height' => '29px',
				),
				'output'         => array(
					'.inner_banner_main .subtitle',
				),
			),

			// Inner Page Banner Alignment.
			array(
				'id'      => 'inner_page_banner_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Inner Page Banner Alignment', 'seolounge' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'center',
			),

			// Breadcrumb Style Info.
			array(
				'id'    => 'breadcrumb_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Breadcrumb', 'seolounge' ),
			),

			// Breadcrumb Arrow Style.
			array(
				'id'       => 'breadcrumb_arrow_style',
				'type'     => 'select',
				'title'    => __( 'Breadcrumb Arrow Style', 'seolounge' ),
				'subtitle' => __( 'Select an icon for breadcrumb arrow.', 'seolounge' ),
				'data'     => 'elusive-icons',
				'default'  => 'el el-chevron-right',
			),

			// Breadcrumb Font.
			array(
				'id'             => 'breadcrumb_font',
				'type'           => 'typography',
				'title'          => esc_html__( 'Inner Page Banner Breadcrumb Font', 'seolounge' ),
				'subtitle'       => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'seolounge' ),
				'google'         => true,
				'font-backup'    => true,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'font-style'     => true,
				'all_styles'     => false,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Rubik',
					'font-weight' => '400',
					'font-size'   => '16px',
					'color'       => '#0c121f',
					'line-height' => '26px',
				),
				'output'         => array(
					'.inner_banner_breadcrumb #crumbs',
				),
			),

			// Breadcrumb Padding.
			array(
				'id'             => 'breadcrumb_padding',
				'type'           => 'spacing',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Breadcrumb Padding', 'seolounge' ),
				'subtitle'       => esc_html__( 'Set padding for breadcrumb area.', 'seolounge' ),
				'all'            => false,
				'top'            => true,
				'right'          => false,
				'bottom'         => true,
				'left'           => false,
				'default'        => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px',
				),
				'output'         => array(
					'.wraper_inner_banner_breadcrumb > .container',
				),
			),

			// Breadcrumb Alignment.
			array(
				'id'      => 'breadcrumb_alignment',
				'type'    => 'select',
				'title'   => esc_html__( 'Breadcrumb Alignment', 'seolounge' ),
				'options' => array(
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				),
				'default' => 'center',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'  => esc_html__( 'Footer', 'seolounge' ),
		'icon'   => 'el el-photo',
		'id'     => 'footer',
		'fields' => array(

			// Footer Style Info.
			array(
				'id'    => 'footer_style_info',
				'type'  => 'info',
				'style' => 'custom',
				'color' => '#b9cbe4',
				'class' => 'radiant-subheader',
				'title' => esc_html__( 'Footer Style', 'seolounge' ),
			),

			// Footer Style Options.
			array(
				'id'       => 'footer-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'seolounge' ),
				'options'  => array(
					'footer-style-one' => array(
						'alt'   => esc_html__( 'Style One', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-One.png' ),
						'title' => esc_html__( 'Style One', 'seolounge' ),
					),
					'footer-style-two' => array(
						'alt'   => esc_html__( 'Style Two', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Two.png' ),
						'title' => esc_html__( 'Style Two', 'seolounge' ),
					),
					'footer-style-three' => array(
						'alt'   => esc_html__( 'Style Three', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Three.jpg' ),
						'title' => esc_html__( 'Style Three', 'seolounge' ),
					),
					'footer-style-four' => array(
						'alt'   => esc_html__( 'Style Four', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Four.jpg' ),
						'title' => esc_html__( 'Style Four', 'seolounge' ),
					),
					'footer-style-five' => array(
						'alt'   => esc_html__( 'Style Five', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Five.png' ),
						'title' => esc_html__( 'Style Five', 'seolounge' ),
					),
					'footer-style-six' => array(
						'alt'   => esc_html__( 'Style Six', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Six.png' ),
						'title' => esc_html__( 'Style Six', 'seolounge' ),
					),
					'footer-style-seven' => array(
						'alt'   => esc_html__( 'Style Seven', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Seven.png' ),
						'title' => esc_html__( 'Style Seven', 'seolounge' ),
					),
					'footer-style-eight' => array(
						'alt'   => esc_html__( 'Style Eight', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Eight.png' ),
						'title' => esc_html__( 'Style Eight', 'seolounge' ),
					),
					'footer-style-nine' => array(
						'alt'   => esc_html__( 'Style Nine', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Nine.png' ),
						'title' => esc_html__( 'Style Nine', 'seolounge' ),
					),
					'footer-style-ten' => array(
						'alt'   => esc_html__( 'Style Ten', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Ten.png' ),
						'title' => esc_html__( 'Style Ten', 'seolounge' ),
					),
					'footer-style-eleven' => array(
						'alt'   => esc_html__( 'Style Eleven', 'seolounge' ),
						'img'   => get_parent_theme_file_uri( '/inc/redux-framework/css/img/Footer-Style-Eleven.png' ),
						'title' => esc_html__( 'Style Eleven', 'seolounge' ),
					),
				),
				'default'  => 'footer-style-six',
			),

			/* ============================= */
			// START OF FOOTER ONE OPTIONS
			/* ============================= */

			// Footer One Info.
			array(
				'id'    => 'footer_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer One Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer One Background.
			array(
				'id'       => 'footer_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style One".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-one',
				),
			),

			// Footer One Main Background.
			array(
				'id'       => 'footer_one_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style One".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-one .wraper_footer_main',
				),
			),

			// Footer One Main Bottom Border.
			array(
				'id'       => 'footer_one_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style One".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-one .wraper_footer_main',
				),
			),

			// Footer One Copyright Background.
			array(
				'id'       => 'footer_one_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style One".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-one .wraper_footer_copyright',
				),
			),

			// Footer One Copyright Text.
			array(
				'id'       => 'footer_one_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style One".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER TWO OPTIONS
			/* ============================= */

			// Footer Two Info.
			array(
				'id'    => 'footer_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Two Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Two Background.
			array(
				'id'       => 'footer_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Two".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-two',
				),
			),

			// Footer Two Main Background.
			array(
				'id'       => 'footer_two_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Two".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-two .wraper_footer_main',
				),
			),

			// Footer Two Main Bottom Border.
			array(
				'id'       => 'footer_two_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Two".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-two .wraper_footer_main',
				),
			),

			// Footer Two Copyright Background.
			array(
				'id'       => 'footer_two_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Two".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-two .wraper_footer_copyright',
				),
			),

			// Footer Two Copyright Text.
			array(
				'id'       => 'footer_two_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Two".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER THREE OPTIONS
			/* ============================= */

			// Footer Three Info.
			array(
				'id'    => 'footer_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Three Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Three Background.
			array(
				'id'       => 'footer_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Three".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-three',
				),
			),

			// Footer Three Main Background.
			array(
				'id'       => 'footer_three_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Three".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-three .wraper_footer_main',
				),
			),

			// Footer Three Main Bottom Border.
			array(
				'id'       => 'footer_three_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Three".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-three .wraper_footer_main',
				),
			),

			// Footer Three Copyright Background.
			array(
				'id'       => 'footer_three_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Three".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-three .wraper_footer_copyright',
				),
			),

			// Footer Three Copyright Text.
			array(
				'id'       => 'footer_three_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Three".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER THREE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER FOUR OPTIONS
			/* ============================= */

			// Footer Four Info.
			array(
				'id'    => 'footer_four_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Four Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Four Background.
			array(
				'id'       => 'footer_four_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-four',
				),
			),

			// Footer Four Navigation Background.
			array(
				'id'       => 'footer_four_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-four .wraper_footer_navigation',
				),
			),

			// Footer Four Main Background.
			array(
				'id'       => 'footer_four_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-four .wraper_footer_main',
				),
			),

			// Footer Four Main Bottom Border.
			array(
				'id'       => 'footer_four_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-four .wraper_footer_main',
				),
			),

			// Footer Four Copyright Background.
			array(
				'id'       => 'footer_four_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-four .wraper_footer_copyright',
				),
			),

			// Footer Four Copyright Text.
			array(
				'id'       => 'footer_four_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Four".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER FOUR OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER FIVE OPTIONS
			/* ============================= */

			// Footer Five Info.
			array(
				'id'    => 'footer_five_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Five Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Five Background.
			array(
				'id'       => 'footer_five_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-five',
				),
			),

			// Footer Five Navigation Background.
			array(
				'id'       => 'footer_five_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-five .wraper_footer_navigation',
				),
			),

			// Footer Five Main Background.
			array(
				'id'       => 'footer_five_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-five .wraper_footer_main',
				),
			),

			// Footer Five Main Bottom Border.
			array(
				'id'       => 'footer_five_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-five .wraper_footer_main',
				),
			),

			// Footer Five Copyright Background.
			array(
				'id'       => 'footer_five_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-five .wraper_footer_copyright',
				),
			),

			// Footer Five Copyright Text.
			array(
				'id'       => 'footer_five_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Five".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER FIVE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER SIX OPTIONS
			/* ============================= */

			// Footer Six Info.
			array(
				'id'    => 'footer_six_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Six Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Six Background.
			array(
				'id'       => 'footer_six_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Six".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#1a2024',
				),
				'output'   => array(
					'.wraper_footer.style-six',
				),
			),

			// Footer Six Main Background.
			array(
				'id'       => 'footer_six_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Six".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-six .wraper_footer_main',
				),
			),

			// Footer Six Main Bottom Border.
			array(
				'id'       => 'footer_six_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Six".)', 'seolounge' ),
				'default'  => array(
					'color' => '#575656',
					'alpha' => 1,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-six .wraper_footer_main',
				),
			),

			// Footer Six Copyright Background.
			array(
				'id'       => 'footer_six_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Six".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-six .wraper_footer_copyright',
				),
			),

			// Footer Six Copyright Text.
			array(
				'id'       => 'footer_six_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Six".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER SIX OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER SEVEN OPTIONS
			/* ============================= */

			// Footer Seven Info.
			array(
				'id'    => 'footer_seven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Seven Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Seven Background.
			array(
				'id'       => 'footer_seven_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Seven".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-seven',
				),
			),

			// Footer Seven Main Background.
			array(
				'id'       => 'footer_seven_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Seven".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-seven .wraper_footer_main',
				),
			),

			// Footer Seven Main Bottom Border.
			array(
				'id'       => 'footer_seven_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Seven".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-seven .wraper_footer_main',
				),
			),

			// Footer Seven Copyright Background.
			array(
				'id'       => 'footer_seven_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Seven".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-seven .wraper_footer_copyright',
				),
			),

			// Footer Seven Copyright Text.
			array(
				'id'       => 'footer_seven_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Seven".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER SEVEN OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER EIGHT OPTIONS
			/* ============================= */

			// Footer Eight Info.
			array(
				'id'    => 'footer_eight_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Eight Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Eight Background.
			array(
				'id'       => 'footer_eight_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-eight',
				),
			),

			// Footer Eight Main Background.
			array(
				'id'       => 'footer_eight_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-eight .wraper_footer_main',
				),
			),

			// Footer Eight Main Bottom Border.
			array(
				'id'       => 'footer_eight_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-eight .wraper_footer_main',
				),
			),

			// Footer Eight Copyright Background.
			array(
				'id'       => 'footer_eight_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-eight .wraper_footer_copyright',
				),
			),

			// Footer Eight Copyright Logo.
			array(
				'id'       => 'footer_eight_copyright_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Copyright Logo', 'seolounge' ),
				'subtitle' => esc_html__( 'You can upload logo on your copyright section of footer. (Applicable only for footer "Style Eight".)', 'seolounge' ),
			),

			// Footer Eight Copyright Text.
			array(
				'id'       => 'footer_eight_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			// Footer Eight Copyright Bar.
			array(
				'id'       => 'footer_eight_contact_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Address', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Contact Address. (Applicable only for footer "Style Eight".)', 'seolounge' ),
				'default'  => esc_html__( '123, XYZ Road, Collins Avn., New York', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER EIGHT OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER NINE OPTIONS
			/* ============================= */

			// Footer Nine Info.
			array(
				'id'    => 'footer_nine_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Nine Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Nine Background.
			array(
				'id'       => 'footer_nine_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-nine',
				),
			),

			// Footer Nine Navigation Background.
			array(
				'id'       => 'footer_nine_navigation_background',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Navigation Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Navigation. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => array(
					'color' => '#00174d',
					'alpha' => 0.01,
				),
				'output'   => array(
					'background-color' => '.wraper_footer.style-nine .wraper_footer_navigation',
				),
			),

			// Footer Nine Main Background.
			array(
				'id'       => 'footer_nine_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-nine .wraper_footer_main',
				),
			),

			// Footer Nine Main Bottom Border.
			array(
				'id'       => 'footer_nine_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-nine .wraper_footer_main',
				),
			),

			// Footer Nine Copyright Background.
			array(
				'id'       => 'footer_nine_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-nine .wraper_footer_copyright',
				),
			),

			// Footer Nine Copyright Text.
			array(
				'id'       => 'footer_nine_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Nine".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER NINE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER TEN OPTIONS
			/* ============================= */

			// Footer Ten Info.
			array(
				'id'    => 'footer_ten_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Ten Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Ten Background.
			array(
				'id'       => 'footer_ten_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Ten".)', 'seolounge' ),
				'default'  => array(
					'background-color' => '#161616',
				),
				'output'   => array(
					'.wraper_footer.style-ten',
				),
			),

			// Footer Ten Main Background.
			array(
				'id'       => 'footer_ten_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Ten".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-ten .wraper_footer_main',
				),
			),

			// Footer Ten Main Bottom Border.
			array(
				'id'       => 'footer_ten_main_border_bottom',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Footer Main Border Bottom Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Border Bottom Color for Footer Main section. (Applicable only for footer "Style Ten".)', 'seolounge' ),
				'default'  => array(
					'color' => '#fff',
					'alpha' => 0.01,
				),
				'output'   => array(
					'border-bottom-color' => '.wraper_footer.style-ten .wraper_footer_main',
				),
			),

			// Footer Ten Copyright Background.
			array(
				'id'       => 'footer_ten_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Ten".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-ten .wraper_footer_copyright',
				),
			),

			// Footer Ten Copyright Text.
			array(
				'id'       => 'footer_ten_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Ten".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER TEN OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF FOOTER ELEVEN OPTIONS
			/* ============================= */

			// Footer Eleven Info.
			array(
				'id'    => 'footer_eleven_info',
				'type'  => 'info',
				'title' => esc_html__( 'Footer Eleven Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Footer Eleven Background.
			array(
				'id'       => 'footer_eleven_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Footer. (Applicable only for footer "Style Eleven".)', 'seolounge' ),
				'output'   => array(
					'.wraper_footer.style-eleven',
				),
			),

			// Footer Eleven Main Background.
			array(
				'id'       => 'footer_eleven_main_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Main Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Main Section. (Applicable only for footer "Style Eleven".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-eleven .wraper_footer_main',
				),
			),

			// Footer Eleven Copyright Background.
			array(
				'id'       => 'footer_eleven_copyright_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Footer Copyright Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for the Footer Copyright Background. (Applicable only for footer "Style Eleven".)', 'seolounge' ),
				'default'  => array(
				),
				'output'   => array(
					'.wraper_footer.style-eleven .wraper_footer_copyright',
				),
			),

			// Footer Eleven Copyright Text.
			array(
				'id'       => 'footer_eleven_copyright_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Copyright Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Copyright Text. (Applicable only for footer "Style Eleven".)', 'seolounge' ),
				'default'  => esc_html__( 'SEOLounge - 2018', 'seolounge' ),
			),

			/* ============================= */
			// END OF FOOTER ELEVEN OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Elements', 'seolounge' ),
		'icon'  => 'el el-braille',
		'id'    => 'elements',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Scroll Bar', 'seolounge' ),
		'id'         => 'scroll_bar',
		'icon'       => 'el el-adjust-alt',
		'subsection' => true,
		'fields'     => array(

			// Display Footer Main Section.
			array(
				'id'       => 'scrollbar_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Custom Scrollbar', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if Custom Scrollbar will be activate or not. (Please Note: This will take effect on infinity scroll areas but not for entire website.)', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Scroll Bar Color.
			array(
				'id'       => 'scrollbar_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Scroll Bar Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a color for Scroll Bar.', 'seolounge' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'color' => '#ffbc13',
					'alpha' => 1,
				),
			),

			// Scroll Bar Width.
			array(
				'id'       => 'scrollbar_width',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'height'   => false,
				'title'    => esc_html__( 'Scroll Bar Width', 'seolounge' ),
				'subtitle' => esc_html__( 'Set width for Scroll Bar.', 'seolounge' ),
				'required' => array(
					array(
						'scrollbar_switch',
						'equals',
						true,
					),
				),
				'default'  => array(
					'width' => '7',
					'units' => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Button', 'seolounge' ),
		'icon'       => 'el el-off',
		'id'         => 'button-style',
		'subsection' => true,
		'fields'     => array(

			// Button Padding.
			array(
				'id'             => 'button_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Button Padding', 'seolounge' ),
				'subtitle'       => esc_html__( 'Allow padding for buttons.', 'seolounge' ),
				'default'        => array(
					'padding-top'    => '12px',
					'padding-right'  => '35px',
					'padding-bottom' => '13px',
					'padding-left'   => '35px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Background Color.
			array(
				'id'       => 'button_background_color_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Background Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Pick a background color for buttons hover.', 'seolounge' ),
				'default'  => array(
					'color' => '#252525',
					'alpha' => 1,
				),
				'output'   => array(
					'background-color' => '.radiantthemes-button.hover-style-one .radiantthemes-button-main:hover, .radiantthemes-button.hover-style-two .radiantthemes-button-main > .overlay, .radiantthemes-button.hover-style-three .radiantthemes-button-main > .overlay, .radiantthemes-button.hover-style-four .radiantthemes-button-main:hover, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border.
			array(
				'id'      => 'button_border',
				'type'    => 'border',
				'title'   => esc_html__( 'Border', 'seolounge' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Border Color.
			array(
				'id'      => 'button_hover_border_color',
				'type'    => 'border',
				'title'   => esc_html__( 'Hover Border Color', 'seolounge' ),
				'default' => array(
					'border-top'    => '0px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px',
					'border-style'  => 'solid',
					'border-color'  => '#ffffff',
				),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Border Radius.
			array(
				'id'             => 'border-radius',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Border Radius', 'seolounge' ),
				'subtitle'       => esc_html__( 'Users can change the Border Radius for Buttons.', 'seolounge' ),
				'all'            => false,
				'default'        => array(
					'margin-top'    => '30px',
					'margin-right'  => '30px',
					'margin-bottom' => '30px',
					'margin-left'   => '30px',
					'units'         => 'px',
				),
			),

			// Box Shadow.
			array(
				'id'      => 'theme_button_box_shadow',
				'type'    => 'box_shadow',
				'title'   => esc_html__( 'Theme Button Box Shadow', 'seolounge' ),
				'units'   => array( 'px', 'em', 'rem' ),
				'output'  => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
				'opacity' => true,
				'rgba'    => true,
				'default' => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),

			),

			// Button Typography.
			array(
				'id'             => 'button_typography',
				'type'           => 'typography',
				'title'          => esc_html__( 'Button Typography', 'seolounge' ),
				'subtitle'       => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'seolounge' ),
				'google'         => true,
				'font-backup'    => false,
				'subsets'        => false,
				'text-align'     => false,
				'text-transform' => true,
				'letter-spacing' => true,
				'units'          => 'px',
				'default'        => array(
					'google'      => true,
					'font-family' => 'Rubik',
					'font-weight' => '400',
					'font-size'   => '14px',
					'color'       => '#fff',
					'line-height' => '23px',
				),
				'output'         => array(
					'.radiantthemes-button > .radiantthemes-button-main, .gdpr-notice .btn, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button, .woocommerce form .form-row input.button, .widget-area > .widget.widget_price_filter .button, .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn',
				),
			),

			// Hover Font Color.
			array(
				'id'       => 'button_typography_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover Font Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Select button hover font color.', 'seolounge' ),
				'default'  => '#ffffff',
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover, .gdpr-notice .btn:hover, .radiant-contact-form .form-row input[type=submit]:hover, .radiant-contact-form .form-row input[type=button]:hover, .radiant-contact-form .form-row button[type=submit]:hover, .post.style-two .post-read-more .btn:hover, .post.style-three .entry-main .post-read-more .btn:hover, .woocommerce #respond input#submit, .woocommerce .return-to-shop .button:hover, .woocommerce form .form-row input.button:hover, .widget-area > .widget.widget_price_filter .button:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover',
				),
			),

			// Icon Color.
			array(
				'id'       => 'button_typography_icon',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main i',
				),
			),

			// Hover Icon Color.
			array(
				'id'       => 'button_typography_icon_hover',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Hover Icon Color', 'seolounge' ),
				'subtitle' => esc_html__( 'Applies only if Icon is present', 'seolounge' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => 1,
				),
				'output'   => array(
					'color' => '.radiantthemes-button > .radiantthemes-button-main:hover i',
				),
			),

			// Hover Style.
			array(
				'id'       => 'button_hover_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Hover Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Hover Style of the "Button".', 'seolounge' ),
				'options'  => array(
					'one'   => 'Style One (Fade)',
					'two'   => 'Style Two (Sweep Right)',
					'three' => 'Style Three (Zoom Out)',
					'four'  => 'Style Four (Fade with Icon Right)',
				),
				'default'  => 'four',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Contact Form', 'seolounge' ),
		'icon'       => 'el el-tasks',
		'id'         => 'contact_form_style',
		'subsection' => true,
		'fields'     => array(

		    // Height For Row Gap.
			array(
                'id'             => 'contact_form_style_row_gap',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => __( 'Gap For Rows', 'seolounge' ),
				'subtitle'       => __( 'Users can change gap for rows.', 'seolounge' ),
                'default'            => array(
                    'margin-top'     => '0px',
                    'margin-right'   => '0px',
                    'margin-bottom'  => '20px',
                    'margin-left'    => '0px',
                    'units'          => 'px',
                ),
                'output'         => array(
					'.radiant-contact-form .form-row, div.wpcf7-response-output',
				),
			),

			// Height For Input Fields.
			array(
				'id'       => 'contact_form_style_input_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Input Fields', 'seolounge' ),
				'subtitle' => __( 'Users can change height for Input Fields.', 'seolounge' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '45',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select',
				),
			),

			// Height For Textarea Fields.
			array(
				'id'       => 'contact_form_style_textarea_height',
				'type'     => 'dimensions',
				'units'    => array( 'em', 'px' ),
				'title'    => __( 'Height Option for Textarea Fields', 'seolounge' ),
				'subtitle' => __( 'Users can change height for Textarea Fields.', 'seolounge' ),
				'width'    => false,
				'height'   => true,
				'default'  => array(
					'height' => '100',
					'units'  => 'px',
				),
				'output'   => array(
					'.radiant-contact-form .form-row textarea',
				),
			),

			// Padding For Input Fields Focus.
			array(
				'id'             => 'contact_form_style_input_padding_focus',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'units'          => array( 'em', 'px' ),
				'units_extended' => false,
				'title'          => esc_html__( 'Padding For Input Fields Focus', 'seolounge' ),
				'subtitle'       => esc_html__( 'Users can change padding for input fields focus.', 'seolounge' ),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-right'  => '0px',
					'padding-bottom' => '0px',
					'padding-left'   => '0px',
					'units'          => 'px',
				),
				'output'         => array(
					'.radiant-contact-form .form-row input[type=text]:focus, .radiant-contact-form .form-row input[type=email]:focus, .radiant-contact-form .form-row input[type=url]:focus, .radiant-contact-form .form-row input[type=tel]:focus, .radiant-contact-form .form-row input[type=number]:focus, .radiant-contact-form .form-row input[type=password]:focus, .radiant-contact-form .form-row input[type=date]:focus, .radiant-contact-form .form-row input[type=time]:focus, .radiant-contact-form .form-row select:focus, .radiant-contact-form .form-row textarea:focus',
				),
			),

			// Box Shadow For Input Fields.
			array(
				'id'       => 'contact_form_style_input_box_shadow',
				'type'     => 'box_shadow',
				'title'    => esc_html__( 'Box Shadow For Input Fields', 'seolounge' ),
				'subtitle' => esc_html__( 'Users can change the Box Shadow for input fields.', 'seolounge' ),
				'units'    => array( '' ),
				'output'   => array(
					'.radiant-contact-form .form-row input[type=text], .radiant-contact-form .form-row input[type=email], .radiant-contact-form .form-row input[type=url], .radiant-contact-form .form-row input[type=tel], .radiant-contact-form .form-row input[type=number], .radiant-contact-form .form-row input[type=password], .radiant-contact-form .form-row input[type=date], .radiant-contact-form .form-row input[type=time], .radiant-contact-form .form-row select, .radiant-contact-form .form-row textarea',
				),
				'opacity'  => true,
				'rgba'     => true,
				'default'  => array(
					'horizontal'   => '0',
					'vertical'     => '0',
					'blur'         => '20px',
					'spread'       => '0',
					'opacity'      => '0.15',
					'shadow-color' => '#000000',
					'shadow-type'  => 'outside',
					'units'        => 'px',
				),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Pages', 'seolounge' ),
		'icon'  => 'el el-book',
		'id'    => 'pages-option',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Error 404', 'seolounge' ),
		'icon'       => 'el el-error',
		'id'         => '404_error',
		'subsection' => true,
		'fields'     => array(

			// 404 Page Style.
			array(
				'id'       => '404_error_style',
				'type'     => 'select',
				'title'    => esc_html__( '404 Page Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select 404 Page Style of the website.', 'seolounge' ),
				'options'  => array(
					'one'   => 'Style One (Image and Text)',
					'two'   => 'Style Two (Image, Text and Button)',
					'three' => 'Style Three (Image, Text and Button)',
					'four'  => 'Style Four (Image, Text and Button)',
				),
				'default'  => 'four',
			),

			/* ============================= */
			// START OF 404 ERROR ONE OPTIONS
			/* ============================= */

			// Footer One Info.
			array(
				'id'    => '404_error_one_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style One Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error One Background.
			array(
				'id'       => '404_error_one_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style One".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/404-Error-Style-One-Background-Image.png',
					'background-color'      => '#dedede',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_error_main.style-one',
				),
			),

			// 404 Error One Image.
			array(
				'id'       => '404_error_one_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'seolounge' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style One".)', 'seolounge' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/images/404-Error-Style-One-Image.png',
				),
			),

			// 404 Error One Content.
			array(
				'id'       => '404_error_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style One".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Page Not Found</h1>",
			),

			// 404 Error One Button Text.
			array(
				'id'       => '404_error_one_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'seolounge' ),
				'default'  => esc_html__( 'Back To Home Page', 'seolounge' ),
			),

			// 404 Error One Button Link.
			array(
				'id'       => '404_error_one_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style One".', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
			),

			/* ============================= */
			// END OF 404 ERROR ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR TWO OPTIONS
			/* ============================= */

			// 404 Error Two Info.
			array(
				'id'    => '404_error_two_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Two Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Two Background.
			array(
				'id'       => '404_error_two_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Two".)', 'seolounge' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-two',
				),
			),

			// 404 Error Two Image.
			array(
				'id'       => '404_error_two_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'seolounge' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Two".)', 'seolounge' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/images/404-Error-Style-Two-Image.png',
				),
			),

			// 404 Error Two Content.
			array(
				'id'       => '404_error_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Two".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The requested page could not be found!</h1>",
			),

			// 404 Error Two Button Text.
			array(
				'id'       => '404_error_two_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'seolounge' ),
				'default'  => esc_html__( 'Back To Home Page', 'seolounge' ),
			),

			// 404 Error Two Button Link.
			array(
				'id'       => '404_error_two_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Two".', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
			),

			/* ============================= */
			// END OF 404 ERROR TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR THREE OPTIONS
			/* ============================= */

			// 404 Error Three Info.
			array(
				'id'    => '404_error_three_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Three Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Three Background.
			array(
				'id'       => '404_error_three_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Three".)', 'seolounge' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-three',
				),
			),

			// 404 Error Three Image.
			array(
				'id'       => '404_error_three_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'seolounge' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Three".)', 'seolounge' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/images/404-Error-Style-Three-Image.png',
				),
			),

			// 404 Error Three Content.
			array(
				'id'       => '404_error_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Three".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Oops!</h1><h2>We can't seem to find the page you're looking for.</h2>",
			),

			// 404 Error Three Button Text.
			array(
				'id'       => '404_error_three_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'seolounge' ),
				'default'  => esc_html__( 'Back To Home Page', 'seolounge' ),
			),

			// 404 Error Three Button Link.
			array(
				'id'       => '404_error_three_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Three".', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
			),

			/* ============================= */
			// END OF 404 ERROR THREE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF 404 ERROR FOUR OPTIONS
			/* ============================= */

			// 404 Error Four Info.
			array(
				'id'    => '404_error_four_info',
				'type'  => 'info',
				'title' => esc_html__( '404 Error Style Four Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// 404 Error Four Background.
			array(
				'id'       => '404_error_four_background',
				'type'     => 'background',
				'title'    => esc_html__( '404 Error Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for 404 Error "Style Four".)', 'seolounge' ),
				'default'  => array(
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_error_main.style-four',
				),
			),

			// 404 Error Four Image.
			array(
				'id'       => '404_error_four_image',
				'type'     => 'media',
				'title'    => esc_html__( '404 Error Image', 'seolounge' ),
				'subtitle' => esc_html__( 'You can 404 error image for your website. (Applicable only for 404 Error "Style Four".)', 'seolounge' ),
				'default'  => array(
				    'url'  => get_template_directory_uri() . '/images/404-Error-Style-Four-Image.png',
				),
			),

			// 404 Error Four Content.
			array(
				'id'       => '404_error_four_content',
				'type'     => 'editor',
				'title'    => esc_html__( '404 Error Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on 404 page body. (Applicable only for 404 Error "Style Four".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Sorry! This Page Was Lost</h1>",
			),

			// 404 Error Four Button Text.
			array(
				'id'       => '404_error_four_button_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Text', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'seolounge' ),
				'default'  => esc_html__( 'Back To Home Page', 'seolounge' ),
			),

			// 404 Error Four Button Link.
			array(
				'id'       => '404_error_four_button_link',
				'type'     => 'text',
				'title'    => esc_html__( '404 Error Button Link', 'seolounge' ),
				'subtitle' => esc_html__( 'Applicable only for 404 Error "Style Four".', 'seolounge' ),
				'default'  => esc_html__( '#', 'seolounge' ),
			),

			/* ============================= */
			// END OF 404 ERROR FOUR OPTIONS
			/* ============================= */

		),
	)
);
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Maintenance Mode', 'seolounge' ),
		'icon'       => 'el el-broom',
		'id'         => 'maintenance_mode',
		'subsection' => true,
		'fields'     => array(

			// Maintenance Mode Switch.
			array(
				'id'       => 'maintenance_mode_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Maintenance Mode?', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to Activate Maintenance Mode.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Maintenance Mode Style.
			array(
				'id'       => 'maintenance_mode_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Maintenance Mode Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Maintenance Mode Style of the website.', 'seolounge' ),
				'options'  => array(
					'one'   => 'Style One (Background With Text)',
					'two'   => 'Style Two (Image With Text)',
					'three' => 'Style Three (Background With Text)',
				),
				'default'  => 'one',
			),

			/* ============================= */
			// START OF MAINTENANCE MODE ONE OPTIONS
			/* ============================= */

			// Maintenance Mode One Info.
			array(
				'id'    => 'maintenance_mode_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style One Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode One Background.
			array(
				'id'       => 'maintenance_mode_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style One".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Maintenance-More-Style-One-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-one',
				),
			),

			// Maintenance Mode One Content.
			array(
				'id'       => 'maintenance_mode_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style One".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF MAINTENANCE MODE TWO OPTIONS
			/* ============================= */

			// Maintenance Mode Two Info.
			array(
				'id'    => 'maintenance_mode_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style Two Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode Two Background.
			array(
				'id'       => 'maintenance_mode_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Two".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Maintenance-More-Style-Two-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-two',
				),
			),

			// Maintenance Mode Two Content.
			array(
				'id'       => 'maintenance_mode_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Two".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1><strong>This Website Is</strong> Under Construction.</h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF MAINTENANCE MODE THREE OPTIONS
			/* ============================= */

			// Maintenance Mode Three Info.
			array(
				'id'    => 'maintenance_mode_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Maintenance Mode Style Three Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Maintenance Mode Three Background.
			array(
				'id'       => 'maintenance_mode_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Maintenance Mode Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for Maintenance Mode. (Applicable only for Maintenance Mode "Style Three".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Maintenance-More-Style-Three-Image.png',
					'background-color'      => '#ffffff',
				),
				'output'   => array(
					'.wraper_maintenance_main.style-three',
				),
			),

			// Maintenance Mode Three Content.
			array(
				'id'       => 'maintenance_mode_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Maintenance Mode Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Maintenance Mode body. (Applicable only for Maintenance Mode "Style Three".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>The Website Is Currently <strong>Under Construction</strong></h1><h2>Please Check Back Soon...</h2>",
			),

			/* ============================= */
			// END OF MAINTENANCE MODE THREE OPTIONS
			/* ============================= */

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Coming Soon', 'seolounge' ),
		'icon'       => 'el el-warning-sign',
		'id'         => 'coming_soon',
		'subsection' => true,
		'fields'     => array(

			// Coming Soon Switch.
			array(
				'id'       => 'coming_soon_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Activate Coming Soon', 'seolounge' ),
				'subtitle' => esc_html__( 'Choose if want to activate Coming Soon mode.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => false,
			),

			// Coming Soon Launch Date-Time.
			array(
				'id'       => 'coming_soon_datetime',
				'type'     => 'text',
				'title'    => esc_html__( 'Launch Date & Time', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter Launch Date & Time.', 'seolounge' ),
				'default'  => '2018-08-25 12:00',
			),

			// Coming Soon Style.
			array(
				'id'       => 'coming_soon_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Coming Soon Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Coming Soon Style of the website.', 'seolounge' ),
				'options'  => array(
					'one'   => 'Style One',
					'two'   => 'Style Two',
					'three' => 'Style Three',
				),
				'default'  => 'one',
			),

			/* ============================= */
			// START OF COMING SOON ONE OPTIONS
			/* ============================= */

			// Coming Soon One Info.
			array(
				'id'    => 'coming_soon_one_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style One Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon One Background.
			array(
				'id'       => 'coming_soon_one_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style One".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Coming-Soon-Style-One-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-one',
				),
			),

			// Coming Soon One Content.
			array(
				'id'       => 'coming_soon_one_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style One".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Our New Site Is Coming Soon</h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON ONE OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF COMING SOON TWO OPTIONS
			/* ============================= */

			// Coming Soon Two Info.
			array(
				'id'    => 'coming_soon_two_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style Two Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon Two Background.
			array(
				'id'       => 'coming_soon_two_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Two".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Coming-Soon-Style-Two-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-two',
				),
			),

			// Coming Soon Two Content.
			array(
				'id'       => 'coming_soon_two_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Two".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Coming Soon</h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON TWO OPTIONS
			/* ============================= */

			/* ============================= */
			// START OF COMING SOON THREE OPTIONS
			/* ============================= */

			// Coming Soon Three Info.
			array(
				'id'    => 'coming_soon_three_info',
				'type'  => 'info',
				'title' => esc_html__( 'Coming Soon Style Three Settings', 'seolounge' ),
				'class' => 'radiant-subheader enable-toggle',
			),

			// Coming Soon Three Background.
			array(
				'id'       => 'coming_soon_three_background',
				'type'     => 'background',
				'title'    => esc_html__( 'Coming Soon Background', 'seolounge' ),
				'subtitle' => esc_html__( 'Set Background for 404 Error. (Applicable only for Coming Soon "Style Three".)', 'seolounge' ),
				'default'  => array(
				    'background-image'      => get_template_directory_uri() . '/images/Coming-Soon-Style-Three-Background-Image.png',
					'background-color'      => '#000000',
					'background-size'       => 'cover',
					'background-position'   => 'center-center',
				),
				'output'   => array(
					'.wraper_comingsoon_main.style-three',
				),
			),

			// Coming Soon Three Content.
			array(
				'id'       => 'coming_soon_three_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Coming Soon Content', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter content to show on Coming Soon page body. (Applicable only for Coming Soon "Style Three".)', 'seolounge' ),
				'args'     => array(
					'teeny' => false,
				),
				'default'  => "<h1>Our Awesome Website Is <strong>Coming Soon!</strong></h1><h2>Stay tuned for something amazing</h2>",
			),

			/* ============================= */
			// END OF COMING SOON THREE OPTIONS
			/* ============================= */

		),
	)
);
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Search', 'seolounge' ),
		'icon'       => 'el el-search-alt',
		'id'         => 'search',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'search_page_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Search Page Banner Image', 'seolounge' ),
				'subtitle' => esc_html__( 'Select search page banner image', 'seolounge' ),
			),

			array(
				'id'       => 'search_page_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Title', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter search page banner title', 'seolounge' ),
				'default'  => 'Search',
			),

			array(
				'id'       => 'search_page_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Page Subtitle', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter search page banner subtitle', 'seolounge' ),
				'default'  => '',
			),

		),
	)
);
if ( class_exists( 'Tribe__Events__Main' ) ) {
Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Event', 'seolounge' ),
		'icon'       => 'el el-calendar',
		'id'         => 'banner_layout',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'events_banner_details',
				'type'     => 'select',
				'title'    => esc_html__( 'Banner Details', 'seolounge' ),
				'subtitle' => esc_html__( 'Select Banner options', 'seolounge' ),
				'options'  => array(
					'banner-breadcumbs'    => 'Short Banner With Breadcumbs',
					'banner-only'          => 'Short Banner Only',
					'breadcumbs-only'      => 'Breadcumbs Only',
					'none'                 => 'None',
				),
				'default'  => 'banner-breadcumbs',
			),
			array(
				'id'       => 'event_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Event Banner Image', 'seolounge' ),
				'subtitle' => esc_html__( 'Select event banner image', 'seolounge' ),
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
			array(
				'id'       => 'event_banner_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Event Title', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter event banner title', 'seolounge' ),
				'default'  => 'Events',
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
			array(
				'id'       => 'event_banner_subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Event Subtitle', 'seolounge' ),
				'subtitle' => esc_html__( 'Enter event banner subtitle', 'seolounge' ),
				'default'  => '',
				'required' => array(
					array(
						'events_banner_details',
						'!=',
						'none',
					),
					array(
						'events_banner_details',
						'!=',
						'breadcumbs-only',
					),
				),
			),
		),
	)
);
}

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Blog', 'seolounge' ),
		'icon'  => 'el el-bullhorn',
		'id'    => 'blog',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Layout', 'seolounge' ),
		'icon'       => 'el el-check-empty',
		'id'         => 'blog_layout',
		'subsection' => true,
		'fields'     => array(

			// Blog Style.
			array(
				'id'       => 'blog-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select blog style', 'seolounge' ),
				'options'  => array(
					'default'   => array(
						'alt'   => 'Default',
						'img'  => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Default.png',
						'title' => esc_html__( 'Default', 'seolounge' ),
					),
					'one'   => array(
						'alt' => 'Classic',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Classic.png',
						'title' => esc_html__( 'Classic', 'seolounge' ),
					),
					'two'   => array(
						'alt' => 'Masonry',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Masonry.png',
						'title' => esc_html__( 'Masonry', 'seolounge' ),
					),
					'three' => array(
						'alt' => 'List',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List.png',
						'title' => esc_html__( 'List', 'seolounge' ),
					),
					'four' => array(
						'alt' => 'Masonry (No Image)',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-List-No-Image.png',
						'title' => esc_html__( 'List (No Image)', 'seolounge' ),
					),
					'five' => array(
						'alt' => 'Standard',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Style-Metro.png',
						'title' => esc_html__( 'Standard', 'seolounge' ),
					),
				),
				'default'  => 'default',
			),

			// Blog Layout.
			array(
				'id'       => 'blog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Blog Layout', 'seolounge' ),
				'subtitle' => esc_html__( 'Select blog layout', 'seolounge' ),
				'options'  => array(
					'leftsidebar'  => array(
						'alt' => 'Left Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Left-Sidebar.png',
					),
					'nosidebar'    => array(
						'alt' => 'No Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-No-Sidebar.png',
					),
					'rightsidebar' => array(
						'alt' => 'Right Sidebar',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Blog-Layout-Right-Sidebar.png',
					),
				),
				'default'  => 'rightsidebar',
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Blog Options', 'seolounge' ),
		'icon'       => 'el el-ok-sign',
		'id'         => 'blog_options',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'display_author_information',
				'type'     => 'switch',
				'title'    => esc_html__( 'Author Information Box', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to show author information on Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_categries',
				'type'     => 'switch',
				'title'    => esc_html__( 'Categories', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to show the categories on both Blog Page and Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Tags', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to show the tags on both Blog Page and Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_navigation',
				'type'     => 'switch',
				'title'    => esc_html__( 'Navigation', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to previous and next navigation the Previous/Next Navigation on Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			array(
				'id'       => 'display_related_article',
				'type'     => 'switch',
				'title'    => esc_html__( 'Related Article', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to show related article on Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

			array(
				'id'       => 'blog_comment_display',
				'type'     => 'switch',
				'title'    => esc_html__( 'Comments', 'seolounge' ),
				'subtitle' => esc_html__( 'Select if you want to show comments on Blog Details Page.', 'seolounge' ),
				'on'       => esc_html__( 'Yes', 'seolounge' ),
				'off'      => esc_html__( 'No', 'seolounge' ),
				'default'  => true,
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title' => esc_html__( 'Team', 'seolounge' ),
		'icon'  => 'el el-user',
		'id'    => 'team',
	)
);

Redux::setSection(
	$opt_name, array(
		'title'      => esc_html__( 'Team Details', 'seolounge' ),
		'icon'       => 'el el-address-book',
		'id'         => 'team_details',
		'subsection' => true,
		'fields'     => array(

			// Team Details Style.
			array(
				'id'       => 'team_details_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Team Details Style', 'seolounge' ),
				'subtitle' => esc_html__( 'Select team details style', 'seolounge' ),
				'options'  => array(
					'blank'   => array(
						'alt' => 'Blank',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-Blank.png',
						'title' => esc_html__( 'Blank', 'seolounge' ),
					),
					'one'   => array(
						'alt' => 'Style One',
						'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Team-Details-Style-One.png',
						'title' => esc_html__( 'Style One', 'seolounge' ),
					),
				),
				'default'  => 'blank',
			),

		),
	)
);

if ( class_exists( 'woocommerce' ) ) {

	Redux::setSection(
		$opt_name, array(
			'title' => esc_html__( 'Shop', 'seolounge' ),
			'icon'  => 'el el-shopping-cart',
			'id'    => 'shop',
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Listing', 'seolounge' ),
			'icon'       => 'el el-list-alt',
			'id'         => 'product_listing',
			'subsection' => true,
			'fields'     => array(

				// Product Listing Layout.
				array(
					'id'       => 'shop-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Listing Layout', 'seolounge' ),
					'subtitle' => esc_html__( 'Select Product Listing Layout', 'seolounge' ),
					'options'  => array(
						'shop-style-three-column' => array(
						    'title'  => 'Three Column',
							'alt'    => 'Three Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-One.jpg',
						),
						'shop-style-four-column'   => array(
						    'title'  => 'Four Column',
							'alt'    => 'Four Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Two.jpg',
						),
						'shop-style-five-column' => array(
						    'title'  => 'Five Column',
							'alt'    => 'Five Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Three.jpg',
						),
						'shop-style-six-column'  => array(
						    'title'  => 'Six Column',
							'alt'    => 'Six Column',
							'img'    => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Style-Four.jpg',
						),
					),
					'default'  => 'shop-style-four-column',
				),

				//Products Per Page.
				array(
    				'id'       => 'shop-products-per-page',
    				'type'     => 'text',
    				'title'    => esc_html__( 'Products Per Page', 'seolounge' ),
    				'subtitle' => esc_html__( 'Put number of products you wants to show per page', 'seolounge' ),
    				'default'  => '12',
    				'validate' => 'numeric'
			    ),

				// Sidebar.
				array(
					'id'       => 'shop-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar.', 'seolounge' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'seolounge' ),
					'options'  => array(
						'shop-leftsidebar'  => array(
							'alt' => 'Left Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Left-Sidebar.jpg',
						),
						'shop-nosidebar'    => array(
							'alt' => 'No Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-No-Sidebar.jpg',
						),
						'shop-rightsidebar' => array(
							'alt' => 'Right Sidebar',
							'img' => get_template_directory_uri() . '/inc/redux-framework/css/img/Product-Listing-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-nosidebar',
				),

				// Shop Box Style.
				array(
					'id'       => 'shop_box_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Box Style', 'seolounge' ),
					'subtitle' => esc_html__( 'Select Style of the Shop Box.', 'seolounge' ),
					'options'  => array(
						'style-one'  => array(
						    'title' => 'Overlay',
							'alt'   => 'Overlay',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-One.jpg',
						),
						'style-two' => array(
						    'title' => 'Minimal',
							'alt'   => 'Minimal',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Two.jpg',
						),
						'style-three' => array(
						    'title' => 'Classic',
							'alt'   => 'Classic',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Three.jpg',
						),
						'style-four' => array(
						    'title' => 'Simple',
							'alt'   => 'Simple',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Four.jpg',
						),
						'style-five' => array(
						    'title' => 'Detailed',
							'alt'   => 'Detailed',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Box-Style-Five.jpg',
						),
					),
					'default'  => 'style-two',
				),

			),
		)
	);

	Redux::setSection(
		$opt_name, array(
			'title'      => esc_html__( 'Product Details', 'seolounge' ),
			'icon'       => 'el el-shopping-cart',
			'id'         => 'product_details',
			'subsection' => true,
			'fields'     => array(

				// Product Details Layout.
				array(
					'id'       => 'shop-details-style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Details Layout', 'seolounge' ),
					'subtitle' => esc_html__( 'Select Product Details Layout', 'seolounge' ),
					'options'  => array(
						'style-one' => array(
							'alt'   => 'Style One',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-One.jpg',
						),
						'style-two' => array(
							'alt'   => 'Style Two',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Two.jpg',
						),
						'style-three' => array(
							'alt'   => 'Style Three',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Style-Three.jpg',
						),
					),
					'default'  => 'style-one',
				),

				// Sidebar.
				array(
					'id'       => 'shop-details-sidebar',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar', 'seolounge' ),
					'subtitle' => esc_html__( 'Select Sidebar', 'seolounge' ),
					'options'  => array(
						'shop-details-leftsidebar'  => array(
							'alt'   => 'Left Sidebar',
							'title' => 'Left Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Left-Sidebar.jpg',
						),
						'shop-details-nosidebar'    => array(
							'alt'   => 'No Sidebar',
							'title' => 'No Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-No-Sidebar.jpg',
						),
						'shop-details-rightsidebar' => array(
							'alt'   => 'Right Sidebar',
							'title' => 'Right Sidebar',
							'img'   => get_template_directory_uri() . '/inc/redux-framework/css/img/Shop-Details-Layout-Right-Sidebar.jpg',
						),
					),
					'default'  => 'shop-details-nosidebar',
				),

			),
		)
	);

}

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Social Icons', 'seolounge' ),
		'icon'    => 'el el-globe',
		'id'      => 'social_icons',
		'submenu' => false,
		'fields'  => array(

			// Open social links in new window.
			array(
				'id'      => 'social-icon-target',
				'type'    => 'switch',
				'title'   => esc_html__( 'Open links in new window', 'seolounge' ),
				'desc'    => esc_html__( 'Open social links in new window', 'seolounge' ),
				'default' => true,
			),

			// Google +.
			array(
				'id'      => 'social-icon-googleplus',
				'type'    => 'text',
				'title'   => esc_html__( 'Google +', 'seolounge' ),
				'desc'    => esc_html__( 'Link to the profile page', 'seolounge' ),
				'default' => '#',
			),

			// Facebook.
			array(
				'id'      => 'social-icon-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook', 'seolounge' ),
				'desc'    => esc_html__( 'Link to the profile page', 'seolounge' ),
				'default' => '#',
			),

			// Twitter.
			array(
				'id'      => 'social-icon-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter', 'seolounge' ),
				'desc'    => esc_html__( 'Link to the profile page', 'seolounge' ),
				'default' => '#',
			),

			// Vimeo.
			array(
				'id'      => 'social-icon-vimeo',
				'type'    => 'text',
				'title'   => esc_html__( 'Vimeo', 'seolounge' ),
				'desc'    => esc_html__( 'Link to the profile page', 'seolounge' ),
				'default' => '#',
			),

			// YouTube.
			array(
				'id'    => 'social-icon-youtube',
				'type'  => 'text',
				'title' => esc_html__( 'YouTube', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Flickr.
			array(
				'id'    => 'social-icon-flickr',
				'type'  => 'text',
				'title' => esc_html__( 'Flickr', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// LinkedIn.
			array(
				'id'    => 'social-icon-linkedin',
				'type'  => 'text',
				'title' => esc_html__( 'LinkedIn', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Pinterest.
			array(
				'id'    => 'social-icon-pinterest',
				'type'  => 'text',
				'title' => esc_html__( 'Pinterest', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Xing.
			array(
				'id'    => 'social-icon-xing',
				'type'  => 'text',
				'title' => esc_html__( 'Xing', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Viadeo.
			array(
				'id'    => 'social-icon-viadeo',
				'type'  => 'text',
				'title' => esc_html__( 'Viadeo', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Vkontakte.
			array(
				'id'    => 'social-icon-vkontakte',
				'type'  => 'text',
				'title' => esc_html__( 'Vkontakte', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Tripadvisor.
			array(
				'id'    => 'social-icon-tripadvisor',
				'type'  => 'text',
				'title' => esc_html__( 'Tripadvisor', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Tumblr.
			array(
				'id'    => 'social-icon-tumblr',
				'type'  => 'text',
				'title' => esc_html__( 'Tumblr', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Behance.
			array(
				'id'    => 'social-icon-behance',
				'type'  => 'text',
				'title' => esc_html__( 'Behance', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Instagram.
			array(
				'id'    => 'social-icon-instagram',
				'type'  => 'text',
				'title' => esc_html__( 'Instagram', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Dribbble.
			array(
				'id'    => 'social-icon-dribbble',
				'type'  => 'text',
				'title' => esc_html__( 'Dribbble', 'seolounge' ),
				'desc'  => esc_html__( 'Link to the profile page', 'seolounge' ),
			),

			// Skype.
			array(
				'id'    => 'social-icon-skype',
				'type'  => 'text',
				'title' => esc_html__( 'Skype', 'seolounge' ),
				'desc'  => wp_kses_post( 'Skype login. You can use <strong>callto:</strong> or <strong>skype:</strong> prefix' ),
			),

		),
	)
);

Redux::setSection(
	$opt_name, array(
		'title'   => esc_html__( 'Custom CSS', 'seolounge' ),
		'icon'    => 'el el-css',
		'id'      => 'radiantthemes_custom_css_section',
		'submenu' => false,
		'fields'  => array(

			// Custom CSS Editor.
			array(
                'id'       => 'radiantthemes_custom_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'seolounge' ),
				'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'seolounge' ),
				'mode'     => 'css',
				'compiler' => true,
                'theme'    => 'chrome',
            ),

		),
	)
);


// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);


if ( ! function_exists( 'compiler_action' ) ) {
	function compiler_action( $options, $css, $changed_values ) {
		global $wp_filesystem;

		if ( defined( 'FS_CHMOD_FILE' ) ) {
			$chmod = FS_CHMOD_FILE;
		} else {
			$chmod = 0644;
		}

		$filename = get_parent_theme_file_path( '/css/radiantthemes-user-custom.css' );
		$css = $options['radiantthemes_custom_css_editor'];

		if( empty( $wp_filesystem ) ) {
			require_once( ABSPATH .'/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		if( $wp_filesystem ) {
			$wp_filesystem->put_contents(
				$filename,
				$css,
				$chmod // predefined mode settings for WP files
			);
		}
	}
}
