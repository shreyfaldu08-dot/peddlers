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
// site front controller, so /wp-admin/ actually opens wp-admin. A request
// for the directory *without* its trailing slash (e.g. "/wp-admin") must
// redirect to add one first -- otherwise the browser's address bar stays
// at "/wp-admin" and every relative link admin pages emit (e.g. "edit.php")
// resolves against the site root instead of "/wp-admin/", landing on a
// 404 or the front page instead of the intended admin screen.
if ( is_dir( $file ) && is_file( $file . '/index.php' ) ) {
	if ( '/' !== substr( $path, -1 ) ) {
		$query = $_SERVER['QUERY_STRING'] ?? '';
		header( 'Location: ' . $path . '/' . ( $query ? '?' . $query : '' ), true, 301 );
		return true;
	}
	require $file . '/index.php';
	return true;
}

require __DIR__ . '/index.php';
