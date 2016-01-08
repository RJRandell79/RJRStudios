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
define('DB_NAME', 'rjrstudios');

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
define('AUTH_KEY',         'hmYLTy/xh?mTm6Oyx6a3zB(Cur|_!)1(0NIX]}hyb/8f>9+j*T` 4LJ.^/S]ho(A');
define('SECURE_AUTH_KEY',  '&C-Fv~dq7|b?&/KGbnTl:K6F9Fjtxe,a -%XHA0+]s,(nrumzD=*zg|f|+f7ck5@');
define('LOGGED_IN_KEY',    ':W%V!O(PbOEV2&Dl)y HF[#>:g.$N[<qwV:SYY+9QQz:JA 4IP3iF*TIu_(woof}');
define('NONCE_KEY',        '1Py3}j{0](y}&=p0s|>sX+4JUa=d6_$c`|n5^ZPg@/<ci2q:w-Y;Jw7H`yPtXjM+');
define('AUTH_SALT',        'hysDP[[9)NBaViH:-k[&Gt!T}1b.eY%}h9asX<@$DV=W+#|s9K=wg:~?;) [CkgM');
define('SECURE_AUTH_SALT', '%GnPo/{euh1CQe,7+,P6KB8I{h=NnslFu]i_@?dI[JUW+Uy@1622#D^mVaM6Y|Cq');
define('LOGGED_IN_SALT',   '#EC3gP^4_P}p0,A 0VAC,.<[ R26d,OCAx!,u)VOa$Fg:&%;u!nXWT3uhQY>+q-Y');
define('NONCE_SALT',       'D$3E?i0xt|a2mO`1(A+9Qy/h  Md3d+p9XYpzL%uZ|~ha&e}b#e#7:ZQ@NXzQB6J');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rj_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
