<div class="entry-meta">

	<?php if( ( get_theme_mod('loop-author-avatar-on', true) == true ) || ( get_theme_mod('loop-author-name-on', true) == true ) ) : ?>

		<span class="entry-author">
			
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" target="_blank">

				<?php 
					if( get_theme_mod('loop-author-avatar-on', true) == true ) :
						echo get_avatar( get_the_author_meta( 'ID' ), 80 );
					endif; 
				?>

				<?php 
					if( get_theme_mod('loop-author-name-on', true) == true ) : 
						echo get_the_author_meta('nickname'); 
					endif; 
				?>

			</a>

		</span><!-- .entry-author -->

	<?php endif; ?>

	<?php if( get_theme_mod('loop-category-on', true) == true ) : ?>

		<span class="entry-category">
			<?php menhu_1_first_category(); ?>
		</span><!-- .entry-category -->

	<?php endif; ?>
	
	<?php if( get_theme_mod('loop-date-on', true) == true ) : ?>

		<span class="entry-date">
			<?php echo esc_html(get_the_date()); ?>
		</span><!-- .entry-date -->

	<?php endif; ?>

	<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
		<span class="entry-views"><?php echo menhu_1_get_post_views(get_the_ID()); ?></span>
	<?php endif; ?>	
	
	<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
		<span class="entry-comment"><?php comments_popup_link( esc_html__('评论(0)','menhu-1'), esc_html__('评论(1)', 'menhu-1'), esc_html__('评论(%)', 'menhu-1'), 'comments-link', esc_html__('评论关闭', 'menhu-1'));?></span>
	<?php endif; ?>

</div><!-- .entry-meta -->