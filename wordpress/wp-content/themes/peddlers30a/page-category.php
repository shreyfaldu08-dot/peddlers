<?php
/* Template Name: Category (Products) */
 get_header(); ?>

      <!-- ==================================================================
           02 — Hero (Discover Our Products)
           ================================================================== -->
      <section class="hero hero--category" style="background-image: url('assets/img/hero-category.jpg');">
        <div class="container hero__inner">
          <h1 class="hero__title">Discover Our Products</h1>
          <p class="hero__lead">
            Whether you're planning a sunrise ride through Seacrest or a sunset journey to Alys Beach, our team is here to curate your perfect coastal transit.
          </p>
        </div>
      </section>

      <!-- ==================================================================
           03 — Largest Bike Rental Catalog (12 Cards)
           ================================================================== -->
      <section class="section rental rental--category" id="catalog">
        <div class="container">
          <div class="rental__head">
            <div>
              <p class="eyebrow">Rent a Bike</p>
              <h2 class="rental__title">Largest Bike Rental</h2>
              <p class="rental__subtitle">
                Peddlers is known for super friendly service and a HUGE selection of bikes for all ages and styles.
              </p>
            </div>
            <a class="btn btn--outline rental__view-more" href="<?php echo esc_url( peddlers30a_nav_url( 'rentals' ) ); ?>">View More Bike</a>
          </div>

          <div class="rental-filters">
            <button class="rental-filters__btn" type="button">BIKE RENTALS</button>
            <button class="rental-filters__btn" type="button">KIDS BIKES</button>
            <button class="rental-filters__btn" type="button">TAKE YOUR KIDS ALONG</button>
            <button class="rental-filters__btn" type="button">ADULT BIKES</button>
            <button class="rental-filters__btn is-active" type="button">PEDDLER'S PRODUCTS</button>
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

            <!-- Row 3 -->
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
          <p class="eyebrow">The 30A Way</p>
          <h2 class="local-intro__title">Local Introduction</h2>
          <p class="local-intro__copy">
            From family cruiser setups to high-performance electric rides, we equip you with everything needed to ride 30A with ease.
          </p>
          <p class="local-intro__copy">
            Each piece of equipment in our fleet is tested and tuned every single day. When you rent with Peddlers 30A, you receive complimentary helmet fitting, quality locks, and insider route maps to make your trip effortless.
          </p>
        </div>
      </section>

      <!-- ==================================================================
           05 — Navigate Your Paradise
           ================================================================== -->
      <section class="section why why--paradise">
        <div class="container">
          <h2 class="why__title text-center">Navigate Your Paradise</h2>

          <div class="why-cards">
            <article class="why-card">
              <div>
                <h3 class="why-card__title">Scenic Highway 30A</h3>
                <p class="why-card__copy">
                  19 miles of breathtaking paved paths connecting all<br class="why-card__copy-break" /> coastal villages.
                </p>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Icon.png" alt="arrow icon" />
            </article>

            <article class="why-card">
              <div>
                <h3 class="why-card__title">Coastal Dune Lakes</h3>
                <p class="why-card__copy">
                  Rare geological wonders just a short ride from our<br class="why-card__copy-break" /> pavilion.
                </p>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Icon-1.png" alt="waves icon" />
            </article>

            <article class="why-card">
              <div>
                <h3 class="why-card__title">Beach Access Points</h3>
                <p class="why-card__copy">
                  Curated routes to the most secluded sand spots in the<br class="why-card__copy-break" /> area.
                </p>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Icon-2.png" alt="umbrella icon" />
            </article>
          </div>
        </div>
      </section>

      <!-- ==================================================================
           06 — Your 30A Story Begins Here (Closing CTA)
           ================================================================== -->
      <section class="section closing">
        <img class="closing__bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/story-wide.jpg" alt="" />
        <div class="container closing__inner">
          <h2 class="closing__title">Your 30A Story Begins Here</h2>
          <div class="closing__actions">
            <a class="btn btn--light" href="<?php echo esc_url( peddlers30a_nav_url( 'rentals' ) ); ?>">RESERVE ONLINE</a>
            <a class="btn btn--ghost" href="<?php echo esc_url( peddlers30a_nav_url( 'contact' ) ); ?>">CONTACT OUR TEAM</a>
          </div>
        </div>
      </section>

      <!-- ==================================================================
           07 — Assistance / Common Inquiries (FAQ)
           ================================================================== -->
      <section class="section faq">
        <div class="container">
          <p class="eyebrow text-center">Assistance</p>
          <h2 class="faq__title text-center">Common Inquiries</h2>

          <div class="faq__list">
            <div class="accordion__item is-open">
              <button class="accordion__trigger" type="button" aria-expanded="true">
                <span>How do I book a bike rental?</span>
                <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion__panel">
                <p>
                  You can reserve online right here through our website, call us directly at (850) 213-0040, or visit our pavilion in Seacrest Beach. We offer free delivery and pickup for all multi-day rentals along 30A!
                </p>
              </div>
            </div>

            <div class="accordion__item">
              <button class="accordion__trigger" type="button" aria-expanded="false">
                <span>Where can I pick up my bike?</span>
                <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion__panel">
                <p>
                  You can pick up your bikes at Peddlers Pavilion (10343 E County Hwy 30A, Seacrest Beach) or have them delivered directly to your vacation rental home.
                </p>
              </div>
            </div>

            <div class="accordion__item">
              <button class="accordion__trigger" type="button" aria-expanded="false">
                <span>Are helmets and locks included?</span>
                <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion__panel">
                <p>
                  Yes! All rentals include complimentary heavy-duty combination locks and standard helmets upon request.
                </p>
              </div>
            </div>

            <div class="accordion__item">
              <button class="accordion__trigger" type="button" aria-expanded="false">
                <span>What is your cancellation policy?</span>
                <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion__panel">
                <p>
                  Cancellations made 24 hours prior to your rental start time receive a 100% full refund.
                </p>
              </div>
            </div>

            <div class="accordion__item">
              <button class="accordion__trigger" type="button" aria-expanded="false">
                <span>Do you offer multi-day discounts?</span>
                <svg class="accordion__chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
              </button>
              <div class="accordion__panel">
                <p>
                  Yes! We offer discounted rates for 3-day and weekly rentals, including free delivery to your rental property.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    
<?php get_footer(); ?>
