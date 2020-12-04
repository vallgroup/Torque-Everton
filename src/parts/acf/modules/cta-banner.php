<?php
/**
 * Template file for displaying CTA Banner
 */

$bg_image_url = $image && isset( $image['url'] ) 
  ? $image['url'] 
  : '';

$alignment_class = 'align-' . $alignment;
$image_cover_class = $contain_image ? 'contain-image' : '';
$image_offset_class = $offset_image ? 'offset-image' : '';
?>

<section class="tq-cta-banner <?php echo $alignment_class; ?>">
  <div class="cta-banner-col-left"></div>
  
  <div class="cta-banner-col-right
    <?php echo $image_cover_class; ?>
    <?php echo $image_offset_class; ?>
  ">
    <img class="background" src="<?php echo $bg_image_url; ?>" />

    <?php if ( 
      $include_e_graphic
      && 'left' === $alignment
    ) {
      $e_graphic_image_url = get_stylesheet_directory_uri() . '/assets/images/white-graphic-e.png'; 
    ?>
      <img class="e-graphic" src="<?php echo $e_graphic_image_url; ?>" />
    <?php } ?>

  </div>

  <?php if ( $title ) { ?>
    <h1 class="cta-banner-title">
      <?php echo $title; ?>
    </h1>
  <?php } ?>

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