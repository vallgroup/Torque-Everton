<?php
/**
 * Footer template
 */

// Contact Details
$address = get_field( 'address', 'options' )
  ? strip_tags( get_field( 'address', 'options' ), '<br>, <p>' ) 
  : null;
$phone = get_field( 'phone', 'options' )
  ? strip_tags( get_field( 'phone', 'options' ) ) 
  : null;
$email = get_field( 'email', 'options' )
  ? strip_tags( get_field( 'email', 'options' ) ) 
  : null;

$illegal_link_chars = array( ' ', '.', '-', '( ', ' )' );

?>

<footer>

  <div class="footer-block footer-block-one">
    <?php get_template_part( 'parts/shared/logo', 'white' ); ?>
  </div>

  <div class="footer-block footer-block-two">
    <?php if ( $address ) { ?>
      <div class="location-info">
        <a 
          href="https://maps.google.com/?q=<?php echo urlencode( strip_tags( $address ) ); ?>" 
          target="_blank"
          rel="noopener noreferrer"
        ><?php echo $address; ?></a>
      </div>
    <?php } ?>
    <!-- todo: socials -->
  </div>

  <div class="footer-block footer-block-three">
    <?php if ( $email ) { ?>
      <div class="drawer-contact-email">
        <?php echo $email; ?>
      </div>
    <?php } ?>
    <?php if ( $phone ) { ?>
      <div class="drawer-contact-phone">
        <?php echo $phone; ?>
      </div>
    <?php } ?>
  </div>

  <div class="footer-block footer-block-four">
    <!-- todo: hours -->
  </div>

</footer>
