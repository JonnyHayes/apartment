<?php
/**
 * Template Name: News Ticker
 */

$context = Timber::get_context();
$context['news_ticker'] = new TimberPost();
Timber::render('news-ticker.twig', $context);

 ?>
