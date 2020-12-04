<?php

$slimline_hero = get_field( 'slimline_hero' );
$slimline_hero_class = $slimline_hero 
  ? 'slimline'
  : '';
$image_url = get_the_post_thumbnail_url()
  ? get_the_post_thumbnail_url()
  : '';
$video_url = get_field( 'video' )
  ? get_field( 'video' )[ 'url' ]
  : '';
$video_link_url = get_field( 'video_link' )
  ? get_field( 'video_link' )
  : '';
$media_type = get_field( 'media_type' )
  ? get_field( 'media_type' )
  : 'image';

$additional_classess = $media_type . ' ' .  $slimline_hero_class;

?>

<div class="page-hero">

  <?php if (
    'image' === $media_type
    && '' !== $image_url
  ) { ?>
    
    <div class="type-<?php echo $additional_classess; ?>">
      <div class="hero-image" style="background-image: url(<?php echo $image_url; ?>);" ></div>
    </div>

  <?php } elseif ( 
    'video' === $media_type
    && '' !== $video_url
  ) { ?>

    <div class="type-<?php echo $additional_classess; ?>">
      <video 
        class="hero-video"
        autoplay
        loop
        muted
      >
        <source src="<?php echo $video_url; ?>" type="video/mp4">
      </video>
    </div>

  <?php } elseif (
    'video_link' === $media_type
    && '' !== $video_link_url
  ) { ?>

    <div class="type-<?php echo $additional_classess; ?>">
    
      <?php // set iframe start/end
      $_video_html = '';
      $_video_html_start = '<iframe class="hero-video-link" src="';
      $_video_html_end = '" frameborder="0" allow="autoplay"></iframe>';

      if ( strpos( $video_link_url, 'vimeo' ) !== false ) {
        // remove trailing slash if found
        $video_link_url = rtrim( $video_link_url, '/' );
        // explode by slash
        $_url_parts = explode('/', $video_link_url);
        // use last element in array as video id, and compose video src string
        $_video_src = 'https://player.vimeo.com/video/' . end( $_url_parts ) . '?title=0&byline=0&portrait=0&autoplay=&loop=1&autopause=0&background=1&muted=1';
        // compose iframe html
        $_video_html = $_video_html_start . $_video_src . $_video_html_end;
      } else  {
        // simple iframe fallback with link provided by user
        $_video_html = $_video_html_start . $video_link_url . $_video_html_end;
      } 

      echo $_video_html; ?>

    </div>

  <?php } ?>

</div>
