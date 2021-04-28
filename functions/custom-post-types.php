<?php

//Product CPT
//add_action( 'init', 'product_post_type', 0 );

function product_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Products',
    'singular_name'       => 'Product',
    'menu_name'           => 'Products',
    'parent_item_colon'   => 'Parent Product',
    'all_items'           => 'All Products',
    'view_item'           => 'View Product',
    'add_new_item'        => 'Add New Product',
    'add_new'             => 'Add Product',
    'edit_item'           => 'Edit Product',
    'update_item'         => 'Update Product',
    'search_items'        => 'Search Products',
    'not_found'           => 'No Products Found',
    'not_found_in_trash'  => 'No Products Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'Products',
    'description'         => 'A list of the Cargill Legends products.',
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
    'menu_icon'           => 'dashicons-awards'
  );
  
//Register the CPT
  register_post_type( 'product', $args );
}


?>