<?php
/**
 * Template Name: Lottery Template
 */

$context = Timber::get_context();
$context['lottery'] = new TimberPost();
Timber::render('lottery-template.twig', $context);

 ?>
