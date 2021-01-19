<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package tupian_1
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'tupian_1_get_post_views' ) ) :

function tupian_1_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '浏览<span class="view-count">(0)</span>';
    }
    return '浏览<span class="view-count">(' . number_format($count) . ')</span> ';
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'tupian_1_set_post_views' ) ) :

function tupian_1_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'tupian_1_search_filter' ) ) :

function tupian_1_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','tupian_1_search_filter');

endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'tupian_1_custom_excerpt_length' ) ) :

function tupian_1_custom_excerpt_length( $length ) {
    return get_theme_mod('entry-excerpt-length', '60');
}
add_filter( 'excerpt_length', 'tupian_1_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'tupian_1_excerpt_more' ) ) :

function tupian_1_excerpt_more( $more ) {
   return '... ';
}
add_filter( 'excerpt_more', 'tupian_1_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'tupian_1_first_category' ) ) :
function tupian_1_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'tupian-1' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'tupian_1_categorized_blog' ) ) :

function tupian_1_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'tupian_1_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'tupian_1_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so tupian_1_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so tupian_1_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in tupian_1_categorized_blog.
 */
if ( ! function_exists( 'tupian_1_category_transient_flusher' ) ) :

function tupian_1_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'tupian_1_categories' );
}
add_action( 'edit_category', 'tupian_1_category_transient_flusher' );
add_action( 'save_post',     'tupian_1_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
if ( ! function_exists( 'tupian_1_disable_specified_widgets' ) ) :

function tupian_1_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['header-ad']) ) {
        if ( is_array($sidebars_widgets['header-ad']) ) {
               foreach($sidebars_widgets['header-ad'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['header-ad'][$i]);
                    }
               }
        }     
    }

    if ( isset($sidebars_widgets['footer-ad']) ) {
        if ( is_array($sidebars_widgets['footer-ad']) ) {
               foreach($sidebars_widgets['footer-ad'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['footer-ad'][$i]);
                    }
               }
        }
    }

    if ( isset($sidebars_widgets['content-ad-1']) ) {
        if ( is_array($sidebars_widgets['content-ad-1']) ) {
               foreach($sidebars_widgets['content-ad-1'] as $i => $widget) {
                    if( (strpos($widget, 'happythemes-') === false) ) {
                       unset($sidebars_widgets['content-ad-1'][$i]);
                    }
               }
        }  
    }

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'tupian_1_disable_specified_widgets' );

endif;


/**
 * Preloader
 */
if ( ! function_exists( 'tupian_1_preloader' ) ) :

function tupian_1_preloader() {
    ?>

    <div class="loader-wrap">
  <div class="loader"></div>
</div>

    <?php
}
add_action('tupian_1_before_site', 'tupian_1_preloader');

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'tupian_1_custom_toolbar_link' ) ) :

function tupian_1_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'zhutibaba',
        'title' => '主题巴巴', 
        'href' => 'https://www.zhutibaba.com/', 
        'meta' => array(
            'class' => 'zhutibaba', 
            'title' => '原创WordPress主题',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'tupian_1_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
//add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'tupian_1_custom_gallery' ) ) :

add_filter('post_gallery','tupian_1_custom_gallery',10,2);

function tupian_1_custom_gallery($string,$attr){

    $output = "<div id=\"slider\" class=\"flexslider\"><ul class=\"slides\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul></div>";

    $output .= "<div id=\"carousel\" class=\"flexslider\"><ul class=\"slides\">";

        foreach($posts as $imagePost){
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'widget_thumb')[0]."' alt=\"\" /></li>";
    }

    $output .= "</ul></div>";

    return $output;
}

endif;


/**
 * Check HTTPS.
 */
if ( ! function_exists( 'tupian_1_check_https' ) ) :

function tupian_1_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * Auto Thumbnail
 */
if ( ! function_exists( 'tupian_1_auto_thumbnail' ) ) :
function tupian_1_auto_thumbnail($post) {
          
    $already_has_thumb = has_post_thumbnail();
    $post_type = get_post_type( $post->ID );    
    $exclude_types = array('');
    $exclude_types = apply_filters( 'eat_exclude_types', $exclude_types );

    // do nothing if the post has already a featured image set
    if ( $already_has_thumb ) {
        return;
    }

    // do the job if the post is not from an excluded type                     
    if ( ! in_array( $post_type, $exclude_types ) )  {

        // get first attached image
        $attached_image = get_children( "order=ASC&post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

        if ( $attached_image ) {

            $attachment_values = array_values( $attached_image );
            // add attachment ID                                            
            add_post_meta( $post->ID, '_thumbnail_id', $attachment_values[0]->ID, true );                                 
                            
        }
                           
                         
    }

}

// set featured image before post is displayed (for old posts)
add_action('the_post', 'tupian_1_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'tupian_1_auto_thumbnail');
add_action('draft_to_publish', 'tupian_1_auto_thumbnail');
add_action('pending_to_publish', 'tupian_1_auto_thumbnail');
add_action('future_to_publish', 'tupian_1_auto_thumbnail');

endif;

/*
 * First Image 
 */
if ( ! function_exists( 'catch_that_image' ) ) :

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    
    for ( $i = 0; $i <= sizeof($matches[0])-1; $i++){
        $first_img = $matches[1][0];
    }

    if(empty($first_img)) {
        $first_img = get_template_directory_uri() . '/assets/img/default.png';
    }
    return $first_img;
}

endif;

/**
 * WP Post Views Compatible.
 */
if ( ! function_exists( 'tupian_1_wp_post_views' ) ) :
function tupian_1_wp_post_views() {
    global $post;

    if( function_exists('the_views') ) {
        $views = $post->views ? $post->views : 0;
    }
    return $views . ' 浏览';
}
endif;


/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'tupian_1_custom_toolbar_link' ) ) :

function tupian_1_custom_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'zhutibaba',
        'title' => '主题巴巴', 
        'href' => 'https://www.zhutibaba.com/', 
        'meta' => array(
            'class' => 'zhutibaba', 
            'title' => '原创WordPress主题',
            'target'=> '_blank',
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'tupian_1_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Preloader
 */
function tupian_1_preloader() {
    ?>
<div class='preloader-wrap'>
  <div class='preloader'>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
  </div>
</div>

    <?php
}
add_action('tupian_1_before_site', 'tupian_1_preloader');
