<div class="entry-meta">

	<?php if( ( get_theme_mod('single-author-avatar-on', true) == true ) || ( get_theme_mod('single-author-name-on', true) == true ) ) : ?>

		<span class="entry-author">
			
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">

				<?php 
					if( get_theme_mod('single-author-avatar-on', true) == true ) :
						echo get_avatar( get_the_author_meta( 'ID' ), 80 );
					endif; 
				?>

				<?php 
					if( get_theme_mod('single-author-name-on', true) == true ) : 
						echo get_the_author_meta('nickname'); 
					endif; 
				?>

			</a>

		</span><!-- .entry-author -->

	<?php endif; ?>

	<?php if( get_theme_mod('single-date-on', true) == true ) : ?>

		<span class="entry-date">
			<?php echo esc_html(get_the_date()); ?> <?php the_time( 'G:i' ); ?>
		</span><!-- .entry-date -->

	<?php endif; ?>

	<span class="sticky-meta-right">

		<?php if( get_theme_mod('single-share-on', true) == true ) : ?>

		<span class="bdsharebuttonbox">
			<a href="#" class="bds_more" data-cmd="more"></a>
			<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
			<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
			<a href="#" class="bds_sqq" data-cmd="sqq" title="分享给QQ好友"></a>								
			<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>	
		</span><!-- .bdsharebuttonbox -->
		
		<?php endif; ?>

		<span class="meta-right">

			<?php if( get_theme_mod('single-comment-on', true) == true ) : ?>
				<span class="entry-comment"><?php comments_popup_link( esc_html__('评论','zazhi-1'), esc_html__('1 评论', 'zazhi-1'), esc_html__('% 评论', 'zazhi-1'), 'comments-link', esc_html__('评论已关闭', 'zazhi-1'));?></span>
			<?php endif; ?>

		</span><!-- .meta-right -->

	</span><!-- .sticky-meta-right -->

</div><!-- .entry-meta -->