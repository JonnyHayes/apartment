<?php
/**
 * Template Name: Sales Process Template
 */

 /*
  * Reserved Housing information has replaced Sales Process
  */

$context = Timber::get_context();
$context['sales_process'] = new TimberPost();
Timber::render('sales-process-template.twig', $context);

 ?>
