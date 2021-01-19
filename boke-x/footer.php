<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boke-x
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer">

		<div class="clear"></div>

		<?php if( is_home() && (!is_paged()) ) { ?>
		
		<?php if ( is_active_sidebar( 'footer-partners' ) || has_nav_menu( 'friend' ) ) { ?>	

		<div class="container">

		<div class="footer-content">

			<?php if ( is_active_sidebar( 'footer-partners' ) ) { ?>

				<div class="footer-partners clear">
					<div class="partner-title clear">
						<strong><?php echo get_theme_mod('home-partner-title', '合作伙伴'); ?></strong>
						<span class="partner-desc"><?php echo get_theme_mod('home-partner-desc', '自定义文字描述'); ?></span>
						<span class="partner-link">
							<?php
								if ( !empty( get_theme_mod('home-partner-link', home_url()) ) ) :
							?>
								<a href="<?php echo get_theme_mod('home-partner-link', home_url()); ?>" target="_blank">
							<?php
								endif;
							?>
								<?php echo get_theme_mod('home-partner-link-text', '联系我们  <i class="fa fa-angle-right"></i>'); ?>
							<?php
								if ( !empty( get_theme_mod('home-partner-link', home_url()) ) ) :
							?>								
								</a>
							<?php
								endif;
							?>							
						</span>
					</div>
					<div class="partner-wrap">
						<?php dynamic_sidebar( 'footer-partners' ); ?>
					</div>
				</div>

				<div class="clear"></div>

			<?php } ?>

			<?php 
				if ( has_nav_menu( 'friend' ) ) {
			?>
				<div class="friend clear">
					<div class="friend-title clear">
						<h3><?php echo get_theme_mod('home-friend-title', '友情链接'); ?></h3>
						<span class="friend-desc"><?php echo get_theme_mod('home-friend-desc', '自定义文字描述'); ?></span>
						<span class="friend-link">
								<?php
									if ( !empty( get_theme_mod('home-friend-link', home_url()) ) ) :
								?>
									<a href="<?php echo get_theme_mod('home-friend-link', home_url()); ?>" target="_blank">
								<?php
									endif;
								?>
									<?php echo get_theme_mod('home-friend-link-text', '交换链接 <i class="fa fa-angle-right"></i>'); ?>
								<?php
									if ( !empty( get_theme_mod('home-friend-link', home_url()) ) ) :
								?>								
									</a>
								<?php
									endif;
								?>	
						</span>
					</div>
					<?php
						wp_nav_menu( array( 'theme_location' => 'friend', 'menu_id' => 'friend-menu', 'menu_class' => 'friend-nav' ) );
					?>
				</div><!-- .friend -->
			<?php
				}
			?>	
		</div><!-- .footer-content -->

		</div><!-- .container -->		
		
		<?php } ?>

		<?php } ?>

		<div id="site-bottom" class="clear">

			<div class="container">
				
				<div class="footer-left">

				<?php if ( get_theme_mod('footer-logo', '') != null ) : ?>
					<div class="footer-logo">
						<img src="<?php echo get_theme_mod('footer-logo', ''); ?>" alt=""/>
					</div>
				<?php endif; ?>

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

						&copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a> - <?php esc_html_e('主题巴巴原创', 'boke-x'); ?> <a href="<?php echo esc_url( $author_uri ); ?>" target="_blank">WordPress 主题</a>

					<?php } ?>

				</div><!-- .site-info -->
				
				</div><!-- .footer-left -->

				<div class="footer-search">
					<form id="footer-searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('请输入关键词', 'boke-x'); ?>" autocomplete="off">
						<button type="submit" class="search-submit">搜索</button>		
					</form>
					<?php if (has_tag()) { ?>	
						<div class="popular-search">
							热搜: <?php wp_tag_cloud('smallest=13&largest=13&unit=px&number=5&orderby=count' ); ?>
						</div>			
					<?php } ?>
				</div>

			</div><!-- .container -->

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<div class="bottom-right">
	<?php if ( get_theme_mod('right-contact-on', true) ) : ?>
	<div class="icon-contact tooltip bottom-icon">
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
	<div class="icon-weixin tooltip bottom-icon">
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
	<div class="icon-weibo bottom-icon">
		<a href="<?php echo get_theme_mod('weibo-url', 'https://weibo.com/zhutibaba'); ?>" target="_blank">
			<span class="icon"><i class="fa fa-weibo"></i></span>
			<span class="text">关注微博</span>
		</a>		
	</div>
	<?php endif; ?>

	<?php if ( get_theme_mod('back-top-on', true) ) : ?>
	<div id="back-top" class="bottom-icon">
		<a href="#top" title="<?php echo __('返回顶部', 'boke-x'); ?>">
			<span class="icon"><i class="fa fa-chevron-up"></i></span>
			<span class="text">返回顶部</span>
		</a>
	</div>
	<?php endif; ?>
</div><!-- .bottom-right -->

<?php wp_footer(); ?>

<?php if ( is_single() && (get_theme_mod('single-share-on', true) == true) ) : ?>

	<?php
		$baidu_share_url = "";
		
		if ( function_exists( 'boke_x_check_https' ) ) {
			if (boke_x_check_https()) {
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

<script>
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        /*-----------------------------------------------------------------------------------*/
        /*  Slick Mobile Menu
        /*-----------------------------------------------------------------------------------*/
        $('#primary-menu').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label: '<?php echo get_theme_mod('mobile-nav-heading', '导航'); ?>'
        });    		

    });

})(jQuery);

</script>

<?php if(is_single()) : ?>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php endif; ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/assets/js/sticky-sidebar.min.js'?>"></script>

<script type="text/javascript">

(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";
		$(window).load(function() {
			var stickySidebar = new StickySidebar('#secondary', {
				topSpacing: 20,
				bottomSpacing: 20,
				containerSelector: '.site_container',
				innerWrapperSelector: '.sidebar__inner'
			});
		});	

    });


})(jQuery);
</script>

</body>
</html>
