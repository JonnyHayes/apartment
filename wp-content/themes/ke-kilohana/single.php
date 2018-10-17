<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

// Query for post types that are View_planes
$view_planes_args = array(
 'post_type' => 'view_planes',
 'posts_per_page' => -1
);


$context = Timber::get_context();
$context['unit'] = Timber::query_post();
$context['floor'] = get_field('floor_plan_relational');
$context['view_planes'] = Timber::get_posts($view_planes_args);

Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
