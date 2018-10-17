<?php
/**
  * Template Name: Contact Us Template
  */

$context = Timber::get_context();
$context['contact_us'] = new TimberPost();
Timber::render('contact-us-template.twig', $context);

 ?>
