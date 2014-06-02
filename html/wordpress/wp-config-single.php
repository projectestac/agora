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

global $isAgora, $isBlocs;

$isAgora = true;
$isBlocs = false;

// ** MySQL settings ** //
define('DB_NAME', 'wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', 'agora');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_SITEURL', 'http://agora/agora/wordpress/');
define('UPLOADS', 'wp-content/uploads/single');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'q$ATvJpV<JO`Xa)7hv!4)u%<wSdmtE?519V>8X#ds~|Pp9|jduz1[Cc:1??K%ty:');
define('SECURE_AUTH_KEY',  ']|R`MQ?~b$|e`)R^},O1FFT|H_x!ukyhEXr:bOO2Fq;a_..iRNG;b,tzYNFx|i&v');
define('LOGGED_IN_KEY',    'o[E|Hg}oL89sDHB9,cPm(+bd!klzS}R=e7o]N=6N$@^s]u?z@{ SA032!@c-2lzj');
define('NONCE_KEY',        'Y.ojKh*XW<&*bZ?0]b/g/_?klFzk}O&J-}$-#>}x7Ye<E[U`,4ih@& 5MqUo}L~:');
define('AUTH_SALT',        '(Ym[t///b5JXmf9W(g..Fv2L@qF5473IQ|F4C/|},Y[F{SRhlL?ADKWa/@8ts&-s');
define('SECURE_AUTH_SALT', '#m=Q-MjIv4v}B7Ewp3IG@~N!DwE=eUoyK><[V^CoZ6A[ltJ0jrvD??L-,^J;DA~6');
define('LOGGED_IN_SALT',   'Rr& 6>;jA1?K?xW}zWsvxE@i6lS4*+f|RH0W[}.:egl|RYQ*Y2FVLqvx^~}GiO8%');
define('NONCE_SALT',       'N+=]R(*9^T2<ja;$x61F}tq6XDNO%v[iL.?3#;h9Y@lJ2-X%72>- 6!3B8R}g:uN');
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
define('WPLANG', 'ca');

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
if ( !defined('ABSPATH') ) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
