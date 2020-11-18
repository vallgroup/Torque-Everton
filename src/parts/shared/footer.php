<?php
/**
 * Footer template
 */
?>

<footer>

  <div class="footer-content-wrapper mobile-footer">
    <div class="footer-block footer-block-one">
      <?php get_template_part( 'parts/shared/logo', 'white' ); ?>
    </div>

    <div class="footer-block footer-block-two">
      <?php get_template_part( 'parts/shared/contact-parts/address' ); ?>
    </div>

    <div class="footer-block footer-block-three">
      <?php get_template_part( 'parts/shared/contact-parts/phone' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/email' ); ?>
    </div>
    
    <div class="footer-block footer-block-four">
      <?php get_template_part( 'parts/shared/contact-parts/hours' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/socials' ); ?>
    </div>
  </div>

  <div class="footer-content-wrapper desktop-footer">
    <div class="footer-block footer-block-one">
      <?php get_template_part( 'parts/shared/logo', 'white' ); ?>
    </div>

    <div class="footer-block footer-block-two">
      <?php get_template_part( 'parts/shared/contact-parts/address' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/socials' ); ?>
    </div>

    <div class="footer-block footer-block-three">
      <?php get_template_part( 'parts/shared/contact-parts/phone' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/email' ); ?>
    </div>

    <div class="footer-block footer-block-four">
      <?php get_template_part( 'parts/shared/contact-parts/hours' ); ?>
    </div>
  </div>

</footer>
