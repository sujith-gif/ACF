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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ACF' );

/** Database username */
define( 'DB_USER', 'sujith' );

/** Database password */
define( 'DB_PASSWORD', '123' );

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
define( 'AUTH_KEY',         'W:>xyC &_S)hFIF-4 t)h?dk($bWO7dgd:9yp`>kqe:Tp]%BD3=Ev$8q X;N}}43' );
define( 'SECURE_AUTH_KEY',  ' ]t)A;&rEfs~Op)YJ[IF.ZV-;E`}ao<1>i4=%+qBlkY1l>]TK5ov[zGaI)6~y[q[' );
define( 'LOGGED_IN_KEY',    '{oDzH)CR7&uT}LWR+)5n9f@.C[/CbN/QGYOg9rKt(GfoMQeh),ZWEph.&jx&h06/' );
define( 'NONCE_KEY',        '{$$w]96R81f2mW#C4vkVKi/I&!45!y.}ozdw tqy)@a~.0xJf2;tc{o&5noNNJe+' );
define( 'AUTH_SALT',        'LYYbI&p`{e@,>,%6*psuK2hM#}VBa2?&<oWUd9sUAb<3?l-`%g 8NQ8M6fAHJuh}' );
define( 'SECURE_AUTH_SALT', 'vJ=W_]B<-C9.oL;~sT-fBBC}d;R2*_|O~JBHDmk*@JW2rLXEP|TvJtoV *x}g@)l' );
define( 'LOGGED_IN_SALT',   'NvXQg_~J@]hzu;6Mj%?mF?8I_X_}2J3F[]%5X.22t-!?)g;}`pc|+~F3Q_8NIbK9' );
define( 'NONCE_SALT',       'zFLw0O+3#<0M%hPJ=V3kiYsl]3M`aV5DWX/`W1?l5i4E$XEh&GH^VPU&SgN}-B*:' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );



/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'FS_METHOD', 'direct' );
