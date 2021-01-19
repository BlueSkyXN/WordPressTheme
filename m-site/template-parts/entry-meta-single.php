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
			<?php echo esc_html(get_the_date()); ?>
		</span><!-- .entry-date -->

	<?php endif; ?>

	<?php if( get_theme_mod('single-comment-on', true) == true ) : ?>
		<span class="entry-comment"><?php comments_popup_link( esc_html__('评论0','m-site'), esc_html__('评论1', 'm-site'), esc_html__('评论%', 'm-site'), 'comments-link', esc_html__('评论关闭', 'm-site'));?></span>
	<?php endif; ?>

	<?php if( get_theme_mod('single-view-on', true) == true ) : ?>
		<span class="entry-views"><?php echo m_site_get_post_views(get_the_ID()); ?></span>
	<?php endif; ?>	

	<?php if( get_theme_mod('single-share-on', true) == true ) : ?>

		<span class="custom-share">
			<span class="bdsharebuttonbox">
				<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				<a href="#" class="bds_sqq" data-cmd="sqq" title="分享给QQ好友"></a>						
				<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>	
			</span><!-- .bdsharebuttonbox -->
		</span>

	<?php endif; ?>

</div><!-- .entry-meta -->