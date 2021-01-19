<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package zimeiti-2
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<div class="content-wrapper">

			<main id="main" class="site-main clear">

				<div class="breadcrumbs clear">
					<h1><span class="title"><?php the_archive_title(); ?></span></h1>
				</div><!-- .breadcrumbs -->
			
				<div id="recent-content" class="content-list">

					<?php

					if ( have_posts() ) :	
						$i = 1;							
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part('template-parts/content', 'list');

						$i++;

						endwhile;

						else :

						get_template_part( 'template-parts/content', 'none' );

					endif; 

					?>

				</div><!-- #recent-content -->

			</main><!-- .site-main -->

			<?php
				//if( $i > get_option( 'posts_per_page' ) ) {
					get_template_part( 'template-parts/pagination', '' ); 
				//} 
			?>

		</div><!-- .content-wrapper -->
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

