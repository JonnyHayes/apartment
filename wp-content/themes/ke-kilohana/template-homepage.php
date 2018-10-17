<?php
/**
 * Template Name: Homepage Template
 */

$context = Timber::get_context();
$context['homepage'] = new TimberPost();
Timber::render('homepage-template.twig', $context);
?>
