<?php
/**
 * Fallback template. Every real page on this site is served by
 * front-page.php or a page-{slug}.php template; this only renders
 * if something falls outside that set.
 */
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		the_title( '<h1>', '</h1>' );
		the_content();
	endwhile;
endif;

get_footer();
