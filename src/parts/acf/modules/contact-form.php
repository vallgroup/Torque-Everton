<?php
/**
 * Template file for displaying Contact Form
 */
?>

<section class="tq-contact-form">
  <div class="contact-form-wrapper">
    <div class="contact-form-col-left">
      <?php get_template_part( 'parts/shared/email' ); ?>
      <?php get_template_part( 'parts/shared/phone' ); ?>
      <?php get_template_part( 'parts/shared/address' ); ?>
    </div>
    
    <div class="contact-form-col-right">
      <form>
        <input type="text" placeholder="Name" />
        <input type="text" placeholder="Email" />
        <textarea placeholder="Message" rows="6"></textarea>
        <input class="btn-primary wide" type="submit" />
      </form>
    </div>
  </div>
</section>