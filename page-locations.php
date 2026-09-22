<?php
/* Template Name: All Locations */

/**
 * "Explore All" landing page -- every published Location post (Seacrest
 * Beach plus every neighborhood) shown as a card, reusing the exact
 * .beach-card markup/styling from the "Beaches Worth the Ride" section so
 * new locations added in wp-admin show up here automatically, styled
 * identically to how they already appear everywhere else on the site.
 */

get_header();

$peddlers30a_all_locations = peddlers30a_get_locations();
?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--location" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/location-hero.jpg'); background-size: cover; background-position: center; height: 80vh; min-height: 700px;">
      <div class="container hero__inner">
        <h1 class="hero__title">Every Peddlers Location on 30A</h1>
        <p class="hero__lead">
          One pavilion in Seacrest Beach, bikes rolling out to every neighborhood along Scenic Highway 30A. Pick your beach to see ride times, local highlights, and what to expect.
        </p>
      </div>
    </section>

    <!-- ==================================================================
           03 — All Locations Grid
           ================================================================== -->
    <section class="section beaches">
      <div class="container beaches__head">
        <p class="eyebrow">30A LOCATIONS</p>
        <h2 class="beaches__title">Explore Every Location</h2>
        <p class="beaches__lead">
          From Seacrest Beach, Peddlers delivers and rides out across all of 30A. Pick a location below for directions, ride times, and local highlights.
        </p>

        <div class="beaches__grid">
          <?php foreach ( $peddlers30a_all_locations as $i => $location_post ) :
            $loc = peddlers30a_get_location_data( $location_post->ID );
            if ( empty( $loc ) ) {
              continue;
            }
            $pills = array();
            foreach ( array_slice( (array) $loc['trust_bar'], 0, 3 ) as $trust_item ) {
              if ( ! empty( $trust_item['heading'] ) ) {
                $pills[] = $trust_item['heading'];
              }
            }
          ?>
          <a class="beach-card" href="<?php echo esc_url( get_permalink( $location_post ) ); ?>">
            <div class="beach-card__media">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/beach-<?php echo (int) ( $i % 4 + 1 ); ?>.png" alt="<?php echo esc_attr( $location_post->post_title ); ?>" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title"><?php echo esc_html( $location_post->post_title ); ?></h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <?php if ( ! empty( $loc['local_title'] ) ) : ?>
            <p class="beach-card__tag"><?php echo esc_html( $loc['local_title'] ); ?></p>
            <?php endif; ?>
            <?php if ( ! empty( $loc['hero_lead'] ) ) : ?>
            <p class="beach-card__copy">
              <?php echo esc_html( $loc['hero_lead'] ); ?>
            </p>
            <?php endif; ?>
            <?php if ( $pills ) : ?>
            <div class="beach-card__tags">
              <?php foreach ( $pills as $pill ) : ?>
              <span class="beach-card__pill"><?php echo esc_html( $pill ); ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           04 — Closing CTA
           ================================================================== -->
    <section class="section closing-split">
      <div class="container closing-split__card">
        <div class="closing-split__media">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/closing-split-bg.jpg" alt="" />
        </div>
        <div class="closing-split__content">
          <h2 class="closing-split__title">Your 30A Story Begins Here</h2>
          <div class="closing-split__actions">
            <a class="closing-split__btn closing-split__btn--solid" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">Reserve Online</a>
            <a class="closing-split__btn closing-split__btn--outline" href="<?php echo esc_url( peddlers30a_nav_url( 'contact' ) ); ?>">Contact Our Team</a>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
