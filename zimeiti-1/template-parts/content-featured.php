<?php		

	$sticky = get_option( 'sticky_posts' );

	$i = 1;

	if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) ) {	

?>

<div id="featured-content" class="clear">
	
	<div class="featured-left">

		<ul class="bxslider">	

		<?php
			$custom_query_args = array( 
			    'post__in' => get_option( 'sticky_posts' ),
			    'posts_per_page' => get_theme_mod('featured-slide-num', '3'),
			    'ignore_sticky_posts' => 1
			);  

			global $wp_query;

			$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

			query_posts( $merged_query_args );						
			// The Loop
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
		?>	

		<li class="featured-slide hentry">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php if( has_post_thumbnail() ) { ?>
						<?php 
							the_post_thumbnail('zimeiti_1_featured_large_thumb');
						?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=574&h=321" alt="<?php the_title(); ?>"/>
					<?php } ?>						
				</div><!-- .thumbnail-wrap -->
				<div class="gradient"></div>
			</a>

			<div class="entry-header clear">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .entry-header -->

		</li><!-- .featured-slide .hentry -->

		<?php
			$i++;
			endwhile;
			wp_reset_query();
			wp_reset_postdata();	
		?>

		</ul><!-- .bxslider -->
	
		<div class="ribbon"><span><?php echo get_theme_mod('featured-heading-text', '置顶文章'); ?></span></div>

	</div><!-- .featured-left -->

	<div class="featured-right">
		<?php
			$custom_query_args = array( 
			    'post__in' => get_option( 'sticky_posts' ),
			    'posts_per_page' => 2,
			    'ignore_sticky_posts' => 1,
			    'offset' => get_theme_mod('featured-slide-num', '3')
			);  

			global $wp_query;

			$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

			query_posts( $merged_query_args );

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : '';

		?>	
		<div class="featured-small <?php echo $class; ?>">
			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				<div class="thumbnail-wrap">
					<?php if( has_post_thumbnail() ) { ?>
						<?php 
							the_post_thumbnail('zimeiti_1_featured_small_thumb');
						?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=281&h=158" alt="<?php the_title(); ?>"/>
					<?php } ?>	
				</div><!-- .thumbnail-wrap -->
				<div class="gradient"></div>
				<div class="entry-header clear">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</div><!-- .entry-header -->								
			</a>
		</div><!-- .featured-small -->
		<?php
			$i++;
			endwhile;
			wp_reset_query();
			wp_reset_postdata();								
		?>												
	</div><!-- .featured-right -->
	
</div><!-- #featured-content -->

<?php
	} //end if has featured posts			
?>