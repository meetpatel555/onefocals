<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'onefocals' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'Ed; 4fMA;< b~Ii9zf4K;rEG|+Y~2&aKaW2{9.W@u.yPuGr~K_jxL3^Q@PZkc=-z' );
define( 'SECURE_AUTH_KEY',  'SEmivH^B<mKM6([%<Uwp fmwC@vfH7Kp^8dXN.{QQC70vVzGR%Xc&e}4#0f<B@My' );
define( 'LOGGED_IN_KEY',    'StuyFlR%^fO4n71A7vev$c99KN}/%v4fEf7+}NRVK([)U{]h,v4Kz%;dM6/yz0EF' );
define( 'NONCE_KEY',        'B=Ri## ya_Dz:d8w#H+>j}cQS<IZObtM2QH>7kHHOy?&+_RL=93M_0?9n46V^%={' );
define( 'AUTH_SALT',        'R&NM1*5M, &l9^!JA=|%}b^nMTCg->lbu8NHd8@ud&lg@~CndV|6)3@N{oTSoI&0' );
define( 'SECURE_AUTH_SALT', 'TG&yNFT/.!e:3*Y%KZ@k771Rmo0aBy:yZXLD8}qRji0~4*`N&F<<uj{Z`D^gVob:' );
define( 'LOGGED_IN_SALT',   'SM=;@Fww;r3k?Gl)vkw0;PrR0^]D^$tD(_T`Q1r~GFy{,`xAT;}j4].QDP[v-y^E' );
define( 'NONCE_SALT',       'g(x,ap^E[M`mY S>LPay&64ad6?&tTrjga6zZk76&m|uyW)_k$~DuqKSj~{JiVy1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
