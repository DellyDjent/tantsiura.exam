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
define('DB_NAME', 'tantsiura');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '~U#`=vW!61;7}92ePv(% eB!edN#6X.$f+l!Y!C>fxz9b9B]byQf=V)wz#%:F=js');
define('SECURE_AUTH_KEY',  'qfN{4@]jV9:>gE9w%kPB26]7!:$o?,Vr*-K^:N?vRba&-kT,{)3snb*|pCbrO[2V');
define('LOGGED_IN_KEY',    'U-/v(]*TC+b:Z0n/8#%:O[|}}|XD*)y8.U*+^6fHQ+#vk}qwys{C-l#/|)l|%K%E');
define('NONCE_KEY',        '2)XXgEs==B^c3JUz]cT<hc$LM]XHl&%L}YP=n+X-8|w83b?8(ZYLwG&y<_k6=hkt');
define('AUTH_SALT',        'DSm9CFN]X`Tw-G -au!2;a|r]yu+qFbvLB}AWPx|u9gk5&Y3o052GYXxt=9TcA0t');
define('SECURE_AUTH_SALT', '!-dOl;Ei&>90UYEj+xUI.9{|L&wv*`:OZWofKANC7#$X+79BYz_Z$7q#V,9l11oP');
define('LOGGED_IN_SALT',   'P98s`+K8hyDAj)G#D|-?H6TXP8|Yg^)P7?^b9>F{mzy4<xPvv||zT!wYz%m%J+:%');
define('NONCE_SALT',       '5O7_4M,?|@w*U4-I^O v?ZAL${=BLB(T/q#n48L:<QU:w0p! kjVH`H6sfN_dZ ?');

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
