<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    if ( ! class_exists( 'Timber' ) ) {
        add_action( 'admin_notices', function() {
            echo sprintf( '<div class="error"><p>%s is not activated. None of the theme functions will run until you activate the plugin <a href="%s">%s</a>,
because the theme extends the class <a href="%s">TimberSite</a>.</p></div>',
                'Timber', esc_url( admin_url( 'plugins.php?s=timber' ) ),
                'here',
                esc_url( 'https://timber.github.io/docs/reference/timber-site/' ) );
        } );

        return;
    }
