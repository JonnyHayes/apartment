<?php

// from page.php, timber template
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
// TODO may remove page.twig fallback
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );
