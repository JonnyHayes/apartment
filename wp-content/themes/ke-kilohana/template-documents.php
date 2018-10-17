<?php
/**
 * Template Name: Documents Template
 */

$context = Timber::get_context();
$context['documents'] = new TimberPost();
Timber::render('documents-template.twig', $context);

 ?>
