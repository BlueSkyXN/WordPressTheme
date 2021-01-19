<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boke-x
 */


?>

<aside id="secondary" class="widget-area sidebar">
	<div class="sidebar__inner">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<?php if( is_single() && get_theme_mod('single-nav-on', true) == true ) : ?>

			<div id="post-nav" class="clear">
			    <?php $prevPost = get_previous_post(true);
			        if($prevPost) {
			            $args = array(
			                'posts_per_page' => 1,
			                'include' => $prevPost->ID
			            );
			            $prevPost = get_posts($args);
			            foreach ($prevPost as $post) {
			                setup_postdata($post);
			    ?>
			        <div class="post-previous">
			            <a class="previous" href="<?php the_permalink(); ?>">
			            	<span><i class="fa fa-angle-left"></i> 上一篇</span>
							<div class="thumbnail-wrap">
								<?php if( has_post_thumbnail() ) { ?>
									<?php 
										the_post_thumbnail('boke_x_widget_thumb'); 
									?>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=300&h=150" alt="<?php the_title(); ?>"/>
								<?php } ?>
							</div><!-- .thumbnail-wrap -->					            	
				            <h4><?php the_title(); ?></h4>
				            <small><?php the_date(); ?> <?php the_time('m:s'); ?></small>
				            <div class="gradient"></div>
				        </a>
			        </div>
			    <?php
			                wp_reset_postdata();
			            } //end foreach
			        } // end if
			         
			        $nextPost = get_next_post(true);
			        if($nextPost) {
			            $args = array(
			                'posts_per_page' => 1,
			                'include' => $nextPost->ID
			            );
			            $nextPost = get_posts($args);
			            foreach ($nextPost as $post) {
			                setup_postdata($post);
			    ?>
			        <div class="post-next">
			             <a class="next" href="<?php the_permalink(); ?>">
			            	<span>下一篇 <i class="fa fa-angle-right"></i></span>
							<div class="thumbnail-wrap">
								<?php if( has_post_thumbnail() ) { ?>
									<?php 
										the_post_thumbnail('boke_x_widget_thumb'); 
									?>
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=300&h=150" alt="<?php the_title(); ?>"/>
								<?php } ?>
							</div><!-- .thumbnail-wrap -->				            
				            <h4><?php the_title(); ?></h4>
				            <small><?php the_date(); ?> <?php the_time('m:s'); ?></small>
				            <div class="gradient"></div>
				        </a>
			        </div>
			    <?php
			                wp_reset_postdata();
			            } //end foreach
			        } // end if
			    ?>
			</div>		

		<?php endif; ?>

	</div><!-- .sidebar__inner -->
</aside><!-- #secondary -->
