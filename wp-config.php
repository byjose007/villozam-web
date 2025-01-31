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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_villozam_db' );

/** Database username */
define( 'DB_USER', 'wp_villozam_user' );

/** Database password */
define( 'DB_PASSWORD', 'wp_villozam_pw' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '2h`<Qk2)$UXRb=U(Q [k):1^=s1;g^QmIXws[2m]ho[.^&:s164,6O,XO?orr26C' );
define( 'SECURE_AUTH_KEY',   'b:WB1gp|v(L0};m+gUk~%qS)h-U-C{[0{G&_sZL!u]Ya7lu&zu>Zo?dw[4.Y <VS' );
define( 'LOGGED_IN_KEY',     'M[+XM50hb)jjCm>S(,#D065sqr>mj<&4:pI8matq`g1E@p*>5hUjc}wRHL#6|Q.f' );
define( 'NONCE_KEY',         'fdE8a<GYKQpa~I81GH:?8O-4FXB~x=o2n^=jy!v;wCA,<;`Ufzpx4ID|qcJ&]~nf' );
define( 'AUTH_SALT',         'CsZGO&Q0EQqLs#S)bk(0Q+gPB$m9xk]LcbO0e5?9p$)hqqNDll@asE,y{{M2 IM5' );
define( 'SECURE_AUTH_SALT',  '@yqb=~oT~ms0kaJcg}_i@rqBCOW?gG#|w$F>+3}XP0W*E1R:hc$K[fKA<hf(dnRF' );
define( 'LOGGED_IN_SALT',    '<TLmOIp(!SvR/j%&$6yvMhJv.w{%y2L|`WNrRc%flpZHwrBB^e@peNqV_8]_5t*:' );
define( 'NONCE_SALT',        'Gl `F`OWRq2^.&Ias}%kMS,Rfc?t!.-8U-8UFqF%Xh5u9>}IwjY{Hp@DQUn#E$l{' );
define( 'WP_CACHE_KEY_SALT', 'dq1k9go:E0Wh#10ClP@ rh_nfNmXP><q@:-FrkpA;wlEVMA<Q@h*>63X%E1xl yF' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
