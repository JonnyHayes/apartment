<?php
/**
 * Template Name: Sales Process Calculator Template
 */

$context = Timber::get_context();
$context['sales_process'] = new TimberPost();
Timber::render('sales-process-calculator-template.twig', $context);

 ?>
