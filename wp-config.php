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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thpvn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd<p!(qx CO+Z.&(.txtAbTE|lESqOe4dg8i^^}nvMyz#1](3WUie8)5@hX5j~dbJ');
define('SECURE_AUTH_KEY',  '(f8t%}YCF8]Z[Z`z*`}G?WTiJ=PmFNkPhR^Fc4<EB1hQpK;Kau6;P$N_5tQc[zO|');
define('LOGGED_IN_KEY',    '*?`]QYpw~AQIO77LT[Kp#R L1oH 3S`s~EK{JQ}fJH>^,oDegWNu6d;VN2^iz-68');
define('NONCE_KEY',        'D.MUh%I^d_gDnj_ziW#,>Y<&PUNb_n4 .+g(,TAtnsP +_+g%sn_x%{W/!|mAS>!');
define('AUTH_SALT',        'VDk8?#oY_:93|ef&AfW:<eLA#C.>476hpOm/)29x/.*2ezm2YeZQ/N<BXQ!Q_2iy');
define('SECURE_AUTH_SALT', 'dg#Q.#DkL+qo:YoH*UNk3O*-*vlSS5xrz:!1/Yd5^S+k~~G[o3>UM}<#YDWo])uI');
define('LOGGED_IN_SALT',   '(2pk`Pzu{h,N#Wzx2h5d{>3Z=3[hB_JZl{5E[>tt*V;uoMfKHIOf-t~CGmsvb_~6');
define('NONCE_SALT',       'y:^m}LC {t8$}PEq=PI50KfPC971HjBt`w|R8,m-[[I;TA8-,.TL^FXhEESl?@;I');

/**#@-*/

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
