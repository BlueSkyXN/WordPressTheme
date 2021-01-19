<?php

/**
 * Template Name: 最新文章 (100篇)
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
                        'posts_per_page' => 100
                    );
                    $temp = $wp_query;
                    $wp_query= null;
                    $wp_query = new WP_Query($args);
                    //$wp_query->query('paged='.$paged);

                    if ( $wp_query->have_posts() ) :

                    $i = 1;

                    echo "<ul>";

                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    
                        echo '<li><a target="_blank" href="'. get_permalink() .'">' . get_the_title() .'</a><em>' . get_the_date() .'</em></li>';

                        $i++;

                    endwhile;
                    
                    echo "</ul>";

                    if( $i > get_option( 'posts_per_page' ) ) :
                        get_template_part( 'template-parts/pagination', '' ); 
                    endif;

                    else :

                    get_template_part( 'template-parts/content', 'none' );

                ?>

            <?php 
                endif;
            ?>

        <?php $wp_query = null; $wp_query = $temp;?>

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