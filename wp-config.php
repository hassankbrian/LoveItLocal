<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '`J. .#K9U!^o()E(7Q24`|-$>mSwT[-N+!Nll=dMzHU(oujb>ImJf(I~b1}9y~Z}');
define('SECURE_AUTH_KEY',  'ut0V0|A>[o[}`Lh%jxY(+E725(jd@`=-`8&)A?Q,4!!|HpB|e4tg87Bp|kQVfo!?');
define('LOGGED_IN_KEY',    'mJ[>A,|H.Q)d[OvU2]U$Bg!`Uub+*E9|lnhh* Ky]O]:Rhlym^GfMfQ-65lm+5(7');
define('NONCE_KEY',        '!Wh|Qrrxt,}U]Jd)8;L5Z?3os3LY7@}Ov_=z4C**u&5y^Va=FF0,{77Tp[-^L,Mh');
define('AUTH_SALT',        'JFVt|l 2rXB@^b^?]oREeEk<LMfAchLs?Zcg]_iA|T$GvK|00>]aoJ|r8WM(e+Z4');
define('SECURE_AUTH_SALT', '/pL`<<2ow10s|HnS|X}pzlEw?|%Q;(!J,Un(-sv5B8|cyMl^!`>{0@K@dLPxIUP@');
define('LOGGED_IN_SALT',   '54JRWh4YZUy!4A@1DY/(C]djV3ww[X$-7`|0f3x+ZkVL{F/,d =+20W8,wG(|x$B');
define('NONCE_SALT',       '9-h?6T,?^UTXzG% DEl6aS+v7C*Zp]ap#QXl,,W>*:*ya/@~>%t(E4(cCBviNcS8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
