<?php
/**
 * Renders a per-neighborhood "Bike Rental" SEO landing page. Markup and
 * CSS classes are copied 1:1 from location.html (the Seacrest Beach page)
 * per the client's instruction to keep the design identical -- only the
 * text content changes, pulled from the "location" post's '_loc_data'
 * post meta (edited under wp-admin > Locations).
 */

$loc = peddlers30a_get_location_data( get_the_ID() );

add_action( 'wp_head', function () use ( $loc ) {
	if ( empty( $loc['description'] ) ) {
		return;
	}
	?>
	<meta name="description" content="<?php echo esc_attr( $loc['description'] ); ?>" />
	<?php
} );

add_filter( 'pre_get_document_title', function ( $title ) use ( $loc ) {
	return ! empty( $loc['title'] ) ? $loc['title'] : $title;
} );

get_header();

if ( empty( $loc ) ) {
	echo '<div class="container" style="padding:5rem 0;"><p>Location content coming soon.</p></div>';
	get_footer();
	return;
}
?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--location" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/location-hero.jpg'); background-size: cover; background-position: center; height: 80vh; min-height: 700px;">
      <div class="container hero__inner">
        <h1 class="hero__title"><?php echo esc_html( $loc['h1'] ); ?></h1>
        <p class="hero__lead">
          <?php echo esc_html( $loc['direct_answer'] ); ?>
        </p>
      </div>
    </section>

    <!-- ==================================================================
           03 — Trust Feature Bar (5 Pills)
           ================================================================== -->
    <section class="trust-bar">
      <div class="container trust-bar__inner">
        <?php foreach ( $loc['trust_bar'] as $i => $item ) : ?>
        <div class="trust-bar__item">
          <img class="trust-bar__icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/trust-icon-<?php echo (int) ( $i + 1 ); ?>.png" alt="" />
          <span class="trust-bar__label"><?php echo esc_html( $item['heading'] ); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- ==================================================================
           04 — Largest Bike Rental (4 Cards)
           ================================================================== -->
    <section class="section rental rental--location" id="rent">
      <div class="container text-center">
        <p class="eyebrow"><?php echo esc_html( $loc['rent_eyebrow'] ); ?></p>
        <h2 class="rental__title"><?php echo esc_html( $loc['rent_title'] ); ?></h2>
        <p class="body-copy rental__subtitle">
          <?php echo esc_html( $loc['hero_lead'] ); ?>
        </p>

        <div class="rental-filters">
          <button class="rental-filters__btn">BIKE RENTALS</button>
          <button class="rental-filters__btn">KIDS BIKES</button>
          <button class="rental-filters__btn is-active">PEDDLER'S PRODUCTS</button>
          <button class="rental-filters__btn">TAKE YOUR KIDS ALONG</button>
          <button class="rental-filters__btn">ADULT BIKES</button>
        </div>

        <div class="rental__grid">
          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/s05-1.jpg" alt="Adult Female Cruiser" />
            </figure>
            <h3 class="bike-card__name">Adult Female Cruiser</h3>
            <p class="bike-card__price">From: $40.00</p>
            <a class="btn btn--outline btn--block" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/s05-4.jpg" alt="20&quot; Kids Cruiser-Coral" />
            </figure>
            <h3 class="bike-card__name">20&Prime; Kids Cruiser-Coral</h3>
            <p class="bike-card__price">From: $40.00</p>
            <a class="btn btn--outline btn--block" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/s05-3.jpg" alt="Bike and Burley Combo" />
            </figure>
            <h3 class="bike-card__name">Bike and Burley Combo</h3>
            <p class="bike-card__price">From: $70.00</p>
            <a class="btn btn--outline btn--block" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/s05-2.jpg" alt="Bike Basket" />
            </figure>
            <h3 class="bike-card__name">Bike Basket</h3>
            <p class="bike-card__price">From: $5.00</p>
            <a class="btn btn--outline btn--block" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
          </article>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           05 — Local Introduction
           ================================================================== -->
    <section class="section local-intro">
      <div class="container local-intro__inner">
        <p class="eyebrow"><?php echo esc_html( $loc['local_eyebrow'] ); ?></p>
        <h2 class="local-intro__title"><?php echo esc_html( $loc['local_title'] ); ?></h2>
        <p class="local-intro__copy">
          <?php echo esc_html( $loc['local_p1'] ); ?>
        </p>
        <p class="local-intro__copy">
          <?php echo esc_html( $loc['local_p2'] ); ?>
        </p>
      </div>
    </section>

    <!-- ==================================================================
           05.5 — Trailhead Advantage Block (Journey / Route Card)
           ================================================================== -->
    <section class="section journey">
      <div class="container">
        <div class="journey__card">
          <figure class="journey__media">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/rosemary-journey.jpg" alt="Cyclist riding past a white coastal building with palm trees on 30A" />
          </figure>
          <div class="journey__panel">
            <div class="journey__head">
              <h2 class="journey__title"><?php echo esc_html( $loc['journey_title'] ); ?></h2>
              <p class="journey__lead">
                <?php echo esc_html( $loc['journey_lead'] ); ?>
              </p>
            </div>

            <div class="journey__route">
              <div class="journey__stop">
                <div class="journey__track">
                  <span class="journey__track-dot"></span>
                  <span class="journey__track-line"></span>
                  <span class="journey__track-ring"></span>
                </div>
                <div class="journey__stop-labels">
                  <div>
                    <p class="journey__stop-eyebrow">From</p>
                    <p class="journey__stop-value">Peddlers 30A</p>
                  </div>
                  <div>
                    <p class="journey__stop-eyebrow">To</p>
                    <p class="journey__stop-value"><?php echo esc_html( $loc['journey_to'] ); ?></p>
                  </div>
                  <a class="journey__cta" href="https://maps.google.com/maps/dir/?api=1&origin=Peddlers+30A+Seacrest+Beach+FL&destination=<?php echo rawurlencode( $loc['journey_to'] . ' FL' ); ?>" target="_blank" rel="noopener">
                    <span>View Route</span>
                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M1 8H15M15 8L9 2M15 8L9 14" stroke="currentColor" stroke-width="1.5" /></svg>
                  </a>
                </div>
              </div>

              <span class="journey__divider" aria-hidden="true"></span>

              <div class="journey__stats">
                <?php
                $stat_icons = array( 'journey-stat-distance.svg', 'journey-stat-drive.svg', 'journey-stat-ride.svg', 'journey-stat-route.svg' );
                foreach ( $loc['stats'] as $i => $stat ) :
                ?>
                <div class="journey__stat">
                  <img class="journey__stat-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/<?php echo esc_attr( $stat_icons[ $i ] ); ?>" alt="" width="90" height="90" />
                  <p class="journey__stat-value"><?php echo esc_html( $stat['value'] ); ?></p>
                  <p class="journey__stat-label"><?php echo esc_html( $stat['label'] ); ?></p>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           06 — Pavilion Intro + Bike Category Cards
           ================================================================== -->
    <section class="section pillars">
      <div class="container pillars__head">
        <p class="eyebrow">MORE THAN BIKES</p>
        <h2 class="pillars__title"><?php echo esc_html( $loc['pavilion_title'] ); ?></h2>
        <p class="pillars__lead">
          <?php echo esc_html( $loc['pavilion_lead'] ); ?>
        </p>

        <div class="pillars__grid">
          <?php foreach ( $loc['categories'] as $i => $cat ) : ?>
          <article class="pillar">
            <div class="pillar__media">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/loc-pillar-<?php echo (int) ( $i + 1 ); ?>.jpg?v=2" alt="<?php echo esc_attr( $cat['label'] ); ?>" />
            </div>
            <div class="pillar__content">
              <p class="pillar__num"><?php echo esc_html( $cat['num'] ); ?> &mdash; <?php echo esc_html( $cat['label'] ); ?></p>
              <h3 class="pillar__title-sm"><?php echo esc_html( $cat['title'] ); ?></h3>
              <p class="pillar__copy">
                <?php echo esc_html( $cat['copy'] ); ?>
              </p>
            </div>
            <a class="pillar__btn" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">Learn more</a>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           07 — Pavilion Highlight Cards
           ================================================================== -->
    <section class="section cravings">
      <div class="container cravings__head">
        <p class="eyebrow"><?php echo esc_html( $loc['pavilion_eyebrow'] ); ?></p>
        <h2 class="cravings__title"><?php echo esc_html( $loc['pavilion_title'] ); ?></h2>
        <p class="cravings__lead">
          <?php echo esc_html( $loc['pavilion_lead'] ); ?>
        </p>

        <div class="cravings__grid">
          <?php
          $highlight_icons = array( 'Vector-1.png', 'Union-1.png', 'Union.png', 'Vector.png' );
          foreach ( $loc['categories'] as $i => $cat ) :
          ?>
          <div class="craving-card craving-card--<?php echo (int) ( $i + 1 ); ?>">
            <div class="craving-card__top">
              <img class="craving-card__icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/<?php echo esc_attr( $highlight_icons[ $i ] ); ?>" alt="Icon" />
              <div class="craving-card__divider"></div>
              <span class="craving-card__step">Step <?php echo esc_html( $cat['num'] ); ?></span>
            </div>
            <h3 class="craving-card__title"><?php echo esc_html( $cat['title'] ); ?></h3>
            <p class="craving-card__copy"><?php echo esc_html( $cat['copy'] ); ?></p>
            <p class="craving-card__tags">BITES &bull; PIZZA &bull; BURGERS &bull; SEAFOOD &bull; SWEETS</p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <?php if ( 'bike-rentals-seacrest-beach' === get_post()->post_name ) : ?>
    <!-- ==================================================================
           07.5 — The Pavilion Collection (Seacrest Beach only -- this is
           the actual Pavilion, so its on-site venues are real and fixed,
           unlike the "beaches to ride to" every other location page has)
           ================================================================== -->
    <section class="section gathering" id="gathering">
      <div class="container">
        <header class="gathering__head text-center">
          <p class="eyebrow">The Pavilion Collection</p>
          <h2 class="gathering__title">A Curated Gathering</h2>
        </header>

        <div class="gathering__grid">
          <?php
          $pavilion_venues = array(
            array( 'img' => 'Rectangle-19-6.png?v=2', 'name' => "Peddler's Pub", 'copy' => "Cool down with an ice-cold draft beer or a tasty cocktail from our fully stocked bar. It's 5 o'clock somewhere." ),
            array( 'img' => 'Rectangle-19-3.png', 'name' => 'Sweet Peddler', 'copy' => 'A fun and funky ice cream and candy shop with all the feel-good, nostalgic vibes to put a smile on any face.' ),
            array( 'img' => 'Rectangle-19-2.png?v=2', 'name' => 'Kickstand Bar', 'copy' => 'From dirty martinis to spiked cherry limeade, our walk-up bar serves all the best liquor drinks on 30A.' ),
            array( 'img' => 'Rectangle-19-1.png?v=2', 'name' => 'Little Pedal Boutique', 'copy' => 'A boutique blending personalization and style. Build your own look at our charm bar or shop trendy jewelry.' ),
            array( 'img' => 'Rectangle-19-7.png?v=2', 'name' => 'Beachside Burger Co.', 'copy' => 'Handcrafted burgers with a laid-back coastal vibe. Classic American comfort food perfect for fueling your adventure.' ),
            array( 'img' => 'Rectangle-19-8.png?v=2', 'name' => 'LMN', 'copy' => 'The latest and greatest brands in clothing, jewelry, and accessories. Stay up to date with beachy fashion trends.' ),
            array( 'img' => 'Rectangle-19-5.png?v=2', 'name' => "Reel 'Em In", 'copy' => "You'll be hooked! Fresh seafood and homemade recipes that capture the essence of the Emerald Coast." ),
            array( 'img' => 'Rectangle-19-4.png?v=2', 'name' => "Ticheli's Pizza", 'copy' => 'Homemade Italian pizza sauce and imported flour make for the best tasting wood-oven pizza on 30A.' ),
            array( 'img' => 'Rectangle-19.png?v=2', 'name' => "Charlie's Donuts", 'copy' => 'Famous gourmet donuts served up with fresh coffee and smoothies. The perfect place to start your day.' ),
          );
          foreach ( $pavilion_venues as $venue ) :
          ?>
          <article class="venue-card">
            <figure class="venue-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/<?php echo esc_attr( $venue['img'] ); ?>" alt="<?php echo esc_attr( $venue['name'] ); ?>" />
            </figure>
            <div class="venue-card__body">
              <h3 class="venue-card__name"><?php echo esc_html( $venue['name'] ); ?></h3>
              <p class="venue-card__copy"><?php echo esc_html( $venue['copy'] ); ?></p>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- ==================================================================
           08 — THE SERVICE STANDARD / Why Rent Our Bike
           ================================================================== -->
    <section class="section service-standard">
      <div class="container service-standard__head">
        <p class="eyebrow"><?php echo esc_html( $loc['why_eyebrow'] ); ?></p>
        <h2 class="service-standard__title"><?php echo esc_html( $loc['why_title'] ); ?></h2>

        <div class="service__grid">
          <?php foreach ( $loc['why_cards'] as $i => $card ) : ?>
          <div class="service-card">
            <span class="service-card__num">0<?php echo (int) ( $i + 1 ); ?></span>
            <h3 class="service-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
            <p class="service-card__copy">
              <?php echo esc_html( $card['copy'] ); ?>
            </p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           09 — Closing CTA
           ================================================================== -->
    <section class="section closing-split">
      <div class="container closing-split__card">
        <div class="closing-split__media">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/closing-split-bg.jpg" alt="" />
        </div>
        <div class="closing-split__content">
          <h2 class="closing-split__title"><?php echo esc_html( $loc['closing_title'] ); ?></h2>
          <div class="closing-split__actions">
            <a class="closing-split__btn closing-split__btn--solid" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">Reserve Online</a>
            <a class="closing-split__btn closing-split__btn--outline" href="<?php echo esc_url( peddlers30a_nav_url( 'contact' ) ); ?>">Contact Our Team</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           10 — Nearby Beaches Worth the Ride
           ================================================================== -->
    <section class="section beaches">
      <div class="container beaches__head">
        <p class="eyebrow">BEACHES WORTH THE RIDE</p>
        <h2 class="beaches__title">Explore 30A From <?php echo esc_html( ! empty( $loc['beaches_heading'] ) ? $loc['beaches_heading'] : $loc['journey_to'] ); ?></h2>
        <p class="beaches__lead">
          <?php echo esc_html( $loc['beaches_lead'] ); ?>
        </p>

        <div class="beaches__grid">
          <?php foreach ( $loc['beaches'] as $i => $beach ) : ?>
          <a class="beach-card" href="<?php echo esc_url( peddlers30a_nav_url( $beach['slug'] ) ); ?>">
            <div class="beach-card__media">
              <span class="beach-card__badge"><?php echo esc_html( $beach['badge'] ); ?></span>
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/beach-<?php echo (int) ( $i % 4 + 1 ); ?>.png" alt="<?php echo esc_attr( $beach['name'] ); ?>" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title"><?php echo esc_html( $beach['name'] ); ?></h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <p class="beach-card__tag"><?php echo esc_html( $beach['tag'] ); ?></p>
            <p class="beach-card__copy">
              <?php echo esc_html( $beach['copy'] ); ?>
            </p>
            <div class="beach-card__tags">
              <?php foreach ( $beach['pills'] as $pill ) : ?>
              <span class="beach-card__pill"><?php echo esc_html( $pill ); ?></span>
              <?php endforeach; ?>
            </div>
          </a>
          <?php endforeach; ?>
        </div>

        <a class="beaches__more" href="<?php echo esc_url( peddlers30a_nav_url( 'locations' ) ); ?>">
          <span>Explore All</span>
          <svg class="beaches__more-icon" viewBox="0 0 15 12" fill="none" aria-hidden="true">
            <path d="M1 6H14M14 6L9 1M14 6L9 11" stroke="currentColor" stroke-width="1.3" />
          </svg>
        </a>
      </div>
    </section>

    <!-- ==================================================================
           11 — Guest Testimonials
           ================================================================== -->
    <section class="section testimonials location-testimonials">
      <div class="container">
        <p class="eyebrow text-center">FROM OUR RIDERS</p>
        <h2 class="testimonials__title text-center"><?php echo esc_html( $loc['testimonials_title'] ); ?></h2>

        <ul class="testimonials__grid">
          <li class="quote">
            <p class="quote__text">
              "The best place to rent bikes on 30a!!! The service and employees make the rental process even better.
              Easy &amp; centrally located bike rental but also a great place to hangout!! Live music, pub, fire pits
              and tvs for any game watching! Fun for all ages."
            </p>
            <p class="quote__who">Catherine S, Dallas, Texas</p>
          </li>
          <li class="quote">
            <p class="quote__text">
              "The staff is fantastic, bikes are great and beer is cold! Peddlers made our vacation even better. It was
              fast &amp; easy to rent/return our bikes. It's also in a great location to hang out in the evening with
              the live music and plenty of comfortable seating. Make sure you stop by Peddlers during your stay in 30A!"
            </p>
            <p class="quote__who">Carrie C, Chicago, Illinois</p>
          </li>
          <li class="quote">
            <p class="quote__text">
              "Great place to get your bikes on vacation. Full selection of adult and mid cruisers, trikes, baby seats,
              trailers &amp; everything! Plus 8 beers on tap. Oh, and great folks. HIGHLY RECOMMEND. (Live music on the
              stage nightly in the summer!)"
            </p>
            <p class="quote__who">Gregory M., Franklin, Tennessee</p>
          </li>
        </ul>

        <div class="testimonials__nav">
          <button class="carousel-nav__btn" type="button" aria-label="Previous testimonial">
            <svg viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24" height="20">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.401095 11.5212C0.144261 11.7809 5.30349e-07 12.133 5.46392e-07 12.5C5.62436e-07 12.867 0.144261 13.2191 0.401095 13.4788L11.3729 24.5592C11.4985 24.6953 11.6499 24.8044 11.8181 24.8801C11.9864 24.9558 12.168 24.9965 12.3521 24.9998C12.5363 25.0031 12.7192 24.9689 12.89 24.8992C13.0607 24.8295 13.2159 24.7259 13.3461 24.5943C13.4763 24.4628 13.579 24.3061 13.648 24.1337C13.717 23.9612 13.7508 23.7765 13.7476 23.5905C13.7443 23.4045 13.704 23.2211 13.6291 23.0512C13.5541 22.8813 13.446 22.7284 13.3113 22.6016L4.68011 13.8851L30.6285 13.8851C30.9923 13.8851 31.3411 13.7391 31.5983 13.4794C31.8555 13.2196 32 12.8673 32 12.5C32 12.1327 31.8555 11.7804 31.5983 11.5206C31.3411 11.2609 30.9923 11.115 30.6285 11.115L4.68011 11.115L13.3113 2.39837C13.446 2.27157 13.5541 2.11866 13.6291 1.94876C13.704 1.77886 13.7443 1.59546 13.7476 1.40948C13.7508 1.22351 13.717 1.03879 13.648 0.866323C13.579 0.69386 13.4763 0.537194 13.3461 0.405672C13.2159 0.27415 13.0607 0.170466 12.89 0.100805C12.7192 0.0311448 12.5363 -0.00306484 12.3521 0.000216414C12.168 0.00349767 11.9864 0.0442025 11.8181 0.119904C11.6499 0.195605 11.4985 0.304751 11.3729 0.440831L0.401095 11.5212Z" fill="currentColor" />
            </svg>
          </button>
          <button class="carousel-nav__btn" type="button" aria-label="Next testimonial">
            <svg viewBox="92 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24" height="20">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M123.599 11.5212C123.856 11.7809 124 12.133 124 12.5C124 12.867 123.856 13.2191 123.599 13.4788L112.627 24.5592C112.502 24.6953 112.35 24.8044 112.182 24.8801C112.014 24.9558 111.832 24.9965 111.648 24.9998C111.464 25.0031 111.281 24.9689 111.11 24.8992C110.939 24.8295 110.784 24.7259 110.654 24.5943C110.524 24.4628 110.421 24.3061 110.352 24.1337C110.283 23.9612 110.249 23.7765 110.252 23.5905C110.256 23.4045 110.296 23.2211 110.371 23.0512C110.446 22.8813 110.554 22.7284 110.689 22.6016L119.32 13.8851L93.3715 13.8851C93.0077 13.8851 92.6589 13.7391 92.4017 13.4794C92.1445 13.2196 92 12.8673 92 12.5C92 12.1327 92.1445 11.7804 92.4017 11.5206C92.6589 11.2609 93.0077 11.115 93.3715 11.115L119.32 11.115L110.689 2.39837C110.554 2.27157 110.446 2.11866 110.371 1.94876C110.296 1.77886 110.256 1.59546 110.252 1.40948C110.249 1.22351 110.283 1.03879 110.352 0.866323C110.421 0.69386 110.524 0.537194 110.654 0.405672C110.784 0.27415 110.939 0.170466 111.11 0.100805C111.281 0.0311448 111.464 -0.00306484 111.648 0.000216414C111.832 0.00349767 112.014 0.0442025 112.182 0.119904C112.35 0.195605 112.502 0.304751 112.627 0.440831L123.599 11.5212Z" fill="currentColor" />
            </svg>
          </button>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           12 — FAQ
           ================================================================== -->
    <section class="section faq" id="faq">
      <div class="container">
        <p class="eyebrow text-center">QUICK ANSWERS</p>
        <h2 class="faq__title text-center"><?php echo esc_html( $loc['faq_title'] ); ?></h2>

        <div class="accordion faq__list">
          <?php foreach ( $loc['faqs'] as $i => $faq ) : ?>
          <div class="accordion__item<?php echo 0 === $i ? ' is-open' : ''; ?>">
            <button class="accordion__trigger" type="button">
              <span><?php echo esc_html( $faq['q'] ); ?></span>
              <svg class="accordion__chevron" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M3 6l5 5 5-5" stroke="currentColor" stroke-width="1.5" />
              </svg>
            </button>
            <div class="accordion__panel">
              <div>
                <p>
                  <?php echo esc_html( $faq['a'] ); ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           13 — NAP / Visit the Pavilion
           ================================================================== -->
    <section class="section contact" id="pavilion">
      <div class="container contact__inner">
        <div class="contact__details">
          <h2 class="contact__title">Visit the Pavilion</h2>

          <div class="contact__block">
            <p class="contact__label">LOCATION</p>
            <p class="contact__value">10343 E County Hwy 30A, Inlet Beach, FL 32461</p>
          </div>

          <div class="contact__block">
            <p class="contact__label">HOURS</p>
            <p class="contact__value">Bike Hours 8am&ndash;7pm</p>
          </div>

          <div class="contact__block">
            <p class="contact__label">CONNECT</p>
            <p class="contact__value">
              <a href="tel:+18502130040">(850) 213-0040</a> <span class="contact__bullet">&bull;</span> <a href="mailto:hello@peddlers30a.com">hello@peddlers30a.com</a>
            </p>
          </div>

          <a class="btn btn--teal contact__cta" href="https://maps.google.com/?q=10343+E+County+Hwy+30A,+Inlet+Beach,+FL+32461" target="_blank" rel="noopener">GET DIRECTIONS</a>
        </div>

        <figure class="contact__map" style="display: flex;">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.4440399091454!2d-86.02173242443716!3d30.281418174805022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8893f1fdbc7ec827%3A0x5a6ed556c4dfa18b!2sPeddlers%2030A!5e0!3m2!1sen!2sin!4v1788890912456!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </figure>
      </div>
    </section>

<?php get_footer(); ?>
