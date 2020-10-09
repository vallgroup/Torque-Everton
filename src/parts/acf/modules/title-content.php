<?php
/**
 * Template file for displaying Title, Content, CTA & Image
 */

$bottom_border_class = $bottom_border ? 'bottom-border' : '';
?>

<section class="tq-title-content <?php echo $bottom_border_class; ?>">
  <?php if ( $title ) { ?>
    <h1 class="title-content-title">
      <?php echo $title; ?>
    </h1>
  <?php } ?>

  <?php if ( $content ) { ?>
    <div class="title-content-content">
      <?php echo $content; ?>
    </div>
  <?php } ?>
</section>