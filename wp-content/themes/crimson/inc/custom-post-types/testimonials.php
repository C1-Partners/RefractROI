<?php
/*
* Testimonials
 */

function crimson_team_member_init() {

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

add_action('init', 'crimson_team_member_init');