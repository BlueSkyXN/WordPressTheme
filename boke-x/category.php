<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package boke-x
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main clear">

			<div class="breadcrumbs <?php if ( ! empty( z_taxonomy_image_url() ) ) { echo "is_zhuanti"; } else { echo "no_zhuanti"; } ?> clear">
				<?php
					if ( ! empty( z_taxonomy_image_url() ) ) {				
						echo '<div class="thumbnail"><img src="' . get_template_directory_uri() . '/thumb.php?src='. z_taxonomy_image_url().'&w=800&h=300" alt="'.get_the_archive_title().'"/></div>';
					}
				?>						
				<h1>
					<span class="title"><?php single_cat_title(''); ?></span>
				</h1>	
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>				
			</div><!-- .breadcrumbs -->

			<div id="recent-content" class="content-list">

				<?php

				if ( have_posts() ) :

					$i = 1;
												
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part('template-parts/content', 'list');
						
						if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
							dynamic_sidebar( 'content-ad' );
						}

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

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
