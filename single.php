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

    <!-- ==================================================================
           02 — Title
           ================================================================== -->
    <section class="section article-header">
      <div class="container">
        <?php
        $peddlers30a_cats = get_the_category();
        if ( ! empty( $peddlers30a_cats ) ) :
        ?>
        <p class="eyebrow"><?php echo esc_html( $peddlers30a_cats[0]->name ); ?></p>
        <?php endif; ?>
        <h1 class="article__title-page"><?php the_title(); ?></h1>
      </div>
    </section>

    <p class="article__meta">
      <span>By <?php the_author(); ?></span>
      <span><?php echo esc_html( get_the_date() ); ?></span>
      <span>Back to <a href="<?php echo esc_url( peddlers30a_nav_url( 'blog' ) ); ?>">Blog</a></span>
    </p>

    <!-- ==================================================================
           03 — Article
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
            <!-- Featured image (full, uncropped) -->
            <figure class="article__featured-image">
              <img src="<?php echo esc_url( $peddlers30a_hero_img ); ?>" alt="<?php the_title_attribute(); ?>" />
            </figure>

            <?php echo $peddlers30a_content; ?>
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
