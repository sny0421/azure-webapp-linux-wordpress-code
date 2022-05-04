<?php
define('WP_CACHE', true);


// ** MySQL settings - You can get this info from your web host ** //
$connectstr_dbhost = getenv('DATABASE_HOST');
$connectstr_dbname = getenv('DATABASE_NAME');
$connectstr_dbusername = getenv('DATABASE_USERNAME');
$connectstr_dbpassword = getenv('DATABASE_PASSWORD');

define('DB_NAME', $connectstr_dbname);
define('DB_USER', $connectstr_dbusername);
define('DB_PASSWORD',$connectstr_dbpassword);
define('DB_HOST', $connectstr_dbhost);
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/** Enabling support for connecting external MYSQL over SSL*/
$mysql_sslconnect = (getenv('SC_MYSQL')) ? getenv('SC_MYSQL') : 'true';
if (strtolower($mysql_sslconnect) != 'false' && !is_numeric(strpos($connectstr_dbhost, "127.0.0.1")) && !is_numeric(strpos(strtolower($connectstr_dbhost), "localhost"))) {
        define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);
}

define( 'AUTH_KEY',         getenv('WP_SECRET_AUTH_KEY') );
define( 'SECURE_AUTH_KEY',  getenv('WP_SECRET_SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',    getenv('WP_SECRET_LOGGED_IN_KEY') );
define( 'NONCE_KEY',        getenv('WP_SECRET_NONCE_KEY') );
define( 'AUTH_SALT',        getenv('WP_SECRET_AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('WP_SECRET_SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',   getenv('WP_SECRET_LOGGED_IN_SALT') );
define( 'NONCE_SALT',       getenv('WP_SECRET_NONCE_SALT') );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */
/**https://developer.wordpress.org/reference/functions/is_ssl/ */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
        $_SERVER['HTTPS'] = 'on';

$http_protocol='http://';
if (!preg_match("/^localhost(:[0-9])*/", $_SERVER['HTTP_HOST']) && !preg_match("/^127\.0\.0\.1(:[0-9])*/", $_SERVER['HTTP_HOST'])) {
        $http_protocol='https://';
}

//Relative URLs for swapping across app service deployment slots
define('WP_HOME', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
