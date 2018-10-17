<?php
/**
 * Template Name: Ward Village Template
 */

$context = Timber::get_context();
$context['wardvillage'] = new TimberPost();
Timber::render('ward-village.twig', $context);
?>
