<?php
/**
 * Router for PHP's built-in server, so pretty permalinks (/about/, /rentals/, ...)
 * work the same way they would under Apache mod_rewrite. Real files (CSS, JS,
 * images, wp-admin assets) are served as-is; everything else falls through to
 * WordPress's own index.php, which resolves the request via query vars.
 */
$path = urldecode( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) );
$file = __DIR__ . $path;

if ( $path !== '/' && is_file( $file ) ) {
	return false; // let the built-in server handle static assets directly
}

chdir( __DIR__ );

// Real WP directories (wp-admin, wp-login.php's neighbours, etc.) have
// their own index.php — run that instead of always falling back to the
// site front controller, so /wp-admin/ actually opens wp-admin.
if ( is_dir( $file ) && is_file( $file . '/index.php' ) ) {
	require $file . '/index.php';
	return true;
}

require __DIR__ . '/index.php';
