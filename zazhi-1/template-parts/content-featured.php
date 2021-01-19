<?php 

	$sticky = get_option( 'sticky_posts' );

	$i = 1;

	if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) && (get_theme_mod('home-featured-on', 'true') == true )) {	

?>

<div id="featured-content" class="container clear">

	<?php		

		$custom_query_args = array( 
		    'post__in' => get_option( 'sticky_posts' ),
		    'posts_per_page' => get_theme_mod('featured-num', '5'),
		    'ignore_sticky_posts' => 1
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

		query_posts( $merged_query_args );						
		// The Loop
		while ( $wp_query->have_posts() ) : $wp_query->the_post();

	?>	

	<?php if ($i == 1) { ?>

	<div class="featured-large hentry">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">			
				<div class="thumbnail-wrap">
					<?php if( has_post_thumbnail() ) { ?>
						<?php 
							the_post_thumbnail('featured_large_thumb');
						?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=660&h=440" alt="<?php the_title(); ?>"/>
					<?php } ?>				
				</div><!-- .thumbnail-wrap -->
			</a>

			<div class="entry-header">				
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>				
			</div><!-- .entry-header -->	
			
			<?php if(get_theme_mod('featured-heading-on', true) == true) : ?>
				<div class="ribbon"><span><?php echo get_theme_mod('featured-heading-text', '置顶文章'); ?></span></div>
			<?php endif; ?>
	</div><!-- .featured-large -->			

	<?php } else { ?>

	<div class="featured-small hentry <?php echo( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : ''; ?>">

		<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">		
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('featured_small_thumb');
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=266&h=218" alt="<?php the_title(); ?>"/>
				<?php } ?>				
			</div><!-- .thumbnail-wrap -->
			<span class="gradient"></span>
		</a>			

		<div class="entry-header">		
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
		</div><!-- .entry-header -->	

	</div><!-- .featured-small -->

	<?php

		}
		$i++;
		endwhile;
	?>

	<?php
		wp_reset_query();
		wp_reset_postdata();						
	?>

</div><!-- #featured-content -->

<?php } ?>

<div class="clear"></div>
