<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zimeiti-1
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'zimeiti_1_get_post_views' ) ) :

function zimeiti_1_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> 浏览';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('浏览', 'zimeiti-1');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'zimeiti_1_set_post_views' ) ) :

function zimeiti_1_set_post_views($postID) {
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
 * Filter the except length to 100 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'zimeiti_1_custom_excerpt_length' ) ) :

function zimeiti_1_custom_excerpt_length( $length ) {
    return get_theme_mod('loop-excerpt-length', get_theme_mod('loop-excerpt-length', '55'));
}
add_filter( 'excerpt_length', 'zimeiti_1_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'zimeiti_1_excerpt_more' ) ) :

function zimeiti_1_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'zimeiti_1_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'zimeiti_1_first_category' ) ) :
function zimeiti_1_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . esc_url( get_category_link( absint($category[0]->term_id) ) ) . ' " >' . esc_html($category[0]->name).'</a> ';
    }   
}
endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'zimeiti_1_search_filter' ) && ( ! is_admin() ) ) :

function zimeiti_1_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','zimeiti_1_search_filter');

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'zimeiti_1_categorized_blog' ) ) :

function zimeiti_1_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'zimeiti_1_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'zimeiti_1_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so zimeiti_1_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so zimeiti_1_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in zimeiti_1_categorized_blog.
 */
if ( ! function_exists( 'zimeiti_1_category_transient_flusher' ) ) :

function zimeiti_1_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'zimeiti_1_categories' );
}
add_action( 'edit_category', 'zimeiti_1_category_transient_flusher' );
add_action( 'save_post',     'zimeiti_1_category_transient_flusher' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'zimeiti_1_custom_toolbar_link' ) ) :

function zimeiti_1_custom_toolbar_link($wp_admin_bar) {
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
add_action('admin_bar_menu', 'zimeiti_1_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'zimeiti_1_custom_gallery' ) ) :

add_filter('post_gallery','zimeiti_1_custom_gallery',10,2);

function zimeiti_1_custom_gallery($string,$attr){

    $output = "<ul class=\"gallery-slider\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'zimeiti_1_single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul>";

    return $output;
}

endif;

/**
 * Check HTTPS.
 */
if ( ! function_exists( 'zimeiti_1_check_https' ) ) :

function zimeiti_1_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * WP Post Views Compatible.
 */
if ( ! function_exists( 'zimeiti_1_wp_post_views' ) ) :
function zimeiti_1_wp_post_views() {
    global $post;

    if( function_exists('the_views') ) {
        $views = $post->views ? $post->views : 0;
    }
    return $views . ' 浏览';
}
endif;


/**
 * Auto Thumbnail
 */
if ( ! function_exists( 'zimeiti_1_auto_thumbnail' ) ) :
function zimeiti_1_auto_thumbnail($post) {
          
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
add_action('the_post', 'zimeiti_1_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'zimeiti_1_auto_thumbnail');
add_action('draft_to_publish', 'zimeiti_1_auto_thumbnail');
add_action('pending_to_publish', 'zimeiti_1_auto_thumbnail');
add_action('future_to_publish', 'zimeiti_1_auto_thumbnail');

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