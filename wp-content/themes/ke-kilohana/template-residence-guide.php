<?php
/**
 * Template Name: Residence Guide Template
 */

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
$context['view_planes'] = Timber::get_posts($view_planes_args);

// Return each Unit post, to build out context for individual Units
foreach (Timber::get_posts($units_args) as $unit_post) {
  // Get unit-specific data, based on wp ID.
  // Result is formatted: unit1234
  $unitContext = 'unit' . get_field('unit_id', $unit_post->ID);
  $context[$unitContext] = Timber::get_post($unit_post->ID);
  // Floor plan post, identified by floor plan relation field in unit post
  $context[$unitContext . '_floor'] = get_field('floor_plan_relational', $unit_post->ID);
}

$context['residence_guide'] = new TimberPost();
Timber::render('residence-guide-template.twig', $context);


?>
