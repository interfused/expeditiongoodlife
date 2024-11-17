<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u305833638_yPgS6' );

/** Database username */
define( 'DB_USER', 'u305833638_L24UF' );

/** Database password */
define( 'DB_PASSWORD', 'jEm189aaaP' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '554zJ|.!9t>ce$1-<#Zi8AZ=~<OVh7~FBNqi]8vn@jA%o!2Q/tc+ #],lAjU#+{@' );
define( 'SECURE_AUTH_KEY',   '+8527m~Al43:{j.aO-+>W/*aq%RAP7@8X_uc!M^_g)_!*P^O[l>ew^v/cZ}5D n(' );
define( 'LOGGED_IN_KEY',     '/WIz~J$=;x[K$0T{7sDIae_&$oJqjs$3Ko%hEWl2mc69-vZdhq~5D7TBkZ,c?(jT' );
define( 'NONCE_KEY',         'q)wvpM(&D.kpr,WKDJ;(]Z9VHNLy Ng[jJ=Z0uZ/~WU/epj_x6yY,* 4^7(3Q0c]' );
define( 'AUTH_SALT',         'b IAVDN_&$@;{$r(trQ9`WAni}@ORY/puBkl:Z|h:!.E6XJJA;9>CTt/lmN[[uAl' );
define( 'SECURE_AUTH_SALT',  '`=Qbc{Mem+h:b]CHzm|/(ZlP#H?Kj3UYPb6lHTVc@fIx`7%O|2Iexu/BA!Nz/[ h' );
define( 'LOGGED_IN_SALT',    'SZ&yVfSI2Q4R99mJZQ_qGsJyE.{zkEo=,:[OmG.fAhtE} )VOYl v$okr*zYm!5w' );
define( 'NONCE_SALT',        'QRCKsMePQ?joXkH`1t;^U3$rU|:-)lpUP*JCE$od.//.Wd{g_{R3}3)PiT*QL,ZZ' );
define( 'WP_CACHE_KEY_SALT', '$[h}l_W|&V@;) lfxnVqtQ$seVm``X+nFwn&6Y7M_$G>osV3#umPDA)y2^|-r5S8' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '017fa770fadc7dd0e4b8dd83a78b1306' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
