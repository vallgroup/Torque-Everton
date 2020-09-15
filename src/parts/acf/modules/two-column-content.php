<?php
/**
 * Template file for displaying Two Column Content
 */
?>

<section 
  id="tq-two-column-content"
  class="limit-width <?php echo $alignment_class; ?>"
>
  <div class="two-column-content-col-left">
    <?php if ( $col_one ) { ?>
      <div class="col-content">
        <?php echo $col_one; ?>
    </div>
    <?php } ?>
  </div>

  <div class="two-column-content-col-right">
    <?php if ( $col_two ) { ?>
      <div class="col-content">
        <?php echo $col_two; ?>
    </div>
    <?php } ?>
  </div>
</section>