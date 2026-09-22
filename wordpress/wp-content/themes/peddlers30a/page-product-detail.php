<?php
/* Template Name: Product Detail */
 get_header(); ?>

      <!-- ==================================================================
           02 — Date Range Selector
           ================================================================== -->
      <section class="date-selector">
        <div class="container date-selector__inner">
          <div class="date-selector__field" data-date-field="start">
            <button class="date-selector__btn" type="button" aria-haspopup="true" aria-expanded="false">
              <span>Starting Date</span>
              <svg viewBox="0 0 13 8" fill="none" aria-hidden="true"><path d="M1 1L6.5 6.5L12 1" stroke="currentColor" stroke-width="1.3" /></svg>
            </button>
            <div class="date-picker" hidden>
              <div class="date-picker__head">
                <button class="date-picker__nav" type="button" data-cal-prev aria-label="Previous month">
                  <svg viewBox="0 0 8 13" fill="none" aria-hidden="true"><path d="M7 1L1.5 6.5L7 12" stroke="currentColor" stroke-width="1.3" /></svg>
                </button>
                <span class="date-picker__month"></span>
                <button class="date-picker__nav" type="button" data-cal-next aria-label="Next month">
                  <svg viewBox="0 0 8 13" fill="none" aria-hidden="true"><path d="M1 1L6.5 6.5L1 12" stroke="currentColor" stroke-width="1.3" /></svg>
                </button>
              </div>
              <div class="date-picker__weekdays">
                <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
              </div>
              <div class="date-picker__days"></div>
            </div>
          </div>
          <div class="date-selector__field" data-date-field="end">
            <button class="date-selector__btn" type="button" aria-haspopup="true" aria-expanded="false">
              <span>Ending Date</span>
              <svg viewBox="0 0 13 8" fill="none" aria-hidden="true"><path d="M1 1L6.5 6.5L12 1" stroke="currentColor" stroke-width="1.3" /></svg>
            </button>
            <div class="date-picker" hidden>
              <div class="date-picker__head">
                <button class="date-picker__nav" type="button" data-cal-prev aria-label="Previous month">
                  <svg viewBox="0 0 8 13" fill="none" aria-hidden="true"><path d="M7 1L1.5 6.5L7 12" stroke="currentColor" stroke-width="1.3" /></svg>
                </button>
                <span class="date-picker__month"></span>
                <button class="date-picker__nav" type="button" data-cal-next aria-label="Next month">
                  <svg viewBox="0 0 8 13" fill="none" aria-hidden="true"><path d="M1 1L6.5 6.5L1 12" stroke="currentColor" stroke-width="1.3" /></svg>
                </button>
              </div>
              <div class="date-picker__weekdays">
                <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
              </div>
              <div class="date-picker__days"></div>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================================================================
           03 — Product Hero Split (Electric Explorer)
           ================================================================== -->
      <section class="section product-hero">
        <div class="product-hero__grid">
          <figure class="product-hero__media">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/s05-4.jpg" alt="Electric Explorer coral cruiser bike" />
          </figure>

          <div class="product-hero__panel">
            <div class="product-hero__inner">
              <p class="eyebrow product-hero__eyebrow">Our Home Base</p>
              <h1 class="product-hero__title">Electric Explorer</h1>

              <p class="product-hero__desc">
                More than a rental shop&mdash;it's the hub of the 30A community. Start with craft espresso, browse curated boutiques, and enjoy live music under the coastal oaks.
              </p>

              <div class="product-hero__specs">
                <div class="product-hero__spec">
                  <p class="product-hero__spec-label">Range</p>
                  <p class="product-hero__spec-value">40mi</p>
                </div>
                <div class="product-hero__spec">
                  <p class="product-hero__spec-label">Motor</p>
                  <p class="product-hero__spec-value">250W</p>
                </div>
                <div class="product-hero__spec">
                  <p class="product-hero__spec-label">Charge</p>
                  <p class="product-hero__spec-value">3.5h</p>
                </div>
              </div>

              <div class="product-hero__pills-wrap">
                <p class="product-hero__inclusions-label">Inclusions</p>
                <div class="product-hero__pills">
                  <span class="product-hero__pill">
                    <svg width="24" height="19" viewBox="0 0 24 19" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 1a8 8 0 0 0-8 8v6a3 3 0 0 0 3 3h1v-8H5v-1a7 7 0 0 1 14 0v1h-3v8h1a3 3 0 0 0 3-3V9a8 8 0 0 0-8-8z" /></svg>
                    Helmet
                  </span>
                  <span class="product-hero__pill">
                    <svg width="14" height="19" viewBox="0 0 14 19" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="8" width="12" height="10" rx="1.5" /><path d="M4 8V5a3 3 0 0 1 6 0v3" /></svg>
                    Lock
                  </span>
                  <span class="product-hero__pill">
                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 1L1 5v11a2 2 0 0 0 2 2h17a2 2 0 0 0 2-2V5l-3-4z" /><path d="M1 5h21" /></svg>
                    Basket
                  </span>
                </div>
              </div>

              <div class="product-hero__footer">
                <div>
                  <p class="product-hero__price-label">From</p>
                  <p class="product-hero__price">$85<span>/day</span></p>
                </div>
                <a class="product-hero__book-btn" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">Book Now</a>
              </div>
            </div>
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
           05 — Make It A Day To Remember
           ================================================================== -->
      <section class="section day-banner">
        <div class="container day-banner__inner">
          <div class="day-banner__content">
            <p class="day-banner__eyebrow">AT THE PAVILION</p>
            <h2 class="day-banner__title">Bikes, Bites, and a Place to Stay Awhile.</h2>
            <a class="btn btn--ghost day-banner__btn" href="index.html#experiences">EXPLORE EXPERIENCES</a>
          </div>

          <div class="day-banner__badges">
            <div class="day-badge">
              <div class="day-badge__circle day-badge__circle--sand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector.png" alt="" />
              </div>
              <span class="day-badge__label">SHOP LOCAL</span>
            </div>

            <div class="day-badge">
              <div class="day-badge__circle day-badge__circle--teal">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector-1.png?v=2" alt="" />
              </div>
              <span class="day-badge__label">GRAB A BITE</span>
            </div>

            <div class="day-badge">
              <div class="day-badge__circle day-badge__circle--light">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector-2.png?v=2" alt="" />
              </div>
              <span class="day-badge__label">DRINKS</span>
            </div>

            <div class="day-badge">
              <div class="day-badge__circle day-badge__circle--navy">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Group-147.png" alt="" />
              </div>
              <span class="day-badge__label">BEACH TIME</span>
            </div>

            <div class="day-badge">
              <div class="day-badge__circle day-badge__circle--sky">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector-4.png?v=1" alt="" />
              </div>
              <span class="day-badge__label">LIVE MUSIC</span>
            </div>
          </div>
        </div>
      </section>

      <!-- ==================================================================
           06 — COASTAL COMMUNITIES / Relate Products
           ================================================================== -->
      <section class="section relate-products">
        <div class="container">
          <div class="relate-products__head">
            <div>
              <p class="eyebrow">COASTAL COMMUNITIES</p>
              <h2 class="why__title">Relate Products</h2>
            </div>
            <div class="relate-products__nav">
              <button class="carousel-nav__btn" type="button" aria-label="Previous product">
                <svg viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24"
                  height="20">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.401095 11.5212C0.144261 11.7809 5.30349e-07 12.133 5.46392e-07 12.5C5.62436e-07 12.867 0.144261 13.2191 0.401095 13.4788L11.3729 24.5592C11.4985 24.6953 11.6499 24.8044 11.8181 24.8801C11.9864 24.9558 12.168 24.9965 12.3521 24.9998C12.5363 25.0031 12.7192 24.9689 12.89 24.8992C13.0607 24.8295 13.2159 24.7259 13.3461 24.5943C13.4763 24.4628 13.579 24.3061 13.648 24.1337C13.717 23.9612 13.7508 23.7765 13.7476 23.5905C13.7443 23.4045 13.704 23.2211 13.6291 23.0512C13.5541 22.8813 13.446 22.7284 13.3113 22.6016L4.68011 13.8851L30.6285 13.8851C30.9923 13.8851 31.3411 13.7391 31.5983 13.4794C31.8555 13.2196 32 12.8673 32 12.5C32 12.1327 31.8555 11.7804 31.5983 11.5206C31.3411 11.2609 30.9923 11.115 30.6285 11.115L4.68011 11.115L13.3113 2.39837C13.446 2.27157 13.5541 2.11866 13.6291 1.94876C13.704 1.77886 13.7443 1.59546 13.7476 1.40948C13.7508 1.22351 13.717 1.03879 13.648 0.866323C13.579 0.69386 13.4763 0.537194 13.3461 0.405672C13.2159 0.27415 13.0607 0.170466 12.89 0.100805C12.7192 0.0311448 12.5363 -0.00306484 12.3521 0.000216414C12.168 0.00349767 11.9864 0.0442025 11.8181 0.119904C11.6499 0.195605 11.4985 0.304751 11.3729 0.440831L0.401095 11.5212Z"
                    fill="currentColor" />
                </svg>
              </button>
              <button class="carousel-nav__btn" type="button" aria-label="Next product">
                <svg viewBox="92 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" width="24"
                  height="20">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M123.599 11.5212C123.856 11.7809 124 12.133 124 12.5C124 12.867 123.856 13.2191 123.599 13.4788L112.627 24.5592C112.502 24.6953 112.35 24.8044 112.182 24.8801C112.014 24.9558 111.832 24.9965 111.648 24.9998C111.464 25.0031 111.281 24.9689 111.11 24.8992C110.939 24.8295 110.784 24.7259 110.654 24.5943C110.524 24.4628 110.421 24.3061 110.352 24.1337C110.283 23.9612 110.249 23.7765 110.252 23.5905C110.256 23.4045 110.296 23.2211 110.371 23.0512C110.446 22.8813 110.554 22.7284 110.689 22.6016L119.32 13.8851L93.3715 13.8851C93.0077 13.8851 92.6589 13.7391 92.4017 13.4794C92.1445 13.2196 92 12.8673 92 12.5C92 12.1327 92.1445 11.7804 92.4017 11.5206C92.6589 11.2609 93.0077 11.115 93.3715 11.115L119.32 11.115L110.689 2.39837C110.554 2.27157 110.446 2.11866 110.371 1.94876C110.296 1.77886 110.256 1.59546 110.252 1.40948C110.249 1.22351 110.283 1.03879 110.352 0.866323C110.421 0.69386 110.524 0.537194 110.654 0.405672C110.784 0.27415 110.939 0.170466 111.11 0.100805C111.281 0.0311448 111.464 -0.00306484 111.648 0.000216414C111.832 0.00349767 112.014 0.0442025 112.182 0.119904C112.35 0.195605 112.502 0.304751 112.627 0.440831L123.599 11.5212Z"
                    fill="currentColor" />
                </svg>
              </button>
            </div>
          </div>

          <div class="rental__grid relate-products__grid">
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
    
<?php get_footer(); ?>
