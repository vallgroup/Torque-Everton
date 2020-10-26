<?php

$slimline_hero = get_field( 'slimline_hero' );
$slimline_hero_class = $slimline_hero 
  ? 'slimline'
  : '';
$image_url = get_the_post_thumbnail_url();
$video_url = get_field( 'video' )
  ? get_field( 'video' )[ 'url' ]
  : '';
$media_type = get_field( 'media_type' )
  ? get_field( 'media_type' )
  : 'image';

$additional_classess = $media_type . ' ' .  $slimline_hero_class;

?>

<div class="page-hero">
  <div class="type-<?php echo $additional_classess; ?>">

    <?php if ( 'image' === $media_type ) { ?>
      <div class="hero-image" style="background-image: url(<?php echo $image_url; ?>);" ></div>
    <?php } elseif ( 'video' === $media_type ) { ?>
      <video 
        class="hero-video"
        autoplay
        loop
        muted
      >
        <source src="<?php echo $video_url; ?>" type="video/mp4">
      </video>
    <?php } ?>

  </div>
</div>
