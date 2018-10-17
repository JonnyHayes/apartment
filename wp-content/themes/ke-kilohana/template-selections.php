<?php

/**
 * Template Name: Selections Template
 */



$context = Timber::get_context();

//$reserveredarray = array();

$reserveredarray = $wpdb->get_results(
        "select residenceNumber ,occupied from reservedunits
        ");


// Add  array to site context
$context['reserveredarray'] = $reserveredarray;

// ... probably more $context here (e.g. sidebars, menus, etc)

// Essential (and included in Timber starter theme)


$context['current_user'] = new TimberUser();
$post = new TimberPost();
$context['post'] = $post;
// TODO may remove page.twig fallback
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );
