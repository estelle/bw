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
define('DB_NAME', 'slewis_dev');


/** MySQL database username */
define('DB_USER', 'slewis_dev');


/** MySQL database password */
define('DB_PASSWORD', 'gLs14s1@');


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
define('AUTH_KEY',         '7Ch0AyL3X&XRosfW[pn/+*!`Ml]~/e<^cN|5|Zq+rFAhBF4(! c1~_XdCl@I1#cr');

define('SECURE_AUTH_KEY',  'og-%CNfq?=uOqd$NWn{E{Oy=A1^4mK2hp$<Wn/>-|s*i &UZw~Hyo5j_jHI%UXx9');

define('LOGGED_IN_KEY',    'D[]+$|}3g<qp!zOE0&+Ded^G|]1(@ &V@m(|T1vK9([v<E*N^g~<{MYZdzKE+t?f');

define('NONCE_KEY',        'a@Ev@0Y9-n5tCnx/&!1[)oyZ}:_|D*67<J;ht~Bw07X@CVrN=%OR6{mJY74Sxv~&');

define('AUTH_SALT',        'KQvDQO|@Kzt:?qZqZcBBn1f`9Dy0S%iCyP-+kZYv1Wm<B0-,#f{AT24ltH@2/#-z');

define('SECURE_AUTH_SALT', 'D4|-`pYavopT&QO,8C#fHXpGRzFbjeo*/k*--f/J7TYtgi-jqq@qZ~71lK+flhy2');

define('LOGGED_IN_SALT',   'cpihW#PBsw;Blo(UD1>.`=z<4uz(9/(ot-Q1]BK !>Xz[<,~%,`|q/_5Y]|A%~%!');

define('NONCE_SALT',       'E=H~)Qd,+*`d0-vqT<+(UIS|M<7,|O2Z!!K!ol&bV~XRnZRK-+b;BdwA>QV{mE0C');


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
/*
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
*/

define('DISABLE_WP_CRON', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


define( 'ALTERNATE_WP_CRON', true ); 
