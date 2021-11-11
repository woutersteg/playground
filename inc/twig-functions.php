<?php
    /**
     * Add a custom function to Twig
     *
     * @param Twig_Environment $twig
     *
     * @return Twig_Environment
     */
    function bp_add_to_twig( Twig_Environment $twig ) {
        $get_preview = new Twig_SimpleFunction( 'get_preview', 'bp_get_preview' );

        $twig->addFunction( $get_preview );

        return $twig;
    }
    add_filter( 'get_twig', 'bp_add_to_twig' );

    /**
     * Callable function for get_preview
     *
     * @param $post
     * @param $len
     *
     * @return string
     */
    function bp_get_preview( $post, $len ) {
        if ( $post ) {
            $text = '';

            // Try post_excerpt
            if ( isset( $post->post_excerpt ) && ! empty( $post->post_excerpt ) ) {
                $text = $post->post_excerpt;
            }

            // Try content up-to more comment
            if ( empty( $text ) && preg_match( '/<!--\s?more(.*?)?-->/', $post->post_content, $readmore_matches ) ) {
                $pieces = explode( $readmore_matches[ 0 ], $post->post_content );
                $text   = $pieces[ 0 ];
            }

            // Try content
            if ( empty( $text ) ) {
                $text = $post->post_content;
            }

            // Lets do it
            if ( ! empty( $text ) ) {
                $text = strip_tags( strip_shortcodes( $text ) );
                $text = TimberHelper::trim_words( $text, $len, false );
                $text = trim( $text );

                if ( ! empty( $text ) && ( '.' != substr( $text, -1 ) ) ) {
                    $text .= ' &hellip;';
                }

                return $text;
            }
        }

        return '';
    }
