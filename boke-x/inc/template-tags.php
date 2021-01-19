<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package boke-x
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'boke_x_get_post_views' ) ) :

function boke_x_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0<em>阅读</em>';
    }
    return '<i class="flaticon-eye"></i> ' . number_format($count) . '<em>阅读</em>';
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'boke_x_set_post_views' ) ) :

function boke_x_set_post_views($postID) {
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
if ( ! function_exists( 'boke_x_custom_excerpt_length' ) ) :

function boke_x_custom_excerpt_length( $length ) {
    return get_theme_mod('loop-excerpt-length', get_theme_mod('loop-excerpt-length', '55'));
}
add_filter( 'excerpt_length', 'boke_x_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'boke_x_excerpt_more' ) ) :

function boke_x_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'boke_x_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'boke_x_first_category' ) ) :
function boke_x_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . esc_url( get_category_link( absint($category[0]->term_id) ) ) . ' " >' . esc_html($category[0]->name).'</a> ';
    }   
}
endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'boke_x_search_filter' ) && ( ! is_admin() ) ) :

function boke_x_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','boke_x_search_filter');

endif;

/**
 * Add custom meta box.
 */
if ( ! function_exists( 'boke_x_add_custom_meta_box' ) ) :

function boke_x_add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "文章选项", "boke_x_custom_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "boke_x_add_custom_meta_box");

endif;
/**
 * Displaying fields in a custom meta box.
 */
if ( ! function_exists( 'boke_x_custom_meta_box_markup' ) ) :

function boke_x_custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <p>
            <label for="custom_title"><?php echo __('自定义文章标题', 'boke-x'); ?></label>
            <textarea name="custom_title" type="text" value="<?php echo get_post_meta($object->ID, "custom_title", true); ?>" style="width: 100%;"><?php echo get_post_meta($object->ID, "custom_title", true); ?></textarea>
            </p>
            <p>
            <label for="entry_source"><?php echo __('文章来源', 'boke-x'); ?></label>
            <input name="entry_source" type="text" value="<?php echo get_post_meta($object->ID, "entry_source", true); ?>" style="width: 100%;">
            </p>
            <p>
            <label for="single_credit"><?php echo __('文章来源详情', 'boke-x'); ?></label>
            <textarea name="single_credit" type="text" value="<?php echo get_post_meta($object->ID, "single_credit", true); ?>" style="width: 100%;"><?php echo get_post_meta($object->ID, "single_credit", true); ?></textarea>
            </p>            
        </div>
    <?php  
}

endif;

/**
 * Storing Meta Data.
 */
if ( ! function_exists( 'boke_x_save_custom_meta_box' ) ) :

function boke_x_save_custom_meta_box($post_id, $post, $update)
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
    $meta_box_textarea_value2 = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["custom_title"]))
    {
        $meta_box_textarea_value = $_POST["custom_title"];
    }   
    update_post_meta($post_id, "custom_title", $meta_box_textarea_value);

    if(isset($_POST["entry_source"]))
    {
        $meta_box_text_value = $_POST["entry_source"];
    }   
    update_post_meta($post_id, "entry_source", $meta_box_text_value);

    if(isset($_POST["single_credit"]))
    {
        $meta_box_textarea_value2 = $_POST["single_credit"];
    }   
    update_post_meta($post_id, "single_credit", $meta_box_textarea_value2);
}

add_action("save_post", "boke_x_save_custom_meta_box", 10, 3);

endif;

/**
 * Custom post title
 */
if ( ! function_exists( 'boke_x_custom_title' ) ) :
    function boke_x_custom_title() {
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
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'boke_x_categorized_blog' ) ) :

function boke_x_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'boke_x_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'boke_x_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so boke_x_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so boke_x_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in boke_x_categorized_blog.
 */
if ( ! function_exists( 'boke_x_category_transient_flusher' ) ) :

function boke_x_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'boke_x_categories' );
}
add_action( 'edit_category', 'boke_x_category_transient_flusher' );
add_action( 'save_post',     'boke_x_category_transient_flusher' );

endif;

/**
 * Add link to Admin Bar.
 */

if ( ! function_exists( 'boke_x_custom_toolbar_link' ) ) :

function boke_x_custom_toolbar_link($wp_admin_bar) {
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
add_action('admin_bar_menu', 'boke_x_custom_toolbar_link', 999);

endif;

/**
 * Disable WordPress admin bar.
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Custom Gallery.
 */
if ( ! function_exists( 'boke_x_custom_gallery' ) ) :

add_filter('post_gallery','boke_x_custom_gallery',10,2);

function boke_x_custom_gallery($string,$attr){

    $output = "<ul class=\"gallery-slider\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $image_desc = null;
        if ( ($imagePost->post_excerpt) != null ) {
            $image_desc = '<div class="image-desc">'. $imagePost->post_excerpt . '</div>';
        }
        $output .= "<li><img src='".wp_get_attachment_image_src($imagePost->ID, 'boke_x_single_thumb')[0]."' alt=\"\" />$image_desc</li>";
    }

    $output .= "</ul>";

    return $output;
}

endif;

/**
 * Check HTTPS.
 */
if ( ! function_exists( 'boke_x_check_https' ) ) :

function boke_x_check_https() {
    
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
        
        return true; 
    }
    return false;
}

endif;

/**
 * 24 Hours Post Count.
 */

if ( ! function_exists( 'boke_x_posts_count_from_last_24h' ) ) :

function boke_x_posts_count_from_last_24h($post_type ='post') {
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
if ( ! function_exists( 'boke_x_auto_thumbnail' ) ) :
function boke_x_auto_thumbnail($post) {
          
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
add_action('the_post', 'boke_x_auto_thumbnail');
 
// hooks added to set the thumbnail when publishing too
add_action('new_to_publish', 'boke_x_auto_thumbnail');
add_action('draft_to_publish', 'boke_x_auto_thumbnail');
add_action('pending_to_publish', 'boke_x_auto_thumbnail');
add_action('future_to_publish', 'boke_x_auto_thumbnail');

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

/*
 * Zhuanti 
 */
if ( ! function_exists( 'boke_x_zhuanti' ) ) :

function boke_x_zhuanti() { 

$string = '<div class="zhuanti-list clear">';
$catlist = get_terms( 'category' );

if ( ! empty( $catlist ) ) {

  foreach ( $catlist as $key => $item ) {

    if ( ! empty( z_taxonomy_image_url($item->term_id) ) ) {

        $string .= '<div class="zhuanti-block ht_grid_1_2"><a class="thumbnail-link" href='. get_term_link($item->term_id) .'><div class="thumbnail-wrap"><img src="' . get_template_directory_uri() . '/thumb.php?src='. z_taxonomy_image_url($item->term_id).'&w=600&h=340" alt="'.$item->name.'"/></div></a>';
        $string .= '<h3 class="zhuanti-title"><a href='. get_term_link($item->term_id) .'>'. $item->name . '</a></h3>' . '<div class="zhuanti-desc">'. wp_trim_words($item->description, '68') . '</div> ';

        $catquery = new WP_Query( 'cat='.$item->term_id.'&posts_per_page=5' ); 

        $string .= '<ul>';

        while($catquery->have_posts()) : $catquery->the_post(); 

            $string .= '<li><a href=' . get_permalink() . ' target="_blank">' . get_the_title().'</a></li>';

        endwhile;

         $string .= '</ul>';

        wp_reset_postdata();

        $string .= '</div>';

    } // End if z_taxonomy_image_url

  } //End foreach

} //End if catlist


$string .= '</div>';
 
return $string; 

}
add_shortcode('zhuanti', 'boke_x_zhuanti');

endif;

/*
 * Zhuanti 
 */
if ( ! function_exists( 'boke_x_zhuanti_list' ) ) :

function boke_x_zhuanti_list() { 

$string = '<div class="home-zhuanti-list clear">';
$catlist = get_terms( 'category' );

if ( ! empty( $catlist ) ) {

    $i = 1;

    foreach ( $catlist as $key => $item ) {

        if ( ( ! empty( z_taxonomy_image_url($item->term_id) ) ) && $i < 5) {

            $string .= '<div class="zhuanti-list-item ht_custom_grid_1_4"><a class="thumbnail-link" href='. get_term_link($item->term_id) .'><div class="thumbnail-wrap"><img src="' . get_template_directory_uri() . '/thumb.php?src='. z_taxonomy_image_url($item->term_id).'&w=600&h=380" alt="'.$item->name.'"/></div></a>';
            $string .= '<h3 class="zhuanti-title"><a href='. get_term_link($item->term_id) .'>'. $item->name . '</a></h3>';

            $string .= '</div>';

            $i++;

        } // End if z_taxonomy_image_url

    } //End foreach

} //End if catlist


$string .= '</div>';
 
return $string; 

}
add_shortcode('zhuanti_list', 'boke_x_zhuanti_list');

endif;