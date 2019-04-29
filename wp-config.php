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
define( 'DB_NAME', 'beer' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3CeA&RG2{a_ZZZkg^U#,hJzHpFlekU (HhO~0eMn9YwBMuc9.*bD#4Q,]4DyYD H' );
define( 'SECURE_AUTH_KEY',  '0RX?`I[@KKa23t)V>@ t<v ojW:-@6s~27 RKe:u|3l+22HF~bc4tDp:jSYTf-N=' );
define( 'LOGGED_IN_KEY',    '<Avm@B_<t+<_Pz gKwoc*/KGa%jWGlHK_;%15cT@tFW+ePrxa@hS?)gf}~u2S/^#' );
define( 'NONCE_KEY',        'A&$5$pjB-ag<,jaA[c4A|5R{at6:Jr;E.VDoO%NYY/SQ.JY9Jj6PfdUyJP,Y(9Ol' );
define( 'AUTH_SALT',        'hwq7fCjM-pZiwU?!nP>Dy.*:^P$@JzaV}a<`oq[l{g^q!*Ot~rr9lm&nhWuT)<$U' );
define( 'SECURE_AUTH_SALT', '<4<<%9U(|jK*mYs:5.yG]?=*Egdkmes_Q`@[.{ E=f+N}?HJ?m5q.:nx1)<vM[UJ' );
define( 'LOGGED_IN_SALT',   'I>M#SzDM6_YJ*BN?V^3i3{|b}7AAl7Pb!fn-({uYhw4cTlJm|CEwyu]dMl BJG=`' );
define( 'NONCE_SALT',       'Z s%s!t`T+=xw#3a=xXSwbd5oz_,G1c;-Zqrj.m*{#g``2aS)ZI^%HBc};p[*=7N' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
