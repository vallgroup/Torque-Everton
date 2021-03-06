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
    <?php // CTA Menu 
      get_template_part( 'parts/shared/header-parts/header-cta-menu' );
    ?>
    <?php // Burger Nav Items 
      get_template_part( 'parts/shared/header-parts/menu-items/menu-items', 'stacked' ); 
    ?>
    <?php // Contact Details ?>
    <div class="drawer-contact-container">
      <?php get_template_part( 'parts/shared/contact-parts/address' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/email' ); ?>
      <?php get_template_part( 'parts/shared/contact-parts/phone' ); ?>
    </div>
    <div class="drawer-cta">
      <?php get_template_part( 'parts/elements/offset-hr' ); ?>
      <a class="btn-primary slim" 
        href="<?php echo $call_to_action['url']; ?>"
        target="<?php echo $call_to_action['target']; ?>"
      >
        <?php echo $call_to_action['title']; ?>
      </a>
    </div>
  </div>

</header>
