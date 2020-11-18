<?php
/**
 * Template file for displaying a Rentcafe Floorplans
 */

$site_map = get_field( 'site_map', 'options' )
  ? get_field( 'site_map', 'options' )
  : null;
?>

<section class="tq-rentcafe-floorplans">
  <div class="content-wrapper">
    <?php echo do_shortcode( '[torque_rentcafe site_map="' . $site_map . '"]' ); ?>
  </div>
</section>
