<?php
/* Template Name: Thank You */

// Conversion landing page: the rental inquiry form redirects here after a
// successful submit so analytics can count it. Kept out of search results.
add_filter( 'wp_robots', function ( $robots ) {
	$robots['noindex'] = true;
	$robots['follow']  = true;
	return $robots;
} );

get_header();
?>

    <section class="section thank-you">
      <div class="container thank-you__inner">
        <p class="eyebrow">Inquiry Received</p>
        <h1 class="thank-you__title">Thank You!</h1>
        <p class="thank-you__lead">
          Your rental inquiry has been sent. We will get back to you within 2 hours during business hours. For faster
          help, call us at
          <a href="tel:<?php echo esc_attr( get_theme_mod( 'phone_number_link', '+18502130040' ) ); ?>"><?php echo esc_html( get_theme_mod( 'phone_number', '(850) 213-0040' ) ); ?></a>.
        </p>
        <div class="thank-you__actions">
          <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">BACK TO HOME</a>
          <a class="btn btn--outline" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">SEE BIKE RENTALS</a>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
