<?php
/* Template Name: Rentals */
add_action( 'wp_head', function () {
	?>
<style>
    /* Rentals page — responsive fixes for grids that use inline layout */
    .rt-trust {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 2rem;
      align-items: center;
      text-align: center;
    }

    .rt-grid-3,
    .rt-grid-4 {
      display: grid;
      gap: 1.5rem;
    }

    .rt-grid-3 {
      grid-template-columns: repeat(3, 1fr);
    }

    .rt-grid-4 {
      grid-template-columns: repeat(4, 1fr);
    }

    @media (max-width: 1024px) {

      .rt-grid-3,
      .rt-grid-4 {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 640px) {
      .rt-trust {
        gap: 1.25rem;
      }

      .rt-grid-3,
      .rt-grid-4 {
        grid-template-columns: 1fr;
      }
    }
  </style>
	<?php
} );
get_header();
?>

    <!-- ==================================================================
           02 — Hero
           ================================================================== -->
    <section class="hero hero--rentals" style="background-image: url('assets/img/hero-bg.jpg');">
      <div class="container hero__inner">
        <p class="eyebrow" style="color: var(--s3);">Seacrest Beach, FL</p>
        <h1 class="hero__title">30A Bike Rentals, Right on the Trail</h1>
        <p class="hero__lead">
          The largest bike rental fleet on Scenic Highway 30A. Helmet and lock included with every rental. Delivery to
          your vacation rental or walk in. We're here when you are.
        </p>
        <div class="hero__actions">
          <a class="btn btn--primary" href="#catalog">RESERVE YOUR BIKES</a>
          <a class="btn btn--ghost" href="#catalog">SEE THE FULL FLEET</a>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           03 — Largest Bike Rental Catalog (8 Cards)
           ================================================================== -->
    <section class="section rental rental--catalog" id="catalog">
      <div class="container">
        <div class="rental__head">
          <p class="eyebrow">Bike Rentals on 30A</p>
          <h2 class="rental__title">The Largest Bike Rental Fleet on 30A</h2>
          <p class="rental__subtitle">
            Peddlers is known for friendly service and a fleet built for every rider kids, families, beginners, and
            those ready to cover all 19 miles.
          </p>
        </div>

        <div class="rental-filters">
          <button class="rental-filters__btn is-active" type="button">BIKE RENTALS</button>
          <button class="rental-filters__btn" type="button">KIDS BIKES</button>
          <button class="rental-filters__btn" type="button">PEDDLER'S PRODUCTS</button>
          <button class="rental-filters__btn" type="button">TAKE YOUR KIDS ALONG</button>
          <button class="rental-filters__btn" type="button">ADULT BIKES</button>
        </div>

        <div class="rental__grid">
          <!-- Row 1 -->
          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-1.jpg" alt="Adult Female Cruiser" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Adult Female Cruiser</h3>
              <p class="bike-card__price">From: <span>$40.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-4.jpg" alt="20 inch Kids Cruiser-Coral" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">20&Prime; Kids Cruiser-Coral</h3>
              <p class="bike-card__price">From: <span>$40.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-3.jpg" alt="Bike and Burley Combo" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Bike and Burley Combo</h3>
              <p class="bike-card__price">From: <span>$70.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-2.jpg" alt="Bike Basket" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Bike Basket</h3>
              <p class="bike-card__price">From: <span>$5.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <!-- Row 2 -->
          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-1.jpg" alt="Adult Female Cruiser" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Adult Female Cruiser</h3>
              <p class="bike-card__price">From: <span>$40.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-4.jpg" alt="20 inch Kids Cruiser-Coral" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">20&Prime; Kids Cruiser-Coral</h3>
              <p class="bike-card__price">From: <span>$40.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-3.jpg" alt="Bike and Burley Combo" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Bike and Burley Combo</h3>
              <p class="bike-card__price">From: <span>$70.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>

          <article class="bike-card">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-2.jpg" alt="Bike Basket" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title">Bike Basket</h3>
              <p class="bike-card__price">From: <span>$5.00</span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">BOOK NOW</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           04 — The 30A Way / Local Introduction
           ================================================================== -->
    <section class="section local-intro">
      <div class="container local-intro__inner">
        <p class="eyebrow">LOCAL INTRODUCTION
        </p>
        <h2 class="local-intro__title">30A Bike Rentals, Delivered the Right Way</h2>
        <p class="local-intro__copy">
          Peddlers 30A has run the largest bike rental fleet on Scenic Highway 30A for 15+ years. The shop sits directly
          on the 30A coastal path in Seacrest Beach, Florida; walk out the door and you're riding. Beach cruisers,
          7-speeds, kids bikes, adult tricycles, and the only Wee HOO and Tug A Bug rentals on the gulf coast are all
          here, inspected every morning before they go out.
        </p>
        <p class="local-intro__copy">
          Every rental includes a helmet and lock at no extra charge. Add a basket for $5/day. Walk into the Peddlers
          Pavilion, book online, or call 850-213-0040 and we'll deliver to your vacation rental anywhere along 30A, from
          Inlet Beach to Miramar Beach. You're on the trail in minutes either way.
        </p>
      </div>
    </section>

    <!-- ==================================================================
           05 — Simple & Transparent Pricing
           ================================================================== -->
    <section class="section pricing">
      <div class="container pricing__head">
        <p class="eyebrow">RENTAL OPTIONS</p>
        <h2 class="pricing__title">Simple &amp; Transparent 30A Bike Rental Pricing</h2>
        <p class="pricing__lead">
          Every bundle our fleet has to offer the perfect duration for your coastal exploration.
        </p>

        <div class="pricing-tabs" data-segmented>
          <button class="pricing-tabs__btn is-active" data-pricing-tab="full-day" type="button"
            aria-selected="true">Full Day</button>
          <button class="pricing-tabs__btn" data-pricing-tab="weekly" type="button"
            aria-selected="false">Weekly</button>
        </div>

        <!-- Full Day (default active) -->
        <div class="pricing__grid" data-pricing-panel="full-day">
          <!-- Cruiser -->
          <div class="pricing-card">
            <h3 class="pricing-card__name">Cruiser</h3>
            <p class="pricing-card__price">$40 <span>/ DAY</span></p>
            <ul class="pricing-card__features">
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Women's, Men's, and Unisex beach cruisers</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Perfect for the flat, paved 30A coastal path</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Helmet and lock included</li>
            </ul>
            <a class="pricing-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">Reserve</a>
          </div>

          <!-- Explorer (Featured) -->
          <div class="pricing-card pricing-card--featured">
            <span class="pricing-card__badge">Most Popular</span>
            <h3 class="pricing-card__name">Explorer</h3>
            <p class="pricing-card__price">$50 <span>/ DAY</span></p>
            <ul class="pricing-card__features">
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>7-Speed bike built for the full 19-mile 30A trail</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Men's and Unisex options available</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Helmet and lock included</li>
            </ul>
            <a class="pricing-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">Reserve</a>
          </div>

          <!-- Family -->
          <div class="pricing-card">
            <h3 class="pricing-card__name">Family</h3>
            <p class="pricing-card__price">from $50 <span>/ DAY</span></p>
            <ul class="pricing-card__features">
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Kids bikes (16&Prime;, 20&Prime;, 24&Prime;) &middot; Baby Seat &middot; Tricycle</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Kazoo Tandem $60 &middot; Bike + Burley Combo $70</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Helmet and lock included with every bike</li>
            </ul>
            <a class="pricing-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">Reserve</a>
          </div>
        </div>

        <!-- Weekly (only Cruiser rate is confirmed — Explorer/Family weekly rates pending client confirmation) -->
        <div class="pricing__grid pricing__grid--single" data-pricing-panel="weekly" hidden>
          <div class="pricing-card">
            <h3 class="pricing-card__name">Cruiser</h3>
            <p class="pricing-card__price">$70 <span>/ WEEK</span></p>
            <ul class="pricing-card__features">
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Best value for a full-week 30A vacation</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Women's, Men's, and Unisex options available</li>
              <li><svg viewBox="0 0 13 9" fill="none" aria-hidden="true">
                  <path d="M1 4.5L4.5 8L12 1" stroke="currentColor" stroke-width="1.5" />
                </svg>Helmet and lock included</li>
            </ul>
            <a class="pricing-card__cta" href="<?php echo esc_url( peddlers30a_nav_url( 'product-detail' ) ); ?>">Reserve</a>
          </div>
        </div>
      </div>
    </section>

    <script>
      (function () {
        var tabs = document.querySelectorAll("[data-pricing-tab]");
        var panels = document.querySelectorAll("[data-pricing-panel]");
        Array.prototype.forEach.call(tabs, function (tab) {
          tab.addEventListener("click", function () {
            Array.prototype.forEach.call(tabs, function (t) {
              t.classList.toggle("is-active", t === tab);
              t.setAttribute("aria-selected", t === tab ? "true" : "false");
            });
            Array.prototype.forEach.call(panels, function (panel) {
              panel.hidden = panel.getAttribute("data-pricing-panel") !== tab.getAttribute("data-pricing-tab");
            });
          });
        });
      })();
    </script>

    <!-- ==================================================================
           06 — Our Simple Rental Process
           ================================================================== -->
    <section class="section rental-process">
      <div class="container rental-process__inner">
        <div class="rental-process__head">
          <p class="rental-process__eyebrow">PICK UP YOUR RIDE</p>
          <h2 class="rental-process__title">Our Simple 30A Bike Rental Process</h2>
        </div>

        <div class="rental-process__steps">
          <div class="rental-process__line" aria-hidden="true"></div>

          <div class="rental-process__step">
            <span class="rental-process__num">1</span>
            <img class="rental-process__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/process-reserve.png" alt="" />
            <h3 class="rental-process__step-title">Reserve Online</h3>
            <p class="rental-process__step-copy">Choose your bike, date, and delivery location on 30A in minutes.</p>
          </div>

          <div class="rental-process__step">
            <span class="rental-process__num">2</span>
            <img class="rental-process__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/process-delivery.png" alt="" />
            <h3 class="rental-process__step-title">We Deliver to You</h3>
            <p class="rental-process__step-copy">We bring your rental bikes directly to your 30A vacation rental.</p>
          </div>

          <div class="rental-process__step">
            <span class="rental-process__num">3</span>
            <img class="rental-process__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/process-ride.png" alt="" />
            <h3 class="rental-process__step-title">Pick Up &amp; Ride</h3>
            <p class="rental-process__step-copy">Helmet and lock ready. Hop on and step onto the 30A coastal trail.</p>
          </div>

          <div class="rental-process__step">
            <span class="rental-process__num">4</span>
            <img class="rental-process__icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/process-adventure.png" alt="" />
            <h3 class="rental-process__step-title">Adventure 30A</h3>
            <p class="rental-process__step-copy">Explore 19 miles of beaches, trails, and hidden gems on Scenic Highway
              30A.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           07 — Near By Beaches Worth To Ride
           ================================================================== -->
    <section class="section beaches">
      <div class="container beaches__head">
        <p class="eyebrow">COASTAL COMMUNITIES</p>
        <h2 class="beaches__title">Bike Rentals Across All of 30A</h2>
        <p class="beaches__lead">
          If you're looking for bike rentals near your 30A vacation rental, you're in the right place. Peddlers delivers
          from Inlet Beach west to Miramar Beach. Or visit the Peddlers Pavilion in Seacrest Beach in person, right on
          the coastal path with no detour.
        </p>

        <div class="beaches__grid">
          <!-- Rosemary Beach -->
          <article class="beach-card">
            <div class="beach-card__media">
              <span class="beach-card__badge">1 MIN RIDE</span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/beach-1.png?v=2" alt="Rosemary Beach" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title">Rosemary Beach</h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <p class="beach-card__tag">Cobblestone Lanes, Gulf Views</p>
            <p class="beach-card__copy">
              Rosemary Beach is 1 minute east of Peddlers on Scenic Highway 30A. Cobblestone lanes, Barrett Square, and
              West Indies architecture make it a natural first ride from Seacrest Beach.
            </p>
            <div class="beach-card__tags">
              <span class="beach-card__pill">Cobblestone Lanes</span>
              <span class="beach-card__pill">Barrett Square</span>
              <span class="beach-card__pill">Architecture</span>
            </div>
          </article>

          <!-- Alys Beach -->
          <article class="beach-card">
            <div class="beach-card__media">
              <span class="beach-card__badge">4 MIN RIDE</span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/beach-2.png?v=2" alt="Alys Beach" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title">Alys Beach</h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <p class="beach-card__tag">White Walls, Quiet Courtyards</p>
            <p class="beach-card__copy">
              Alys Beach is 4 minutes west of Peddlers on the 30A coastal path. Stark white Bermudan architecture, quiet
              pedestrian lanes, and a stop at Fonville Press mid-ride.
            </p>
            <div class="beach-card__tags">
              <span class="beach-card__pill">Architecture</span>
              <span class="beach-card__pill">Quiet Lanes</span>
              <span class="beach-card__pill">Fonville Press</span>
            </div>
          </article>

          <!-- Seacrest Beach -->
          <article class="beach-card">
            <div class="beach-card__media">
              <span class="beach-card__badge">HOME BASE</span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/beach-3.png?v=2" alt="Seacrest Beach" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title">Seacrest Beach</h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <p class="beach-card__tag">Where Peddlers Calls Home</p>
            <p class="beach-card__copy">
              Peddlers Pavilion sits directly on the 30A coastal path in Seacrest Beach. Walk out the door and you're
              already riding, no detour needed.
            </p>
            <div class="beach-card__tags">
              <span class="beach-card__pill">Coastal Path</span>
              <span class="beach-card__pill">No Detour</span>
              <span class="beach-card__pill">Walk & Ride</span>
            </div>
          </article>

          <!-- Inlet Beach -->
          <article class="beach-card">
            <div class="beach-card__media">
              <span class="beach-card__badge">5 MIN RIDE</span>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/beach-4.png?v=2" alt="Inlet Beach" />
            </div>
            <div class="beach-card__head">
              <h3 class="beach-card__title">Inlet Beach</h3>
              <svg class="beach-card__icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M4 12L12 4M12 4H5M12 4V11" stroke="currentColor" stroke-width="1.3" />
              </svg>
            </div>
            <p class="beach-card__tag">Eastern End of 30A</p>
            <p class="beach-card__copy">
              Inlet Beach is 5 minutes east of Peddlers. Walton County's largest public beach access with boardwalk
              ramps, restrooms, and seasonal lifeguards on the Gulf.
            </p>
            <div class="beach-card__tags">
              <span class="beach-card__pill">Boardwalk Ramps</span>
              <span class="beach-card__pill">Public Access</span>
              <span class="beach-card__pill">Lifeguards</span>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           08 — Guest Testimonials / Refined Experiences
           ================================================================== -->
    <section class="section testimonials rentals-testimonials">
      <div class="container">
        <p class="eyebrow text-center">Guest Testimonials</p>
        <h2 class="testimonials__title text-center">Refined Experiences</h2>

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
            <svg viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24"
              height="20">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0.401095 11.5212C0.144261 11.7809 5.30349e-07 12.133 5.46392e-07 12.5C5.62436e-07 12.867 0.144261 13.2191 0.401095 13.4788L11.3729 24.5592C11.4985 24.6953 11.6499 24.8044 11.8181 24.8801C11.9864 24.9558 12.168 24.9965 12.3521 24.9998C12.5363 25.0031 12.7192 24.9689 12.89 24.8992C13.0607 24.8295 13.2159 24.7259 13.3461 24.5943C13.4763 24.4628 13.579 24.3061 13.648 24.1337C13.717 23.9612 13.7508 23.7765 13.7476 23.5905C13.7443 23.4045 13.704 23.2211 13.6291 23.0512C13.5541 22.8813 13.446 22.7284 13.3113 22.6016L4.68011 13.8851L30.6285 13.8851C30.9923 13.8851 31.3411 13.7391 31.5983 13.4794C31.8555 13.2196 32 12.8673 32 12.5C32 12.1327 31.8555 11.7804 31.5983 11.5206C31.3411 11.2609 30.9923 11.115 30.6285 11.115L4.68011 11.115L13.3113 2.39837C13.446 2.27157 13.5541 2.11866 13.6291 1.94876C13.704 1.77886 13.7443 1.59546 13.7476 1.40948C13.7508 1.22351 13.717 1.03879 13.648 0.866323C13.579 0.69386 13.4763 0.537194 13.3461 0.405672C13.2159 0.27415 13.0607 0.170466 12.89 0.100805C12.7192 0.0311448 12.5363 -0.00306484 12.3521 0.000216414C12.168 0.00349767 11.9864 0.0442025 11.8181 0.119904C11.6499 0.195605 11.4985 0.304751 11.3729 0.440831L0.401095 11.5212Z"
                fill="currentColor" />
            </svg>
          </button>
          <button class="carousel-nav__btn" type="button" aria-label="Next testimonial">
            <svg viewBox="92 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24"
              height="20">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M123.599 11.5212C123.856 11.7809 124 12.133 124 12.5C124 12.867 123.856 13.2191 123.599 13.4788L112.627 24.5592C112.502 24.6953 112.35 24.8044 112.182 24.8801C112.014 24.9558 111.832 24.9965 111.648 24.9998C111.464 25.0031 111.281 24.9689 111.11 24.8992C110.939 24.8295 110.784 24.7259 110.654 24.5943C110.524 24.4628 110.421 24.3061 110.352 24.1337C110.283 23.9612 110.249 23.7765 110.252 23.5905C110.256 23.4045 110.296 23.2211 110.371 23.0512C110.446 22.8813 110.554 22.7284 110.689 22.6016L119.32 13.8851L93.3715 13.8851C93.0077 13.8851 92.6589 13.7391 92.4017 13.4794C92.1445 13.2196 92 12.8673 92 12.5C92 12.1327 92.1445 11.7804 92.4017 11.5206C92.6589 11.2609 93.0077 11.115 93.3715 11.115L119.32 11.115L110.689 2.39837C110.554 2.27157 110.446 2.11866 110.371 1.94876C110.296 1.77886 110.256 1.59546 110.252 1.40948C110.249 1.22351 110.283 1.03879 110.352 0.866323C110.421 0.69386 110.524 0.537194 110.654 0.405672C110.784 0.27415 110.939 0.170466 111.11 0.100805C111.281 0.0311448 111.464 -0.00306484 111.648 0.000216414C111.832 0.00349767 112.014 0.0442025 112.182 0.119904C112.35 0.195605 112.502 0.304751 112.627 0.440831L123.599 11.5212Z"
                fill="currentColor" />
            </svg>
          </button>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           09 — Assistance / Common Inquiries (FAQ)
           ================================================================== -->
    <section class="section faq">
      <div class="container">
        <p class="eyebrow text-center">Assistance</p>
        <h2 class="faq__title text-center">30A Bike Rental Questions, Answered</h2>

        <div class="faq__list">
          <div class="accordion__item is-open">
            <button class="accordion__trigger" type="button" aria-expanded="true">
              <span>How much does it cost to rent a bike on 30A?</span>
              <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="accordion__panel">
              <p>
                Beach cruisers start at $30/day (Monkey Faction) and $40/day for standard cruisers. Kids bikes are
                $40/day. 7-speed bikes are $50/day. Family options like the Kazoo Kids Tandem are $60/day and the Bike +
                Burley Combo is $70/day. Every rental includes a helmet and lock.
              </p>
            </div>
          </div>

          <div class="accordion__item">
            <button class="accordion__trigger" type="button" aria-expanded="false">
              <span>Does Peddlers 30A deliver bikes to vacation rentals?</span>
              <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="accordion__panel">
              <p>
                Yes. Peddlers delivers to vacation rentals across all 30A communities, from Inlet Beach to Miramar
                Beach. Call 850-213-0040 or book online to arrange delivery. We coordinate timing directly with you.
              </p>
            </div>
          </div>

          <div class="accordion__item">
            <button class="accordion__trigger" type="button" aria-expanded="false">
              <span>What's included with a Peddlers 30A bike rental?</span>
              <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="accordion__panel">
              <p>
                Every full rental includes a helmet and a lock at no extra charge. A bike basket is available as a
                $5/day add-on. No other fees or deposits are required beyond the rental rate.
              </p>
            </div>
          </div>

          <div class="accordion__item">
            <button class="accordion__trigger" type="button" aria-expanded="false">
              <span>Do you rent kids bikes on 30A?</span>
              <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="accordion__panel">
              <p>
                Yes. Peddlers carries kids bikes in 16&Prime;, 20&Prime;, and 24&Prime; sizes, plus kids tricycles, the
                Kazoo Kids Tandem, Baby Seat Bicycle, Burley trailer combo, Wee HOO trail-a-bike, and Tug A Bug
                tag-along. Peddlers is the only shop on 30A carrying Wee HOO and Tug A Bug rentals.
              </p>
            </div>
          </div>

          <div class="accordion__item">
            <button class="accordion__trigger" type="button" aria-expanded="false">
              <span>Can I walk in without a reservation?</span>
              <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="accordion__panel">
              <p>
                Yes. Walk-ins are welcome during business hours at the Peddlers Pavilion, 10343 E County Hwy 30A,
                Seacrest Beach, FL 32461. Online reservations are also available at peddlers30a.com if you'd like to
                book ahead.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           09.5 — Booking CTA
           ================================================================== -->
    <section class="section" style="background: var(--p1); padding: 4rem 0; text-align: center;">
      <div class="container">
        <h2
          style="font-family: var(--font-body); font-weight: 700; font-size: 2.25rem; color: #ffffff; margin-bottom: 1rem;">
          Ready to Ride?</h2>
        <p style="color: #ffffff; opacity: 0.9; max-width: 40rem; margin: 0 auto 2rem;">
          Reserve online or call 850-213-0040. Walk-ins are always welcome at the Peddlers Pavilion on Scenic Highway
          30A in Seacrest Beach.
        </p>
        <div style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap;">
          <a class="btn btn--sand" href="#catalog">RESERVE A BIKE</a>
          <a class="btn"
            style="background: transparent; color: #ffffff; border: 1px solid rgba(255,255,255,0.4); padding: 0.8rem 2.5rem; font-size: 0.85rem;"
            href="tel:+18502130040">CALL 850-213-0040</a>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           10 — Visit the Pavilion
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
            <p class="contact__label">CONNECT</p>
            <p class="contact__value">
              <a href="tel:+18502130040">850-213-0040</a> <span class="contact__bullet">&bull;</span> <a
                href="mailto:hello@peddlers30a.com">hello@peddlers30a.com</a>
            </p>
          </div>

          <a class="btn btn--teal contact__cta"
            href="https://maps.google.com/?q=10343+E+County+Hwy+30A,+Inlet+Beach,+FL+32461" target="_blank"
            rel="noopener">GET DIRECTION</a>
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
