<?php

function psc_enqueue_files () {
    // Get the theme data
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );
    $js_version = $theme_version . '.' . time();

    wp_enqueue_script( 'PSC Theme JS', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), $js_version, true );
    if ( is_page_template('templates/blog.php') ) {
        wp_enqueue_script( 'MIU JS', get_stylesheet_directory_uri() . '/js/mixitup.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'MIU-Pagination', get_stylesheet_directory_uri() . '/js/mixitup-pagination.min.js', array('jquery'), '1.0.0', true );
    }
    if ( is_page_template( array( 'templates/homepage.php', 'templates/about.php' ) ) ) {
        wp_enqueue_style( 'Slick CSS', get_stylesheet_directory_uri() . '/slick/slick.css' );
        wp_enqueue_style( 'Slick Theme CSS', get_stylesheet_directory_uri() . '/slick/slick-theme.css' );
        wp_enqueue_script( 'Slick JS', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.0', true );
    }
}

add_action('wp_enqueue_scripts', 'psc_enqueue_files');

?>