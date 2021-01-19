<?php
/**
 * revenue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package boke-x
 */

if ( ! function_exists( 'boke_x_setup' ) ) :

function boke_x_setup() {

	load_theme_textdomain( 'boke-x', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( '顶部导航菜单', 'boke-x' ),
		'posts' => esc_html__( '首页文章列表导航菜单', 'boke-x' ),		
		'footer' => esc_html__( '底部导航菜单', 'boke-x' ),
		'friend' => esc_html__( '友情链接', 'boke-x' ),						
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
	add_theme_support( 'custom-background', apply_filters( 'boke_x_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'boke_x_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boke_x_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'boke_x_content_width', 760 );
}
add_action( 'after_setup_theme', 'boke_x_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boke_x_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( '右侧边栏', 'boke-x' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( '在此处添加小工具', 'boke-x' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '合作伙伴', 'boke-x' ),
		'id'            => 'footer-partners',
		'description'   => esc_html__( '在此处添加"图像"小工具', 'boke-x' ),
		'before_widget' => '<div id="%1$s" class="partner-image %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );		

	register_sidebar( array(
		'name'          => esc_html__( '文章列表广告', 'boke-x' ),
		'id'            => 'content-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具， 将在文章列表显示。', 'boke-x' ),
		'before_widget' => '<div id="%1$s" class="content-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '文章内容顶部广告', 'boke-x' ),
		'id'            => 'single-top-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具', 'boke-x' ),
		'before_widget' => '<div id="%1$s" class="single-top-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '文章内容底部广告', 'boke-x' ),
		'id'            => 'single-bottom-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具', 'boke-x' ),
		'before_widget' => '<div id="%1$s" class="single-bottom-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );		

}
add_action( 'widgets_init', 'boke_x_sidebar_init' );

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
function boke_x_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

    //  Enqueues Javascripts
    wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array(), '', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',array(), '', true ); 
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	
	//if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) {	
	//	wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array(), '', true ); 
	//}

	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array(), '', true ); 

   // wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/assets/js/jquery.sticky-sidebar.min.js', array(), '', true );
	                              
    wp_enqueue_script( 'boke-x-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20181002', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'boke-x-style', get_stylesheet_uri(), array(), '20181002' );     
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons/genericons.css' );
    wp_enqueue_style( 'flaticon-style',   get_template_directory_uri() . '/assets/css/flaticon.css', array(), '20181002'  );

    if( get_theme_mod('site-layout', 'choice-1') == 'choice-1' ) {	
    	wp_enqueue_style( 'boke-x-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20181002' ); 
	}

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'boke_x_scripts' );

/* Admin CSS Style */
function boke_x_admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'boke_x_admin_style');


/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 300, 189, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'boke_x_featured_large_thumb', 640, 350, true ); 
    add_image_size( 'boke_x_featured_small_thumb', 190, 110, true );  
    add_image_size( 'boke_x_list_thumb', 243, 156, true );
    add_image_size( 'boke_x_widget_thumb', 300, 150, true );    
    add_image_size( 'boke_x_single_thumb', 780, 460, true ); 
}

/**
 * Registers custom widgets.
 */
function boke_x_widgets_init() {										
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'boke_x_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'boke_x_Recent_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'boke_x_Random_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'boke_x_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ad.php';
	register_widget( 'boke_x_Ad_Widget' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-home-block-two.php';
	register_widget( 'boke_x_Block_Two_Widget' );		
}
add_action( 'widgets_init', 'boke_x_widgets_init' );

/**
 * Simple Likes
 */
require trailingslashit( get_template_directory() ) . 'inc/post-like.php';

/**
 * No Category Base
 */
if (get_theme_mod('no-category-base-on', false) == true) {
	require trailingslashit( get_template_directory() ) . 'inc/no-category-base.php';
}
/**
 * Categories Images
 */
require trailingslashit( get_template_directory() ) . 'inc/categories-images.php';