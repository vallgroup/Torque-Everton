<?php
/**
 * Template file for displaying CTA Banner
 */

$bg_image_url = $image && isset( $image['url'] ) 
  ? $image['url'] 
  : '';
?>

<section id="tq-cta-banner">
  <div class="cta-banner-col-left">
    <?php if ( $title ) { ?>
      <h1 class="cta-banner-title">
        <?php echo $title; ?>
      </h1>
    <?php } ?>
  </div>
  
  <div 
    class="cta-banner-col-right"
    style="background-image: url(<?php echo $bg_image_url; ?>);"
  ></div>

  <?php if ( $button ) { ?>
    <div class="cta-banner-button">
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
</section>