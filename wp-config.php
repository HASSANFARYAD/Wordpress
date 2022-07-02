<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/**
 * Database connection information is automatically provided.
 * There is no need to set or change the following database configuration
 * values:
 *   DB_HOST
 *   DB_NAME
 *   DB_USER
 *   DB_PASSWORD
 *   DB_CHARSET
 *   DB_COLLATE
 */

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'g.[GUh#Jr<dC+9+),4~CXf@+M~%G*mOm=t%>EFZdDCsIYlu{1)$[!#VCUE*$L31x');
define('SECURE_AUTH_KEY',  'SU>PKo<iOI$xKbxI$|K6TU4DA8hRn-~yp+zPcDZDP)Wa;O{}r0=c#*b9B8Af%W8k');
define('LOGGED_IN_KEY',    'uQQFHAPFS<!r_%[4w!>3KHp3y,*f8_I9b,:zEmbLHaFE[[T=zH<<kUI{R02cxMS2');
define('NONCE_KEY',        '>a3s@#tuB4B~*8h<nzk7l3Cv6;6A]57YRCL{?#]:29Af,l2u7wcx257~ivcY>-a#');
define('AUTH_SALT',        '1YjNf*^[=BZSW>13XtsY.=z>fk5V@pbUnobtZ=5U3^p^q=qj4@FHPfp13=30iWBB');
define('SECURE_AUTH_SALT', 'D;qmg50fs-Pkr,M#Nb;N$]6xHMPaywjks|PL}j]r,!68HQh0SFg2LY5=}0|uKZ%a');
define('LOGGED_IN_SALT',   '46]%AoKc[+iE6ci<@8>uH98HxV(PkKKFAHn|(=@kKhJR;5}i|0w_tnChO5({O{HJ');
define('NONCE_SALT',       'CUd1}?Qt;)rAY#P^vm8WJ(eQ?LynD,|KTcr<2.7|%La)mkM$M95Gzu.Ph]zDffpw');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
