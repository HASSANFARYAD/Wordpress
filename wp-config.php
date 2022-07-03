<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zz' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p,_WB5:]p>e?=ZC:OF&}UH[)*7R0qK{jhzaF/LT`r*p|x;;k+O{}]Cp[KWw`VMEe' );
define( 'SECURE_AUTH_KEY',  'Us(Qh;l$qi<iU]z*I]<i(kO`u`/#hBPYV/[QaKif-@dB/9S+ACD|FMUA%[Y|T${9' );
define( 'LOGGED_IN_KEY',    'h ;6n=;2F`B~6Y^DRoBL02eF`-f)OXUNM%ur*:{xP`NEN@LY|Epjld.1Q(deC7T)' );
define( 'NONCE_KEY',        'hU(qM[)iIMZTB)`E%q:?VJQ|ZJ|2>6ZBv}zfY0MGbJXXE-?9@<EX#z)U:Ry8cOU%' );
define( 'AUTH_SALT',        'sjC~* yih>h8yw1U6)?]0:D4-At7m>5Y!ccEFcHV#4gKF6{NxQ~FC@;lfi0%kQoG' );
define( 'SECURE_AUTH_SALT', 'mG6w70)qE1@4_*,IF;fa8y;y5k_:_WNYtcz@#5r-yPstfmMuv6-7t1}XXmeg8:ex' );
define( 'LOGGED_IN_SALT',   'miv4%sR*SiyL!Kj@<(kNFitg#l3LuC.p:|U$kXB4P!hsKDh[)ah0 ^7x|m$UnI26' );
define( 'NONCE_SALT',       'QooS!s}t0tt=2@M%UmieNQ=ZsxVx}{BdXOo>?5c(9lD6hF3:voP90P+##&$pEJ)~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
