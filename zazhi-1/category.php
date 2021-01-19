<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package zazhi-1
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">
			<h3>
				<?php single_cat_title(''); ?>
			</h3>	
			<?php
				if (is_category()) {
				    $cat = get_query_var('cat');
				    $this_category = get_category($cat);
				    $this_category = wp_list_categories('hide_empty=1&hierarchical=true&orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID."&echo=0");
				    if($this_category)
				    {
				     echo '<ul class="sub-categories">'.$this_category.'</ul>'; 
				    }
				}
			?>
		</div><!-- .breadcrumbs -->

		<div id="recent-content" class="content-loop">

			<?php

			if ( have_posts() ) :	
						
				$i = 1;		
				
				echo "<div class=\"posts-loop\">";

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'loop');

					if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
						dynamic_sidebar( 'content-ad' );
					}

					$i++;

				endwhile;
				
				echo "</div><!-- .post-loop -->";

				if( $i > get_option( 'posts_per_page' ) ) :
					get_template_part( 'template-parts/pagination', '' ); 
				endif;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
