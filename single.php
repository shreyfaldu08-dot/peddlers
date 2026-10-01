<?php
/**
 * Single blog post template -- reuses the rentals/locations hero pattern
 * plus a 3-column layout (table of contents / article body / CTA+form)
 * built from the .article__* components in blog.css. Any post created in
 * wp-admin > Posts renders through this file automatically; the table of
 * contents is generated from whatever <h2> headings that post's content
 * happens to contain, so it works for any future article without edits
 * here.
 */

get_header();

while ( have_posts() ) :
	the_post();

	$peddlers30a_hero_img = has_post_thumbnail()
		? get_the_post_thumbnail_url( get_the_ID(), 'full' )
		: get_template_directory_uri() . '/assets/img/Cycling-in-Seaside.png';

	$peddlers30a_toc = array();
	$peddlers30a_content = preg_replace_callback(
		'/<h2([^>]*)>(.*?)<\/h2>/is',
		function ( $matches ) use ( &$peddlers30a_toc ) {
			$text = trim( wp_strip_all_tags( $matches[2] ) );
			$slug = sanitize_title( $text );
			$peddlers30a_toc[] = array(
				'id'   => $slug,
				'text' => $text,
			);
			return '<h2' . $matches[1] . ' id="' . esc_attr( $slug ) . '">' . $matches[2] . '</h2>';
		},
		apply_filters( 'the_content', get_the_content() )
	);
	?>

    <p class="article__meta">
      <span>By <?php the_author(); ?></span>
      <span><?php echo esc_html( get_the_date() ); ?></span>
      <span>Back to <a href="<?php echo esc_url( peddlers30a_nav_url( 'blog' ) ); ?>">Blog</a></span>
    </p>

    <!-- ==================================================================
           02 — Article
           ================================================================== -->
    <section class="section article">
      <div class="container">
        <div class="article-layout">
          <?php if ( ! empty( $peddlers30a_toc ) ) : ?>
          <aside class="article-toc">
            <p class="article-toc__title">Table of contents</p>
            <ol class="article-toc__list">
              <?php foreach ( $peddlers30a_toc as $peddlers30a_item ) : ?>
              <li><a href="#<?php echo esc_attr( $peddlers30a_item['id'] ); ?>"><?php echo esc_html( $peddlers30a_item['text'] ); ?></a></li>
              <?php endforeach; ?>
            </ol>
          </aside>
          <?php endif; ?>

          <div class="article-main">
            <?php
            $peddlers30a_cats = get_the_category();
            if ( ! empty( $peddlers30a_cats ) ) :
            ?>
            <p class="eyebrow"><?php echo esc_html( $peddlers30a_cats[0]->name ); ?></p>
            <?php endif; ?>
            <h1 class="article__title-page"><?php the_title(); ?></h1>

            <!-- Featured image (full, uncropped) -->
            <figure class="article__featured-image">
              <img src="<?php echo esc_url( $peddlers30a_hero_img ); ?>" alt="<?php the_title_attribute(); ?>" />
            </figure>

            <?php echo $peddlers30a_content; ?>

            <div class="author-box">
              <div class="author-box__avatar" aria-hidden="true">P30A</div>
              <div class="author-box__content">
                <p class="author-box__name">Peddlers 30A Team</p>
                <p class="author-box__role">Local Bike &amp; Beach Gear Rentals</p>
                <p class="author-box__bio">
                  Peddlers 30A has been renting bikes, trailers, and beach gear along Scenic Highway 30A since 2011.
                  Our team rides this stretch of coast every day and shares the same local know-how with every guest
                  who rents from us.
                </p>
                <div class="author-box__social">
                  <a href="<?php echo esc_url( get_theme_mod( 'social_instagram', 'https://instagram.com' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" /><circle cx="12" cy="12" r="4.5" /><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none" /></svg></a>
                  <a href="<?php echo esc_url( get_theme_mod( 'social_facebook', 'https://facebook.com' ) ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M15 8.5h2.5V5h-2.5c-2.2 0-4 1.8-4 4v2H9v3.5h2v6.5h3.5V14.5h2.3l.7-3.5h-3V9c0-.3.2-.5.5-.5z" /></svg></a>
                  <a href="<?php echo esc_url( get_theme_mod( 'social_tiktok', 'https://tiktok.com' ) ); ?>" target="_blank" rel="noopener" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M16.5 2c.4 2.2 1.9 3.8 4 4.2v3c-1.5 0-2.9-.5-4-1.3v6.6c0 3.6-2.9 6.5-6.5 6.5S3.5 17.5 3.5 13.9 6.4 7.4 10 7.4c.4 0 .8 0 1.2.1v3.2c-.4-.1-.8-.2-1.2-.2-1.8 0-3.3 1.5-3.3 3.3s1.5 3.3 3.3 3.3 3.4-1.4 3.4-3.2V2h3.1z" /></svg></a>
                  <a href="<?php echo esc_url( get_theme_mod( 'social_youtube', 'https://youtube.com' ) ); ?>" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor" stroke="none" aria-hidden="true"><path d="M22 12s0-3.2-.4-4.7c-.2-.9-.9-1.6-1.8-1.8C18.2 5 12 5 12 5s-6.2 0-7.8.5c-.9.2-1.6.9-1.8 1.8C2 8.8 2 12 2 12s0 3.2.4 4.7c.2.9.9 1.6 1.8 1.8C5.8 19 12 19 12 19s6.2 0 7.8-.5c.9-.2 1.6-.9 1.8-1.8.4-1.5.4-4.7.4-4.7zM10 15V9l5.2 3-5.2 3z" /></svg></a>
                </div>
              </div>
            </div>
          </div>

          <aside class="article-sidebar">
            <div class="article-sidebar__cta">
              <h3>Ready to Ride <em>30A</em>?</h3>
              <a class="btn btn--sand" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">RESERVE NOW</a>
            </div>
            <div class="article-sidebar__form">
              <h3>Have a Question?</h3>
              <form class="inquiry-form" onsubmit="event.preventDefault(); alert('Thank you! Your inquiry has been sent.');">
                <div class="inquiry-form__field">
                  <input type="text" placeholder="FULL NAME" required />
                </div>
                <div class="inquiry-form__field">
                  <input type="email" placeholder="EMAIL ADDRESS" required />
                </div>
                <div class="inquiry-form__field">
                  <textarea placeholder="YOUR QUESTION"></textarea>
                </div>
                <button class="inquiry-form__submit" type="submit">SEND MESSAGE</button>
              </form>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- ==================================================================
           05 — Booking CTA
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

<?php
endwhile;
get_footer();
