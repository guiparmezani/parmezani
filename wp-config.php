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
define('DB_NAME', 'parmezani');

/** MySQL database username */
define('DB_USER', 'web');

/** MySQL database password */
define('DB_PASSWORD', 'web');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://parmezani.sites.parmezani.fmaustin.com/');
define('WP_SITEURL', 'http://parmezani.sites.parmezani.fmaustin.com/');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'YBH1?,i<(<oE^JH1/o3+N}~lBp0_9X8zdL_EWf?J e?,JtZlbV$TrjYET1^>+HRv');
define('SECURE_AUTH_KEY',  '7K$,<IWldpo&O8ty=Vgjy%9U]MJcUTf5<jeMW^*{XkT;uTeO:d;mb<?p-OyH`k{H');
define('LOGGED_IN_KEY',    '?ybWiPO&Dn`+#L(wyW`bi6]9!$|#iAC+X6?/%:S]<V^^.<|&qs]#%W.qU<GGjY+3');
define('NONCE_KEY',        'n}.RK-k$KqJ=*M6Z1aW/X%3*4PN;vS}_u<O|,oZrBQT{** !QfTL**[(@a%=0UQ/');
define('AUTH_SALT',        '!VfH3kCW0!.Li;w5w{GXcF_T1nKYkS|/`n#C_3?z,cm%wbGsQ7>gEGh^~.:raIkZ');
define('SECURE_AUTH_SALT', 'AJ,EN-SY=d0-;l;aH(mjxH]kf!9zpAf{@ s 07[Dg^z_hZ!0?]3+3r-!|z8!,@B{');
define('LOGGED_IN_SALT',   '&5y]uJWzieLJO7N0zRLn^K+.&955rR#cNX1K<WdOu$$I}9WRc+WzomtD=x&36{dG');
define('NONCE_SALT',       'B*z!_NJfrlz=_`I#_nBTGL]rN*hE$kifAtb0JfR0r8eRid]jQ*_q YuAE|R& D]0');

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
