<?php get_header(); ?>

	<div id="primary" class="content-area layout-1c clear">	

		<main id="main" class="site-main clear">

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
