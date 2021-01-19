<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tupian_1
 */

?>

	</div><!-- #content .site-content -->

	<?php dynamic_sidebar( 'footer-ad' ); ?>
	
	<footer id="colophon" class="site-footer">

		<div class="container">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>

			<div class="footer-columns clear">

				<div class="footer-column ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>

				<div class="footer-column ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>

				<div class="footer-column ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>

				<div class="footer-column ht_grid_1_4">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>												

			</div><!-- .footer-columns -->

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="clear">

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav', 'depth' => '1' ) );
				}
			?>	

			<div class="site-info">

				<?php if(get_theme_mod('footer-credit')) { 
					
					echo get_theme_mod('footer-credit');
					
					} else { 
						$theme_uri = 'https://www.zhutibaba.com/';
						$author_uri = 'https://www.zhutibaba.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('主题巴巴原创', 'menhu-1'); ?><a href="<?php echo $author_uri; ?>" target="_blank">WordPress主题</a>

				<?php } ?>

			</div><!-- .site-info -->

		</div>
		<!-- #site-bottom -->
		
		</div><!-- .container -->

	</footer><!-- #colophon -->
	
</div><!-- #page -->

<div class="bottom-right">
	<?php if ( get_theme_mod('right-contact-on', true) ) : ?>
	<div class="icon-contact tooltip">
		<span class="icon-link">
			<span class="icon"><i class="fa fa-phone"></i></span>
			<span class="text">联系我们</span>
		</span>
	    <div class="left-space">
		    <div class="left">
		    	<div class="contact-info">
			        <h3>联系我们</h3>

			        <?php if ( !empty(get_theme_mod('contact-phone', '0898-88881688')) ) : ?>
			        	<strong><?php echo get_theme_mod('contact-phone', '0898-88881688'); ?></strong>
			    	<?php endif; ?>

			    	<?php if ( !empty(get_theme_mod('contact-qq', '3599145122')) ) : ?>
			        	<p>在线咨询: <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo get_theme_mod('contact-qq', '3599145122'); ?>&site=qq&menu=yes" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/qqchat.gif" alt="QQ交谈"/></a></p>
			        <?php endif; ?>

			        <?php if ( !empty(get_theme_mod('contact-email', 'email@wangzhan.com')) ) : ?>
			       		<p>邮箱: <?php echo get_theme_mod('contact-email', 'email@wangzhan.com'); ?></p>	
			        <?php endif; ?>

			        <?php echo get_theme_mod('contact-info', '<p>工作时间：周一至周五，9:00-17:30，节假日休息</p>'); ?>
		    	</div>
		        <i></i>		        
		    </div>
		</div>				
	</div>
	<?php endif; ?>

	<?php if ( get_theme_mod('right-weixin-on', true) ) : ?>	
	<div class="icon-weixin tooltip">
		<span class="icon-link">
			<span class="icon"><i class="fa fa-wechat"></i></span>
			<span class="text">关注微信</span>
		</span>		
	    <div class="left-space">
		    <div class="left">
		        <img src="<?php echo get_theme_mod('weixin-qrcode', get_template_directory_uri() . '/assets/img/weixin-qrcode.png'); ?>" alt="微信扫一扫关注我们"/>
		        <h3>微信扫一扫关注我们</h3>
		        <i></i>
		    </div>
		</div>		
	</div>
	<?php endif; ?>

	<?php if ( get_theme_mod('right-weibo-on', true) ) : ?>	
	<div class="icon-weibo">
		<a href="<?php echo get_theme_mod('weibo-url', 'https://weibo.com/zhutibaba'); ?>" target="_blank">
			<span class="icon"><i class="fa fa-weibo"></i></span>
			<span class="text">关注微博</span>
		</a>		
	</div>
	<?php endif; ?>

	<?php if ( get_theme_mod('back-top-on', true) ) : ?>
	<div id="back-top">
		<a href="#top" title="<?php echo __('返回顶部', 'menhu-1'); ?>">
			<span class="icon"><i class="fa fa-chevron-up"></i></span>
			<span class="text">返回顶部</span>
		</a>
	</div>
	<?php endif; ?>
</div><!-- .bottom-right -->

<?php if ( get_theme_mod('sticky-nav-on', true) ) : ?>

<script type="text/javascript">

(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict"; 

        $("#primary-bar").sticky( { topSpacing: 0 } );
    });

})(jQuery);

</script>

<?php endif; ?>

<?php if ( is_single() && (get_theme_mod('single-share-on', true) == true) ) : ?>

	<?php
		$baidu_share_url = "";
		
		if ( function_exists( 'tupian_1_check_https' ) ) {
			if (tupian_1_check_https()) {
				$baidu_share_url = "";
			} else {
				$baidu_share_url = "http://bdimg.share.baidu.com";
			}
		}
	?>	
	<script>
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='<?php echo $baidu_share_url; ?>/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
