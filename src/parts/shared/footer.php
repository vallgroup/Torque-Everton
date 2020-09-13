<?php
/**
 * Footer template
 */
?>

<footer>

  <div class="footer-block footer-block-one">
    <?php get_template_part( 'parts/shared/logo', 'white' ); ?>
  </div>

  <div class="footer-block footer-block-two">
    <?php get_template_part( 'parts/shared/address' ); ?>
    <?php get_template_part( 'parts/shared/socials' ); ?>
  </div>

  <div class="footer-block footer-block-three">
    <?php get_template_part( 'parts/shared/email' ); ?>
    <?php get_template_part( 'parts/shared/phone' ); ?>
  </div>
  
  <div class="footer-block footer-block-four">
    <?php get_template_part( 'parts/shared/hours' ); ?>
  </div>

</footer>
