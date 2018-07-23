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
define('DB_NAME', 'topograficheskaya');

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
define('AUTH_KEY',         '*Q3[fqiC5F3=KrZ5FlTHsSpL7+yXLBsLkZ]5IDI8vXF|!Rm(~k=Vw{N]]W|npqN~');
define('SECURE_AUTH_KEY',  'Sum1.kdsS9GHA8~uZXI5_l+$hH$W#Kti446AcL)XRtG;MPN{cJO2V`WgPE=._k)1');
define('LOGGED_IN_KEY',    '+W:f%>kMZ|;~wzofQp29v/&`plaqGu5ql~4:|k{XjQI`EfQx%nm)bp(jw;L-H9PP');
define('NONCE_KEY',        '}0yA{TFdg3Er>P4;TQe-yH%FtL#AN1Z ax!zgLc.~==EI~[d6sV*$fNa|2,*2u7u');
define('AUTH_SALT',        'A{(?E<P!n0xH0QCkvn@jABIMQ/Q:L.;~OzT~elzt4~o=PkdyjPwpMVNj }PK5y#_');
define('SECURE_AUTH_SALT', ' _jw;YQLO>O-EMQ@i-MW|hVNR4#M?Bh~;P|N$w-!f{[P5>6Z8@ Q[]A~:;oSKg8]');
define('LOGGED_IN_SALT',   '4_;inpvE0sgf{m<}co%Rz%{k`%6nHv%$]/`zN~M@IS#uqE,3:>0d:,wJ!d^#1y*j');
define('NONCE_SALT',       'F-e$%%+xQ7~Yxe;lm0-Jzkr-Fq:>6;yQ]Df::s!}:ML4K0oYW]~5fmxbEZ$lV{Aw');

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
