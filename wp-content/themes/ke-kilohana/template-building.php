<?php
/**
 * Template Name: Building Template
 */

$context = Timber::get_context();
$context['building'] = new TimberPost();
Timber::render('building-template.twig', $context);
?>
