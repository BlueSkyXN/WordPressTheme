<div class="section-heading">

<?php
	if ( $cat_id == 0 ) {
		echo '<h3 class="section-title"><span>' . __( '最新文章', 'zazhi-1' ) . '</span></h3>';
	} else {
		echo '<h3 class="section-title"><a href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a><span class="section-more"><a href="' . esc_url( $cat_link ) . '">' . esc_html('更多','zazhi-1') . '</a></span></h3>';
	}
?>

</div><!-- .section-heading -->				

<div class="posts-wrap">

<?php
	// The Loop
	while ( $wp_query->have_posts() ) : $wp_query->the_post();

	if ($i == 1) {
?>	


<div class="post-big hentry">

	<a class="thumbnail-link" href="<?php the_permalink(); ?>">
		<div class="thumbnail-wrap">
			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('block_large_thumb'); 
				?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=389&h=260" alt="<?php the_title(); ?>"/>
			<?php } ?>
		</div><!-- .thumbnail-wrap -->
	</a>	

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div><!-- .entry-header -->

	<div class="entry-meta">
		<span class="entry-date"><?php echo get_the_date(); ?></span>
		<span class="entry-comment"><?php comments_popup_link( '0<span>评论</span>', '1<span>评论</span>', '%<span>评论</span>', 'comments-link', '评论关闭'); ?></span>
	</div><!-- .entry-meta -->

	<div class="entry-summary">
		<?php
			if ( has_excerpt() ) {
				the_excerpt();
			} else {
				echo wp_trim_words( get_the_content(), get_theme_mod('home-excerpt-length', '64'), '...' );
			}
		?>
	</div><!-- .entry-summary -->

</div><!-- .hentry -->

<?php } else { ?>

<div class="post-small hentry clear <?php echo( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : ''; ?>">

	<a class="thumbnail-link" href="<?php the_permalink(); ?>">
		<div class="thumbnail-wrap">
			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('block_small_thumb'); 
				?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=120&h=80" alt="<?php the_title(); ?>"/>
			<?php } ?>
		</div><!-- .thumbnail-wrap -->
	</a>	

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<span class="entry-date"><?php echo get_the_date(); ?></span>
			<span class="entry-comment"><?php comments_popup_link( '0<span>评论</span>', '1<span>评论</span>', '%<span>评论</span>', 'comments-link', '评论关闭'); ?></span>
		</div><!-- .entry-meta -->							
	</div><!-- .entry-header -->

</div><!-- .hentry -->

<?php

	} 

	$i++;
	endwhile;
?>

</div><!-- .posts-wrap -->