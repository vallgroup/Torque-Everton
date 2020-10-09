<?php
/**
 * Template file for displaying an iFrame
 */
?>

<section class="tq-iframe <?php echo $bottom_border_class; ?>">
  <?php if ( $title ) { ?>
    <h2 class="iframe-title">
      <?php echo $title; ?>
    </h2>
  <?php } ?>

  <?php if ( $url ) { ?>
    <div class="iframe-container">
      <iframe
        name="TQ iFrame"
        class="iframe-content"
        src="<?php echo $url; ?>"
      >
      </iframe>
    </div>
  <?php } ?>
</section>