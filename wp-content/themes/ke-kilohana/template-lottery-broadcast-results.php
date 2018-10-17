<?php
/**
 * Template Name: Lottery Broadcast Results Template
 */

$context = Timber::get_context();
$context['broadcast_results'] = new TimberPost();
Timber::render('lottery-broadcast-results-template.twig', $context);

 ?>
