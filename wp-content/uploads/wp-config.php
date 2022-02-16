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
define('DB_NAME', 'gmkcenter');
/** MySQL database username */
define('DB_USER', 'Roma_Khavanskiy');
/** MySQL database password */
define('DB_PASSWORD', 'fdskahfkh3k45h23knkj');
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
define('AUTH_KEY',         '79XqkItQ/H%yTn4$Y :U{}F`9pA+r1ZC:P:CE-h^#OMikcoreJc1)/8)R PJ!ppM');
define('SECURE_AUTH_KEY',  'G;(|wP0`]18}q-#vQE,SOVj&Pf!8T*@(jWlFR[Vh[!<zq%NtoN6w=R%-PpK,~gtr');
define('LOGGED_IN_KEY',    'fup{(Peu#r!PHo;7Q4<$Nr)_bOa_bfZ`Xpgwg{ b;NM(f)k:6`r(w8[3V#P03G4V');
define('NONCE_KEY',        '(m,k2,FDRR!1khj9nNmxYNX2+DrMTv?;J$^bn^msX|TB]hgHO}zXK:-RoE%{Vu+`');
define('AUTH_SALT',        '<MAm[Jc;jnL01B69&LJeTh{u{OB(D(EQ|b4nCsG<;4~g)VC?}N!o=u3;}$.2$2;p');
define('SECURE_AUTH_SALT', '([z8hpvc1Q$rjV (fE+Nx~em;:{{/U4Y b}S7XuD&biWQDHQdeSYRNfK*MhN|m_M');
define('LOGGED_IN_SALT',   ';4/!%JB*zCiyiZ2m}$@CM#;CcM;q9a {!u2!3)at)erzSRgP[~rQ~(w4]^2^F@qO');
define('NONCE_SALT',       '=nru,;$LYjru!(f46u*|U]-SfJCAV2@o3,.q(NPg3:UaP}%/%>rCb%Nu$_ QB>M~');
define('GOOGLE_MAP',       'AIzaSyBqtuPUlemp0DPNn1N6LRSMbDLgUzUtY3M');
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

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'FS_METHOD', 'direct' );

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
