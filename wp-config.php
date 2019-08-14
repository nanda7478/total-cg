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
define('DB_NAME', 'tminfote_total');

/** MySQL database username */
define('DB_USER', 'tminfote_james');

/** MySQL database password */
define('DB_PASSWORD', 'L66}@xlVixhs');

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
define('AUTH_KEY',         '~?o4rxyZkGbiJKVv99i:pHSj^S]SIcy%1#dqP{Dx;W]7Z,R`lQnD9M`ATGbtEn-,');
define('SECURE_AUTH_KEY',  'u^yL&l(Tq[ykBEnLJzt<YHYC|lw*S!oo)NjN0`FTuh)F2+J7[U>%hw6hFg~WO$)@');
define('LOGGED_IN_KEY',    'Dw71E@7(TkiAGKH{|N6$]J(q//l(]di<Xemx@z[>)T/4sQA4OSK4HaO:4JWT*C1j');
define('NONCE_KEY',        '4xB#mBb]W H6@L;pf.MadG6>imD]gO6puh02qQWA,PYL,2kM*L-47FswBBMAwLzF');
define('AUTH_SALT',        'bAZ}Mm6>I<]IL5Q^bx=w815Vu)kxXkLBz!$a:JdDIJ)uA87@qZKVpe2C4Rz]:4uN');
define('SECURE_AUTH_SALT', 'N|M#eECu1?dof?=1^ujX.AoKV$t|SO([Sm^EET|w.ev# a|CFh/AaN~IM@L&unnK');
define('LOGGED_IN_SALT',   '*bYYC,KWO{IrY$85-729VLaW^r@jOt6R2`*{Xi{P{u{W}P~uh*pw3}?SIK5-#zWW');
define('NONCE_SALT',       'ynV]JSXWR*epY2^#3_~nZ%NnC#GRBX:Sd77~bogo%Ve!T.<7ZoZ@*&qtVWs}_T3~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wptotal_';

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
