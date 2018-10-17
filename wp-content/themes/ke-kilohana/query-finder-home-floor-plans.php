<?php
// echo 'require args';
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

require('query-finder-home-args.php');

// Get floor plans, based on clicked number of bedrooms
if(isset($_POST['bedroom'])) {
  // Capture selected number of bedrooms
  $bedroom = $_POST['bedroom'];

  // WP Query, query for floor plans
  $floor_plan_query = new WP_Query( $floors_args );
  // The Loop
  if( $floor_plan_query->have_posts() ) {
    while( $floor_plan_query->have_posts() ) {
      $floor_plan_query->the_post();
      // Compare post data with clicked value
      if ( get_field('bd_ba') == $bedroom ) {
        echo '<button type="button" class="floor_plan_button" value="' . get_field('floor_plan_id') . '">' .
          get_field('floor_plan_id') . ' | FACING: ' .
          get_field('direction') . ' | ' .
          get_field('sq_ft') . ' SQ FT</button>';
      }
    }
  }
  /* Restore original Post Data */
  wp_reset_postdata();
}

 ?>
