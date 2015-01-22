<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_3');

/** MySQL database username */
//define('DB_USER', 'wordpress_f');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', 'iYP4$Qt75u');
define('DB_PASSWORD', 'quark');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8Hur#1l$hnZ^617su3otw2ZWmaUxKt4aN(7MQ5s@E&$%QsllX5iV1LLCI7Ts^6Ue');
define('SECURE_AUTH_KEY',  ')%lLCtmvmmd8qmGj@O)okkr!W9pJ5IR2AkOQCe!C(k87L*C(#dUPwU9#OxQ%(Awm');
define('LOGGED_IN_KEY',    'HN^XydW6QOwzn2YIIthdQg!Mjcr*459mLsCI4$wFQtabnekrqRHSLbBPNk70!WD#');
define('NONCE_KEY',        'YGG#7U%CQuFq#24z0r%txx6U$Th5q@R2kAfA1iV#hXMZgabpaAU3M&ufmvR@AM(Z');
define('AUTH_SALT',        'xc($jpMUueYbsUlJlo3JCvf^&x9KNG6jjeC9cdUlAnEx$F3S3Pd(aOveh@qWH@@n');
define('SECURE_AUTH_SALT', 'uLunHx1a^%)l5TtG!)9TETmAFklwJ@lbkjOdZi&Z4Y9WoUVj3mJemml)YT6lJ0Tq');
define('LOGGED_IN_SALT',   'krH%&USSY&pQZI77(JiLd*4EGk)4wv3uu5@2!0FQT$!%nG^7k6b7Mq^6@qhj)x%w');
define('NONCE_SALT',       'EY^Wkt91ro)u7CVg#FFg9v%n9xB^iLO&b$mMvTfv0uFlvKp&jVJvwV0RrxABDWDu');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'it_IT');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
