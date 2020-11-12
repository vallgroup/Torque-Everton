<?php
/**
 * Template use to display the social channels
 */

$social_rows = get_field( 'social_channels', 'options' );

if ( $social_rows ) {
  echo '<div class="socials-container">';
  foreach ( $social_rows as $social_row ) {
      $icon = $social_row['icon'];
      $url = $social_row['url'];
      echo '<a href="' . $url . '" target="_blank">';
        echo '<i class="fa ' . $icon . '"></i>';
      echo '</a>';
  }
  echo '</div>';
} ?>
