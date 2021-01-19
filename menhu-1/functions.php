<?php
/**
 * newsnow_pro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package menhu-1
 */

if ( ! function_exists( 'menhu_1_setup' ) ) :

function menhu_1_setup() {

	load_theme_textdomain( 'menhu-1', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( '顶部菜单', 'menhu-1' ),
		'secondary' => esc_html__( '主菜单', 'menhu-1' ),		
		'footer' => esc_html__( '底部菜单', 'menhu-1' ),	
		'friend' => esc_html__( '友情链接', 'menhu-1' ),		
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
	add_theme_support( 'custom-background', apply_filters( 'menhu_1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'menhu_1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function menhu_1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'menhu_1_content_width', 760 );
}
add_action( 'after_setup_theme', 'menhu_1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function menhu_1_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( '右侧边栏（通用）', 'menhu-1' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( '在此添加小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '右侧边栏（首页）', 'menhu-1' ),
		'id'            => 'homepage-sidebar',
		'description'   => esc_html__( '在此添加小工具（可选）。如果此处无小工具，则首页将显示“右侧边栏（通用）”的小工具。', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '首页内容（栏目）', 'menhu-1' ),
		'id'            => 'homepage',
		'description'   => esc_html__( '仅限添加“首页内容 - 1/2个栏目”和“广告”小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '网站底部 1', 'menhu-1' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( '在此添加小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '网站底部 2', 'menhu-1' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( '在此添加小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '网站底部 3', 'menhu-1' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( '在此添加小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '网站底部 4', 'menhu-1' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( '在此添加小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '合作伙伴', 'menhu-1' ),
		'id'            => 'footer-partners',
		'description'   => esc_html__( '在此处添加"图像"小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="partner-image %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );		

	register_sidebar( array(
		'name'          => esc_html__( '网站顶部通栏广告', 'menhu-1' ),
		'id'            => 'header-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="widget container header-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '文章列表广告', 'menhu-1' ),
		'id'            => 'content-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具， 将在文章列表显示。', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="content-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '文章内容顶部广告', 'menhu-1' ),
		'id'            => 'single-top-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="single-top-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( '文章评论框顶部广告', 'menhu-1' ),
		'id'            => 'single-bottom-ad',
		'description'   => esc_html__( '在此处添加"广告"小工具', 'menhu-1' ),
		'before_widget' => '<div id="%1$s" class="single-bottom-ad %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );			

}
add_action( 'widgets_init', 'menhu_1_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
function menhu_1_scripts() {

    // load jquery if it isn't

    //wp_enqueue_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );

	//  Enqueues Javascripts
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js',array(), '', true ); 
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js', array(), '', true );

	if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) {	
		wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array(), '', true ); 
	}
	          	
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180901', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'menhu-1-style', get_stylesheet_uri(), array(), '20181002' );     
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons.css' );

    if ( get_theme_mod( 'site-layout', 'choice-1' ) == 'choice-1' ) {
    	wp_enqueue_style( 'responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20181002' ); 
	}
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'menhu_1_scripts' );

/* Admin CSS Style */
function menhu_1_admin_style() {
	wp_enqueue_style('admin-style', get_template_directory_uri().'/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'menhu_1_admin_style');

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    //set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'featured_large_thumb', 384, 230, true );
    add_image_size( 'featured_small_thumb', 187, 112, true );
    add_image_size( 'block_large_thumb', 187, 112, true );
    add_image_size( 'post_thumb', 300, 180, true );
    add_image_size( 'single_thumb', 790, 474, true ); 
    add_image_size( 'widget_thumb', 300, 150, true );                           
}

/**
 * Registers custom widgets.
 */
function menhu_1_widgets_init() {

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'menhu_1_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'menhu_1_Recent_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'menhu_1_Random_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'menhu_1_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ad.php';
	register_widget( 'menhu_1_Ad_Widget' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-home-block-one.php';
	register_widget( 'menhu_1_Block_One_Widget' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-home-block-one-b.php';
	register_widget( 'menhu_1_Block_One_B_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-home-block-two.php';
	register_widget( 'menhu_1_Block_Two_Widget' );		
								
}
add_action( 'widgets_init', 'menhu_1_widgets_init' );

/* Fix PHP warning */
function _get($str){
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}

/**
 * Simple Likes
 */
if( get_theme_mod('single-like-on', true) == true ) {
	require trailingslashit( get_template_directory() ) . 'inc/post-like.php';
}


