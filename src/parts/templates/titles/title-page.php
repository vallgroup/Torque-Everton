<?php 
/**
 * Template part for displaying page title page.php
 *
 * @package Torque
 */

$enable_hero = get_field( 'enable_hero' );

if ( $enable_hero ) {
  get_template_part( 'parts/shared/page-hero' );
}

?>