<?php
/*
* Testimonials
 */

function crimson_testimonial_init() {

    $labels = array(
        'name'               => _x( 'Testimonials', 'post type general name' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'all_items'          => __( 'All Testimonials' ),
        'view_item'          => __( 'View Testimonial' ),
        'search_items'       => __( 'Search Testimonials' ),
        'not_found'          => __( 'No testimonials found' ),
        'not_found_in_trash' => __( 'No testimonials found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Testimonials'
      );
    $rewrites = array(
      'slug'  => 'testimonials',
      'with_front'  => false
    );
      $args = array(
        'labels'        => $labels,
        'description'   => 'Displays testimonials',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'show_in_rest'  => true,
        'rewrite'       => $rewrites
    );
    register_post_type( 'testimonials', $args	);

}

function crimson_taxonomy_testimonial_type() {
  $labels = array(
    'name' => _x( 'Testimonial Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Testimonial Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Testimonial Types' ),
    'all_items' => __( 'All Testimonial Types' ),
    'parent_item' => __( 'Parent Testimonial Type' ),
    'parent_item_colon' => __( 'Parent Testimonial Type:' ),
    'edit_item' => __( 'Edit Testimonial Type' ),
    'update_item' => __( 'Update Testimonial Type' ),
    'add_new_item' => __( 'Add New Testimonial Type' ),
    'new_item_name' => __( 'New Testimonial Type' ),
    'menu_name' => __( 'Testimonial Types' ),
  );
  register_taxonomy('testimonial-type', 'testimonials', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'testimonial-type', 'with_front' => false ),
    'show_in_rest' => true,
  ));
}

add_action('init', 'crimson_testimonial_init');
add_action( 'init', 'crimson_taxonomy_testimonial_type', 0 );