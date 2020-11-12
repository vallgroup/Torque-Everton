<?php
/**
 * Template use to display the address
 */

$address = get_field( 'address', 'options' )
  ? strip_tags( get_field( 'address', 'options' ), '<br>, <p>' ) 
  : null;

if ( $address ) { ?>
  <div class="location-info">
    <a 
      href="https://maps.google.com/?q=<?php echo urlencode( strip_tags( $address ) ); ?>" 
      target="_blank"
      rel="noopener noreferrer"
    ><?php echo $address; ?></a>
  </div>
<?php } ?>
