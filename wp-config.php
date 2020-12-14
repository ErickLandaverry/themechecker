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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aodev4_wp998' );

/** MySQL database username */
define( 'DB_USER', 'aodev4_wp998' );

/** MySQL database password */
define( 'DB_PASSWORD', '[S(284pBaS3US.((' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6opzypcvwkdbn4sgziwlk2769lxmyatvx1jgttgfazrdvtpnlotg5emvz23cgu1u' );
define( 'SECURE_AUTH_KEY',  'up90z7y2ijf7ldhhwll2elkv4wimqo2mjj7pe9ux7c9stxto754w1sv0rhax1bfy' );
define( 'LOGGED_IN_KEY',    'qmcv6t1ts5z3ar3nyfv0cfyqnrki2tilpx0t7al1l1kpw3b5mluhtabrruq853xj' );
define( 'NONCE_KEY',        'ildjdgcd3fuuk0vlr52jnnfsbag1sc5vztghwlfxq45bp9ddjmly8z4t07rtxecf' );
define( 'AUTH_SALT',        'noca0mhygpwcvbdqhnxiwy3ylcbmfdc9zzrgg1d9im6ayruc7fghxxjphepcxzts' );
define( 'SECURE_AUTH_SALT', 'w2cea0uldejzknmluwemfoiyjjp4seudtulkwwntjl6emdw3snwxucnhwf8xyn5r' );
define( 'LOGGED_IN_SALT',   'uke7otukdvpoogtntlmqkjj052sigecxjjs7xnqbd8fnrmg8fpxhvjdn6g71kwp1' );
define( 'NONCE_SALT',       'svk6trm1i9xqhllgdaztezmfgk6yutvynwkemawstuuxzkhh15p26qgmacyci8bf' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptv_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
