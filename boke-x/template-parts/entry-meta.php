<div class="entry-meta">

		<?php if ( ( get_theme_mod('loop-category-on', true) == true ) && (!is_category() ) ) : ?>

			<span class="entry-category">
				<?php boke_x_first_category(); ?>
				<?php if( get_theme_mod('loop-date-on', true) == true ) : ?>
					<span class="sep">&bullet;</span>
				<?php endif; ?>				
			</span><!-- .entry-category -->

		<?php endif; ?>

		<?php if( get_theme_mod('loop-date-on', true) == true ) : ?>

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

		<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
			<span class="entry-views"><a href="<?php the_permalink(); ?>"><?php echo boke_x_get_post_views(get_the_ID()); ?></a></span>
		<?php endif; ?>

		<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
			<span class="entry-comment"><?php comments_popup_link( '<i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i> 0<em>评论</em>', '<i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i> 1<em>评论</em>', '<i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i> %<em>评论</em>', 'comments-link', '<i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i> 评论关闭');?></span>
		<?php endif; ?>

</div><!-- .entry-meta -->