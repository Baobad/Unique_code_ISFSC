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
define( 'DB_NAME', 'Unique-data' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '1<.Z<TgI6;/a^.zJ[Oesf-SxrVB`&r:NEQRH<c0_4z3t1XQ8HDXJV^;vp~2wUG0>' );
define( 'SECURE_AUTH_KEY',  'g_l< ]<>MDkx<5PBwD<Gg7WApH$!@GJnKX.w+nrK^{QA-!b<afXGwOj3Y(}Jhv~f' );
define( 'LOGGED_IN_KEY',    '-p?>m|Dy)hsD=IdK?nwhZ7/B;j&w<a!M{k;6.BxD/hM>Zl DBa~KjC|zAw<)Tzqs' );
define( 'NONCE_KEY',        'VlDMzL(q2o$D`4Ew8IBXp[P*smm`ou-&48mz)Ucmp[DdU<!ZH0,8`wOF#6H~A/yi' );
define( 'AUTH_SALT',        '2A^tR&5OXJ{=2rC|ON}~VDjPc9h(3Fa(~Bc6-{,MZ{L;jpDGze?KV3%Kb~fIELyQ' );
define( 'SECURE_AUTH_SALT', ';WA*VM]AH6;<VF/<Z|kkNE+(jD6A @^AOrYD=3fv`r6TBq^/.=GoRF&H~AoY),Ao' );
define( 'LOGGED_IN_SALT',   'c1S#aj~,5V&gC#[6eCfYi|hWrWjl4 R9{_CSgW7K0,S|1Bk]RqExf,}5jwIRrc|W' );
define( 'NONCE_SALT',       ' %44HR$;sF*$3/Ga<<93-NN^Db|2q.F ]MJ.II^:C&@oE(d~68[9gq#L4K1^W?DU' );

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
