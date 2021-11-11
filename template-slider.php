<?php

$context = Timber::context();

$args = array(
    'post_type'         => 'post',
    'numberposts'       => 3,
    'post_status'       => 'publish',
    'order'             => 'ASC',
    'paged'             => $paged
);

$posts = Timber::get_posts($args);
$templates = [sprintf('views/template-slider.twig')];
$context['posts'] = $posts;
$context['show_sidebar'] = false;
$context['menu_footer'] = false;

Timber::render($templates, $context);


?>