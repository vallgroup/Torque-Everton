<?php

$image = get_the_post_thumbnail_url();
$type = 'image'; 

?>

<div class="page-hero">
  <div class="type-<?php echo $type; ?>">
    <div class="hero-image" style="background-image: url(<?php echo $image; ?>);" ></div>
  </div>
</div>
