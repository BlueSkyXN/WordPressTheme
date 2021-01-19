<div class="section-heading">

<?php
	if ( ( ! empty( $instance['title'] ) ) && ( $cat_id != 0 ) ) {
		echo '<h3 class="section-title"><a href="' . esc_url( $cat_link ) . '">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a></h3>';
	} elseif ( $cat_id == 0 ) {
		echo '<h3 class="section-title"><span>' . __( '最新文章', 'zazhi-1' ) . '</span></h3>';
	} else {
		echo '<h3 class="section-title"><a href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a><span class="section-more"><a href="' . esc_url( $cat_link ) . '">' . esc_html('更多','zazhi-1') . '</a></span></h3>';
	}
?>

</div><!-- .section-heading -->			

<div class="posts-wrap">
<?php 
	while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

?>

<div class="hentry <?php echo( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : ''; ?>">

	<a class="thumbnail-link" href="<?php the_permalink(); ?>">
		<div class="thumbnail-wrap">
			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('block_medium_thumb'); 
				?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=246&h=164" alt="<?php the_title(); ?>"/>
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
	endwhile; 
?>
</div><!-- .posts-wrap -->