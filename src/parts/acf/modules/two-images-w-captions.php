<?php
/**
 * Template file for displaying Two Images with Captions
 */
?>

<section id="tq-two-images-w-captions">
  <div class="two-images-w-captions-wrapper limit-width narrow">
    <div class="two-images-w-captions-col">
      <?php if ( $img_one ) { ?>
        <a 
          href="#" 
          class="col-image"
          style="background-image: url(<?php echo $img_one['url']; ?>)"
          data-featherlight="<?php echo $img_one['url']; ?>"
        ></a>
      <?php } ?>
      <?php if ( $caption_one ) { ?>
        <h3 class="col-caption">
          <?php echo $caption_one; ?>
        </h3>
      <?php } ?>
    </div>

    <div class="two-images-w-captions-col">
      <?php if ( $img_two ) { ?>
        <a 
          href="#" 
          class="col-image"
          style="background-image: url(<?php echo $img_two['url']; ?>)"
          data-featherlight="<?php echo $img_two['url']; ?>"
        ></a>
      <?php } ?>
      <?php if ( $caption_two ) { ?>
        <h3 class="col-caption">
          <?php echo $caption_two; ?>
      </h3>
      <?php } ?>
    </div>
  </div>
</section>