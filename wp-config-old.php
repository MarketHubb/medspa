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
define( 'DB_NAME', 'confidence' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'TurkeyDoor35!' );

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
define( 'AUTH_KEY',         'PF-+Qwv)QV<h~f7]Z1f-=)p-a_j2- qE,ldPuV!6O){mZg|/H,H _aX6,uZmkGP~' );
define( 'SECURE_AUTH_KEY',  'CT~vMp7Dgi#+3Smb:x-1f;$}ow#CXebc=3&%1[:>vvFjY)v;h[L23enxzT}ESWzM' );
define( 'LOGGED_IN_KEY',    '>7a9L[5+|qPvu!GC9DiqQ(h?EoV+d^_s2:=})f4,`9;4GG{izbWNqKf>sib]%%/I' );
define( 'NONCE_KEY',        'wV!4K[PzuSk0nMZAeD{{pK2pGzR[jMq6Xg!71_@L$DgH9=0]Vib+..|-Qe&Pi%Rk' );
define( 'AUTH_SALT',        '43p#j9L~Il6W;,q}udTq)~SobG*K:FXk^YsR5$[qr`&c},P@SiR}<j;p_!S^se22' );
define( 'SECURE_AUTH_SALT', '1@[(Lj0j)&i5o.FEvW[+J0&Y)vT`~t*mT|p^@aKvtWU{R{?|A5Z}vYiXDA<RJ )d' );
define( 'LOGGED_IN_SALT',   'gf S ]C{DWs8EF!QxVzFY;F CqIs5MNlaRI<v I)ic,0AXWUj[lcOepHSl.GxU% ' );
define( 'NONCE_SALT',       'Qq9ddp:!Es;wAS;voE? 2Cm,|D4UDb./M`>HgD{E6PS|.x;a7<!Wt[=F) M<7O-*' );

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
