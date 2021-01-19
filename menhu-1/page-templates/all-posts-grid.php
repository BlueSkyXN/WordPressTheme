<?php
/*
 * Template Name: 最新文章 (图片模式)
 *
 * The template for displaying all posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package menhu-1
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<div id="main" class="site-main clear">

			<div class="breadcrumbs clear">
				
				<h3>
					<?php
						the_title();
					?>					
				</h3>

			</div><!-- .section-header -->

			<div id="recent-content" class="content-grid clear">

				<?php

					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('paged='.$paged);

					if ( $wp_query->have_posts() ) :

					$i = 1;

					echo "<div class=\"posts-loop clear\">";

					while ($wp_query->have_posts()) : $wp_query->the_post();
					
						get_template_part('template-parts/content', 'grid');
					
						$i++;

					endwhile;
					
					echo "</div><!-- .post-loop -->";

					get_template_part( 'template-parts/pagination', '' ); 

					else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php 
				endif;
			?>

			</div><!-- #recent-content -->
			
		</div><!-- #main -->

		<?php $wp_query = null; $wp_query = $temp;?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
