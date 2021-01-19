<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package zazhi-1
 */


/**
 * Get Post Views.
 */
if ( ! function_exists( 'zazhi_1_get_post_views' ) ) :

function zazhi_1_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<strong class="view-count">0</strong> 阅读';
    }
    return '<strong class="view-count">' . number_format($count) . '</strong> ' . __('阅读', 'zazhi-1');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'zazhi_1_set_post_views' ) ) :

function zazhi_1_set_post_views($postID) {
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
if ( ! function_exists( 'zazhi_1_search_filter' ) ) :

function zazhi_1_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','zazhi_1_search_filter');

endif;

/**
 * Custom Excerpt
 */
if ( ! function_exists( 'zazhi_1_custom_excerpt' ) ) :

function zazhi_1_custom_excerpt($limit) {

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {

    $excerpt = implode(" ",$excerpt);

    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'zazhi_1_excerpt_more' ) ) :

function zazhi_1_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'zazhi_1_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'zazhi_1_first_category' ) ) :
function zazhi_1_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "浏览所有%s文章", 'zazhi-1' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'zazhi_1_categorized_blog' ) ) :

function zazhi_1_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'zazhi_1_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'zazhi_1_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so zazhi_1_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so zazhi_1_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in zazhi_1_categorized_blog.
 */
if ( ! function_exists( 'zazhi_1_category_transient_flusher' ) ) :

function zazhi_1_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'zazhi_1_categories' );
}
add_action( 'edit_category', 'zazhi_1_category_transient_flusher' );
add_action( 'save_post',     'zazhi_1_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
/**
 * Enqueues scripts and styles.
 */
if ( ! function_exists( 'zazhi_1_disable_specified_widgets' ) ) :

function zazhi_1_disable_specified_widgets( $sidebars_widgets ) {

    if ( isset($sidebars_widgets['homepage']) ) {
        if ( is_home() && is_array($sidebars_widgets['homepage']) ) {
            foreach($sidebars_widgets['homepage'] as $i => $widget) {
                if( (strpos($widget, 'zhutibaba-') === false) ) {
                    unset($sidebars_widgets['homepage'][$i]);
                }
                if( (strpos($widget, 'zhutibaba-home-bottom-') !== false) ) {
                    unset($sidebars_widgets['homepage'][$i]);
                }                
            }
        }
    }

    if ( isset($sidebars_widgets['homepage-bottom']) ) {
        if ( is_home() && is_array($sidebars_widgets['homepage-bottom']) ) {
            foreach($sidebars_widgets['homepage-bottom'] as $i => $widget) {
                if( (strpos($widget, 'zhutibaba-home-bottom-') === false) ) {
                    unset($sidebars_widgets['homepage-bottom'][$i]);
                }
            }
        }
    }    

    if ( isset($sidebars_widgets['homepage-sidebar']) ) {
        if ( is_array($sidebars_widgets['homepage-sidebar']) ) {
            foreach($sidebars_widgets['homepage-sidebar'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['homepage-sidebar'][$i]);
                }
            }
        }   
    }

    if ( isset($sidebars_widgets['sidebar-1']) ) {
        if ( is_array($sidebars_widgets['sidebar-1']) ) {
            foreach($sidebars_widgets['sidebar-1'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['sidebar-1'][$i]);
                }
            }
        }    
    }

    if ( isset($sidebars_widgets['footer-1']) ) {
        if ( is_array($sidebars_widgets['footer-1']) ) {
            foreach($sidebars_widgets['footer-1'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['footer-1'][$i]);
                }
            }
        } 
    }

    if ( isset($sidebars_widgets['footer-2']) ) {
        if ( is_array($sidebars_widgets['footer-2']) ) {
            foreach($sidebars_widgets['footer-2'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['footer-2'][$i]);
                }
            }
        }   
    }

    if ( isset($sidebars_widgets['footer-3']) ) {
        if ( is_array($sidebars_widgets['footer-3']) ) {
            foreach($sidebars_widgets['footer-3'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['footer-3'][$i]);
                }
            }
        }   
    }

    if ( isset($sidebars_widgets['footer-4']) ) {
        if ( is_array($sidebars_widgets['footer-4']) ) {
            foreach($sidebars_widgets['footer-4'] as $i => $widget) {
                if(strpos($widget, 'zhutibaba-home-') !== false) {
                    unset($sidebars_widgets['footer-4'][$i]);
                }
            }
        }   
    }    

    return $sidebars_widgets;
}
add_filter( 'sidebars_widgets', 'zazhi_1_disable_specified_widgets' );

endif;

/** 
 * Create a new page on theme activation.
 */
if (isset($_GET['activated']) && is_admin()){
    add_action('init', 'zazhi_1_create_initial_pages');
}

if ( ! function_exists( 'zazhi_1_create_initial_pages' ) ) :

function zazhi_1_create_initial_pages() {

    $pages = array( 
         // Page Title and URL (a blank space will end up becomeing a dash "-")
    //   '所有分类目录' => array(
    //      // Page Content           // Template to use (if left blank the default template will be used)
    //     'Browse our latest videos by category' => 'page-templates/all-categories.php'),

        '最新文章' => array(
            '浏览所有最新文章' => 'page-templates/all-posts.php'),

    );

    foreach($pages as $page_url_title => $page_meta) {

        $id = get_page_by_title($page_url_title);

        foreach ($page_meta as $page_content=>$page_template){

            $page = array(
                'post_type'   => 'page',
                'post_title'  => $page_url_title,
                'post_name'   => 'latest',
                'post_status' => 'publish',
                'post_content' => $page_content,
                'post_author' => 1,
                'post_parent' => ''
            );

            if(!isset($id->ID)){
                $new_page_id = wp_insert_post($page);
                if(!empty($page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $page_template);
                }
            }
        }
    }
}

endif;

/**
 * Preloader
 */
if ( ! function_exists( 'zazhi_1_preloader' ) ) :

function zazhi_1_preloader() {
    ?>

    <div class="loader-wrap">
  <div class="loader"></div>
</div>

    <?php
}
add_action('zazhi_1_before_site', 'zazhi_1_preloader');

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'zazhi_1_custom_toolbar_link' ) ) :

function zazhi_1_custom_toolbar_link($wp_admin_bar) {
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
add_action('admin_bar_menu', 'zazhi_1_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
//add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'zazhi_1_custom_gallery' ) ) :

add_filter('post_gallery','zazhi_1_custom_gallery',10,2);

function zazhi_1_custom_gallery($string,$attr){

    $output = "<div class=\"single_gallery\"><ul class=\"gallery-slider\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'zazhi_1_single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul></div>";

    return $output;
}

endif;

/**
 * Check HTTPS.
 */
if ( ! function_exists( 'zazhi_1_check_https' ) ) :

function zazhi_1_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * Auto Thumbnail
 */
if ( ! function_exists( 'zazhi_1_auto_thumbnail' ) ) :
function zazhi_1_auto_thumbnail($post) {
          
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
add_action('the_post', 'zazhi_1_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'zazhi_1_auto_thumbnail');
add_action('draft_to_publish', 'zazhi_1_auto_thumbnail');
add_action('pending_to_publish', 'zazhi_1_auto_thumbnail');
add_action('future_to_publish', 'zazhi_1_auto_thumbnail');

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