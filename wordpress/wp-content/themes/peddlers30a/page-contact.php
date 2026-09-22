<?php
/* Template Name: Contact */
 get_header(); ?>

    <!-- ==================================================================
           02 — Hero (Contact Peddlers 30A)
           ================================================================== -->
    <section class="hero hero--contact" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/about-story.jpg');">
      <div class="container hero__inner">
        <p class="eyebrow" style="color: var(--s3);">Reach Out</p>
        <h1 class="hero__title">Contact Peddlers 30A</h1>
        <p class="hero__lead">
          Planning a morning ride through Seacrest or a full-day cruise toward Alys Beach? Our team is here to help you book, ask, and sort out the details before you arrive.
        </p>
        <div class="hero__actions">
          <a class="btn btn--primary" href="<?php echo esc_url( peddlers30a_nav_url( 'rentals' ) ); ?>">RESERVE YOUR BIKE</a>
          <a class="btn btn--ghost" href="tel:+18502130040">CALL US</a>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           03 — Send an Inquiry
           ================================================================== -->
    <section class="section inquiry">
      <div class="inquiry__grid">
        <figure class="inquiry__image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/inquiry-beers.jpg" alt="Cold beer at Peddlers Pavilion" />
        </figure>

        <div class="inquiry__panel">
          <h2 class="inquiry__title">Send an Inquiry</h2>
          <p class="inquiry__lead">
            Fill out the form below and we will get back to you within 2 hours during business hours. For faster help, call us directly at 850-213-0040.
          </p>

          <form class="inquiry-form" onsubmit="event.preventDefault(); alert('Thank you! Your inquiry has been sent.');">
            <div class="inquiry-form__field">
              <input type="text" placeholder="FULL NAME" required />
            </div>

            <div class="inquiry-form__row">
              <div class="inquiry-form__field">
                <input type="email" placeholder="EMAIL ADDRESS" required />
              </div>
              <div class="inquiry-form__field">
                <input type="tel" placeholder="PHONE NUMBER" />
              </div>
            </div>

            <div class="inquiry-form__field">
              <input type="text" placeholder="RENTAL DATES" />
            </div>

            <div class="inquiry-form__field">
              <textarea placeholder="YOUR MESSAGE"></textarea>
            </div>

            <button class="inquiry-form__submit" type="submit">SEND MESSAGE</button>
          </form>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           04 — Direct Connection
           ================================================================== -->
    <section class="section direct-connection">
      <div class="container direct-connection__inner">
        <h2 class="direct-connection__title">Direct Connection</h2>
        <p class="direct-connection__lead">
          Prefer to speak with someone directly? Our team picks up during pavilion hours and monitors email until 10 PM.
        </p>

        <div class="direct-connection__grid">
          <div class="direct-card">
            <div class="direct-card__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                </path>
              </svg>
            </div>
            <p class="direct-card__label">Call Us</p>
            <p class="direct-card__value">850-213-0040</p>
          </div>

          <div class="direct-card">
            <div class="direct-card__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </div>
            <p class="direct-card__label">Email Us</p>
            <p class="direct-card__value">hello@peddlers30a.com</p>
          </div>

          <div class="direct-card">
            <div class="direct-card__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 14 14"></polyline>
              </svg>
            </div>
            <p class="direct-card__label">Expected Response</p>
            <p class="direct-card__value">Within 2 Hours</p>
          </div>
        </div>

        <p class="direct-connection__quote">
          &ldquo;A quick call is all it takes to get your ride sorted.&rdquo;
        </p>
      </div>
    </section>

    <!-- ==================================================================
           05 — Seasonal Hours
           ================================================================== -->
    <section class="section seasonal-hours" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/seasonal-hours-bg.jpg');">
      <div class="seasonal-hours__overlay"></div>

      <div class="seasonal-hours__card">
        <div class="seasonal-hours__intro">
          <h2 class="seasonal-hours__title">Seasonal Hours</h2>
          <p class="seasonal-hours__lead">
            Our pavilion follows the rhythm of the coastal sun. We are open daily and here to help you plan the perfect ride.
          </p>
          <div class="seasonal-hours__notice">
            <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
            <p>
              After-hours assistance? Email us at hello@peddlers30a.com. We monitor until 10 PM.
            </p>
          </div>
        </div>

        <div class="seasonal-hours__list">
          <div class="seasonal-hours__row">
            <p class="seasonal-hours__label">Monday &mdash; Friday</p>
            <p class="seasonal-hours__value">8 AM &mdash; 6 PM</p>
          </div>
          <div class="seasonal-hours__row">
            <p class="seasonal-hours__label">Saturday</p>
            <p class="seasonal-hours__value">7 AM &mdash; 7 PM</p>
          </div>
          <div class="seasonal-hours__row seasonal-hours__row--last">
            <p class="seasonal-hours__label">Sunday</p>
            <p class="seasonal-hours__value">9 AM &mdash; 5 PM</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           06 — Visit the Pavilion
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
            rel="noopener">GET DIRECTIONS</a>
        </div>

        <figure class="contact__map" style="display: flex; flex-direction: column;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.4440399091454!2d-86.02173242443716!3d30.281418174805022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8893f1fdbc7ec827%3A0x5a6ed556c4dfa18b!2sPeddlers%2030A!5e0!3m2!1sen!2sin!4v1788890912456!5m2!1sen!2sin" width="100%" height="100%" style="border:0; flex-grow: 1;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          <p style="margin-top: 1rem; font-size: 0.85rem; color: #888; text-align: center;">We are located in Seacrest Beach on Scenic Highway 30A. Free parking is available on site. Bike delivery available to all 30A communities.</p>
        </figure>
      </div>
    </section>
  
<?php get_footer(); ?>
