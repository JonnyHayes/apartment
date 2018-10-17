<?php
/**
 * Template Name: Finder Home Template
 */

// Template for find your home widget

// Query for post types that are Floors
$floors_args = array(
  'post_type' => 'floors',
  'posts_per_page' => -1
);

// Query for post types that are Units
$units_args = array(
  'post_type' => 'units',
  'posts_per_page' => -1
);

// Query for post types that are View_planes
$view_planes_args = array(
  'post_type' => 'view_planes',
  'posts_per_page' => -1
);


$context = Timber::get_context();
$context['floors'] = Timber::get_posts($floors_args);
$context['units'] = Timber::get_posts($units_args);
$context['view_planes'] = Timber::get_posts($view_planes_args);
$context['finder_home'] = new TimberPost();
Timber::render('finder-home-template.twig', $context);


// WP Query, query for floor plans
// $floor_plan_query = new WP_Query( $floors_args );
// // The Loop
// if ( $floor_plan_query->have_posts() ) {
//   while ( $floor_plan_query->have_posts() ) {
//     $floor_plan_query->the_post();
//     // TODO compare clicked value
//     if ( get_field('bd_ba') == '2/2' ) {
//       echo get_field('floor_plan_id') . '<br />';
//     }
//     // echo get_field('floor_plan_id') . ' ' . get_field('bd_ba') . '<br />';
//   }
// } else {
//     // no posts found
// }
// /* Restore original Post Data */
// wp_reset_postdata();

?>
