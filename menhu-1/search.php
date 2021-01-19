<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package menhu-1
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">
			<h3>
				<?php printf( esc_html__( '%s的搜索结果', 'menhu-1' ), '"' . get_search_query() . '"' ); ?>			
			</h3>	
		</div><!-- .breadcrumbs -->
			
		<div id="recent-content" class="content-loop">

			<?php

				if ( have_posts() ) :	
				
				$i = 1;

				/* Start the Loop */
				echo "<div class=\"posts-loop\">";

				while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'search' );
				
				$i++;
				
				endwhile;
				
				echo "</div><!-- .post-loop -->";

					get_template_part( 'template-parts/pagination', '' ); 

				else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

		</div>

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

