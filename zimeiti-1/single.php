<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zimeiti-1
 */

get_header(); 

if ( function_exists( 'zimeiti_1_set_post_views' ) ) :
	zimeiti_1_set_post_views(get_the_ID());
endif;
?>	
	<div id="primary" class="content-area">

		<?php if( get_theme_mod('single-layout', 'choice-1') == 'choice-1' ) : ?>

			<?php get_template_part('sidebar', '2'); ?>

		<?php endif; ?>

		<div class="right-col">

			<main id="main" class="site-main" >

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				// the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->

		</div><!-- .right-col -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
