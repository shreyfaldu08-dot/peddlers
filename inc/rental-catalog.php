<?php
/**
 * The full 21-item rental catalog (category filter buttons + product grid)
 * shared by the Rentals page and every location landing page, so the two
 * can never drift apart. Filtering is client-side (see initRentalFilters
 * in assets/js/main.js): each card carries a data-category list.
 */

function peddlers30a_rental_products() {
	return array(
		array( 'img' => 'bike-basket.jpg', 'title' => 'Bike Basket', 'price' => '5.00', 'slug' => 'bike-basket', 'cat' => 'peddlers-products' ),
		array( 'img' => 'adult-female-cruiser.jpg', 'title' => 'Adult Female Cruiser', 'price' => '40.00', 'slug' => 'adult-female-cruiser', 'cat' => 'adult-bikes' ),
		array( 'img' => 'adult-unisex-cruiser.jpg', 'title' => 'Adult Unisex Cruiser', 'price' => '40.00', 'slug' => 'adult-unisex-cruiser', 'cat' => 'adult-bikes' ),
		array( 'img' => 'adult-mens-cruiser.jpg', 'title' => "Adult Men's Cruiser", 'price' => '40.00', 'slug' => 'adult-mens-cruiser', 'cat' => 'adult-bikes' ),
		array( 'img' => 'adult-7-speed-mens.jpg', 'title' => "Adult 7 Speed Men's", 'price' => '50.00', 'slug' => 'adult-7-speed-mens', 'cat' => 'adult-bikes' ),
		array( 'img' => 'adult-7-speed-unisex.jpg', 'title' => 'Adult 7 Speed Unisex', 'price' => '50.00', 'slug' => 'adult-7-speed-unisex', 'cat' => 'adult-bikes' ),
		array( 'img' => '16-kids-cruiser-girls.jpg', 'title' => '16&Prime; Kids Cruiser - Girls', 'price' => '40.00', 'slug' => '16-kids-cruiser-girls', 'cat' => 'kids-bikes' ),
		array( 'img' => '20-kids-cruiser-coral.jpg', 'title' => '20&Prime; Kids Cruiser - Coral', 'price' => '40.00', 'slug' => '20-kids-cruiser-coral', 'cat' => 'kids-bikes' ),
		array( 'img' => '24-kids-cruiser-seafoam.jpg', 'title' => '24&Prime; Kids Cruiser - Seafoam', 'price' => '40.00', 'slug' => '24-kids-cruiser-seafoam', 'cat' => 'kids-bikes' ),
		array( 'img' => '16-kids-cruiser-boys.jpg', 'title' => '16&Prime; Kids Cruiser - Boys', 'price' => '40.00', 'slug' => '16-kids-cruiser-boys', 'cat' => 'kids-bikes' ),
		array( 'img' => '20-kids-cruiser-blue.jpg', 'title' => '20&Prime; Kids Cruiser - Blue', 'price' => '40.00', 'slug' => '20-kids-cruiser-blue', 'cat' => 'kids-bikes' ),
		array( 'img' => '24-kids-cruiser-gray.jpg', 'title' => '24&Prime; Kids Cruiser - Gray', 'price' => '40.00', 'slug' => '24-kids-cruiser-gray', 'cat' => 'kids-bikes' ),
		array( 'img' => 'bike-and-burley-combo.jpg', 'title' => 'Bike and Burley Combo', 'price' => '70.00', 'slug' => 'bike-and-burley-combo', 'cat' => 'adult-bikes kids-along' ),
		array( 'img' => 'adult-tricycle.jpg', 'title' => 'Adult Tricycle', 'price' => '50.00', 'slug' => 'adult-tricycle', 'cat' => 'adult-bikes' ),
		array( 'img' => 'kids-tricycle.jpg', 'title' => 'Kids Tricycle', 'price' => '50.00', 'slug' => 'kids-tricycle', 'cat' => 'kids-bikes' ),
		array( 'img' => 'baby-seat-bicycle.jpg', 'title' => 'Baby Seat Bicycle', 'price' => '50.00', 'slug' => 'baby-seat-bicycle', 'cat' => 'kids-along' ),
		array( 'img' => 'kazoo-kids-tandem.png', 'title' => "Kazoo Kid's Tandem", 'price' => '60.00', 'slug' => 'kazoo-kids-tandem', 'cat' => 'kids-along' ),
		array( 'img' => 'burley-for-use-with-customer-bike.jpg', 'title' => 'Burley', 'price' => '40.00', 'slug' => 'burley-for-use-with-customer-bike', 'cat' => 'kids-along', 'note' => '(for use with customer bike)' ),
		array( 'img' => 'tug-a-bug-kids-tandem-for-use-with-customer-bike.jpg', 'title' => "Tug A Bug Kid's Tandem", 'price' => '40.00', 'slug' => 'tug-a-bug-kids-tandem-for-use-with-customer-bike', 'cat' => 'kids-along', 'note' => '(for use with customer bike)' ),
		array( 'img' => 'monkey-faction.jpg', 'title' => 'Monkey Faction', 'price' => '30.00', 'slug' => 'monkey-faction', 'cat' => 'kids-bikes' ),
		array( 'img' => 'wee-hoo-1-seater-for-use-with-customer-bike.jpg', 'title' => 'Wee HOO - 1 Seater', 'price' => '40.00', 'slug' => 'wee-hoo-1-seater-for-use-with-customer-bike', 'cat' => 'kids-along', 'note' => '(for use with customer bike)' ),
	);
}

/**
 * Outputs the filter buttons and the product grid. Product links point at
 * the shop on the main domain (/store/<product>/), not a shop subdomain.
 */
function peddlers30a_render_rental_catalog() {
	?>
        <div class="rental-filters">
          <button class="rental-filters__btn is-active" type="button" data-filter="all">BIKE RENTALS</button>
          <button class="rental-filters__btn" type="button" data-filter="kids-bikes">KIDS BIKES</button>
          <button class="rental-filters__btn" type="button" data-filter="peddlers-products">PEDDLER'S PRODUCTS</button>
          <button class="rental-filters__btn" type="button" data-filter="kids-along">TAKE YOUR KIDS ALONG</button>
          <button class="rental-filters__btn" type="button" data-filter="adult-bikes">ADULT BIKES</button>
        </div>

        <div class="rental__grid">
          <?php foreach ( peddlers30a_rental_products() as $product ) : ?>
          <article class="bike-card" data-category="<?php echo esc_attr( $product['cat'] ); ?>">
            <figure class="bike-card__media">
              <img class="media-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/products/<?php echo esc_attr( $product['img'] ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $product['title'] ) ); ?>" />
            </figure>
            <div class="bike-card__body">
              <h3 class="bike-card__title"><?php echo wp_kses_post( $product['title'] ); ?><?php if ( ! empty( $product['note'] ) ) : ?> <span class="bike-card__note"><?php echo esc_html( $product['note'] ); ?></span><?php endif; ?></h3>
              <p class="bike-card__price">From: <span>$<?php echo esc_html( $product['price'] ); ?></span></p>
              <a class="btn btn--outline bike-card__cta" href="<?php echo esc_url( home_url( '/store/' . $product['slug'] . '/' ) ); ?>" target="_blank" rel="noopener">BOOK NOW</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
	<?php
}
