<?php get_header(); ?>

	<div id="primary" class="content-area clear">	

		<div class="content-wrapper">

			<?php
				if( get_theme_mod('home-featured-on', true) == true ) :
					get_template_part('template-parts/content', 'featured');
				endif;
			?>

			<?php if ( (get_theme_mod('home-popular-on', true) == true) && (!get_query_var('paged')) ): ?>

			<div class="tab-wrap popular-content">    
				
				<ul class="tab-titles">        
					<li class="active"><a href="#tab1">最多阅读</a></li>
					<li><a href="#tab2">最多评论</a></li>
				</ul>    
				
				<div class="popular-loop">        
					
					<div id="tab1" class="tab-content tab-show">

						<?php
						// Posts query arguments.
						$custom_query_args = array(
							'post_type'      => 'post',
							'posts_per_page' => '5',
							'orderby'        => 'meta_value_num',
							'meta_key'       => 'post_views_count',
							'post__not_in' => get_option( 'sticky_posts' )			
						);		
						// globalize $wp_query
						global $wp_query;
						// Merge custom args with default query args
						$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
						// process the query
						query_posts( $merged_query_args );

						if ( $wp_query->have_posts() ) :	
							
							$i = 1;
							
							while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

							<div class="hentry">
								<h2 class="entry-title"><span class="<?php echo "post-num num-" . $i; ?>"><?php echo $i; ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry-meta">

									<span class="entry-like">
										<?php echo get_simple_likes_button( get_the_ID() ); ?>
									</span><!-- .entry-like -->

									<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
										<span class="entry-views"><?php echo zimeiti_2_get_post_views(get_the_ID()); ?></span>
									<?php endif; ?>

								</div>
							</div><!-- .hentry -->

						<?php 
							$i++;
							endwhile; 
							endif;
							wp_reset_query();
							wp_reset_postdata(); 
						?>

					</div><!-- #tab1 -->

					<div id="tab2" class="tab-content">                                                                        

						<?php
						// Posts query arguments.
						$custom_query_args = array(
							'post_type'      => 'post',
							'posts_per_page' => '5',
							'orderby'        => 'comment_count',
							'post__not_in' => get_option( 'sticky_posts' )			
						);		
						// globalize $wp_query
						global $wp_query;
						// Merge custom args with default query args
						$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
						// process the query
						query_posts( $merged_query_args );

						if ( $wp_query->have_posts() ) :	
							
							$i = 1;
							
							while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

							<div class="hentry">
								<h2 class="entry-title"><span class="<?php echo "post-num num-" . $i; ?>"><?php echo $i; ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry-meta">

									<span class="entry-like">
										<?php echo get_simple_likes_button( get_the_ID() ); ?>
									</span><!-- .entry-like -->
		
									<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
										<span class="entry-comment"><?php comments_popup_link( esc_html__('评论(0)','zimeiti-2'), esc_html__('评论(1)', 'zimeiti-2'), esc_html__('评论(%)', 'zimeiti-2'), 'comments-link', esc_html__('评论关闭', 'zimeiti-2'));?></span>
									<?php endif; ?>

								</div>
							</div><!-- .hentry -->

						<?php 
							$i++;
							endwhile; 
							endif;
							wp_reset_query();
							wp_reset_postdata(); 
						?>

					</div><!-- #tab2 -->

				</div>
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

				<div id="recent-content" class="content-list">
				
					<h2 class="section-title">
						<span class="title">最新发布</span> 
						<div class="posts-counter">
							<?php
								$count = wp_count_posts(); 
								$publish_post_count = $count->publish;
							?>
							<span class="hours">今日更新<strong><?php echo zimeiti_2_posts_count_from_last_24h(); ?></strong>篇</span>
							<span class="days">文章总数<strong><?php echo $publish_post_count; ?></strong>篇</span>
						</div>
					</h2>

					<?php
					/* Start the Loop */
					while ( $wp_query->have_posts() ) : $wp_query->the_post();

						get_template_part('template-parts/content', 'list');

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
		
		</div><!-- .content-wrapper -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
