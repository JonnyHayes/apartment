<?php
// echo 'require args';
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

require('query-finder-home-args.php');

// Get unit result, based on clicked floor level
if(isset($_POST['floorlevel'])) {
  // Capture clicked floor level
  $floorLevel = $_POST['floorlevel'];

  // WP Query, query for floor plans
  $unit_summary_query = new WP_Query( $units_args );
  // The loop
  if( $unit_summary_query->have_posts()) {
    while( $unit_summary_query->have_posts()) {
      $unit_summary_query->the_post();
      if( get_field('level') == $floorLevel ) {
        $floor_elational = get_field('floor_plan_relational');
        $floor_summary_query = new WP_Query( $floors_args );
      }
    }
  }
}

 ?>
