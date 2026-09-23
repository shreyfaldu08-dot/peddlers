<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class( peddlers30a_page_slug_class() ); ?>>
  <!-- ====================================================================
         01 — Top navigation (Header)
         ==================================================================== -->
  <header class="site-header">
    <div class="site-header__inner">
      <a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Peddlers 30A — home">
        <img src="<?php echo esc_url( peddlers30a_logo_url() ); ?>" alt="Peddlers 30A" />
      </a>

      <nav class="site-nav" id="site-nav" aria-label="Primary">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Peddlers30a_Primary_Walker(),
            'fallback_cb'    => 'peddlers30a_primary_menu_fallback',
          )
        );
        ?>
      </nav>

      <div class="site-header__actions">
        <a class="btn btn--primary" href="tel:<?php echo esc_attr( get_theme_mod( 'phone_number_link', '+18502130040' ) ); ?>">
          <img class="btn__icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/icons/phone.svg" alt="" />
          <?php echo esc_html( get_theme_mod( 'phone_number', '(850) 213-0040' ) ); ?>
        </a>
        <a class="btn btn--sand" href="<?php echo esc_url( peddlers30a_nav_url( 'bike-rentals' ) ); ?>">RESERVE NOW</a>
      </div>

      <button class="site-header__toggle" type="button" aria-expanded="false" aria-controls="site-nav"
        aria-label="Open menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <div class="site-header__overlay" hidden></div>

  <main>
