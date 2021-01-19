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
				<h1>
					<span class="title"><?php single_cat_title(''); ?></span>
				</h1>	
			</div><!-- .breadcrumbs -->

			<?php
				$category_layout = "";

				if (( get_term_meta( get_queried_object_id(), '_is_img', true) ) ) {
				    $category_layout = 'grid';
				} else {
					$category_layout = 'list';
				}
			?>

			<div id="recent-content" class="content-<?php echo $category_layout; ?> clear">

				<?php

				if ( have_posts() ) :

					$i = 1;
												
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part('template-parts/content', $category_layout);

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
