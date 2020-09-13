<?php
/**
 * Template use to display the office hours
 */

$hours_rows = get_field( 'office_hours', 'options' );

if ( $hours_rows ) {
  echo '<div class="hours-container">';
  echo '<div>Office Hours:</div>';
  foreach ( $hours_rows as $hours_row ) {
      $details = $hours_row['details'];
      echo '<div>' . $details . '</div>';
  }
  echo '</div>';
} ?>
