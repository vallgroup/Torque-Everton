<?php
/**
 * Template file for displaying a Map
 */
?>

<section class="tq-map">
  <div class="content-wrapper limit-width narrow">
    <?php if ( $map_id ) { 
      echo do_shortcode( '[torque_map map_id="' . $map_id . '"]' );
    } ?>
  </div>
</section>
