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
define('DB_NAME', 'vdecor');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G]h:jQ>]`ZXlT2;d:a:]7u71NT6]P]izJo~X0zN[xNVf<zS;lUb.m1e>E7(jy+/?');
define('SECURE_AUTH_KEY',  'Fc++v-N?LZk>3bWI@zZGA<uW$L/GXfk`q3MkKW+:gqYx:Wt,x;&Ju~sQu0z6/ @?');
define('LOGGED_IN_KEY',    '2*U[ETT-Y-OK>{]=.,{w8i}d~l_B,>vzd7u!hV{%*@}f$RsTocRjTQg9nv_}qf+t');
define('NONCE_KEY',        '.;K12eG$)dH?fLQ8mUvWH#f}k&z8w+%?.p!)#:2vxDz. 3-CTw{YWZ6S;ho.ru7[');
define('AUTH_SALT',        'C2|.4o5X&:^|n2o=[$`;*m9qpsj#MeK~6a ii3XoD5]a1[,)TwxyviIsU$t?PTqU');
define('SECURE_AUTH_SALT', 'LA2YL3fJ|`Up?Tfd:{~if!0_xDhaF_+dRCqa)$dv.Xu$u4>jS|N*3:d_][/3mGS)');
define('LOGGED_IN_SALT',   'DqJJhwm8^9|c+W$ 4> ~613k~m}6veF[+%bVlzc>9&`3l@NNY95Xd@0/8JFuiGnb');
define('NONCE_SALT',       'ZfQ|#s+8HI/9k6!MUI4COM:xn^GHj$EYGka.7])7sx{u5dVa2h62#O3,B(A!*^]n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
