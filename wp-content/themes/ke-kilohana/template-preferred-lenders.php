<?php
/**
 * Template Name: Preferred Lenders Template
 */

$context = Timber::get_context();
$context['preferred_lenders'] = new TimberPost();
Timber::render('preferred-lenders-template.twig', $context);

 ?>
