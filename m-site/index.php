<?php get_header(); ?>

	<div id="primary" class="content-area clear">	

		<?php
			if( get_theme_mod('home-featured-on', true) == true ) :
				get_template_part('template-parts/content', 'featured');
			endif;
		?>
		
		<?php
			// Define custom query args
			$custom_query_args = array( 
			    // exclude all sticky posts
			    'post__not_in' => get_option( 'sticky_posts' ) ,
			    // don't forget to paginate!
  				'paged' => get_query_var('paged')
			);  
			// globalize $wp_query
			global $wp_query;
			// Merge custom args with default query args
			$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
			// process the query
			query_posts( $merged_query_args );

			if ( $wp_query->have_posts() ) :	
			
			$i = 1;
		?>

		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-list">
			
				<h2 class="section-title">
					<span class="title"><?php echo get_theme_mod('posts-list-text', '最新发布'); ?></span> 
					<div class="posts-counter">

						<?php if( get_theme_mod('posts-counter-on', true) == true) : ?>						
							<span class="hours">今日更新<strong><?php echo m_site_posts_count_from_last_24h(); ?></strong>篇</span>
						<?php endif; ?>

						<?php if( get_theme_mod('list-categories-on', true) == true) : ?>						
							<span class="dropdown-icon">全部文章 <span class="genericon genericon-expand"></span></span>
						<?php endif; ?>

					</div><!-- .posts-counter -->
					<?php if( get_theme_mod('list-categories-on', true) == true) : ?>	
						<ul class="list-categories"> 
						    <?php wp_list_categories( array(
						        'orderby'            => 'id',
						        'title_li'           => ''
						    ) ); ?>
						</ul><!-- .list-categories -->
					<?php endif; ?>
				</h2><!-- .section-title -->

				<?php
				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part('template-parts/content', 'list');

				$i++;	
				endwhile;
									
				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php
			if( $i > get_option( 'posts_per_page' ) ) {
				get_template_part( 'template-parts/pagination', '' ); 
			} 
		?>

		<?php
			else :
		?>

		<main id="main" class="site-main clear">

			<?php
				get_template_part( 'template-parts/content', 'none' );
			?>

		</main><!-- .site-main (no-content) -->

		<?php
			endif; 
			wp_reset_query();
		?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
