<?php
    /**
     * The Template for displaying all single posts
     */
    
    $post_object               = new Timber\Post();
    $context                   = Timber::get_context();
    $templates                 = [ sprintf( 'pages/page-%s.twig', $post_object->ID ), 'singular.twig' ];
    $context[ 'post' ]         = $post_object;
    $context[ 'show_sidebar' ] = true;

    Timber::render( $templates, $context );
