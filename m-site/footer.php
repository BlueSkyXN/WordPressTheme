<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-site
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer container">

		<div id="site-bottom" class="clear">

				<?php 
					if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
					}
				?>	

				<div class="site-info">

					<?php if(get_theme_mod('footer-credit')) { 
						
						echo get_theme_mod('footer-credit');
						
						} else { 
							$author_uri = 'http://www.zhutibaba.com/';
					?>

						&copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a> - <?php esc_html_e('主题巴巴原创', 'm-site'); ?><a href="<?php echo esc_url( $author_uri ); ?>" target="_blank">WordPress主题</a>

					<?php } ?>

				</div><!-- .site-info -->
			
		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php if( get_theme_mod('back-top-on', true) == true) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo __('返回顶部', 'm-site'); ?>"><i class="fa fa-arrow-up"></i></a>
	</div>

<?php endif; ?>

<?php if ( is_single() && (get_theme_mod('single-share-on', true) == true) ) : ?>

	<?php
		$baidu_share_url = "";
		
		if ( function_exists( 'm_site_check_https' ) ) {
			if (m_site_check_https()) {
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

<?php if (get_theme_mod('top-notice-on', false) == true) : ?>
<div class="top-notice">
	<img src="<?php echo get_theme_mod('site_url_code_img', get_template_directory_uri() . '/assets/img/site-url-code.png'); ?>" alt="手机扫一扫打开网站"/>
	<p>
		扫一扫<br/>
		查看手机浏览效果
	</p>
</div><!-- .top-notice -->
<?php endif; ?>

</body>
</html>
