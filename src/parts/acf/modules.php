<?php

$modules = 'content_modules';
$modules_path = '/parts/acf/modules/';

// allowable tags
$allowable_title_tags = '<i><b><em><strong><br>';
$allowable_tagline_tags = '<blockquote><a><ul><ol><li><i><b><em><strong><p><br><table><tbody><thead><td><tr>';
$allowable_content_tags = '<blockquote><a><ul><ol><li><i><b><em><strong><p><br><table><tbody><thead><td><tr><img>';

if ( have_rows( $modules ) ) :

  while ( have_rows( $modules ) ) : the_row();

    switch ( get_row_layout() ) {

      case 'content_spacer' :

        // Content Spacer
        $spacer_height = get_sub_field( 'spacer_height' );
        $spacer_measurement = get_sub_field( 'spacer_measurement' );
        $visibility = get_sub_field( 'visibility' );

        include locate_template( $modules_path . 'content-spacer.php' );

        break;

      case 'content_anchor' :

        // Content Anchor
        $anchor = get_sub_field( 'anchor' );
        $anchor = str_replace('#', '', $anchor); // remove '#'
        $anchor = str_replace(' ', '-', $anchor); // replace ' ' with '-'

        include locate_template( $modules_path . 'content-anchor.php' );

        break;

      case 'title_content' :

        // Title & Content
        $title = strip_tags( get_sub_field( 'title' ), $allowable_title_tags );
        $content = strip_tags( get_sub_field( 'content'), $allowable_content_tags );
        $bottom_border = get_sub_field( 'bottom_border' );
        
        include locate_template( $modules_path . 'title-content.php' );

        break;

      case 'cta_banner' :

        // CTA Banner
        $alignment = get_sub_field( 'alignment' );
        $contain_image = get_sub_field( 'contain_image' );
        $offset_image = get_sub_field( 'offset_image' );
        $include_e_graphic = get_sub_field( 'include_e_graphic' );
        $title = strip_tags( get_sub_field( 'title' ), $allowable_title_tags );
        $image = get_sub_field( 'image' );
        $button = get_sub_field( 'button' );

        include locate_template( $modules_path . 'cta-banner.php' );

        break;

      case 'title_content_cta_image' :

        // Title, Content, CTA & Image
        $alignment = get_sub_field( 'alignment' );
        $title = strip_tags( get_sub_field( 'title' ), $allowable_title_tags );
        $content = strip_tags( get_sub_field( 'content'), $allowable_content_tags );
        $button = get_sub_field( 'cta' );
        $image = get_sub_field( 'image' );

        include locate_template( $modules_path . 'title-content-cta-image.php' );

        break;

      case 'title_content_image' :

        // Title, Content & Image (2 Cols)
        $alignment = get_sub_field( 'alignment' );
        $title = strip_tags( get_sub_field( 'title' ), $allowable_title_tags );
        $content = strip_tags( get_sub_field( 'content'), $allowable_content_tags );
        $image = get_sub_field( 'image' );

        include locate_template( $modules_path . 'title-content-image.php' );

        break;

      case 'two_column_content' :

        // Two Column Content
        $col_one = strip_tags( get_sub_field( 'column_one' ), $allowable_content_tags );
        $col_two = strip_tags( get_sub_field( 'column_two' ), $allowable_content_tags );
        
        include locate_template( $modules_path . 'two-column-content.php' );

        break;

      case 'gallery' :

        // Filtered Gallery
        $filtered_gallery_id = get_sub_field( 'gallery' );

        include locate_template( $modules_path . 'filtered-gallery.php' );

        break;

      case 'gallery_w_captions' :

        // Filtered Gallery with Captions
        $filtered_gallery_w_captions_id = get_sub_field( 'gallery_w_captions' );

        include locate_template( $modules_path . 'filtered-gallery-w-captions.php' );

        break;

      case 'iframe' :

        // iFrame
        $title = get_sub_field( 'title' );
        $url = get_sub_field( 'url' );

        include locate_template( $modules_path . 'iframe.php' );

        break;

      case 'contact_form' :

        // Contact Form
        include locate_template( $modules_path . 'contact-form.php' );

        break;

      case 'map' :

        // Map
        $map_id = get_sub_field( 'map' );

        include locate_template( $modules_path . 'map.php' );

        break;

      case 'rentcafe_floorplans' :

        // Rentcafe Floorplans
        include locate_template( $modules_path . 'rentcafe-floorplans.php' );

        break;

      case 'rentcafe_tour' :

        // Rentcafe Schedule Tour
        include locate_template( $modules_path . 'rentcafe-tour.php' );

        break;

    }

  endwhile;
endif;

?>
