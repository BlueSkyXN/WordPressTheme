<?php
/**
 * revenue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zimeiti-1
 */

if ( ! function_exists( 'zimeiti_1_setup' ) ) :

function zimeiti_1_setup() {

	load_theme_textdomain( 'zimeiti-1', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( '顶部导航菜单', 'zimeiti-1' ),
		'left' => esc_html__( '左侧导航菜单', 'zimeiti-1' ),		
		'footer' => esc_html__( '底部导航菜单', 'zimeiti-1' ),		
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
		'width'       => 250,
		'height'      => 60,
		'flex-width'  => true,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'zimeiti_1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'zimeiti_1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zimeiti_1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zimeiti_1_content_width', 760 );
}
add_action( 'after_setup_theme', 'zimeiti_1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zimeiti_1_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( '右侧边栏', 'zimeiti-1' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( '在此处添加小工具', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( '底部 1', 'zimeiti-1' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( '在此处添加小工具', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 2', 'zimeiti-1' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( '在此处添加小工具', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 3', 'zimeiti-1' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( '在此处添加小工具', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 4', 'zimeiti-1' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( '在此处添加小工具', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '文章列表广告', 'zimeiti-1' ),
		'id'            => 'content-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具， 将在文章列表显示。', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="content-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '文章内容顶部广告', 'zimeiti-1' ),
		'id'            => 'single-top-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具， 将在文章列表显示。', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="single-top-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '文章评论框顶部广告', 'zimeiti-1' ),
		'id'            => 'single-bottom-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具， 将在文章列表显示。', 'zimeiti-1' ),
		'before_widget' => '<div id="%1$s" class="single-bottom-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );				

}
add_action( 'widgets_init', 'zimeiti_1_sidebar_init' );

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
function zimeiti_1_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

    //  Enqueues Javascripts
    wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array(), '', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',array(), '', true ); 
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array(), '', true ); 
	
	if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) {	
		wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array(), '', true ); 
	}
	                              
	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array(), '', true );                                                       	  
    wp_enqueue_script( 'zimeiti-1-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180916', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'zimeiti-1-style', get_stylesheet_uri(), array(), '20180916' );     
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons/genericons.css' );

    if( get_theme_mod('site-layout', 'choice-1') == 'choice-1' ) {	
    	wp_enqueue_style( 'zimeiti-1-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20180916' ); 
	}

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'zimeiti_1_scripts' );

/* Admin CSS Style */
function zimeiti_1_admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'zimeiti_1_admin_style');


/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 300, 189, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'zimeiti_1_featured_large_thumb', 574, 321, true ); //alt: 480 * 269
    add_image_size( 'zimeiti_1_featured_small_thumb', 281, 158, true );
    add_image_size( 'zimeiti_1_list_thumb', 280, 176, true );
    add_image_size( 'zimeiti_1_widget_post_thumb', 120, 80, true );    
    add_image_size( 'zimeiti_1_single_thumb', 820, 460, true ); 
}

/**
 * Registers custom widgets.
 */
function zimeiti_1_widgets_init() {										
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'zimeiti_1_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'zimeiti_1_Recent_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'zimeiti_1_Random_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'zimeiti_1_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ad.php';
	register_widget( 'zimeiti_1_Ad_Widget' );	

}
add_action( 'widgets_init', 'zimeiti_1_widgets_init' );

/**
 * Simple Likes
 */
if( get_theme_mod('single-like-on', true) == true ) {
	require trailingslashit( get_template_directory() ) . 'inc/post-like.php';
}

