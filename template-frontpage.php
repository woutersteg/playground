<?php
/**
 * Template name: Home page
 */

$context                    =   Timber::context();

$args = array(
    'post_type'             =>  'post',
);

$posts                      =   Timber::get_posts($args);
$templates                  =   ['views/template-home.twig'];

$context['posts']           =   $posts;
$context['menu_footer']     =   'false';

$context['slider']          =   new Timber('$template_slider');

Timber::render($templates, $context);


?>


