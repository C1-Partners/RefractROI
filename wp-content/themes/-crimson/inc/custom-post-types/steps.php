<?php

// Our custom post type function
function create_crimson_cpt_steps() {
  // CPT Options

$labels = array(
    'name'               => _x( 'Steps', 'post type general name' ),
    'singular_name'      => _x( 'Step', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Step' ),
    'edit_item'          => __( 'Edit Step' ),
    'new_item'           => __( 'New Step' ),
    'all_items'          => __( 'All Steps' ),
    'view_item'          => __( 'View Step' ),
    'search_items'       => __( 'Search Steps' ),
    'not_found'          => __( 'No Steps found' ),
    'not_found_in_trash' => __( 'No Steps found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Steps'
  );
$rewrites = array(
  'slug'  => 'steps',
  'with_front'  => false
);
  $args = array(
    'labels'        => $labels,
    'description'   => 'Displays Steps',
    'public'        => true,
    'menu_position' => 6,
    'menu_icon'     => 'dashicons-smiley',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => false,
    'show_in_rest'  => true,
    'rewrite'       => $rewrites
);
register_post_type( 'steps', $args	);
}

  // Hooking up our function to theme setup
add_action( 'init', 'create_crimson_cpt_steps' );
?>