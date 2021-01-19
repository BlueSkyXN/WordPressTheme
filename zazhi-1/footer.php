<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zazhi-1
 */

?>
		</div><!-- .clear -->

	</div><!-- #content .site-content -->

	<?php 
		if(is_home()) {
			dynamic_sidebar( 'homepage-bottom' ); 
		}
	?>
	
	<footer id="colophon" class="site-footer container">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) { ?>

			<div class="footer-columns clear">

					<div class="footer-column footer-column-1 ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>

					<div class="footer-column footer-column-2 ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>

					<div class="footer-column footer-column-3 ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>		

					<div class="footer-column footer-column-4 ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>															

			</div><!-- .footer-columns -->

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="clear">

			<div class="site-info">

				<?php if(get_theme_mod('footer-credit')) { 
					
					echo get_theme_mod('footer-credit');
					
					} else { 
						$theme_uri = 'https://www.zhutibaba.com/';
						$author_uri = 'https://www.zhutibaba.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('主题巴巴原创', 'zazhi-1'); ?><a href="<?php echo $author_uri; ?>" target="_blank">WordPress主题</a>

				<?php } ?>

			</div><!-- .site-info -->

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
				}
			?>	

		</div><!-- #site-bottom -->
							
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php if ( get_theme_mod('back-top-on', true) ) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo __('返回顶部', 'zazhi-1'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<?php if ( is_single() && (get_theme_mod('single-share-on', true) == true) ) : ?>

	<?php
		$baidu_share_url = "";
		
		if ( function_exists( 'zazhi_1_check_https' ) ) {
			if (zazhi_1_check_https()) {
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
