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
define('AUTH_KEY',         'g..@~iEB]cwp^LgFRBv#eb|}Oc2nJL#>){QsG2-Sat&J:HBV1srMQ+U1um7P$u9z');
define('SECURE_AUTH_KEY',  '|FNo>hU+JH&cftjz1;0nwxQ,jrn#64N6Y3)( |1H+mKGiMT$M?],3`-a43{vXjR4');
define('LOGGED_IN_KEY',    '- (Z?r|$3Ry6KcG96n&^;(6w54K.ZxqtCXz6|=5h-9)YS-7qtq>5pWfrE-#3h-{)');
define('NONCE_KEY',        '6HO<zuc>pJ{Wcng5|l=Q9mhNCGZ%}%3apjA&+mfdN/.:rmU^ LBBm Iu^+}+erT}');
define('AUTH_SALT',        'T`H;bF<k$-2-FPRk&viE=7z$+O@*c(r8&=d4 Jq]~#~zHp6*!N(($XfKs+H6~!y|');
define('SECURE_AUTH_SALT', 'E-Mm_o4tYkc>4pfVU/q)-)ufGDY?$+hQTw+_Z/]G);&*}5Jsb1[GsbC8{0+Gy{3y');
define('LOGGED_IN_SALT',   'eL6FJT<sT#(>EHs3Y6]xpGF^(5ak{Q^8&RL#X@!1{,_Yu%-a+k1XnKOvBtc[ymJq');
define('NONCE_SALT',       'T*p9!Vo;)ow{ qGHQrPTti@W*mLVvm;?kJ{;8uCL9B+04i<|Co@dAJ?q#7f-nR!6');

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
