<div class="entry-meta">

	<?php if( get_theme_mod('loop-category-on', true) == true ) : ?>

		<span class="entry-category">
			<?php zimeiti_1_first_category(); ?>
		</span><!-- .entry-category -->

	<?php endif; ?>

	<?php if( ( get_theme_mod('loop-author-avatar-on', true) == true ) || ( get_theme_mod('loop-author-name-on', true) == true ) ) : ?>

		<span class="entry-author">
			
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">

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

	<?php if( get_theme_mod('loop-date-on', true) == true ) : ?>

		<span class="entry-date">
			<?php echo esc_html(get_the_date()); ?>
		</span><!-- .entry-date -->

	<?php endif; ?>

	<span class="meta-right">

		<?php if( get_theme_mod('loop-view-on', true) == true ) : ?>
			<span class="entry-views">
				<?php 
				if ( function_exists('the_views') ) {
					echo zimeiti_1_wp_post_views();
				} else {
					echo zimeiti_1_get_post_views(get_the_ID()); 
				}
				?>
			</span>
		<?php endif; ?>

		<?php if( get_theme_mod('loop-comment-on', true) == true ) : ?>
			<span class="entry-comment"><?php comments_popup_link( esc_html__('评论','zimeiti-1'), esc_html__('1 评论', 'zimeiti-1'), esc_html__('% 评论', 'zimeiti-1'), 'comments-link', esc_html__('评论已关闭', 'zimeiti-1'));?></span>
		<?php endif; ?>

	</span><!-- .meta-right -->

</div><!-- .entry-meta -->