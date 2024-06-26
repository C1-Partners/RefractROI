<?php
/**
 * SW standard functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SW
*/

if ( ! function_exists( 'sw_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sw_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GS Delta, use a find and replace
		 * to change 'pb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sw', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Register menues
		 * 
		 */
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'sw' ),
			'secondary-menu' => esc_html__( 'Secondary', 'sw' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pb_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sw_setup' );


// set global variable for google maps api key
global $GMAPS_API_KEY;
$GMAPS_API_KEY = '';

 if ( ! defined( '_S_VERSION' ) ) {
 	// Replace the version number of the theme on each release.
 	define( '_S_VERSION', '1.0.0' );
 }

 if ( ! function_exists('glob_recursive'))
 {
     // Does not support flag GLOB_BRACE
    function glob_recursive($pattern, $flags = 0)
    {
      $files = glob($pattern, $flags);
      foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
      {
        $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
      }
      return $files;
    }
 }

 // load initial libs
 foreach (glob_recursive(get_template_directory()."/lib/*.php") as $filename)
 {
     include_once $filename;
 }

 // include files for components
 include_once get_template_directory()."/components/gsc.php";
 foreach (glob_recursive(get_template_directory()."/components/atoms/*/index.php") as $filename)
 {
     include_once $filename;
 }
 foreach (glob_recursive(get_template_directory()."/components/molecules/*/index.php") as $filename)
 {
     include_once $filename;
 }
 // gsc integrations
 foreach (glob(get_template_directory()."/components/integrations/*.php") as $filename)
 {
     include_once $filename;
 }


 /**
  * Enqueue/dequeue appropriate scripts and styles.
  */
 function gsc_scripts() {
   
  $random_version = false;
 	wp_enqueue_style( 'gsc-style', get_stylesheet_uri(), [], $random_version );
 	wp_enqueue_script( 'gsc-bundle', get_template_directory_uri() . '/bundle.js', ["jquery"], $random_version, true );
 }
 add_action( 'wp_enqueue_scripts', 'gsc_scripts' );

 function editor_styles() {
	wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/editor-style.css' );
}
add_action( 'enqueue_block_editor_assets', 'editor_styles' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*
 * Register api key for acf/google map integration
 */
function my_acf_google_map_api( $api ){
    $api['key'] = '';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*
 * Modify WP Query on Category pages
 */
function cat_posts_per_page( $query ) {
	if ( $query->is_main_query() && !is_admin() && is_category() ) {
		$query->set( 'posts_per_page', 18 );
	}
  }
add_filter( 'pre_get_posts', 'cat_posts_per_page' );

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
 * Include custom functions to modify comments
 */
require get_template_directory() . '/inc/comment-mods.php';

/**
 * Include custom admin functions
 */
require get_template_directory() . '/inc/admin.php';

/**
 * Custom ACF Blocks
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Include open graph function 
 */
require get_template_directory() . '/inc/open-graph.php';

/**
 * Include any functions or modifications to Woocommerce
 */
require get_template_directory() . '/inc/woocommerce-mods.php';

/**
 * Include helper functions
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Include each custom post type file in /custom-post-types
 */
foreach(glob(get_template_directory() . "/inc/custom-post-types/*.php") as $file){
    require $file;
}

/**
 * Require classes
 */
foreach(glob(get_template_directory() . "/inc/classes/*.php") as $file){
    require $file;
}

/**
 * Get the the attachment ID of image from path
 */
function get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

/**
 * Fix SVGs not having height and width when using wp_get_attachement_img_src
 */
add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 );  /* the hook */

 function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
    if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
        if(is_array($size)) {
            $image[1] = $size[0];
            $image[2] = $size[1];
        } elseif(($xml = simplexml_load_file($image[0])) !== false) {
            $attr = $xml->attributes();
            $viewbox = explode(' ', $attr->viewBox);
            $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
            $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
        } else {
            $image[1] = $image[2] = null;
        }
    }
    return $image;
} 