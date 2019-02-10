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
define('DB_NAME', 'simon_test');

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
define('AUTH_KEY',         't`,1kx}q/(pMZ(cC(yn~ZKf1TbtzzcM)Fr(LZJAoCXv#=T;BP(vAuBq39nMMD&>^');
define('SECURE_AUTH_KEY',  ' ./`M%=9#bJqz/Vng`cR_{pg~.g>6Nuf|EI^@H^-5[th7+vezXoa6O`|g;{N}S#>');
define('LOGGED_IN_KEY',    '0nWNRQK t[6:;O34SrPr0.Vl(S!(bq,qyVzw1!Xu{hQ)Tjth^Xr%Fq{W(Jr==Kn&');
define('NONCE_KEY',        'tET.ED6EWJ>>n(<>.mq?Nn?pgOa@4/4TGY52AM^I.nX-riF:}{7#i AW&*u8Pjfs');
define('AUTH_SALT',        '.vmuiFXN6upgf^vN#L7?o.>m2k@~c}@(u[d?5~A0KwH5ib84b9LSjKgdy49H.~VR');
define('SECURE_AUTH_SALT', ')!Y)(xey<.{OpbcRiUy?)BXcegHJC3}LG//[e(wFzrCNDJX!0SL(JYR354n,fU>#');
define('LOGGED_IN_SALT',   '8O@PHzw2>>s$-nG0hxNoF9-.{},-XT!5:Up-}@fdkiy&h<kdG9[fh<P2{y!;@L]K');
define('NONCE_SALT',       '{j2dRoP{!~.>fR7Hm``]Zhw+$(yI)&+Pm)*/PcXQEf{ecT/sgi %p-T}Rjch~+J,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'st_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
