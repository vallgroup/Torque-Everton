<?php
/**
 * Template file for displaying Contact Form
 */
?>

<section class="tq-contact-form">
  <div class="contact-form-col-left">
    
    <?php if ( $content ) { ?>
      <div class="contact-form-content">
        <?php echo $content; ?>
    </div>
    <?php } ?>

    <?php get_template_part( 'parts/shared/email' ); ?>
    <?php get_template_part( 'parts/shared/phone' ); ?>
    <?php get_template_part( 'parts/shared/address' ); ?>

    <?php if ( $button ) { ?>
      <div class="contact-form-button">
        <a 
          class="btn-primary slim"
          href="<?php echo $button['url']; ?>"
          target="<?php echo $button['target']; ?>"
          title="<?php echo $button['title']; ?>"
        >
          <?php echo $button['title']; ?>
        </a>
      </div>
    <?php } ?>
  </div>
  
  <div class="contact-form-col-right">
    <form>
      <input type="text" placeholder="Name" />
      <input type="text" placeholder="Email" />
      <textarea placeholder="Message" rows="6"></textarea>
      <input class="btn-primary wide" type="submit" />
    </form>
  </div>

  <?php if ( $title ) { ?>
    <h1 class="contact-form-title">
      <?php echo $title; ?>
    </h1>
  <?php } ?>
</section>