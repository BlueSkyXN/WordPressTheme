<div class="entry-meta">

	<?php if( get_theme_mod('loop-date-on', false) == true ) : ?>

		<span class="entry-date">
			<?php echo esc_html(get_the_date()); ?>
		</span><!-- .entry-date -->

	<?php endif; ?>

	<?php
		if( get_theme_mod('loop-like-on', true) == true ) :
	?>
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