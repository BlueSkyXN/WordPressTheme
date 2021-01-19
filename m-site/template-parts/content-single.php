<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package m-site
 */	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( get_theme_mod('single-category-on', true) == true ) : ?>
	
		<div class="single-breadcrumbs">
			<span>您的位置</span> <i class="fa fa-angle-right"></i> <a href="<?php echo home_url(); ?>">首页</a> <i class="fa fa-angle-right"></i> <?php m_site_first_category(); ?>
		</div>
	
	<?php endif; ?>

	<header class="entry-header">	

			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>

				<?php get_template_part( 'template-parts/entry-meta', 'single' ); ?>

			<?php
			endif; ?>

	</header><!-- .entry-header -->

	<?php if( get_theme_mod('single-excerpt-on', true) == true ) : ?>

		<div class="single-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- .single-excerpt -->

	<?php endif; ?>

	<div class="entry-content">
		<?php 
			if( ( get_theme_mod('single-featured-on', false) == true ) && has_post_thumbnail() && (strpos($post->post_content,'[gallery') === false) ): 
				the_post_thumbnail('m_site_single_thumb'); 
			endif;
		?>	
		
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( '阅读全文 %s <span class="meta-nav">&rarr;</span>', 'm-site' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( '分页:', 'm-site' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer clear">

		<div class="entry-tags">

			<?php if (has_tag()) { ?><span class="tag-links"><span><?php esc_html_e( '标签:', 'm-site' ); ?></span><?php the_tags('', ', '); ?></span><?php } ?>
				
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( '编辑 %s', 'm-site' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>

		</div><!-- .entry-tags -->

		<div class="entry-footer-right">
			<?php
				if( get_theme_mod('single-like-on', true) == true ) :
			?>
			
				<span class="entry-like">
					<?php echo get_simple_likes_button( get_the_ID() ); ?>
				</span><!-- .entry-like -->

			<?php 
				endif; 
			?>		

		</div>


	</div><!-- .entry-footer -->

</article><!-- #post-## -->

<?php if ( get_theme_mod('related-posts-on', true) ) : ?>


<?php
	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}

	// Posts query arguments.
	$query = array(
		'post__not_in' => array( get_the_ID() ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 5,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'm_site_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : $i = 1; ?>

	<div class="related-content">

		<h3 class="section-title">相关文章</h3>

		<ul class="clear">	


<?php while ( $related->have_posts() ) : $related->the_post(); ?>

		<li class="hentry clear">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				<div class="thumbnail-wrap">
					<?php if( has_post_thumbnail() ) { ?>
						<?php 
							the_post_thumbnail('m_site_list_thumb'); 
						?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=232&h=149" alt="<?php the_title(); ?>"/>
					<?php } ?>
				</div><!-- .thumbnail-wrap -->
			</a>

			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-meta">

					<?php if( get_theme_mod('loop-like-on', true) == true ) : ?>
						<span class="entry-like">
							<?php echo get_simple_likes_button( get_the_ID() ); ?>
						</span><!-- .entry-like -->
					<?php endif; ?>

					<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
						<span class="entry-comment"><?php comments_popup_link( esc_html__('评论0','m-site'), esc_html__('评论1', 'm-site'), esc_html__('评论%', 'm-site'), 'comments-link', esc_html__('评论关闭', 'm-site'));?></span>
					<?php endif; ?>

					<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
						<span class="entry-views"><?php echo m_site_get_post_views(get_the_ID()); ?></span>
					<?php endif; ?>
					
			</div><!-- .entry-meta -->				

		</li><!-- .featured-slide .hentry -->

		<?php
			$i++;
			endwhile;
		?>

		</ul><!-- .featured-grid -->

	</div><!-- .related-content -->

<?php
		endif; 
			wp_reset_query();
			wp_reset_postdata();	
			?>

<?php endif; ?>