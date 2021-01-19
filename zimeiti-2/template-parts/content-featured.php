<?php		

	$sticky = get_option( 'sticky_posts' );

	$i = 1;

	if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) ) {	

?>

<div id="featured-slider" class="clear">

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
				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('zimeiti_2_featured_large_thumb');  
					} else {	
				?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=800&h=400" alt="<?php the_title(); ?>"/>
				<?php
					}
				?>
			</div><!-- .thumbnail-wrap -->
			<div class="gradient"></div>				
		</a>

		<?php if( get_theme_mod('single-category-on', true) == true ) : ?>

			<span class="entry-category">
				<?php zimeiti_2_first_category(); ?>
			</span><!-- .entry-category -->

		<?php endif; ?>

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
		
</div><!-- #featured-slider -->


<?php
	$custom_query_args = array( 
	    'post__in' => get_option( 'sticky_posts' ),
	    'posts_per_page' => get_theme_mod('featured-grid-num', '3'),
	    'ignore_sticky_posts' => 1,
	    'offset' => get_theme_mod('featured-slide-num', '3')
	);  

	global $wp_query;

	$merged_query_args = array_merge( $wp_query->query, $custom_query_args );

	query_posts( $merged_query_args );	

	if( $wp_query->have_posts() ) :
	// The Loop
?>	

<div id="featured-grid" class="clear">

		<ul class="clear">	

		<?php
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
		?>	

		<li class="featured-post hentry ht_grid_1_3">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('zimeiti_2_list_thumb');  
					} else {
					?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=280&h=180" alt="<?php the_title(); ?>"/>				
					<?php 
						}
					?>
				</div><!-- .thumbnail-wrap -->
			</a>

			<div class="entry-header">			
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta">

					<?php
						if( get_theme_mod('loop-like-on', true) == true ) :
					?>
							<span class="entry-like">
								<?php echo get_simple_likes_button( get_the_ID() ); ?>
							</span><!-- .entry-like -->

					<?php endif; ?>

					<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
						<span class="entry-views"><?php echo zimeiti_2_get_post_views(get_the_ID()); ?></span>
					<?php endif; ?>
						
				</div><!-- .entry-meta -->				
			</div><!-- .entry-header -->

		</li><!-- .featured-slide .hentry -->

		<?php
			$i++;
			endwhile;
		?>

		</ul><!-- .featured-grid -->
	
		<div class="ribbon"><span><?php echo get_theme_mod('featured-heading-text', '编辑推荐'); ?></span></div>
	
</div><!-- #featured-grid -->

<?php 
		endif;
		wp_reset_query();
		wp_reset_postdata();	
?>

<?php
	} //end if has featured posts			
?>