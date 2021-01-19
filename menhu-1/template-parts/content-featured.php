<?php 

	$sticky = get_option( 'sticky_posts' );

	$i = 1;

	if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) && (get_theme_mod('home-featured-on', 'true') == true )) {	

?>

<div id="featured-content">

	<div class="featured-slider">

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

		<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">			
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('featured_large_thumb');
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=384&h=230" alt="<?php the_title(); ?>"/>
				<?php } ?>				
			</div><!-- .thumbnail-wrap -->
		</a>

		<div class="entry-header">				
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php menhu_1_home_post_title(); ?></a></h2>				
		</div><!-- .entry-header -->	
			
	</li><!-- .featured-large -->			
	

	<?php
		endwhile;
		wp_reset_query();
		wp_reset_postdata();	
	?>

	</ul><!-- .bxslider -->

	</div><!-- .featured-slider -->

	<div class="featured-grid">
	<?php		

		$custom_query_args = array( 
		    'post__in' => get_option( 'sticky_posts' ),
		    'posts_per_page' => get_theme_mod('featured-num', '4'),
		    'ignore_sticky_posts' => 1,
		    'offset' => get_theme_mod('featured-slide-num', '3')
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

		query_posts( $merged_query_args );						
		// The Loop
		while ( $wp_query->have_posts() ) : $wp_query->the_post();

	?>	

	<div class="featured-small hentry <?php echo( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : ''; ?>">

		<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">		
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('featured_small_thumb');
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=187&h=112" alt="<?php the_title(); ?>"/>
				<?php } ?>				
			</div><!-- .thumbnail-wrap -->
		</a>

		<div class="entry-header">		
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php menhu_1_home_post_title(); ?></a></h2>		
		</div><!-- .entry-header -->	

	</div><!-- .featured-small -->

	<?php 
		endwhile;
		wp_reset_query();
		wp_reset_postdata();						
	?>

	</div><!-- .featured-grid -->

</div><!-- #featured-content -->

<?php } ?>
