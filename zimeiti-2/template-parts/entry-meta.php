<div class="entry-meta second-line">

		<?php if( get_theme_mod('loop-category-on', true) == true ) : ?>

			<span class="entry-category">
				<?php zimeiti_2_first_category(); ?>
			</span><!-- .entry-category -->

		<?php endif; ?>

<?php
	if( get_theme_mod('loop-like-on', true) == true ) :
?>
		<span class="entry-like">
			<?php echo get_simple_likes_button( get_the_ID() ); ?>
		</span><!-- .entry-like -->

<?php endif; ?>

		<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
			<span class="entry-comment"><?php comments_popup_link( esc_html__('评论(0)','zimeiti-2'), esc_html__('评论(1)', 'zimeiti-2'), esc_html__('评论(%)', 'zimeiti-2'), 'comments-link', esc_html__('评论关闭', 'zimeiti-2'));?></span>
		<?php endif; ?>

		<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
			<span class="entry-views"><?php echo zimeiti_2_get_post_views(get_the_ID()); ?></span>
		<?php endif; ?>
		
</div><!-- .entry-meta -->