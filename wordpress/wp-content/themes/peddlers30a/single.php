<?php
/**
 * Single blog post template -- reuses the rentals/locations hero pattern
 * and the .article__* typography from blog.css. Any post created in
 * wp-admin > Posts renders through this file automatically.
 */

get_header();

while ( have_posts() ) :
	the_post();
	$peddlers30a_hero_img = has_post_thumbnail()
		? get_the_post_thumbnail_url( get_the_ID(), 'full' )
		: get_template_directory_uri() . '/assets/img/Cycling-in-Seaside.png';
	?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--rentals" style="background-image: url('<?php echo esc_url( $peddlers30a_hero_img ); ?>'); height: 42rem;">
      <div class="container hero__inner">
        <?php
        $peddlers30a_cats = get_the_category();
        if ( ! empty( $peddlers30a_cats ) ) :
        ?>
        <p class="eyebrow" style="color: var(--s3);"><?php echo esc_html( $peddlers30a_cats[0]->name ); ?></p>
        <?php endif; ?>
        <h1 class="hero__title" style="font-size: clamp(2rem, 1.4rem + 2.2vw, 3.75rem);"><?php the_title(); ?></h1>
      </div>
    </section>

    <!-- ==================================================================
           03 — Article
           ================================================================== -->
    <section class="section article">
      <div class="container article__inner">
        <p class="article__meta">
          <span>By <?php the_author(); ?></span>
          <span><?php echo esc_html( get_the_date() ); ?></span>
          <span>Back to <a href="<?php echo esc_url( peddlers30a_nav_url( 'blog' ) ); ?>">Blog</a></span>
        </p>

        <div class="article__content">
          <?php the_content(); ?>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           04 — Booking CTA
           ================================================================== -->
    <section class="section" style="background: var(--p1); padding: 4rem 0; text-align: center;">
      <div class="container">
        <h2
          style="font-family: var(--font-body); font-weight: 700; font-size: 2.25rem; color: #ffffff; margin-bottom: 1rem;">
          Ready to Ride the Trail?</h2>
        <p style="color: #ffffff; opacity: 0.9; max-width: 40rem; margin: 0 auto 2rem;">
          Reserve online or call <?php echo esc_html( get_theme_mod( 'phone_number', '850-213-0040' ) ); ?>. Walk-ins
          are always welcome at the Peddlers Pavilion on Scenic Highway 30A in Seacrest Beach.
        </p>
        <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
          <a class="btn btn--sand" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">RESERVE A BIKE</a>
          <a class="btn"
            style="background: transparent; color: #ffffff; border: 1px solid rgba(255,255,255,0.4); padding: 0.8rem 2.5rem; font-size: 0.85rem;"
            href="tel:<?php echo esc_attr( get_theme_mod( 'phone_number_link', '+18502130040' ) ); ?>">CALL <?php echo esc_html( get_theme_mod( 'phone_number', '850-213-0040' ) ); ?></a>
        </div>
      </div>
    </section>

<?php
endwhile;
get_footer();
