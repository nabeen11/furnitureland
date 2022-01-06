<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'furniture' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6E-NC: rkBpY/gu)HQ$aF)|wlVUfHMm:M0Al$ap7DL|u8RweN^13NE>G:(vlx=vo' );
define( 'SECURE_AUTH_KEY',  'Z+_pzv@dHov[}R0g6KNIg&*g/!cyt?L;(8tu;@Fjz@9pyRMD KSZ#sbleWwsO4_*' );
define( 'LOGGED_IN_KEY',    'kL;8*0]1l7CuF(7+S[bsj1#n`[e3s@_,ahY+m;MBVwu&gF:+gq$_/@OggDc&`I}+' );
define( 'NONCE_KEY',        'ggq)9}#qhV(1HH@I=2PUiq&k,{:<n3P^}Z0^rk{P#U k:m>,hkfD27g-o.rmVF7,' );
define( 'AUTH_SALT',        'r!TlR5!*)]thGzf0c#z{32F23?f 1J0DUo/x:p!J%-g]hAjWj/sU0iw`WfOS{7X/' );
define( 'SECURE_AUTH_SALT', '2t[0 TWVeg`q{UIpmw]N${T44VU6UvF@<0?Zl(M_<uCd-R62(1%A0ttG1b#_~4Ib' );
define( 'LOGGED_IN_SALT',   ',2(r#UrgJ8/!_CrM_JO]<v|+I}qFBby*/-7T%b!t5e`Z>XcK]f:vY=uE>e9DryK^' );
define( 'NONCE_SALT',       'TT+P0[ V0S(gP=g}Y.)x5oX $F7bHC25_b-yozuAV_9bu8VBPo^d)^lX0C6>b#32' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'nfur_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
