<?php
    /**
     *  The 404 template file
     */
    $context            = Timber::get_context();
    $context[ 'title' ] = __( 'Oops', 'boilerplate' );
    
    Timber::render( 'pages/404.twig', $context );
