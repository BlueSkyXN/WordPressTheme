<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zazhi-1
 */

get_header(); 

if ( function_exists( 'zazhi_1_set_post_views' ) ) :
	zazhi_1_set_post_views(get_the_ID());
endif;
?>

	<div id="primary" class="content-area">

		<?php if ( get_theme_mod('single-breadcrumbs-on', true) ) : ?>

		<div class="breadcrumbs">
			<span class="breadcrumbs-nav">
				<span class="here"><?php esc_html_e('您所在的位置', 'zazhi-1'); ?></span>
				<a href="<?php echo home_url(); ?>"><?php esc_html_e('首页', 'zazhi-1'); ?></a>
				<span class="post-category"><?php zazhi_1_first_category(); ?></span>
			</span>
		</div>
		
		<?php endif; ?>

		<main id="main" class="site-main" >

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( get_theme_mod('close-comments-on', false) == false ) {
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
