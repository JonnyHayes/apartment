<?php
/**
 * Template Name: Phase 2 General Template
 */

$context = Timber::get_context();
$context['phase2'] = new TimberPost();
Timber::render('phase2-general-template.twig', $context);
