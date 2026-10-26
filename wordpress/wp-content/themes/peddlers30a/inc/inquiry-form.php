<?php
/**
 * The rental inquiry form is a Forminator form, shown on the Contact page
 * and inside the "Inquiry Now" popup on every location page. Its ID is a
 * Customizer setting (Appearance > Customize > Header & Footer Info), so
 * re-importing the form on another site only needs that one number changed.
 * The form's hidden "Source Page" / "Source URL" fields record which page
 * it was submitted from.
 */

function peddlers30a_inquiry_form_id() {
	return (int) get_theme_mod( 'inquiry_form_id', 80 );
}

function peddlers30a_render_inquiry_form() {
	echo do_shortcode( '[forminator_form id="' . peddlers30a_inquiry_form_id() . '"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Popup shell for the location pages; opened by any [data-inquiry-open]
 * button (see initInquiryModal in assets/js/main.js).
 */
function peddlers30a_render_inquiry_modal() {
	?>
    <div class="inquiry-modal" id="inquiry-modal" role="dialog" aria-modal="true" aria-labelledby="inquiry-modal-title" hidden>
      <div class="inquiry-modal__backdrop" data-inquiry-close></div>
      <div class="inquiry-modal__dialog" tabindex="-1" data-lenis-prevent>
        <button class="inquiry-modal__close" type="button" data-inquiry-close aria-label="Close inquiry form">&times;</button>
        <h2 class="inquiry-modal__title" id="inquiry-modal-title">Rental Inquiry</h2>
        <p class="inquiry-modal__lead">Tell us what you need and we will get back to you within 2 hours during business hours.</p>
        <div class="inquiry-forminator">
          <?php peddlers30a_render_inquiry_form(); ?>
        </div>
      </div>
    </div>
	<?php
}
