<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package m-site
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'm_site_get_post_views' ) ) :

function m_site_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '阅读<span class="view-count">0</span>';
    }
    return __('阅读', 'm-site') . '<span class="view-count">' . number_format($count) . '</span> ';
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'm_site_set_post_views' ) ) :

function m_site_set_post_views($postID) {
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
 * Customize excerpt more.
 */
if ( ! function_exists( 'm_site_excerpt_more' ) ) :

function m_site_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'm_site_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'm_site_first_category' ) ) :
function m_site_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . esc_url( get_category_link( absint($category[0]->term_id) ) ) . ' " >' . esc_html($category[0]->name).'</a> ';
    }   
}
endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'm_site_search_filter' ) && ( ! is_admin() ) ) :

function m_site_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','m_site_search_filter');

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'm_site_categorized_blog' ) ) :

function m_site_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'm_site_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'm_site_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so m_site_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so m_site_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in m_site_categorized_blog.
 */
if ( ! function_exists( 'm_site_category_transient_flusher' ) ) :

function m_site_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'm_site_categories' );
}
add_action( 'edit_category', 'm_site_category_transient_flusher' );
add_action( 'save_post',     'm_site_category_transient_flusher' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'm_site_custom_toolbar_link' ) ) :

function m_site_custom_toolbar_link($wp_admin_bar) {
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
add_action('admin_bar_menu', 'm_site_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'm_site_custom_gallery' ) ) :

add_filter('post_gallery','m_site_custom_gallery',10,2);

function m_site_custom_gallery($string,$attr){

    $output = "<ul class=\"gallery-slider\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'm_site_single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul>";

    return $output;
}

endif;

/**
 * Check HTTPS.
 */
if ( ! function_exists( 'm_site_check_https' ) ) :

function m_site_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * 24 Hours Post Count.
 */

if ( ! function_exists( 'm_site_posts_count_from_last_24h' ) ) :

function m_site_posts_count_from_last_24h($post_type ='post') {
    global $wpdb;

    $numposts = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(ID) ".
            "FROM {$wpdb->posts} ".
            "WHERE ".
                "post_status='publish' ".
                "AND post_type= %s ".
                "AND post_date> %s",
            $post_type, date('Y-m-d H:i:s', strtotime('-24 hours'))
        )
    );
    return $numposts;
}

endif;

/**
 * Auto Thumbnail
 */
if ( ! function_exists( 'm_site_auto_thumbnail' ) ) :
function m_site_auto_thumbnail($post) {
          
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
add_action('the_post', 'm_site_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'm_site_auto_thumbnail');
add_action('draft_to_publish', 'm_site_auto_thumbnail');
add_action('pending_to_publish', 'm_site_auto_thumbnail');
add_action('future_to_publish', 'm_site_auto_thumbnail');

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