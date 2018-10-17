<?php
// echo 'require args';
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

require('query-finder-home-args.php');

// Get floor levels, based on clicked floor plan
if(isset($_POST['floorplan'])) {
  // Capture clicked floor plan
  $floorPlan = $_POST['floorplan'];

  $levelsArray = array();

  // WP Query, query for floor levels
  $floor_level_query = new WP_Query( $floors_args );
  // The loop
  if( $floor_level_query->have_posts() ) {
    while( $floor_level_query->have_posts() ) {
      $floor_level_query->the_post();
      // Compare alpha-numeric value with each floor plan id.
      if ( get_field('floor_plan_id') == $floorPlan ) {
        // WP Query, for units
        $unit_query = new WP_Query( $unit_args );
        // The loop
        if( $unit_query->have_posts()) {
          while( $unit_query->have_posts()) {
            $unit_query->the_post();
            if( (get_field('floor_plan_relational') == $floor_level_query->ID) &&
                (get_field('available') == 'available') &&
                (get_field('hide') == '0') ) {
              // Handle output of available units.
              // $arr[] = get_field('level');
              echo array_push($levelsArray, get_field('level'));
            }
          }
        }
        /* Restore original Post Data */
        wp_reset_postdata();
      }
    }
  }
  /* Restore original Post Data */
  wp_reset_postdata();

  echo json_encode($levelsArray);
  exit();
}

// Call function to query units, if floor criteria are met.
function getUnits($floorPost, $arr) {
  // WP Query, for units
  $unit_query = new WP_Query( $unit_args );
  // The loop
  if( $unit_query->have_posts()) {
    while( $unit_query->have_posts()) {
      $unit_query->the_post();
      if( (get_field('floor_plan_relational') == $floorPost->ID) &&
          (get_field('available') == 'available') &&
          (get_field('hide') == '0') ) {
        // Handle output of available units.
        // $arr[] = get_field('level');
        echo array_push($arr, get_field('level'));
      }
    }
  }
  /* Restore original Post Data */
  wp_reset_postdata();
}


 ?>
