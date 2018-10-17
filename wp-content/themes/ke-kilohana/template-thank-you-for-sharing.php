<?php

/**
 * Template Name: Thank You For Sharing
 */




$pagetoshare =  ($_GET["pagetoshare"]);


$context = Timber::get_context();
$context['thank-you-for-sharing'] = new TimberPost();
$context['pagetoshare'] = $pagetoshare;
Timber::render('thank-you-for-sharing-template.twig', $context);



?>
