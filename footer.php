  </main>

  <!-- ====================================================================
         21 — Footer
         ==================================================================== -->
  <footer class="site-footer">
    <div class="container">
      <div class="site-footer__grid">
        <div class="site-footer__brand">
          <a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Peddlers 30A">
            <img src="<?php echo esc_url( peddlers30a_logo_url() ); ?>" alt="Peddlers 30A" />
          </a>
          <p class="site-footer__tagline"><?php echo esc_html( get_theme_mod( 'footer_tagline', 'Explore. Rent. Enjoy.' ) ); ?></p>
          <p class="site-footer__blurb"><?php echo esc_html( get_theme_mod( 'footer_blurb', "Your go-to for bike rentals, beach gear and local experiences along Florida's iconic 30A." ) ); ?></p>
          <ul class="site-footer__contact">
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 21s-7-5.686-7-11a7 7 0 1 1 14 0c0 5.314-7 11-7 11z" /><circle cx="12" cy="10" r="2.5" /></svg>
              <span><?php echo esc_html( get_theme_mod( 'address_line1', '10343 E County Hwy 30A,' ) ); ?><br /><?php echo esc_html( get_theme_mod( 'address_line2', 'Inlet Beach, FL 32461' ) ); ?></span>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.36 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
              <a href="tel:<?php echo esc_attr( get_theme_mod( 'phone_number_link', '+18502130040' ) ); ?>"><?php echo esc_html( get_theme_mod( 'phone_number', '(850) 213-0040' ) ); ?></a>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2" /><path d="M2 7l10 6 10-6" /></svg>
              <a href="mailto:<?php echo esc_attr( get_theme_mod( 'email_address', 'hello@peddlers30a.com' ) ); ?>"><?php echo esc_html( get_theme_mod( 'email_address', 'hello@peddlers30a.com' ) ); ?></a>
            </li>
          </ul>
          <div class="site-footer__social">
            <a href="<?php echo esc_url( get_theme_mod( 'social_instagram', 'https://instagram.com' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" /><circle cx="12" cy="12" r="4.5" /><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none" /></svg></a>
            <a href="<?php echo esc_url( get_theme_mod( 'social_facebook', 'https://facebook.com' ) ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M15 8.5h2.5V5h-2.5c-2.2 0-4 1.8-4 4v2H9v3.5h2v6.5h3.5V14.5h2.3l.7-3.5h-3V9c0-.3.2-.5.5-.5z" /></svg></a>
            <a href="<?php echo esc_url( get_theme_mod( 'social_tiktok', 'https://tiktok.com' ) ); ?>" target="_blank" rel="noopener" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M16.5 2c.4 2.2 1.9 3.8 4 4.2v3c-1.5 0-2.9-.5-4-1.3v6.6c0 3.6-2.9 6.5-6.5 6.5S3.5 17.5 3.5 13.9 6.4 7.4 10 7.4c.4 0 .8 0 1.2.1v3.2c-.4-.1-.8-.2-1.2-.2-1.8 0-3.3 1.5-3.3 3.3s1.5 3.3 3.3 3.3 3.4-1.4 3.4-3.2V2h3.1z" /></svg></a>
            <a href="<?php echo esc_url( get_theme_mod( 'social_pinterest', 'https://pinterest.com' ) ); ?>" target="_blank" rel="noopener" aria-label="Pinterest"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M12 2C6.5 2 2 6.5 2 12c0 4.2 2.6 7.8 6.3 9.3-.1-.8-.2-2 0-2.9l1.4-6s-.4-.7-.4-1.8c0-1.7 1-3 2.2-3 1 0 1.5.8 1.5 1.7 0 1-.7 2.6-1 4-.3 1.2.6 2.2 1.8 2.2 2.1 0 3.7-2.2 3.7-5.4 0-2.8-2-4.8-4.9-4.8-3.3 0-5.3 2.5-5.3 5.1 0 1 .4 2.1.9 2.7.1.1.1.2.1.3l-.4 1.5c0 .2-.2.2-.3.1-1.2-.5-1.9-2.2-1.9-3.5 0-2.9 2.1-5.6 6.1-5.6 3.2 0 5.7 2.3 5.7 5.3 0 3.2-2 5.7-4.8 5.7-.9 0-1.8-.5-2.1-1.1l-.6 2.2c-.2.8-.8 1.9-1.2 2.5.9.3 1.9.4 2.9.4 5.5 0 10-4.5 10-10S17.5 2 12 2z" /></svg></a>
            <a href="<?php echo esc_url( get_theme_mod( 'social_youtube', 'https://youtube.com' ) ); ?>" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M22 12s0-3.2-.4-4.7c-.2-.9-.9-1.6-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.5c-.9.2-1.6.9-1.8 1.8C2 8.8 2 12 2 12s0 3.2.4 4.7c.2.9.9 1.6 1.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.5c.9-.2 1.6-.9 1.8-1.8.4-1.5.4-4.7.4-4.7zM10 15V9l5.2 3-5.2 3z" /></svg></a>
          </div>
        </div>

        <div class="site-footer__cols">
          <div>
            <h2 class="site-footer__heading">QUICK LINKS</h2>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'footer_quick_links',
                'container'      => false,
                'items_wrap'     => '<ul>%3$s</ul>',
                'fallback_cb'    => 'peddlers30a_footer_quick_links_fallback',
              )
            );
            ?>
          </div>
          <div>
            <h2 class="site-footer__heading">SUPPORT</h2>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'footer_support',
                'container'      => false,
                'items_wrap'     => '<ul>%3$s</ul>',
                'fallback_cb'    => 'peddlers30a_footer_support_fallback',
              )
            );
            ?>
          </div>
        </div>
      </div>

      <div class="site-footer__base">
        <p class="site-footer__copy"><?php echo esc_html( get_theme_mod( 'copyright_text', '© 2026 Peddlers 30A. All rights reserved.' ) ); ?></p>
        <p class="site-footer__tag"><?php echo esc_html( get_theme_mod( 'footer_tag', 'Ride More. Explore 30A.' ) ); ?></p>
      </div>
    </div>
    <div class="site-footer__rule"></div>
  </footer>

  <?php wp_footer(); ?>
</body>

</html>
