<?php
/**
 * Template Name: Village Life Template
 */

$context = Timber::get_context();
$context['villagelife'] = new TimberPost();
Timber::render('village-life-template.twig', $context);
?>
