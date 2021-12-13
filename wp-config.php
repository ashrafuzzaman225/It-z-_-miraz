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
define( 'DB_NAME', 'learningwp' );

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
define( 'AUTH_KEY',         '!QKF&>DQWH8KG6!PKueYDS)U1x0j>k[r]F)|YD@v%{Dj?X jXa=/G(#|Iemf9[~v' );
define( 'SECURE_AUTH_KEY',  '5|,K}aK/c& pD%@T?;PI[y`9}uxF:aD9Rod-R7hhGx/k;/q#y7Od]=c%)N@GqyTj' );
define( 'LOGGED_IN_KEY',    ']*L?L:_[:?;vh<v;0u7Ye}M(-N8XB;>+/XVKte443%?P)ofGlZnVG#E*`2y!/n~`' );
define( 'NONCE_KEY',        'f<|jYL[dQ *Qe/Qj0u;%OA48aFGIB25^2:a,$(/.v9 =U{cvP77EG]_`TIRY<l(l' );
define( 'AUTH_SALT',        'hzW.BE7]d cs%gPs;0aLEx8WUsaGkE6<Xt:Qg#4V;(:l9oFOb5UpoGkbc#(I;@5>' );
define( 'SECURE_AUTH_SALT', 'i/5p8)0B6M.2[uk5KZ/}SWSXm0p}K:d/nj|3J9lp?4dt8iZT-i}4%KuTpzLB-c+A' );
define( 'LOGGED_IN_SALT',   '?)7aSC<-joyxwpXFc{|Cb$^;Ti%?{iI6e[MR#cW{s&d:_:rlOx)o|o[=9mTN=| -' );
define( 'NONCE_SALT',       'A>~pC)P,E[dVtDE.6ld-0ti1zx3|tL~qL5o.P-8N^@3Iw]]7`,QnszT2w[y#o>dW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fdz';

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
