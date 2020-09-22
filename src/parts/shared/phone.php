<?php
/**
 * Template use to display the phone
 */

$phone = get_field( 'phone', 'options' )
  ? strip_tags( get_field( 'phone', 'options' ) ) 
  : null;

if ( $phone ) { ?>
  <div class="phone-info">
    <span class="phone-title">Phone: </span><span class="phone-content"><?php echo $phone; ?></span>
  </div>
<?php } ?>
