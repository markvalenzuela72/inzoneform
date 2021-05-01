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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'inzone' );

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
define( 'AUTH_KEY',         '-,8y,hBkS+!eFCn<`*Z.^3P_%1Ng+$.|&&END89>?svX2>>B4~0J*c~^I)v;}qv3' );
define( 'SECURE_AUTH_KEY',  'D^WRfl!/SiwH`7G[ZxEUMByg&{U)afOZ1_<K(,sFfNGW%w3)?b6>c]Us+~9t.C.Y' );
define( 'LOGGED_IN_KEY',    '}Wq4r+)FO;EBi=V+uHwQ>sQ=%:^zX<g{08qlGo?l$YEdo`R%t=jee1t6E7mEsRpK' );
define( 'NONCE_KEY',        '|Ag~&4gR)h,o+WDtmjwMI=+TQ%zhc]`OF&mLHvM,/-Q)ul7wLpYv2O@{ux%!ND#=' );
define( 'AUTH_SALT',        'rAUe^SAKX1K|X>_rEBI@9}|/XYHS?Go@ra-`bkrLed(E8?&*b%|*RF%FBBqo`rI3' );
define( 'SECURE_AUTH_SALT', 'e#C%bo0t(sla;TNdGw|Sx/^GNtyHD}~/4-o5AEo+No=RYa(/m4.r1G:s8r*MDO2f' );
define( 'LOGGED_IN_SALT',   '6-ZU+LB9,?t0C:$^d[=ue,P)_B@G#qeR#FQ#4YrL7fhmcBsQz`c6lH_1nT[~O]h!' );
define( 'NONCE_SALT',       'ib+C?G2$BoQ&J=k4IuFqnqbj!5A>2*??Lelhn:4pHLaxS>&d]AtFrRzQgR;=4)o`' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
