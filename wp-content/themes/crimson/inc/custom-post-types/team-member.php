<?php
/*
Plugin Name: WhitePaper CPT: Staff
Description: Pages for staff members.
*/
// Our custom post type function
function crimson_staff_init() {

// CPT Options
$labels = array(
    'name'               => _x( 'Staff', 'post type general name' ),
    'singular_name'      => _x( 'Staff Member', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Staff Member' ),
    'edit_item'          => __( 'Edit Staff Member' ),
    'new_item'           => __( 'New Staff Member' ),
    'all_items'          => __( 'All Staff' ),
    'view_item'          => __( 'View Staff Member' ),
    'search_items'       => __( 'Search Staff' ),
    'not_found'          => __( 'No staff found' ),
    'not_found_in_trash' => __( 'No staff found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Staff'
  );
$rewrites = array(
  'slug'  => 'staff',
  'with_front'  => false
);
  $args = array(
    'labels'        => $labels,
    'description'   => 'Displays staff',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon'     => 'dashicons-id',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    'show_in_rest'  => true,
    'rewrite'       => $rewrites
);
register_post_type( 'staff', $args	);
}

// Hooking up our function to theme setup
add_action( 'init', 'crimson_staff_init' );
?>
