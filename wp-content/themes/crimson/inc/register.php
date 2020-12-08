<?php

/**
 * Enqueue scripts and styles.
 */
function crimson_scripts() {
    global $c1Helpers;

	wp_enqueue_style( 'site-styles', $c1Helpers->compiledAsset('/css/app.css'), false, null );
	wp_enqueue_script( 'site-scripts', $c1Helpers->compiledAsset('/js/app.js'), array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crimson_scripts' );

/**
 * Set up theme menus
 */
function crimson_menus() {
	register_nav_menus( array(
    'primary-menu' => esc_html__( 'Primary Menu', 'crimson' ),
    'footer-menu' => __('Footer Menu', 'crimson'),
	) );
}
add_action( 'after_setup_theme', 'crimson_menus' );

/**
 * ACF Options page
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page('Site Options');
}

/**
 * Image Sizes
 * add_image_size( identifier, width, height, hard crop )
 */
add_image_size( 'hero', 1200, 400, true );

/**
 * Image Type Support
 * http://www.iana.org/assignments/media-types/media-types.xhtml
 */
function crimson_mime_types($mimes) {
    $mimes['webp'] = 'image/webp';
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'crimson_mime_types');

/**
 * Fixes SVG uploads not properly having their height and width set
 */
function crimson_svg_meta_data($data, $id) {
    $attachment = get_post($id);
    $mime_type = $attachment->post_mime_type;

    if($mime_type == 'image/svg+xml'){
      if(empty($data) || empty($data['width']) || empty($data['height'])){
        $url = wp_make_link_relative(wp_get_attachment_url($id));
        $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].$url);
        $attr = $xml->attributes();
        $viewbox = explode(' ', $attr->viewBox);
        $data['width'] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
        $data['height'] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
      }
    }

    return $data;
}
add_filter('wp_update_attachment_metadata', 'crimson_svg_meta_data', 10, 2);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crimson_content_width() {
	// This variable is intended to be overruled from themes.w
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'crimson_content_width', 640 );
}
add_action( 'after_setup_theme', 'crimson_content_width', 0 );

/**
 * Scroll to Gravity Form upon submission and reloading of page
 */
add_filter( 'gform_confirmation_anchor', '__return_true' );

/**
 * A custom logo to Customizer
 */
add_theme_support( 'custom-logo' );

/**
 * Theme widgets
 */
function crimson_register_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Footer A1', 'textdomain' ),
      'id'            => 'footer-a1',
      'description'   => __( 'Footer A1.', 'textdomain' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer B1', 'textdomain' ),
    'id'            => 'footer-b1',
    'description'   => __( 'Footer B1', 'textdomain' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer B2', 'textdomain' ),
    'id'            => 'footer-b2',
    'description'   => __( 'Footer B2', 'textdomain' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer B3', 'textdomain' ),
    'id'            => 'footer-b3',
    'description'   => __( 'Footer B3', 'textdomain' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'crimson_register_widgets_init' );

/**
 * Register Loop Block
 */
function c1partners_register_blocks() {

	// Check function exists
	if( function_exists('acf_register_block') ) {

    // Steps
    acf_register_block(array(
      'name'				=> 'loop',
      'title'				=> __( 'Loop' ),
      'description'		=> __( 'A customizable loop block.' ),
      'render_callback'	=> 'c1partners_blocks_render_callback',
      'category'			=> 'formatting',
      'icon'				=> 'controls-repeat',
      'keywords'			=> array( 'query' ),
    ));
	}
}

add_action('acf/init', 'c1partners_register_blocks');

/************ Render The Block ******************/
function c1partners_blocks_render_callback( $block ) {
  // include('block-steps.php');
  include './block-loop.php';
}


