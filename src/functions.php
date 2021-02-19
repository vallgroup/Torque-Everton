<?php

require_once( get_stylesheet_directory() . '/includes/everton-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/widgets/everton-child-widgets-class.php');
require_once( get_stylesheet_directory() . '/includes/customizer/everton-child-customizer-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/everton-child-acf-class.php');
require_once( get_stylesheet_directory() . '/includes/cpts/everton-child-lead-cpt-class.php');

/**
 * Child Theme Nav Menus
 */

if ( class_exists( 'Everton_Nav_Menus' ) ) {
  new Everton_Nav_Menus();
}

/**
 * Child Theme Widgets
 */

if ( class_exists( 'Everton_Widgets' ) ) {
  new Everton_Widgets();
}

/**
 * Child Theme Customizer
 */

if ( class_exists( 'Everton_Customizer' ) ) {
  new Everton_Customizer();
}

/**
 * Child Theme ACF
 */

if ( class_exists( 'Everton_ACF' ) ) {
  new Everton_ACF();
}

/**
 * Child Theme Lead CPT
 */

if ( class_exists( 'Everton_Lead_CPT' ) ) {
  new Everton_Lead_CPT();
}
 
 
 /**
  * Map plugin settings
  */
 
 add_filter( 'torque_map_api_key', function( $n ) {
   return get_field( 'google_maps_api_key', 'options' )
     ? get_field( 'google_maps_api_key', 'options' )
     : '';
 } );
 
 add_filter( 'torque_map_pois_allowed', function( $n ) {
   return 0;
 } );
 
 // add_filter( 'torque_map_manual_pois', function( $n ) {
 //   return true;
 // } );
 
//  add_filter( 'torque_map_pois_location', function( $n ) {
//    return 'middle';
//  } );
 
//  add_filter( 'torque_map_display_pois_list', function( $n ) {
//    return true;
//  } );
 
 
 /**
  * Jetpack filters, for local/staging use
  */
 // Hook into Jetpack's form redirect filter when WP loads, without instantiating the entire class
//  Torque_Jetpack_Form::register_redirect_filter();
 
 // add_filter( 'jetpack_development_mode', '__return_true' );
//  add_filter( 'jetpack_is_staging_site', '__return_true' );


/**
 * Admin settings
 */

 // remove menu items
 function torque_remove_menus(){

   //remove_menu_page( 'index.php' );                  //Dashboard
   //remove_menu_page( 'edit.php' );                   //Posts
   //remove_menu_page( 'upload.php' );                 //Media
   //remove_menu_page( 'edit.php?post_type=page' );    //Pages
   //remove_menu_page( 'edit-comments.php' );          //Comments
   //remove_menu_page( 'themes.php' );                 //Appearance
   //remove_menu_page( 'plugins.php' );                //Plugins
   //remove_menu_page( 'users.php' );                  //Users
   //remove_menu_page( 'tools.php' );                  //Tools
   //remove_menu_page( 'options-general.php' );        //Settings

 }
 add_action( 'admin_menu', 'torque_remove_menus' );


/**
 * Enqueues
 */

// enqueue child styles after parent styles, both style.css and main.css
// so child styles always get priority
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_styles' );
function torque_enqueue_child_styles() {

    $parent_style = 'parent-styles';
    $parent_main_style = 'torque-theme-styles';

    // make sure parent styles enqueued first
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_main_style, get_template_directory_uri() . '/bundles/main.css' );

    // enqueue child style
    wp_enqueue_style( 'everton-child-styles',
        get_stylesheet_directory_uri() . '/bundles/main.css',
        array( $parent_style, $parent_main_style ),
        wp_get_theme()->get('Version')
    );
}

// enqueue child scripts after parent script
add_action( 'wp_enqueue_scripts', 'torque_enqueue_child_scripts');
function torque_enqueue_child_scripts() {

  // enqueue child scripts
  wp_enqueue_script( 'everton-child-script',
      get_stylesheet_directory_uri() . '/bundles/bundle.js',
      array( 
        'torque-theme-scripts',
        'jquery'
      ), // depends on parent script & jQuery
      wp_get_theme()->get('Version'),
      true       // put it in the footer
  );
}

// add Google Analytics script to <head> tag
add_action( 'wp_footer', 'torque_head_google_analytics' );
function torque_head_google_analytics() { ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-79387542-23"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-79387542-23');
  </script>
<?php }

// add Rentcafe CRM script to <head> tag
add_action( 'wp_footer', 'torque_head_rentcafe_crm' );
function torque_head_rentcafe_crm() { ?>
  <!-- Rentcafe CRM -->
  <script src="https://textus.rentcafe.com/js/TextUsWidget.js" id="myScript" DNIS="8339332015" ></script>
<?php }

// add Rentcafe CRM script to <head> tag
add_action( 'wp_footer', 'torque_popup' );
function torque_popup() {
  if ( is_front_page() || is_page('floorplans') ) {
    $_title = get_field( 'popup_title', 'options' );
    $_content = get_field( 'popup_content', 'options' );
    $_output = '';
  
    if ( $_title && $_content ) {
      $_cta = get_field( 'popup_cta', 'options' );
      $_image_url = get_stylesheet_directory_uri() . '/statics/images/popup-banner.jpg';

      // popup overlay
      $_output .= '<div class="torque-popup-overlay"></div>';
      // open container
      $_output .= '<div class="torque-popup" style="display:none;">';
        $_output .= '<img class="popup-banner" src="' . $_image_url . '" width="100%;" height="auto" alt="Popup Banner" />';
        // open content container
        $_output .= '<div class="popup-content-container">';
          $_output .= '<h2 class="popup-title">' . $_title . '</h2>';
          $_output .= '<div class="popup-divider"></div>';
          $_output .= '<div class="popup-content">' . $_content . '</div>';
          $_output .= $_cta 
            ? '<a class="popup-cta btn-primary" href="' . $_cta['url'] . '" target="' . $_cta['target'] . '">' . $_cta['title'] . '</a>'
            : '';
        // close content container
        $_output .= '</div>';
        // close button
        $_output .= '<div class="popup-close-btn">+</div>';
      // close container
      $_output .= '</div>';

      // output the popup
      echo $_output;
    }
  }
}

?>
