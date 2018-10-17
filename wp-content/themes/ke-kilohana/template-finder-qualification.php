<?php
/**
 * Template Name: Finder Qualification Template
 */

// Query for post types that are Floors
$floors_args = array(
  'post_type' => 'floors'
);

// Query for post types that are Units
$units_args = array(
  'post_type' => 'units'
);

$context = Timber::get_context();
$context['floors'] = Timber::get_posts($floors_args);
$context['units'] = Timber::get_posts($units_args);
$context['finder_qualification'] = new TimberPost();
Timber::render('finder-qualification-template.twig', $context);
