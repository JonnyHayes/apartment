<?php
/**
 * Template Name: Filter Gallery Template
 */

$context = Timber::get_context();
$context['filter_gallery'] = new TimberPost();
Timber::render('filter-gallery-template.twig', $context);

 ?>
