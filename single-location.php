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
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/products/adult-female-cruiser.jpg" alt="Adult Female Cruiser" />
            </figure>
            <h3 class="bike-card__name">Adult Female Cruiser</h3>
            <p class="bike-card__price">From: $40.00</p>
            <a class="btn btn--outline btn--block" href="https://shop.peddlers30a.com/store/adult-female-cruiser/" target="_blank" rel="noopener">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/products/20-kids-cruiser-coral.jpg" alt="20&quot; Kids Cruiser-Coral" />
            </figure>
            <h3 class="bike-card__name">20&Prime; Kids Cruiser-Coral</h3>
            <p class="bike-card__price">From: $40.00</p>
            <a class="btn btn--outline btn--block" href="https://shop.peddlers30a.com/store/20-kids-cruiser-coral/" target="_blank" rel="noopener">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/products/bike-and-burley-combo.jpg" alt="Bike and Burley Combo" />
            </figure>
            <h3 class="bike-card__name">Bike and Burley Combo</h3>
            <p class="bike-card__price">From: $70.00</p>
            <a class="btn btn--outline btn--block" href="https://shop.peddlers30a.com/store/bike-and-burley-combo/" target="_blank" rel="noopener">BOOK NOW</a>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/products/bike-basket.jpg" alt="Bike Basket" />
            </figure>
            <h3 class="bike-card__name">Bike Basket</h3>
            <p class="bike-card__price">From: $5.00</p>
            <a class="btn btn--outline btn--block" href="https://shop.peddlers30a.com/store/bike-basket/" target="_blank" rel="noopener">BOOK NOW</a>
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

        <?php echo do_shortcode( '[trustindex no-registration=google]' ); ?>
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
              <a href="tel:+18502130040">(850) 213-0040</a> <span class="contact__bullet">&bull;</span> <a href="mailto:reservations@peddlers30a.com">reservations@peddlers30a.com</a>
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
