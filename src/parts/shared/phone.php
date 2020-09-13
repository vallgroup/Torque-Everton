<?php
/**
 * Template use to display the phone
 */

$phone = get_field( 'phone', 'options' )
  ? strip_tags( get_field( 'phone', 'options' ) ) 
  : null;

if ( $phone ) { ?>
  <div class="email-info">
    <?php echo $phone; ?>
  </div>
<?php } ?>
