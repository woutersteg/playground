<?php
    /**
     * The template for displaying Archive pages.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     */
    
    $templates          = array( 'archive.twig', 'index.twig' );
    $context            = Timber::get_context();
    $context[ 'title' ] = __( 'Archive', 'boilerplate' );
    $context[ 'posts' ] = Timber::get_posts();
    
    if ( is_post_type_archive() ) {
        $context[ 'title' ] = post_type_archive_title( '', false );
        array_unshift( $templates, 'archive--' . get_post_type() . '.twig' );
    }
    
    Timber::render( $templates, $context );
