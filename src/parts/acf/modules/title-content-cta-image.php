<?php
/**
 * Template file for displaying Title, Content, CTA & Image
 */

$bg_image_url = $image && isset( $image['url'] ) 
  ? $image['url'] 
  : '';

$alignment_class = 'align-' . $alignment;
?>

<section 
  id="tq-title-content-cta-image"
  class="limit-width <?php echo $alignment_class; ?>"
>
  <div class="title-content-cta-image-col-left">
    <?php if ( $title ) { ?>
      <h2 class="title-content-cta-image-title">
        <?php echo $title; ?>
      </h2>
    <?php } ?>
    
    <?php if ( $content ) { ?>
      <div class="title-content-cta-image-content">
        <?php echo $content; ?>
    </div>
    <?php } ?>

    <?php if ( $button ) { ?>
      <div class="title-content-cta-image-button">
        <?php get_template_part( 'parts/elements/offset-hr' ); ?>
        <a 
          class="btn-primary"
          href="<?php echo $button['url']; ?>"
          target="<?php echo $button['target']; ?>"
          title="<?php echo $button['title']; ?>"
        >
          <?php echo $button['title']; ?>
        </a>
      </div>
    <?php } ?>
  </div>
  
  <div 
    class="title-content-cta-image-col-right"
    style="background-image: url(<?php echo $bg_image_url; ?>);"
  ></div>

</section>