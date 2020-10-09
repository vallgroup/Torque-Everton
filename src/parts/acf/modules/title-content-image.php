<?php
/**
 * Template file for displaying Title, Content & Image (2 Cols)
 */

$bg_image_url = $image && isset( $image['url'] ) 
  ? $image['url'] 
  : '';

$alignment_class = 'align-' . $alignment;
?>

<section class="tq-title-content-image limit-width <?php echo $alignment_class; ?>">
  <div class="title-content-image-col-left">
    <?php if ( $title ) { ?>
      <h2 class="title-content-image-title">
        <?php echo $title; ?>
      </h2>
    <?php } ?>
    
    <?php if ( $content ) { ?>
      <div class="title-content-image-content">
        <?php echo $content; ?>
    </div>
    <?php } ?>
  </div>
  
  <div 
    class="title-content-image-col-right"
    style="background-image: url(<?php echo $bg_image_url; ?>);"
  ></div>

</section>