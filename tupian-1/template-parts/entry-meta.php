<div class="entry-meta clear">

	<?php if( get_theme_mod('loop-category-on', true) == true ) : ?>

		<span class="entry-category">
			<?php tupian_1_first_category(); ?>
		</span><!-- .entry-category -->

	<?php endif; ?>

	<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
		<span class="entry-views"><?php echo tupian_1_get_post_views(get_the_ID()); ?></span>
	<?php endif; ?>	
	
	<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
		<span class="entry-comment"><?php comments_popup_link( esc_html__('评论(0)','menhu-1'), esc_html__('评论(1)', 'menhu-1'), esc_html__('评论(%)', 'menhu-1'), 'comments-link', esc_html__('评论关闭', 'menhu-1'));?></span>
	<?php endif; ?>

	<?php
		if( get_theme_mod('loop-like-on', true) == true ) :
	?>
		<span class="entry-like">
			<?php echo get_simple_likes_button( get_the_ID() ); ?>
		</span><!-- .entry-like -->

	<?php endif; ?>

</div><!-- .entry-meta -->