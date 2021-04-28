<?php

//Testimonial CPT
add_action( 'init', 'testimonial_post_type', 0 );

function testimonial_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Testimonials',
    'singular_name'       => 'Testimonial',
    'menu_name'           => 'Testimonials',
    'parent_item_colon'   => 'Parent Testimonial',
    'all_items'           => 'All Testimonials',
    'view_item'           => 'View Testimonial',
    'add_new_item'        => 'Add New Testimonial',
    'add_new'             => 'Add Testimonial',
    'edit_item'           => 'Edit Testimonial',
    'update_item'         => 'Update Testimonial',
    'search_items'        => 'Search Testimonials',
    'not_found'           => 'No Testimonials Found',
    'not_found_in_trash'  => 'No Testimonials Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'Testimonials',
    'description'         => 'Neater Organizing testimonials.',
    'labels'              => $labels,
    'supports'            => array(
        'title',
        'editor',
        'author',
        'page-attributes'
    ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'menu_icon'           => 'dashicons-editor-quote'
  );
  
//Register the CPT
  register_post_type( 'testimonial', $args );
}


?>