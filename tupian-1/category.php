<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tupian_1
 */

get_header(); ?>

	<div id="primary" class="content-area layout-1c clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">
			<h1>
				<?php single_cat_title(''); ?>
			</h1>	
		</div><!-- .breadcrumbs -->

		<div id="recent-content" class="content-loop">

			<?php

				if ( have_posts() ) :	
				
				$i = 0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();								

					get_template_part('template-parts/content', 'loop');

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
