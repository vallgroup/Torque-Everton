<?php
/**
 * Template use to display the email
 */

$email = get_field( 'email', 'options' )
  ? strip_tags( get_field( 'email', 'options' ) ) 
  : null;

if ( $email ) { ?>
  <div class="email-info">
    <?php echo $email; ?>
  </div>
<?php } ?>
