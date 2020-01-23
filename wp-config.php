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
define( 'DB_NAME', 'intimacy' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'QYF`8t{~{}K]j1E Md}i+T(HTHECU*8OIP*S1es{AX.!4j*:TeWj~*]eC]Ou dJ!' );
define( 'SECURE_AUTH_KEY',  'kpIPEh>gLBc&cvCVrhJ,f[:4`vRDrNE&|&2MSFok qJ:F&8(T%k`D.UCW6GC8ss]' );
define( 'LOGGED_IN_KEY',    'j+|M N<9#sTr*{KL[S@7(*D;)A^sKxOcK(vL2+e=^H*C&dn$M +##R5SqMJ+4J]x' );
define( 'NONCE_KEY',        'j?af)U1SQ5Pxy_LZ+bLYI)Nz((?]:[Fl7P195y-EV_(0M-rZ_nSm;!i/-+x+r5*2' );
define( 'AUTH_SALT',        'g0zr,oT<SSMnb,3*1{xhJ=IM[7ea:5W_(0E$!|Pd-o#bc(-vaP@o76]zo(m*?}$U' );
define( 'SECURE_AUTH_SALT', 'hQF2Q{iJK{#?%m/[dAg?[uoPK=gZqVjBX&()gbFcHjp]L-P9&nvL|xmQaI4)-,}c' );
define( 'LOGGED_IN_SALT',   'E*<K=B>S}:k#(Jebe$UF4VK};<<-;VF}$0#|h&3LC}C]{EJ}JT@Y3<QUCK&^Vxh/' );
define( 'NONCE_SALT',       'b0`y/`MG&i=[3:5JbtUH][IWH uqRNmZX^aAtJ.[IVicO-<FC!cZ<Hem7K&:(*e/' );
define('FS_METHOD', 'direct');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wi45yp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
