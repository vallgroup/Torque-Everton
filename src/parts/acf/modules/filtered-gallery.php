<?php
/**
 * Template file for displaying a Filtered Gallery
 */

// options
$hide_filters = get_field( 'filtered_gallery_hide_filters', $filtered_gallery_id )
  ? get_field( 'filtered_gallery_hide_filters', $filtered_gallery_id )
  : false;

$hide_bg_graphic = get_field( 'filtered_gallery_hide_background_graphic', $filtered_gallery_id )
  ? get_field( 'filtered_gallery_hide_background_graphic', $filtered_gallery_id )
  : false;

$use_lightbox = get_field( 'filtered_gallery_use_lightbox', $filtered_gallery_id )
  ? get_field( 'filtered_gallery_use_lightbox', $filtered_gallery_id )
  : false;

$background_classes = '';
$background_classes .= $hide_filters
  ? ''
  : 'filters-offset';


if ( class_exists( 'Torque_Filtered_Gallery' ) && class_exists( 'Torque_Filtered_Gallery_Shortcode' ) ) {
  add_filter( Torque_Filtered_Gallery_Shortcode::$GALLERY_TEMPLATE_FILTER_HANDLE, function() { return "0"; } );
}
?>

<section class="tq-filtered-gallery">
  
<?php if ( ! $hide_bg_graphic ) { ?>
  <div class="title-content-image-background <?php echo $background_classes; ?>"></div>
<?php } ?>
  
  <div class="content-wrapper">
    <?php if ( $filtered_gallery_id ) { 
      echo do_shortcode( '[torque_filtered_gallery gallery_id="' . $filtered_gallery_id . '" hide_filters="' . $hide_filters . '" use_lightbox="' . $use_lightbox . '"]' );
    } ?>
  </div>
</section>
