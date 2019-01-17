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
define('DB_NAME', 'pirellimagazine');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'V&}C*#A5bEaOLhS2H(Y2Q5UM?.+>?D.N[v]vq*Nc= ;hH/20nx6vBHY=d:sF:~,4');
define('SECURE_AUTH_KEY',  's?62~z1V6jv9|?J_;b^}15Qfj4l`#jTTZpvM=Swv*G77>H`&jUf`?}FwR8~d~urD');
define('LOGGED_IN_KEY',    'R7@mId(A4TZr.9L:5]Rsu<t,j|E|l1iA|AQ=):(>!)tks+>aZ;C>(s#+1Avg>FhO');
define('NONCE_KEY',        '?0<w47QyF)r?1.eVFI}>6KWlEPsY1{feTZvKT2I]u$+V3h8D>Ztyl(sIyGS()S,(');
define('AUTH_SALT',        'VJfO0f*wjeNhURy;!MaB,Q{y_d*gm(O]+=~#JCXI4wT@X4gY/)3^xIYNO2[Korb>');
define('SECURE_AUTH_SALT', 'p/z*WOlZSUz<0pKN0mzk&|Wk~*D<Iw,*Ya)Y|de;tK8BnF`XiabK!!YcIEn11g.1');
define('LOGGED_IN_SALT',   '?d4PZIAW0kQHxr0`T7`gyPDma:5S5NA]0@sJH%g=:ZsHG)Fq}1;:<]eB}1/=W1)|');
define('NONCE_SALT',       'y~GU{q*L)+G*t6gw@0g *Hw4$-.uT%NI=3>Kl5>tnI->i9v%J9c@b3@&~A9&;uR=');

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

/* Multisite */

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'pirellimagazine.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
