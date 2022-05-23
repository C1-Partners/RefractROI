<?php
/*
Plugin Name: crimson CPT: CTA's
Description: Calls to Action
*/
// Our custom post type function
function create_crimson_cpt_ctas() {
  // CPT Options

$labels = array(
    'name'               => _x( 'CTA', 'post type general name' ),
    'singular_name'      => _x( 'CTA', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New CTA' ),
    'edit_item'          => __( 'Edit CTA' ),
    'new_item'           => __( 'New CTA' ),
    'all_items'          => __( 'All CTA\'s' ),
    'view_item'          => __( 'View CTA' ),
    'search_items'       => __( 'Search CTA\'s' ),
    'not_found'          => __( 'No CTA\'s found' ),
    'not_found_in_trash' => __( 'No CTA\'s found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'CTA\'s'
  );
$rewrites = array(
  'slug'  => 'cta',
  'with_front'  => false
);
  $args = array(
    'labels'        => $labels,
    'description'   => 'Displays CTA\'s',
    'public'        => true,
    'menu_position' => 6,
    'menu_icon'     => 'dashicons-welcome-widgets-menus',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => false,
    'show_in_rest'  => true,
    'rewrite'       => $rewrites
);
register_post_type( 'ctas', $args	);
}

//Custom Taxonomies
function c1partners_taxonomy_cta_type() {
  $labels = array(
    'name' => _x( 'CTA Type', 'taxonomy general name' ),
    'singular_name' => _x( 'CTA Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search CTA Types' ),
    'all_items' => __( 'All CTA Types' ),
    'parent_item' => __( 'Parent CTA Type' ),
    'parent_item_colon' => __( 'Parent CTA Type:' ),
    'edit_item' => __( 'Edit CTA Type' ),
    'update_item' => __( 'Update CTA Type' ),
    'add_new_item' => __( 'Add New CTA Type' ),
    'new_item_name' => __( 'New CTA Type' ),
    'menu_name' => __( 'CTA Types' ),
  );
  register_taxonomy('cta-type', 'ctas', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cta-type', 'with_front' => false ),
    'show_in_rest' => true,
  ));
}

  // Hooking up our function to theme setup
add_action( 'init', 'create_crimson_cpt_ctas' );
add_action( 'init', 'c1partners_taxonomy_cta_type', 0 );
?>