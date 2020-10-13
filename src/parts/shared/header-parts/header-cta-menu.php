<?php 

// Template for displaying the header CTA menu

$menu_name = 'cta_menu';
 
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
 
    $menu_items = wp_get_nav_menu_items($menu->term_id);
 
    $menu_list = '<div class="cta-menu-container">';
 
    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        $menu_list .= '<div class="cta-menu-item"><a href="' . $url . '">' . $title . '</a></div>';
    }
    $menu_list .= '</div>';
}

echo $menu_list;

?>