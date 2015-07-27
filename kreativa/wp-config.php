<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kreativa');

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
define('AUTH_KEY',         'V_{,cE?6`~!6qRDY$=Wq0Y!0)E4` J=HEe=TK?e_.R^7GmCUeYavV!*^`^,pF]d>');
define('SECURE_AUTH_KEY',  'a(k*$b%$A.v2hB|w|RG[][ (~L2_~931v1Di_DEuduAb4BVsO-~nF#<g>MT%a%Ma');
define('LOGGED_IN_KEY',    'R8[O?XoL5sf-..>lbIWRFaZnY({}Y2$om;{G_mdTY7xNMf.5j)+CFPQFk5}|.*e5');
define('NONCE_KEY',        ',{JWX0]1&(-2[_AO^c8uZ5$2GP|-L0YUWPrs-2~Mf()8Wqx~ijgCck:@9b~,5Ogd');
define('AUTH_SALT',        ']4q7LyaiMDjdSM /wN=)t9K=s~;1:H8YN|`Oj_E8z,ofCxYVdK$JeD9(@+Ui>Upy');
define('SECURE_AUTH_SALT', 'OW1~NcRpBm>piNaZLcF3Vk&B,A0IVC([lO,tSU_n;w5^8uJJh>PmcM&hB5vU8p=~');
define('LOGGED_IN_SALT',   '+em euX4n05{ma,=/{E;P.8/5)Mc5X.H?ub|E@7&,7I y4 zDa[aiaLCl6g}^B]#');
define('NONCE_SALT',       'U#j>iJ.a#(ru5R`TI.q/I,6cpCMcyJxWG1O Jr,Q1YR Usmex_Mg[ec8s#!v~$@J');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
