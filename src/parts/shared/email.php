<?php
/**
 * Template use to display the email
 */

$email = get_field( 'email', 'options' )
  ? strip_tags( get_field( 'email', 'options' ) ) 
  : null;

if ( $email ) { ?>
  <div class="email-info">
    <span class="email-title">Email: </span><span class="email-content"><?php echo $email; ?></span>
  </div>
<?php } ?>
