<?php

/**
 * Header Template 1:
 *
 * Logo - Burger menu with mobile opening from right of screen (mobile & tablet)
 * Logo - Menu items inline (desktop)
 *
 *
 * Note: styles for this which require a media query
 * can be found in the child theme boilerplate.
 */

$logo_dark_light = isset($tq_header_style_1_logo) && $tq_header_style_1_logo === 'white' ? 'white' : 'dark';

$extra_classes = isset($tq_header_style_1_classes) ? $tq_header_style_1_classes : '';

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
$call_to_action = get_field( 'drawer_menu_cta', 'options' );

?>

<header
  id="header-style-1"
  class="torque-header <?php echo $extra_classes; ?>"
>

  <div class="row torque-header-content-wrapper torque-navigation-toggle">

    <div class="torque-header-left-area-wrapper torque-header-logo-wrapper">
      <?php // Logo
        get_template_part( 'parts/shared/logo', $logo_dark_light);
      ?>
    </div>

    <div class="torque-header-right-area-wrapper">
      <?php // CTA Menu 
        get_template_part( 'parts/shared/header-parts/header-cta-menu' );
      ?>
      <div class="burger-menu-container">
        <?php // Burger Nav Toggle
          get_template_part( 'parts/elements/element', 'burger-menu-squeeze' );
        ?>
      </div>
    </div>

  </div>

  <div class="col1 torque-navigation-toggle torque-header-menu-items-mobile">
    <?php // Burger Nav Items 
      get_template_part( 'parts/shared/header-parts/menu-items/menu-items', 'stacked' ); 
    ?>
    <?php // Contact Details ?>
    <?php if ( $address || $email || $phone ) { ?>
      <div class="drawer-contact-container">
        <?php if ( $address ) { ?>
          <div class="drawer-contact-address">
            <a 
              href="https://maps.google.com/?q=<?php echo urlencode( strip_tags( $address ) ); ?>" 
              target="_blank"
              rel="noopener noreferrer"
            ><?php echo $address; ?></a>
          </div>
        <?php } ?>
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
      <div class="drawer-cta">
        <div class="offset-hr"></div>
        <a class="btn-primary slim" 
          href="<?php echo $call_to_action['url']; ?>"
          target="<?php echo $call_to_action['target']; ?>"
        >
          <?php echo $call_to_action['title']; ?>
        </a>
      </div>
    <?php } ?>
  </div>

</header>
