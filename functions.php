<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // Get the theme data
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );

    $css_version = $theme_version . '.' . time();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $css_version );
    
    wp_enqueue_script( 'jquery');
    
    $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $js_version, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


//Load our scripts
include("functions/scripts.php");

//Custom Thumbnails
include("functions/custom-post-types.php");

//Custom Thumbnails
include("functions/custom-thumbs.php");

//Custom Functions
include("functions/custom-functions.php");

//Widgets Functionality
include("functions/widgets.php");

//Admin Modifications
include("functions/admin-modifications.php");

//AJAX Functions
include("functions/ajax-category-functions.php");

//COMMENTS
include("functions/comments.php");

?>