<?php
/* Template Name: Blog */

get_header();
?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--rentals" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-aerial.jpg'); height: 28rem;">
      <div class="container hero__inner">
        <p class="eyebrow" style="color: var(--s3);">Peddlers 30A</p>
        <h1 class="hero__title">The 30A Blog</h1>
        <p class="hero__lead">
          Local guides to Scenic Highway 30A -- the communities, the Timpoochee Trail, and how to get around once
          you're here.
        </p>
      </div>
    </section>

    <!-- ==================================================================
           03 — Category filters + post grid
           ================================================================== -->
    <section class="section section--pad-sm" id="posts">
      <div class="container">
        <div class="blog__grid">
          <?php
          $peddlers30a_posts = new WP_Query(
            array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => 12,
            )
          );
          while ( $peddlers30a_posts->have_posts() ) :
            $peddlers30a_posts->the_post();
            $peddlers30a_cats = get_the_category();
          ?>
          <a class="blog-card" href="<?php the_permalink(); ?>">
            <figure class="blog-card__media">
              <?php if ( ! empty( $peddlers30a_cats ) ) : ?>
              <span class="blog-card__badge"><?php echo esc_html( $peddlers30a_cats[0]->name ); ?></span>
              <?php endif; ?>
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/hero-aerial.jpg" alt="" />
              <?php endif; ?>
            </figure>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span><?php the_author(); ?></span>
                <span><?php echo esc_html( get_the_date() ); ?></span>
              </div>
              <h2 class="blog-card__title"><?php the_title(); ?></h2>
              <p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
            </div>
          </a>
          <?php endwhile; wp_reset_postdata(); ?>
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

<?php get_footer(); ?>
