<?php
/**
 * revenue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package m-site
 */

if ( ! function_exists( 'm_site_setup' ) ) :

function m_site_setup() {

	load_theme_textdomain( 'm-site', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( '顶部菜单', 'm-site' ),
		'secondary' => esc_html__( '主菜单', 'm-site' ),
		'footer' => esc_html__( '底部菜单', 'm-site' ),		
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

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 300,
		'height'      => 100,
		'flex-width'  => true,
		'flex-height' => true
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'm_site_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'm_site_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function m_site_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'm_site_content_width', 760 );
}
add_action( 'after_setup_theme', 'm_site_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function m_site_sidebar_init() {

}
add_action( 'widgets_init', 'm_site_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */

require get_template_directory() . '/admin/customizer-library.php';

require get_template_directory() . '/admin/customizer-options.php';

require get_template_directory() . '/admin/styles.php';

require get_template_directory() . '/admin/mods.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Enqueues scripts and styles.
 */
function m_site_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

    //  Enqueues Javascripts
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',array(), '', true ); 
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	
	if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) {	
		wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array(), '', true ); 
	}

	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array(), '', true ); 
	                              
    wp_enqueue_script( 'm-site-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180612', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'm-site-style', get_stylesheet_uri(), array(), '20180712' );     
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons/genericons.css' );

    if( get_theme_mod('site-layout', 'choice-1') == 'choice-1' ) {	
    	wp_enqueue_style( 'm-site-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20180712' ); 
	}

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'm_site_scripts' );

/* Admin CSS Style */
function m_site_admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'm_site_admin_style');


/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 300, 189, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'm_site_featured_large_thumb', 750, 375, true );
    add_image_size( 'm_site_list_thumb', 232, 149, true );
    add_image_size( 'm_site_single_thumb', 710, 400, true ); 
}

/**
 * Registers custom widgets.
 */
function m_site_widgets_init() {										

}
add_action( 'widgets_init', 'm_site_widgets_init' );

/**
 * Simple Likes
 */
require trailingslashit( get_template_directory() ) . 'inc/post-like.php';

