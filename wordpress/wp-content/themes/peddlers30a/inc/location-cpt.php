<?php
/**
 * "Location" custom post type -- turns every neighborhood "Bike Rental" SEO
 * lander (Rosemary Beach, Seaside, WaterColor, ...) into an admin-manageable
 * post instead of a hardcoded PHP array. Adding a new neighborhood is just
 * Locations > Add New in wp-admin; editing copy is the same screen. The
 * front end (single-location.php) reads everything from the '_loc_data'
 * post meta this file saves.
 */

function peddlers30a_register_location_cpt() {
	register_post_type(
		'location',
		array(
			'labels'       => array(
				'name'               => 'Locations',
				'singular_name'      => 'Location',
				'add_new_item'       => 'Add New Location',
				'edit_item'          => 'Edit Location',
				'all_items'          => 'All Locations',
				'search_items'       => 'Search Locations',
				'not_found'          => 'No locations found',
				'menu_name'          => 'Locations',
			),
			'public'       => true,
			'show_ui'      => true,
			'show_in_menu' => true,
			'menu_icon'    => 'dashicons-location-alt',
			'supports'     => array( 'title' ),
			'has_archive'  => false,
			'query_var'    => true,
			// WordPress falls back to the post type's own name as the slug
			// prefix when 'slug' is empty, so a flat URL (no "/location/"
			// prefix) needs its own rewrite rule instead -- see
			// peddlers30a_location_rewrite_rules() below.
			'rewrite'      => false,
		)
	);
}
add_action( 'init', 'peddlers30a_register_location_cpt' );

/**
 * Flat, prefix-less URLs for Location posts (/bike-rentals-seaside/, not
 * /location/bike-rentals-seaside/) -- matches the SEO URL pattern these
 * pages were built with. Scoped to actual Location post slugs (rather than
 * a wildcard) so it can never shadow a real Page's URL.
 */
function peddlers30a_location_rewrite_rules() {
	$location_ids = get_posts(
		array(
			'post_type'      => 'location',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'fields'         => 'ids',
		)
	);
	if ( empty( $location_ids ) ) {
		return;
	}
	$slugs   = array_map( function ( $id ) {
		return get_post_field( 'post_name', $id );
	}, $location_ids );
	$pattern = implode( '|', array_map( 'preg_quote', $slugs ) );
	add_rewrite_rule( '^(' . $pattern . ')/?$', 'index.php?location=$matches[1]', 'top' );
}
add_action( 'init', 'peddlers30a_location_rewrite_rules', 15 );

function peddlers30a_location_permalink( $link, $post ) {
	if ( 'location' === $post->post_type ) {
		return home_url( '/' . $post->post_name . '/' );
	}
	return $link;
}
add_filter( 'post_type_link', 'peddlers30a_location_permalink', 10, 2 );

/**
 * All published Location posts, alphabetical -- used to build the footer
 * "Areas We Cover" list and the header LOCATION dropdown dynamically, so a
 * newly added location shows up in both automatically.
 */
function peddlers30a_get_locations() {
	return get_posts(
		array(
			'post_type'      => 'location',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
			'post_status'    => 'publish',
		)
	);
}

/**
 * The full content record for one location, as saved by the meta box below.
 * Always returns an array (possibly with missing keys) so templates can use
 * isset()/empty() checks without extra null handling.
 */
function peddlers30a_get_location_data( $post_id ) {
	$data = get_post_meta( $post_id, '_loc_data', true );
	return is_array( $data ) ? $data : array();
}

/**
 * Schema driving both the admin edit screen and the save handler -- add a
 * field here and it's editable in wp-admin with no other code changes.
 */
function peddlers30a_location_schema() {
	return array(
		'scalars'   => array(
			'title'              => array( 'label' => 'SEO <title> Tag', 'type' => 'text' ),
			'description'        => array( 'label' => 'Meta Description', 'type' => 'textarea' ),
			'h1'                 => array( 'label' => 'Hero H1', 'type' => 'text' ),
			'direct_answer'      => array( 'label' => 'Hero Subtext (Direct Answer)', 'type' => 'textarea' ),
			'hero_lead'          => array( 'label' => 'Rental Section Subtitle', 'type' => 'textarea' ),
			'rent_eyebrow'       => array( 'label' => 'Rent Section Eyebrow', 'type' => 'text' ),
			'rent_title'         => array( 'label' => 'Rent Section Title', 'type' => 'text' ),
			'local_eyebrow'      => array( 'label' => 'Local Intro Eyebrow', 'type' => 'text' ),
			'local_title'        => array( 'label' => 'Local Intro Title', 'type' => 'text' ),
			'local_p1'           => array( 'label' => 'Local Intro Paragraph 1', 'type' => 'textarea' ),
			'local_p2'           => array( 'label' => 'Local Intro Paragraph 2', 'type' => 'textarea' ),
			'journey_title'      => array( 'label' => 'Journey Card Title', 'type' => 'text' ),
			'journey_lead'       => array( 'label' => 'Journey Card Lead', 'type' => 'textarea' ),
			'journey_to'         => array( 'label' => 'Neighborhood Name (used as "To" + page title)', 'type' => 'text' ),
			'callout'            => array( 'label' => 'Callout Line (distance/address blurb)', 'type' => 'textarea' ),
			'pavilion_eyebrow'   => array( 'label' => 'Pavilion Eyebrow', 'type' => 'text' ),
			'pavilion_title'     => array( 'label' => 'Pavilion Title', 'type' => 'text' ),
			'pavilion_lead'      => array( 'label' => 'Pavilion Lead', 'type' => 'textarea' ),
			'why_eyebrow'        => array( 'label' => 'Why-Rent Eyebrow', 'type' => 'text' ),
			'why_title'          => array( 'label' => 'Why-Rent Title', 'type' => 'text' ),
			'closing_title'      => array( 'label' => 'Closing CTA Title', 'type' => 'text' ),
			'beaches_heading'    => array( 'label' => 'Beaches Section Heading Place (optional -- defaults to the Journey "To" name if left blank)', 'type' => 'text' ),
			'beaches_lead'       => array( 'label' => 'Nearby Beaches Section Lead', 'type' => 'textarea' ),
			'testimonials_title' => array( 'label' => 'Testimonials Title', 'type' => 'text' ),
			'faq_title'          => array( 'label' => 'FAQ Section Title', 'type' => 'text' ),
		),
		'repeaters' => array(
			'trust_bar'  => array(
				'label'  => 'Trust Bar (5 pills shown under the hero)',
				'fields' => array(
					'heading' => 'Heading',
					'sub'     => 'Sub-label',
				),
			),
			'stats'      => array(
				'label'  => 'Journey Stats (4 numbers on the route card)',
				'fields' => array(
					'value' => 'Value',
					'label' => 'Label',
				),
			),
			'categories' => array(
				'label'  => 'Bike Categories (4 cards)',
				'fields' => array(
					'num'   => 'Number (e.g. 01)',
					'label' => 'Label',
					'title' => 'Title',
					'copy'  => 'Copy',
				),
			),
			'why_cards'  => array(
				'label'  => 'Why-Rent Cards (4 cards)',
				'fields' => array(
					'title' => 'Title',
					'copy'  => 'Copy',
				),
			),
			'beaches'    => array(
				'label'  => 'Nearby Beaches Worth the Ride',
				'fields' => array(
					'badge' => 'Badge (e.g. "4 MIN RIDE")',
					'name'  => 'Beach Name',
					'tag'   => 'Tag Line',
					'copy'  => 'Copy',
					'pills' => 'Pills (comma separated)',
					'slug'  => 'Links to (page/location slug, e.g. bike-rentals-seaside)',
				),
			),
			'faqs'       => array(
				'label'  => 'FAQs',
				'fields' => array(
					'q' => 'Question',
					'a' => 'Answer',
				),
			),
		),
	);
}

function peddlers30a_register_location_metabox() {
	add_meta_box(
		'peddlers30a_location_content',
		'Location Page Content',
		'peddlers30a_render_location_metabox',
		'location',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'peddlers30a_register_location_metabox' );

function peddlers30a_render_location_metabox( $post ) {
	wp_nonce_field( 'peddlers30a_save_location', 'peddlers30a_location_nonce' );

	$schema = peddlers30a_location_schema();
	$loc    = peddlers30a_get_location_data( $post->ID );
	?>
	<style>
		.loc-field { margin-bottom: 14px; }
		.loc-field label { display: block; font-weight: 600; margin-bottom: 4px; }
		.loc-field input[type="text"], .loc-field textarea { width: 100%; max-width: 720px; }
		.loc-field textarea { min-height: 60px; }
		.loc-repeater { border: 1px solid #dcdcde; background: #f6f7f7; padding: 12px; margin-bottom: 20px; }
		.loc-repeater h3 { margin-top: 0; }
		.loc-repeater-row { background: #fff; border: 1px solid #dcdcde; padding: 10px; margin-bottom: 10px; position: relative; }
		.loc-repeater-row .loc-field { margin-bottom: 8px; }
		.loc-repeater-remove { position: absolute; top: 8px; right: 8px; }
		.loc-section-title { border-bottom: 2px solid #dcdcde; padding-bottom: 6px; margin: 28px 0 14px; }
	</style>

	<h2 class="loc-section-title">Text Content</h2>
	<?php foreach ( $schema['scalars'] as $key => $field ) : ?>
		<div class="loc-field">
			<label for="loc-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
			<?php if ( 'textarea' === $field['type'] ) : ?>
				<textarea id="loc-<?php echo esc_attr( $key ); ?>" name="loc[<?php echo esc_attr( $key ); ?>]"><?php echo esc_textarea( isset( $loc[ $key ] ) ? $loc[ $key ] : '' ); ?></textarea>
			<?php else : ?>
				<input type="text" id="loc-<?php echo esc_attr( $key ); ?>" name="loc[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( isset( $loc[ $key ] ) ? $loc[ $key ] : '' ); ?>" />
			<?php endif; ?>
		</div>
	<?php endforeach; ?>

	<?php foreach ( $schema['repeaters'] as $rkey => $repeater ) : ?>
		<h2 class="loc-section-title"><?php echo esc_html( $repeater['label'] ); ?></h2>
		<div class="loc-repeater" data-repeater="<?php echo esc_attr( $rkey ); ?>">
			<div class="loc-repeater-rows">
				<?php
				$rows = isset( $loc[ $rkey ] ) && is_array( $loc[ $rkey ] ) ? $loc[ $rkey ] : array();
				foreach ( $rows as $i => $row ) :
					peddlers30a_render_repeater_row( $rkey, $repeater['fields'], $i, $row );
				endforeach;
				?>
			</div>
			<button type="button" class="button loc-repeater-add">+ Add Row</button>
		</div>
		<template id="tmpl-<?php echo esc_attr( $rkey ); ?>">
			<?php peddlers30a_render_repeater_row( $rkey, $repeater['fields'], '__i__', array() ); ?>
		</template>
	<?php endforeach; ?>

	<script>
	(function () {
		document.querySelectorAll( '.loc-repeater' ).forEach( function ( box ) {
			var key  = box.getAttribute( 'data-repeater' );
			var tmpl = document.getElementById( 'tmpl-' + key );
			var rows = box.querySelector( '.loc-repeater-rows' );

			box.querySelector( '.loc-repeater-add' ).addEventListener( 'click', function () {
				var idx  = 'new' + Date.now();
				var html = tmpl.innerHTML.split( '__i__' ).join( idx );
				var wrap = document.createElement( 'div' );
				wrap.innerHTML = html.trim();
				rows.appendChild( wrap.firstElementChild );
			} );

			rows.addEventListener( 'click', function ( e ) {
				if ( e.target.classList.contains( 'loc-repeater-remove' ) ) {
					e.target.closest( '.loc-repeater-row' ).remove();
				}
			} );
		} );
	})();
	</script>
	<?php
}

function peddlers30a_render_repeater_row( $rkey, $fields, $i, $row ) {
	?>
	<div class="loc-repeater-row">
		<button type="button" class="button-link-delete loc-repeater-remove">Remove</button>
		<?php foreach ( $fields as $fkey => $flabel ) : ?>
			<div class="loc-field">
				<label><?php echo esc_html( $flabel ); ?></label>
				<?php
				$value = isset( $row[ $fkey ] ) ? $row[ $fkey ] : '';
				if ( 'pills' === $fkey && is_array( $value ) ) {
					$value = implode( ', ', $value );
				}
				?>
				<?php if ( in_array( $fkey, array( 'copy', 'a' ), true ) ) : ?>
					<textarea name="loc[<?php echo esc_attr( $rkey ); ?>][<?php echo esc_attr( $i ); ?>][<?php echo esc_attr( $fkey ); ?>]"><?php echo esc_textarea( $value ); ?></textarea>
				<?php else : ?>
					<input type="text" name="loc[<?php echo esc_attr( $rkey ); ?>][<?php echo esc_attr( $i ); ?>][<?php echo esc_attr( $fkey ); ?>]" value="<?php echo esc_attr( $value ); ?>" />
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}

function peddlers30a_save_location_metabox( $post_id ) {
	if ( ! isset( $_POST['peddlers30a_location_nonce'] ) || ! wp_verify_nonce( $_POST['peddlers30a_location_nonce'], 'peddlers30a_save_location' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$schema  = peddlers30a_location_schema();
	$posted  = isset( $_POST['loc'] ) && is_array( $_POST['loc'] ) ? wp_unslash( $_POST['loc'] ) : array();
	$data    = array();

	foreach ( $schema['scalars'] as $key => $field ) {
		if ( ! isset( $posted[ $key ] ) ) {
			continue;
		}
		$data[ $key ] = 'textarea' === $field['type']
			? sanitize_textarea_field( $posted[ $key ] )
			: sanitize_text_field( $posted[ $key ] );
	}

	foreach ( $schema['repeaters'] as $rkey => $repeater ) {
		$data[ $rkey ] = array();
		if ( empty( $posted[ $rkey ] ) || ! is_array( $posted[ $rkey ] ) ) {
			continue;
		}
		foreach ( $posted[ $rkey ] as $row ) {
			$clean_row = array();
			$has_value = false;
			foreach ( $repeater['fields'] as $fkey => $flabel ) {
				$raw = isset( $row[ $fkey ] ) ? $row[ $fkey ] : '';
				if ( 'pills' === $fkey ) {
					$parts             = array_filter( array_map( 'trim', explode( ',', $raw ) ) );
					$clean_row[ $fkey ] = array_values( $parts );
				} elseif ( in_array( $fkey, array( 'copy', 'a' ), true ) ) {
					$clean_row[ $fkey ] = sanitize_textarea_field( $raw );
				} else {
					$clean_row[ $fkey ] = sanitize_text_field( $raw );
				}
				if ( '' !== $raw ) {
					$has_value = true;
				}
			}
			if ( $has_value ) {
				$data[ $rkey ][] = $clean_row;
			}
		}
	}

	update_post_meta( $post_id, '_loc_data', $data );

	// New/renamed slugs need their flat URL rewrite rule persisted right
	// away, so a just-added location's page works without a manual
	// Settings > Permalinks > Save step.
	flush_rewrite_rules();
}
add_action( 'save_post_location', 'peddlers30a_save_location_metabox' );

/**
 * One-time seed, guarded like peddlers30a_provision(): converts the legacy
 * Pages built from inc/location-data.php into real Location posts (same ID,
 * same slug, same URL -- nothing breaks), or creates them fresh on a brand
 * new install where those Pages don't exist yet. After this runs once,
 * every edit an admin makes in wp-admin is left alone permanently.
 */
function peddlers30a_seed_locations() {
	if ( get_option( 'peddlers30a_locations_migrated' ) ) {
		return;
	}

	require_once get_template_directory() . '/inc/location-data.php';
	$legacy_data = peddlers30a_location_data();

	foreach ( $legacy_data as $slug => $data ) {
		$title = ! empty( $data['display_name'] ) ? $data['display_name'] : $data['journey_to'];

		// Matched by slug alone (not by a specific template) -- this list
		// only ever contains slugs this file itself defines, so any Page
		// found here is safely assumed to be the old version of this exact
		// location, whichever template it happened to use.
		$existing_page = get_page_by_path( $slug, OBJECT, 'page' );
		if ( ! $existing_page && 'bike-rentals-seacrest-beach' === $slug ) {
			// This one used to be the "location" page before the neighborhood-
			// matching URL rename -- catch it under its old slug too.
			$existing_page = get_page_by_path( 'location', OBJECT, 'page' );
		}
		if ( $existing_page ) {
			wp_update_post(
				array(
					'ID'         => $existing_page->ID,
					'post_type'  => 'location',
					'post_name'  => $slug,
					'post_title' => $title,
				)
			);
			delete_post_meta( $existing_page->ID, '_wp_page_template' );
			update_post_meta( $existing_page->ID, '_loc_data', $data );
			continue;
		}

		$existing_location = get_page_by_path( $slug, OBJECT, 'location' );
		if ( $existing_location ) {
			continue;
		}

		$id = wp_insert_post(
			array(
				'post_type'   => 'location',
				'post_status' => 'publish',
				'post_title'  => $title,
				'post_name'   => $slug,
			)
		);
		if ( ! is_wp_error( $id ) && $id ) {
			update_post_meta( $id, '_loc_data', $data );
		}
	}

	update_option( 'peddlers30a_locations_migrated', 1 );
	flush_rewrite_rules();
}
add_action( 'init', 'peddlers30a_seed_locations', 21 );
