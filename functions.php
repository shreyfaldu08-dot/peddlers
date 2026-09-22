<?php
/**
 * Peddlers 30A theme setup.
 * Ports the static site's exact stylesheet/script stack, in the same order,
 * so the rendered output matches the original HTML build pixel for pixel.
 */

function peddlers30a_assets() {
	global $post;
	$dir = get_template_directory_uri();

	// services.html predates the approved 7-page spec and was never wired
	// into mobile.css — it ships its own standalone stylesheet instead.
	$is_services = $post && 'services' === $post->post_name;

	wp_enqueue_style( 'peddlers30a-tokens', $dir . '/assets/css/tokens.css', array(), '72' );
	wp_enqueue_style( 'peddlers30a-fonts', $dir . '/assets/css/fonts.css', array(), $is_services ? '62' : '70' );
	wp_enqueue_style( 'peddlers30a-base', $dir . '/assets/css/base.css', array( 'peddlers30a-tokens' ), $is_services ? '62' : '71' );
	wp_enqueue_style( 'peddlers30a-components', $dir . '/assets/css/components.css', array( 'peddlers30a-base' ), $is_services ? '62' : '71' );
	wp_enqueue_style( 'peddlers30a-sections', $dir . '/assets/css/sections.css', array( 'peddlers30a-components' ), '188' );

	if ( $is_services ) {
		wp_enqueue_style( 'peddlers30a-services', $dir . '/assets/css/services.css', array( 'peddlers30a-sections' ), '62' );
	} else {
		wp_enqueue_style( 'peddlers30a-mobile', $dir . '/assets/css/mobile.css', array( 'peddlers30a-sections' ), '47' );
	}

	wp_enqueue_script( 'peddlers30a-main', $dir . '/assets/js/main.js', array(), '71', true );
}
add_action( 'wp_enqueue_scripts', 'peddlers30a_assets' );

function peddlers30a_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'            => 'Primary Navigation (header)',
			'footer_quick_links' => 'Footer — Quick Links',
			'footer_areas'       => 'Footer — Areas We Cover',
			'footer_support'     => 'Footer — Support',
		)
	);
}
add_action( 'after_setup_theme', 'peddlers30a_setup' );

/**
 * The header nav in the static build is a flat row of <a class="site-nav__link">
 * with no <ul>/<li> wrapper (.site-nav uses display:flex directly on the links).
 * wp_nav_menu()'s default walker always wraps items in <li>, which would change
 * that markup, so this walker reproduces the exact original output instead.
 */
class Peddlers30a_Primary_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$active      = in_array( 'current-menu-item', $item->classes, true ) || in_array( 'current_page_item', $item->classes, true );
		$is_location = ( 'post_type' === $item->type ) && ( 'location' === get_post_field( 'post_name', $item->object_id ) );

		if ( $is_location ) {
			$output .= '<div class="site-nav__item site-nav__item--dropdown">';
		}

		$output .= sprintf(
			'<a class="site-nav__link%s" href="%s">%s</a>',
			$active ? ' is-active' : '',
			esc_url( $item->url ),
			esc_html( $item->title )
		);

		if ( $is_location ) {
			$output .= peddlers30a_location_dropdown_menu();
			$output .= '</div>';
		}
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

/**
 * Dropdown under the header's "LOCATION" link — reuses the same "Footer
 * Areas" menu shown in the footer's "Areas We Cover" column, so an admin
 * only maintains one list of neighborhood links for both places.
 */
function peddlers30a_location_dropdown_menu() {
	$html = wp_nav_menu(
		array(
			'theme_location' => 'footer_areas',
			'container'      => false,
			'items_wrap'     => '<div class="site-nav__dropdown"><ul>%3$s</ul></div>',
			'fallback_cb'    => 'peddlers30a_footer_areas_fallback_wrapped',
			'echo'           => false,
		)
	);
	return $html ? $html : '';
}

/**
 * Same as peddlers30a_footer_areas_fallback() but captured as a string
 * inside the <div class="site-nav__dropdown"><ul>...</ul></div> wrapper,
 * to match what wp_nav_menu() would output for a real menu.
 */
function peddlers30a_footer_areas_fallback_wrapped() {
	echo '<div class="site-nav__dropdown">';
	peddlers30a_footer_areas_fallback();
	echo '</div>';
}

/**
 * Site logo — pulls from Appearance > Customize > Site Identity when an
 * admin has set one, otherwise falls back to the theme's bundled logo so
 * the header never renders empty.
 */
function peddlers30a_logo_url() {
	$logo_id = get_theme_mod( 'custom_logo' );
	if ( $logo_id ) {
		$src = wp_get_attachment_image_src( $logo_id, 'full' );
		if ( $src ) {
			return $src[0];
		}
	}
	return get_template_directory_uri() . '/assets/img/logo-peddlers-30a.png';
}

/**
 * Header/footer contact info, social links and footer copy — all editable
 * under Appearance > Customize > Header & Footer Info. Defaults match the
 * original static build exactly, so nothing changes until an admin edits it.
 */
function peddlers30a_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'peddlers30a_site_info',
		array(
			'title'    => 'Header & Footer Info',
			'priority' => 30,
		)
	);

	$fields = array(
		'phone_number'      => array( 'default' => '(850) 213-0040', 'label' => 'Phone number (displayed)' ),
		'phone_number_link' => array( 'default' => '+18502130040', 'label' => 'Phone number (tel: link, digits only)' ),
		'email_address'     => array( 'default' => 'hello@peddlers30a.com', 'label' => 'Email address' ),
		'address_line1'     => array( 'default' => '10343 E County Hwy 30A,', 'label' => 'Address — line 1' ),
		'address_line2'     => array( 'default' => 'Inlet Beach, FL 32461', 'label' => 'Address — line 2' ),
		'footer_tagline'    => array( 'default' => 'Explore. Rent. Enjoy.', 'label' => 'Footer tagline' ),
		'footer_blurb'      => array( 'default' => "Your go-to for bike rentals, beach gear and local experiences along Florida's iconic 30A.", 'label' => 'Footer blurb', 'type' => 'textarea' ),
		'copyright_text'    => array( 'default' => '© 2026 Peddlers 30A. All rights reserved.', 'label' => 'Copyright line' ),
		'footer_tag'        => array( 'default' => 'Ride More. Explore 30A.', 'label' => 'Footer tag line' ),
		'social_instagram'  => array( 'default' => 'https://instagram.com', 'label' => 'Instagram URL' ),
		'social_facebook'   => array( 'default' => 'https://facebook.com', 'label' => 'Facebook URL' ),
		'social_tiktok'     => array( 'default' => 'https://tiktok.com', 'label' => 'TikTok URL' ),
		'social_pinterest'  => array( 'default' => 'https://pinterest.com', 'label' => 'Pinterest URL' ),
		'social_youtube'    => array( 'default' => 'https://youtube.com', 'label' => 'YouTube URL' ),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'label'   => $field['label'],
				'section' => 'peddlers30a_site_info',
				'type'    => isset( $field['type'] ) ? $field['type'] : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'peddlers30a_customize_register' );

/**
 * Shown only if no menu has been assigned to the "Primary Navigation"
 * location yet (Appearance > Menus) — reproduces the original 7 links so
 * the header is never empty out of the box.
 */
function peddlers30a_primary_menu_fallback() {
	$links = array(
		'index'    => 'HOME',
		'rentals'  => 'RENTALS',
		'category' => 'PRODUCTS',
		'location' => 'LOCATION',
		'about'    => 'ABOUT',
		'faq'      => 'FAQ',
		'contact'  => 'CONTACT',
	);
	foreach ( $links as $slug => $label ) {
		printf(
			'<a class="site-nav__link%s" href="%s">%s</a>',
			peddlers30a_nav_active( $slug ),
			esc_url( peddlers30a_nav_url( $slug ) ),
			esc_html( $label )
		);
	}
}

/**
 * Fallbacks for the three footer link columns — shown only until an admin
 * assigns a real menu to each location under Appearance > Menus.
 */
function peddlers30a_simple_link_list( $links ) {
	echo '<ul>';
	foreach ( $links as $label => $target ) {
		$url = ( '#' === $target ) ? '#' : esc_url( peddlers30a_nav_url( $target ) );
		printf( '<li><a href="%s">%s</a></li>', $url, esc_html( $label ) );
	}
	echo '</ul>';
}

function peddlers30a_footer_quick_links_fallback() {
	peddlers30a_simple_link_list(
		array(
			'Home'         => 'index',
			'Bike Rentals' => 'rentals',
			'About Us'     => 'about',
			'FAQ'          => 'faq',
			'Contact Us'   => 'contact',
		)
	);
}

function peddlers30a_footer_areas_fallback() {
	peddlers30a_simple_link_list(
		array(
			'Seacrest Beach' => 'location',
			'Rosemary Beach' => 'bike-rentals-rosemary-beach',
			'Alys Beach'     => 'bike-rentals-alys-beach',
			'Seaside'        => 'bike-rentals-seaside',
			'WaterColor'     => 'bike-rentals-watercolor',
			'Inlet Beach'    => 'location',
			'Grayton Beach'  => 'bike-rentals-grayton-beach',
		)
	);
}

function peddlers30a_footer_support_fallback() {
	peddlers30a_simple_link_list(
		array(
			'Terms of Service' => 'terms-of-service',
			'Privacy Policy'   => 'privacy-policy',
			'Accessibility'    => '#',
			'Blog'              => '#',
		)
	);
}

// This is a hand-built static-to-theme port with no post-content rendering,
// so strip the default frontend cruft that has nothing to attach to.
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * The static build's nav links point at "index.html", "rentals.html", etc.
 * Map each to the matching WordPress page/front page URL.
 */
function peddlers30a_nav_url( $slug ) {
	if ( 'index' === $slug ) {
		return home_url( '/' );
	}
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
}

/**
 * "is-active" class helper for the primary nav — mirrors the static
 * build's single active-link marker per page.
 */
function peddlers30a_nav_active( $slug ) {
	global $post;
	if ( 'index' === $slug ) {
		return is_front_page() ? ' is-active' : '';
	}
	return ( $post && $post->post_name === $slug ) ? ' is-active' : '';
}

/**
 * The static build keys a lot of CSS off an exact "page-{name}" class on
 * <body> (.page-home, .page-about, .page-rentals, ...). WordPress's own
 * body_class() doesn't produce that naming, so add it explicitly instead
 * of relying on template-detection heuristics that could drift. A couple
 * of pages don't follow the simple "page-{slug}" pattern in the original
 * static build (privacy-policy and terms-of-service both share the
 * "page-legal" class; services.html has no page class at all), so those
 * are mapped explicitly rather than derived.
 */
function peddlers30a_page_slug_class() {
	global $post;

	if ( is_front_page() ) {
		return 'page-home';
	}

	if ( ! $post ) {
		return '';
	}

	$overrides = array(
		'privacy-policy'    => 'page-legal',
		'terms-of-service'  => 'page-legal',
		'services'          => '',
	);

	if ( array_key_exists( $post->post_name, $overrides ) ) {
		return $overrides[ $post->post_name ];
	}

	return 'page-' . $post->post_name;
}

/**
 * Keep <title> identical to the static build's hand-written titles
 * (no " – Site Name" suffix, which the static pages never had).
 */
add_filter( 'document_title_separator', function() { return ''; } );
add_filter( 'document_title_parts', function( $parts ) {
	return array( 'title' => $parts['title'] );
} );
add_filter( 'pre_get_document_title', function( $title ) {
	if ( is_front_page() ) {
		return 'Peddlers 30A — Ride. Relax. Repeat.';
	}
	return $title;
} );

/**
 * Meta descriptions, ported verbatim from each static page's <head>.
 * WordPress has no built-in meta-description output, so print these
 * directly rather than relying on an SEO plugin that isn't part of
 * this build.
 */
function peddlers30a_meta_description() {
	global $post;

	$descriptions = array(
		'home'              => "Explore the largest bike rental destination on 30A while enjoying great food, shopping, live music and unforgettable family moments.",
		'about'             => "Learn the story behind Peddlers 30A, a bike rental and pavilion in Seacrest Beach built around the Timpoochee Trail and the 30A lifestyle.",
		'rentals'           => "Largest bike rental fleet on 30A. Helmet and lock included. Delivery to every community. Walk-ins welcome in Seacrest Beach, FL. Call 850-213-0040.",
		'category'          => "Whether you're planning a sunrise ride through Seacrest or a sunset journey to Alys Beach, our team is here to curate your perfect coastal transit.",
		'location'          => "Peddlers 30A is Seacrest Beach's go-to bike rental. 4.9 stars, 50+ bikes, helmet and lock included with every rental. Walk in or call 850-213-0040 today.",
		'contact'           => "Reach Peddlers Pavilion in Seacrest Beach by phone, email, or inquiry form. Bike rentals along Scenic Highway 30A. Call 850-213-0040 or ask us anything online.",
		'faq'               => "Everything you need to know before renting a bike on 30A. Booking, pricing, kids options, delivery, trail distances, and hours. Answered by Peddlers Pavilion.",
		'privacy-policy'    => "Read the Peddlers 30A privacy policy. Learn how we collect, use, and protect your personal information when you rent bikes or contact us on 30A.",
		'terms-of-service'  => "Read the Peddlers 30A terms of service. Covers website use, bike rental terms, booking and cancellation policy, liability, and Florida governing law.",
		'services'          => "From cruising scenic beach roads to grabbing a bite, discovering local finds, and settling in for live music, Peddlers brings the best parts of a 30A day together in one easygoing destination.",
		'product-detail'    => "More than a rental shop — it's the hub of the 30A community. Start with craft espresso, browse curated boutiques, and enjoy live music under the coastal oaks.",
	);

	$key = is_front_page() ? 'home' : ( $post ? $post->post_name : '' );
	if ( isset( $descriptions[ $key ] ) ) {
		echo '  <meta name="description" content="' . esc_attr( $descriptions[ $key ] ) . '" />' . "\n";
	}
}
add_action( 'wp_head', 'peddlers30a_meta_description', 1 );

/**
 * One-time setup, run automatically the first time this theme is active
 * on a site: creates the 10 non-front-page WordPress Pages (with matching
 * template assignments) and the 4 nav menus this theme expects, then
 * flips on pretty permalinks. This lets the theme be deployed to a brand
 * new WordPress install (e.g. via WP Pusher / git push) with zero manual
 * wp-admin clicking — it mirrors exactly what was set up by hand during
 * development. Safe to run more than once: every step checks for an
 * existing page/menu by name before creating one.
 */
function peddlers30a_provision() {
	if ( get_option( 'peddlers30a_provisioned' ) ) {
		return;
	}

	// WordPress creates these on every fresh install; they're not part of
	// this site, and "privacy-policy" would otherwise collide with our
	// own page of the same slug below.
	$sample_page = get_page_by_path( 'sample-page' );
	if ( $sample_page ) {
		wp_delete_post( $sample_page->ID, true );
	}

	$pages = array(
		'about'             => array( 'title' => 'About Peddlers 30A | Rental & Pavilion, Seacrest Beach', 'template' => 'page-about.php' ),
		'rentals'           => array( 'title' => '30A Bike Rentals at Peddlers Pavilion, Seacrest Beach', 'template' => 'page-rentals.php' ),
		'category'          => array( 'title' => 'Discover Our Products — Peddlers 30A', 'template' => 'page-category.php' ),
		'location'          => array( 'title' => 'Best Bike Rental in Seacrest Beach | Peddlers 30A', 'template' => 'page-location.php' ),
		'contact'           => array( 'title' => 'Contact Peddlers 30A | Seacrest Beach Bike Rental', 'template' => 'page-contact.php' ),
		'faq'               => array( 'title' => 'Peddlers 30A FAQ | Bike Rentals, Pricing & Trail Info', 'template' => 'page-faq.php' ),
		'privacy-policy'    => array( 'title' => 'Privacy Policy | Peddlers 30A Bike Rentals', 'template' => 'page-privacy-policy.php' ),
		'terms-of-service'  => array( 'title' => 'Terms of Service | Peddlers 30A Bike Rentals', 'template' => 'page-terms-of-service.php' ),
		'services'          => array( 'title' => 'Services (Legacy) — Peddlers 30A', 'template' => 'page-services.php' ),
		'product-detail'    => array( 'title' => 'Electric Explorer — Peddlers 30A', 'template' => 'page-product-detail.php' ),
	);

	// One page per neighborhood "Bike Rental" SEO lander, all sharing the
	// same template -- content lives in inc/location-data.php so adding a
	// new location later never needs a new page-*.php file.
	require_once get_template_directory() . '/inc/location-data.php';
	foreach ( peddlers30a_location_data() as $loc_slug => $loc_data ) {
		$pages[ $loc_slug ] = array(
			'title'    => $loc_data['title'],
			'template' => 'template-bike-rental-location.php',
		);
	}

	$page_ids = array();
	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			// WordPress's own default install already has a page at this
			// slug (privacy-policy) — bring it in line with our content
			// rather than leaving its auto-generated title/template in place.
			wp_update_post( array( 'ID' => $existing->ID, 'post_title' => $data['title'], 'post_status' => 'publish' ) );
			update_post_meta( $existing->ID, '_wp_page_template', $data['template'] );
			$page_ids[ $slug ] = $existing->ID;
			continue;
		}
		$id = wp_insert_post(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish',
				'post_title'  => $data['title'],
				'post_name'   => $slug,
			)
		);
		if ( ! is_wp_error( $id ) && $id ) {
			update_post_meta( $id, '_wp_page_template', $data['template'] );
			$page_ids[ $slug ] = $id;
		}
	}

	// Pretty permalinks — every peddlers30a_nav_url() lookup and every
	// page-{slug}.php template match depends on /%postname%/ URLs.
	global $wp_rewrite;
	update_option( 'permalink_structure', '/%postname%/' );
	if ( $wp_rewrite instanceof WP_Rewrite ) {
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();
	}

	$menu_url = function ( $slug ) use ( $page_ids ) {
		if ( 'index' === $slug ) {
			return home_url( '/' );
		}
		return isset( $page_ids[ $slug ] ) ? get_permalink( $page_ids[ $slug ] ) : home_url( '/' );
	};

	$create_menu = function ( $name, $location, $items ) use ( $page_ids ) {
		$existing = wp_get_nav_menu_object( $name );
		$menu_id  = $existing ? $existing->term_id : wp_create_nav_menu( $name );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
		if ( ! $existing ) {
			foreach ( $items as $item ) {
				if ( '#' === $item['target'] ) {
					wp_update_nav_menu_item(
						$menu_id,
						0,
						array(
							'menu-item-title'  => $item['title'],
							'menu-item-url'    => '#',
							'menu-item-status' => 'publish',
						)
					);
				} elseif ( 'index' === $item['target'] ) {
					wp_update_nav_menu_item(
						$menu_id,
						0,
						array(
							'menu-item-title'  => $item['title'],
							'menu-item-url'    => home_url( '/' ),
							'menu-item-status' => 'publish',
						)
					);
				} elseif ( isset( $page_ids[ $item['target'] ] ) ) {
					wp_update_nav_menu_item(
						$menu_id,
						0,
						array(
							'menu-item-title'     => $item['title'],
							'menu-item-object-id' => $page_ids[ $item['target'] ],
							'menu-item-object'    => 'page',
							'menu-item-type'      => 'post_type',
							'menu-item-status'    => 'publish',
						)
					);
				}
			}
		}
		$locations              = get_theme_mod( 'nav_menu_locations' );
		$locations[ $location ] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	};

	$create_menu(
		'Primary Menu',
		'primary',
		array(
			array( 'title' => 'HOME', 'target' => 'index' ),
			array( 'title' => 'RENTALS', 'target' => 'rentals' ),
			array( 'title' => 'PRODUCTS', 'target' => 'category' ),
			array( 'title' => 'LOCATION', 'target' => 'location' ),
			array( 'title' => 'ABOUT', 'target' => 'about' ),
			array( 'title' => 'FAQ', 'target' => 'faq' ),
			array( 'title' => 'CONTACT', 'target' => 'contact' ),
		)
	);

	$create_menu(
		'Footer Quick Links',
		'footer_quick_links',
		array(
			array( 'title' => 'Home', 'target' => 'index' ),
			array( 'title' => 'Bike Rentals', 'target' => 'rentals' ),
			array( 'title' => 'About Us', 'target' => 'about' ),
			array( 'title' => 'FAQ', 'target' => 'faq' ),
			array( 'title' => 'Contact Us', 'target' => 'contact' ),
		)
	);

	$create_menu(
		'Footer Areas',
		'footer_areas',
		array(
			array( 'title' => 'Seacrest Beach', 'target' => 'location' ),
			array( 'title' => 'Rosemary Beach', 'target' => 'bike-rentals-rosemary-beach' ),
			array( 'title' => 'Alys Beach', 'target' => 'bike-rentals-alys-beach' ),
			array( 'title' => 'Seaside', 'target' => 'bike-rentals-seaside' ),
			array( 'title' => 'WaterColor', 'target' => 'bike-rentals-watercolor' ),
			// Inlet Beach doesn't have its own bike-rentals page yet -- points
			// at the general Location page until that content is provided.
			array( 'title' => 'Inlet Beach', 'target' => 'location' ),
			array( 'title' => 'Grayton Beach', 'target' => 'bike-rentals-grayton-beach' ),
		)
	);

	$create_menu(
		'Footer Support',
		'footer_support',
		array(
			array( 'title' => 'Terms of Service', 'target' => 'terms-of-service' ),
			array( 'title' => 'Privacy Policy', 'target' => 'privacy-policy' ),
			array( 'title' => 'Accessibility', 'target' => '#' ),
			array( 'title' => 'Blog', 'target' => '#' ),
		)
	);

	update_option( 'peddlers30a_provisioned', 1 );
}
add_action( 'init', 'peddlers30a_provision', 20 );
