<?php get_header(); ?>

	<div id="primary" class="content-area clear">	

		<?php
			if( get_theme_mod('home-featured-on', true) == true ) :
				get_template_part('template-parts/content', 'featured');
			endif;
		?>

		<div class="clear"></div>

		<?php if( (get_theme_mod('home-zhuanti-on', true) == true) && (!empty(boke_x_zhuanti_list())) && is_home() && (!is_paged()) ) : ?>
		<div class="home-zhuanti-section">
			
			<div class="zhuanti-heading clear">
				<div class="custom-wrap clear">
					<h2><?php echo get_theme_mod('home-zhuanti-title', '专题列表'); ?></h2>
					<div class="desc">
						<?php echo get_theme_mod('home-zhuanti-desc', '自定义文字描述'); ?>
					</div>
					<div class="section-more">
						<a href="<?php echo get_theme_mod('home-zhuanti-more-link', home_url()); ?>"><?php echo get_theme_mod('home-zhuanti-more-text', '查看所有专题 <i class="fa fa-angle-right"></i>'); ?></a>
					</div>
				</div>
			</div>

			<?php
				echo boke_x_zhuanti_list();
			?>

		</div>

		<?php endif; ?>

		<?php
			// Define custom query args
			$custom_query_args = array( 
			    // exclude all sticky posts
			    'post__not_in' => get_option( 'sticky_posts' ) ,
			    // don't forget to paginate!
  				'paged' => get_query_var('paged')
			);  
			// globalize $wp_query
			global $wp_query;
			// Merge custom args with default query args
			$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
			// process the query
			query_posts( $merged_query_args );

			if ( $wp_query->have_posts() ) :	
			
			$i = 1;
		?>

		<main id="main" class="site-main clear">

				<div class="recent-heading">
					<h2 class="section-title">
						<span class="title"><?php echo get_theme_mod('home-list-title', '最新文章'); ?></span> 
					</h2>
					<div class="posts-nav-menu">
					<?php 
						if ( has_nav_menu( 'posts' ) ) {
							wp_nav_menu( array( 'theme_location' => 'posts', 'menu_id' => 'posts-menu', 'menu_class' => 'posts-menu' ) );
						}
					?>
					</div>				
				</div>

			<div id="recent-content" class="content-list">

				<?php
				$i = 1;
				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part('template-parts/content', 'list');

					if ( $i == get_theme_mod('content-ad-position', '1')+1 ) {
						dynamic_sidebar( 'content-ad' );
					}

					$i++;	
				endwhile;
									
				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php
			get_template_part( 'template-parts/pagination', '' ); 
		?>

		<?php
			else :
		?>

		<main id="main" class="site-main clear">

			<?php
				get_template_part( 'template-parts/content', 'none' );
			?>

		</main><!-- .site-main (no-content) -->

		<?php
			endif; 
			wp_reset_query();
		?>
		
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
