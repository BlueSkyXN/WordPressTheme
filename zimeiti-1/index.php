<?php get_header(); ?>

	<div id="primary" class="content-area clear">	

		<?php if( get_theme_mod('home-layout', 'choice-1') == 'choice-1' ) : ?>

			<?php get_template_part('sidebar', '2'); ?>

		<?php endif; ?>

		<div class="right-col">

			<?php
				if( get_theme_mod('featured-content-on', true) == true ) :
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

					<?php
					/* Start the Loop */
					while ( $wp_query->have_posts() ) : $wp_query->the_post();

						get_template_part('template-parts/content', 'list');

						if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
							dynamic_sidebar( 'content-ad' );
						}

						$i++;	
					endwhile;
										
					?>

				</div><!-- #recent-content -->		

			</main><!-- .site-main -->

			<?php
				if( $i > get_option( 'posts_per_page' ) ) {
					get_template_part( 'template-parts/pagination', '' ); 
				} else {
			?>
				<style type="text/css">
					.content-list .hentry.last {
						border-bottom: none;
					}
				</style>
			<?php
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
		
		</div><!-- .right-col -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
