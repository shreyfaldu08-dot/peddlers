<?php
/* Template Name: Blog */

get_header();
?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--rentals" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Cycling-in-Seaside.png'); height: 32rem;">
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
    <section class="section" id="posts">
      <div class="container">
        <div class="blog__grid">
          <a class="blog-card" href="<?php echo esc_url( peddlers30a_nav_url( 'what-is-30a' ) ); ?>" data-category="30a-guide">
            <figure class="blog-card__media">
              <span class="blog-card__badge">30A Guide</span>
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Cycling-in-Seaside.png" alt="Cyclist riding the Timpoochee Trail on Scenic Highway 30A" />
            </figure>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span>Peddlers 30A Team</span>
                <span>September 29, 2026</span>
              </div>
              <h2 class="blog-card__title">What Is 30A? A Local's Guide to Scenic Highway 30A, Florida</h2>
              <p class="blog-card__excerpt">
                30A is a 19-mile coastal road connecting 15 beach communities in South Walton County -- not a single
                beach or resort. Here's the geography, the Timpoochee Trail, and how most visitors actually get
                around.
              </p>
            </div>
          </a>
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
