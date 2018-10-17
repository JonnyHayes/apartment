<?php
/**
 * Template Name: Brochures Template
 */

$context = Timber::get_context();
$context['brochures'] = new TimberPost();
Timber::render('brochures-template.twig', $context);

 ?>
