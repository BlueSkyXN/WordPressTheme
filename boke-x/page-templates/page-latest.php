<?php

/**
 * Template Name: 最新文章 (按目录分类)
 *
 * The template for displaying all latest posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package boke-x
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="mini-page">

<div class="mini-header">
        <div class="mini-branding">

            <?php if (has_custom_logo()) { ?>

                <div id="logo">
                    <span class="helper"></span>
                    <?php the_custom_logo(); ?>
                </div><!-- #logo -->

            <?php } else { ?>

                <div class="site-title">
                    <h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
                </div><!-- .site-title -->

            <?php } ?>

        </div><!-- .site-branding -->       
</div>

<?php

    $args = array( 
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);   
    $q = array();

    while ( $query->have_posts() ) { 

        $query->the_post(); 

        $a = '<a target="_blank" href="'. get_permalink() .'">' . get_the_title() .'</a><em>' . get_the_date() .'</em>';

        $categories = get_the_category();

        foreach ( $categories as $key=>$category ) {

            $b = '<h4><span><a target="_blank" href="' . get_category_link( $category ) . '">' . $category->name . '</a><span></h4>';    

        }

        $q[$b][] = $a; // Create an array with the category names and post titles
    }

    /* Restore original Post Data */
    wp_reset_postdata();


    foreach ($q as $key=>$values) {
        echo $key;

        echo '<ul>';
            $i = 0;

            foreach ($values as $value){
                if($i < 10) {
                    echo '<li>' . $value . '</li>';
                }
                $i++;
            }
        echo '</ul>';
    }

?>

<div class="mini-footer">
    <?php if(get_theme_mod('footer-credit')) { 
        
        echo get_theme_mod('footer-credit');
        
        } else { 
            $author_uri = 'http://www.zhutibaba.com/';
    ?>

        &copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a> - <?php esc_html_e('主题巴巴原创', 'boke-x'); ?> <a href="<?php echo esc_url( $author_uri ); ?>" target="_blank">WordPress 主题</a>

    <?php } ?>    
</div>

</div><!-- .mini-page -->

<?php wp_footer(); ?>
</body>
</html>