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
				<?php single_cat_title(''); ?>
			</h3>	
		</div><!-- .breadcrumbs -->

		<?php
			$category_layout = "";

			if (( get_term_meta( get_queried_object_id(), '_is_img', true) ) ) {
			    $category_layout = 'grid';
			} else {
				$category_layout = 'loop';
			}
		?>

		<div id="recent-content" class="content-<?php echo $category_layout; ?> clear">

			<?php

			if ( have_posts() ) :	
				$i = 1;		
				
				echo "<div class=\"posts-loop clear\">";

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', $category_layout);

					if($category_layout == 'loop') {
						if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
							dynamic_sidebar( 'content-ad' );
						}
					}

					$i++;

				endwhile;
				
				echo "</div><!-- .post-loop -->";

				get_template_part( 'template-parts/pagination', '' ); 

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
