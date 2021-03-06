<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package boke-2
 */	
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if( get_theme_mod('single-category-on', true) == true ) : ?>
	
	<div class="single-breadcrumbs">
		<span>您的位置</span> <i class="fa fa-angle-right"></i> <a href="<?php echo home_url(); ?>">首页</a> <i class="fa fa-angle-right"></i> <?php boke_2_first_category(); ?>
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

	<div class="entry-content">
		<?php 
			if( ( get_theme_mod('single-featured-on', false) == true ) && has_post_thumbnail() && (strpos($post->post_content,'[gallery') === false) ): 
				the_post_thumbnail('boke_2_single_thumb'); 
			endif;
		?>	
		
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( '阅读全文 %s <span class="meta-nav">&rarr;</span>', 'boke-2' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( '分页:', 'boke-2' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-footer clear">

		<div class="entry-tags">

			<?php if (has_tag()) { ?><span class="tag-links"><span><?php esc_html_e( '标签:', 'boke-2' ); ?></span><?php the_tags(' ', ' '); ?></span><?php } ?>
				
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( '编辑 %s', 'boke-2' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>

		</div><!-- .entry-tags -->

<?php
	if( get_theme_mod('single-sponsor-on', true) == true ) :
?>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content clear">    
  		<h3>给这篇文章的作者打赏</h3>
	    <div class="ht_grid_1_2_custom">
	    	<img src="<?php echo get_theme_mod('weixin_code_img', get_template_directory_uri() . '/assets/img/weixin-code.png'); ?>" alt="微信扫一扫打赏"/>
	    	微信扫一扫打赏
	    </div>
	    <div class="ht_grid_1_2_custom">
	    	<img src="<?php echo get_theme_mod('alipay_code_img', get_template_directory_uri() . '/assets/img/alipay-code.png'); ?>" alt="微信扫一扫打赏"/>
	    	支付宝扫一扫打赏	
	    </div>   
    <span class="close">&times;</span>

  </div>

</div>

<?php
	endif;
?>
		<div class="entry-footer-right">
		<?php 
			if( get_theme_mod('single-sponsor-on', true) == true ) : 
		?>
			<span class="entry-sponsor">
				<span id="myBtn" href="#"><i class="fa fa-jpy"></i> 打赏</span>
			</span>
		<?php
			endif;
		?>
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

<?php if ( get_theme_mod('author-box-on', true) ) : ?>

<div class="author-box clear">
	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></a>
	<div class="author-meta">	
		<h4 class="author-name"><?php echo __('关于作者:', 'boke-2'); ?> <span class="hover-underline"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author_meta('nickname'); ?></a></span></h4>	
		<div class="author-desc">
			<?php 
				echo the_author_meta('description'); 
			?>
		</div>
	</div>
</div><!-- .author-box -->

<?php endif; ?>

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
		'posts_per_page' => 3,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'boke_2_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : $i = 1; ?>

	<div class="related-content">

		<h3 class="section-title">相关文章</h3>

		<ul class="clear">	


<?php while ( $related->have_posts() ) : $related->the_post(); ?>

		<li class="hentry ht_grid_1_3">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				<div class="thumbnail-wrap">
					<?php if( has_post_thumbnail() ) { ?>
						<?php 
							the_post_thumbnail('boke_2_list_thumb'); 
						?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=243&h=156" alt="<?php the_title(); ?>"/>
					<?php } ?>
				</div><!-- .thumbnail-wrap -->
			</a>

			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="entry-meta">

					<span class="entry-like">
						<?php echo get_simple_likes_button( get_the_ID() ); ?>
					</span><!-- .entry-like -->

					<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
						<span class="entry-views"><?php echo boke_2_get_post_views(get_the_ID()); ?></span>
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
			
<?php if ( get_theme_mod('single-popular-on', true) ) : ?>

<?php
		 
	$custom_query_args = array(
		'post_type'      => 'post',
		'posts_per_page' => '5',
		'orderby'        => 'meta_value_num',
		'meta_key'       => 'post_views_count',
		'post__not_in' => get_option( 'sticky_posts' )			
	);		

	// Allow dev to filter the query.
	$args = apply_filters( 'boke_2_related_posts_args', $custom_query_args );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : $i = 1; ?>

		<div class="popular-content entry-related">
			<h2 class="section-title">热门文章</h2>
			<div class="popular-loop">
			<?php while ( $related->have_posts() ) : $related->the_post(); ?>
				<div class="hentry">
					<h2 class="entry-title"><span class="<?php echo "post-num num-" . $i; ?>"><?php echo $i; ?></span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-meta">

						<span class="entry-like">
							<?php echo get_simple_likes_button( get_the_ID() ); ?>
						</span><!-- .entry-like -->

						<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
							<span class="entry-views"><?php echo boke_2_get_post_views(get_the_ID()); ?></span>
						<?php endif; ?>

					</div>
				</div><!-- .hentry -->
				<?php 
					$i++;
					endwhile; 
				?>
			</div><!-- .popular-loop -->
		</div><!-- .popular-content -->

	<?php endif;

	// Restore original Post Data.
	wp_reset_query();
	wp_reset_postdata();
?>

<?php endif; ?>
