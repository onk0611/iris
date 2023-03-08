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
define( 'DB_NAME', 'iris_interactive_test' );

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
define( 'AUTH_KEY',         'viB-s-!?msOt%_1+9m[KPtU{f~Hp%JXZQ6favBFo;g/aQ?:;O^=]n/j(<9r@:FK7' );
define( 'SECURE_AUTH_KEY',  '@g[Aq(lEV;o!d`xN`l%!$2*Su(Y_ZY#F|X!fi<jha&`cWp8n)R9KTkkxCpqh?B<<' );
define( 'LOGGED_IN_KEY',    'ZpX-./5+MRzZT)y+*+MubWj rxF1}D;FT]a27G9z)xFD:4Yd5%cpq*j$5I5m:W5p' );
define( 'NONCE_KEY',        'Njke ZrF;0E?]PXO;8{E<_PJkczarF(.Mm)hEj}}d2%C `g;q)(=p|%v4M+5) K^' );
define( 'AUTH_SALT',        '6;[O>OS;xx#j*2nse./n8Aj_<%k@T:CNj2zhmTe%&:.%CxyF.BLC:k&Njk!S9K&P' );
define( 'SECURE_AUTH_SALT', '&GT:{]spiziy^i`dI#&t)~RFmQpZ:@s9jJx16SC(6F-jT;,Ha*(6RggK7#VhU0s@' );
define( 'LOGGED_IN_SALT',   '4><<QWe_+:,^Y;J4M@j(]_qP0t+v}*`ed&`P>%xydF#PaeBiD`Rlm8$F(kYLZ2 U' );
define( 'NONCE_SALT',       'PBp+PUNO;MC.Q`n%e1V3G1T,b+@F0;[^`yF.yCFCu@&<z?1|t;`v,FWV$%!Lr+*m' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
