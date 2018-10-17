<?php
/**
 * Template Name: TEST Google Sheet Template
 */

$context = Timber::get_context();
$context['sheet'] = new TimberPost();
Timber::render('test-google-sheet-template.twig', $context);

 ?>
