<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package menhu-1
 */


/**
 * Get Post Views.
 */
if ( ! function_exists( 'menhu_1_get_post_views' ) ) :

function menhu_1_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '阅读<span class="view-count">(0)</span>';
    }
    return __('阅读', 'menhu-1') . '<span class="view-count">(' . number_format($count) . ')</span> ';
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'menhu_1_set_post_views' ) ) :

function menhu_1_set_post_views($postID) {
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
if ( ! function_exists( 'menhu_1_search_filter' ) ) :

function menhu_1_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','menhu_1_search_filter');

endif;

/**
 * Add custom meta box.
 */
if ( ! function_exists( 'menhu_1_add_custom_meta_box' ) ) :

function menhu_1_add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "文章选项", "menhu_1_custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "menhu_1_add_custom_meta_box");

endif;
/**
 * Displaying fields in a custom meta box.
 */
if ( ! function_exists( 'menhu_1_custom_meta_box_markup' ) ) :

function menhu_1_custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <?php
                $checkbox_value = get_post_meta($object->ID, "is_featured", true);

                if($checkbox_value == "")
                {
                    ?>
                        <input name="is_featured" type="checkbox" value="true">
                    <?php
                }
                else if($checkbox_value == "true")
                {
                    ?>  
                        <input name="is_featured" type="checkbox" value="true" checked>
                    <?php
                }
            ?>
            <label for="is_featured" style="vertical-align:top;"><?php echo __('标记为热点文章', 'menhu-1'); ?> </label>

            <p><label for="custom_title"><?php echo __('首页自定义文章标题', 'fastvideo-pro'); ?></label>
            <textarea name="custom_title" type="text" value="<?php echo get_post_meta($object->ID, "custom_title", true); ?>" style="width: 100%;"><?php echo get_post_meta($object->ID, "custom_title", true); ?></textarea>
            </p>

        </div>
    <?php  
}

endif;

/**
 * Storing Meta Data.
 */
if ( ! function_exists( 'menhu_1_save_custom_meta_box' ) ) :

function menhu_1_save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_textarea_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["is_featured"]))
    {
        $meta_box_checkbox_value = $_POST["is_featured"];
    }   
    update_post_meta($post_id, "is_featured", $meta_box_checkbox_value);

    if(isset($_POST["custom_title"]))
    {
        $meta_box_textarea_value = $_POST["custom_title"];
    }   
    update_post_meta($post_id, "custom_title", $meta_box_textarea_value);

}

add_action("save_post", "menhu_1_save_custom_meta_box", 10, 3);

endif;

/**
 * Filter the except length to 100 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'zimeiti_1_custom_excerpt_length' ) ) :

function zimeiti_1_custom_excerpt_length( $length ) {
    return get_theme_mod('loop-excerpt-length', get_theme_mod('loop-excerpt-length', '90'));
}
add_filter( 'excerpt_length', 'zimeiti_1_custom_excerpt_length', 999 );

endif;

/**
 * Custom Excerpt
 */
if ( ! function_exists( 'menhu_1_custom_excerpt' ) ) :

function menhu_1_custom_excerpt($limit) {

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
if ( ! function_exists( 'menhu_1_excerpt_more' ) ) :

function menhu_1_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'menhu_1_excerpt_more' );

endif;

/**
 * Custom post title
 */
if ( ! function_exists( 'menhu_1_custom_title' ) ) :
    function menhu_1_custom_title() {
        global $post;
        $custom_title = get_post_meta($post->ID, 'custom_title', true); 
        if( empty($custom_title) ) {
            echo wp_trim_words( get_the_title(), get_theme_mod('home-words-num','30'), '...' ); 
        } else {
            echo $custom_title;
        }
    }
endif;
/**
 * Custom post title for posts with thumbnails on homepage
 */
if ( ! function_exists( 'menhu_1_home_post_title' ) ) :
    function menhu_1_home_post_title() {
        global $post;
        $custom_title = get_post_meta($post->ID, 'custom_title', true); 
        if( empty($custom_title) ) {
            echo get_the_title(); 
        } else {
            echo $custom_title;
        }
    }
endif;
/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'menhu_1_first_category' ) ) :
function menhu_1_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a target="_blank" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "浏览所有%s文章", 'menhu-1' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
    }    
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'menhu_1_categorized_blog' ) ) :

function menhu_1_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'menhu_1_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'menhu_1_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so menhu_1_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so menhu_1_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in menhu_1_categorized_blog.
 */
if ( ! function_exists( 'menhu_1_category_transient_flusher' ) ) :

function menhu_1_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'menhu_1_categories' );
}
add_action( 'edit_category', 'menhu_1_category_transient_flusher' );
add_action( 'save_post',     'menhu_1_category_transient_flusher' );

endif;

/**
 * Disable specified widgets.
 */
/**
 * Enqueues scripts and styles.
 */
if ( ! function_exists( 'menhu_1_disable_specified_widgets' ) ) :

function menhu_1_disable_specified_widgets( $sidebars_widgets ) {

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
add_filter( 'sidebars_widgets', 'menhu_1_disable_specified_widgets' );

endif;

/** 
 * Create a new page on theme activation.
 */
if (isset($_GET['activated']) && is_admin()){
    add_action('init', 'menhu_1_create_initial_pages');
}

if ( ! function_exists( 'menhu_1_create_initial_pages' ) ) :

function menhu_1_create_initial_pages() {

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
if ( ! function_exists( 'menhu_1_preloader' ) ) :

function menhu_1_preloader() {
    ?>

    <div class="loader-wrap">
  <div class="loader"></div>
</div>

    <?php
}
add_action('menhu_1_before_site', 'menhu_1_preloader');

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'menhu_1_custom_toolbar_link' ) ) :

function menhu_1_custom_toolbar_link($wp_admin_bar) {
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
add_action('admin_bar_menu', 'menhu_1_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
//add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'menhu_1_custom_gallery' ) ) :

add_filter('post_gallery','menhu_1_custom_gallery',10,2);

function menhu_1_custom_gallery($string,$attr){

    $output = "<div class=\"single_gallery\"><ul class=\"gallery-slider\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul></div>";

    return $output;
}

endif;

/**
 * Check HTTPS.
 */
if ( ! function_exists( 'menhu_1_check_https' ) ) :

function menhu_1_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * Auto Thumbnail
 */
if ( ! function_exists( 'menhu_1_auto_thumbnail' ) ) :
function menhu_1_auto_thumbnail($post) {
          
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
add_action('the_post', 'menhu_1_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'menhu_1_auto_thumbnail');
add_action('draft_to_publish', 'menhu_1_auto_thumbnail');
add_action('pending_to_publish', 'menhu_1_auto_thumbnail');
add_action('future_to_publish', 'menhu_1_auto_thumbnail');

endif;

/**
 * Category Layout
 */
add_action ( 'edit_category_form_fields', function( $tag ){
    $is_img = get_term_meta( $tag->term_id, '_is_img', true ); ?>

    <tr class='form-field'>
        <th scope='row'><label for='cat_page_title'><?php _e('文章列表样式', 'menhu-1'); ?></label></th>
        <td>
                
            <input class="checkbox" type="checkbox" name='is_img' id='is_img' <?php if (!empty($is_img)) { echo "checked"; }?> />
            <label for="is_img">图片模式</label>
            
        </td>
    </tr> <?php
});
add_action ( 'edited_category', function() {
    if ( isset( $_POST['is_img'] ) ) {
        update_term_meta( $_POST['tag_ID'], '_is_img', $_POST['is_img'] );
    } else {
        update_term_meta( $_POST['tag_ID'], '_is_img', null );
    }
});

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
        $random = mt_rand(1, 10);
        $first_img = get_template_directory_uri() . '/images/'.$random.'.jpg';
    }
    return $first_img;
}

endif;