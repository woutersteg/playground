<?php
    /**
     * Search results page
     */

    $templates          = array( 'index.twig', 'archive.twig' );
    $context            = Timber::get_context();
    $context[ 'posts' ] = Timber::get_posts();
    $context[ 'title' ] = sprintf( __( 'Search results for: %s', 'boilerplate' ), get_search_query() );

    Timber::render( $templates, $context );

