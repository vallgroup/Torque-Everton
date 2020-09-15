<?php

$slimline_hero = get_field( 'slimline_hero' );
$slimline_hero_class = $slimline_hero 
  ? 'slimline'
  : '';
$image = get_the_post_thumbnail_url();
$type = 'image'; 

$additional_classess = $type . ' ' .  $slimline_hero_class;

?>

<div class="page-hero">
  <div class="type-<?php echo $additional_classess; ?>">
    <div class="hero-image" style="background-image: url(<?php echo $image; ?>);" ></div>
  </div>
</div>
