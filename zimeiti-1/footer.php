<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zimeiti-1
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer <?php if (isset($_GET['home-layout'])) { if($_GET["home-layout"] === "two-col-layout") echo "two-col-layout"; } ?>">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) ) { ?>

			<?php 
			if ( ( get_theme_mod('home-layout', 'choice-1') == 'choice-1' ) && ( is_home() || is_archive() || is_search() ) || ( get_theme_mod('single-layout', 'choice-1') == 'choice-1' ) && ( is_single() ) && ( !( is_page_template('full-single-post.php') ) ) ) {

				$footer_container = 'footer-container'; 

			} else {
				$footer_container = 'container'; 
			}
			?>

			<div class="footer-columns <?php echo $footer_container; ?> clear">

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

			<div class="container">

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

						&copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a> - <?php esc_html_e('主题巴巴原创', 'zimeiti-1'); ?> <a href="<?php echo esc_url( $author_uri ); ?>" target="_blank">WordPress 主题</a>

					<?php } ?>

				</div><!-- .site-info -->
			
			</div><!-- .container -->

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if( get_theme_mod('back-top-on', true) == true) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo __('返回顶部', 'zimeiti-1'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<?php if ( is_single() && (get_theme_mod('single-share-on', true) == true) ) : ?>

	<?php
		$baidu_share_url = "";
		
		if ( function_exists( 'zimeiti_1_check_https' ) ) {
			if (zimeiti_1_check_https()) {
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

		<?php if ( get_theme_mod('sticky-breadcrumbs-on', true) == true ) : ?>	
        /*-----------------------------------------------------------------------------------*/
        /*  Sticky Breadcrumbs
        /*-----------------------------------------------------------------------------------*/		
		$(window).scroll(function(){
		    var aTop = 200;
		    if( ( $(this).scrollTop()>=aTop) ){  

		    	<?php if ( get_theme_mod('sticky-breadcrumbs-on', true) == true ) : ?>		
			        $('.single .site-main .entry-header').addClass('sticky-breadcrumbs');
			        $('.single #primary article.hentry').css('padding-top', '110px');
			        $('#single-sticky').addClass(' container');
		        <?php endif; ?>

				<?php if ( get_theme_mod('sticky-nav-on', true) == true ) : ?>	 
			        $('.single .left-col').addClass('header-scrolled');
				<?php endif; ?>
				
		    } else {

		    	<?php if ( get_theme_mod('sticky-breadcrumbs-on', true) == true ) : ?>	
			        $('.single .site-main .entry-header').removeClass('sticky-breadcrumbs');
			        $('.single #primary article.hentry').css('padding-top', '0');
			        $('#single-sticky').removeClass(' container');
		        <?php endif; ?>

		        <?php if ( get_theme_mod('sticky-nav-on', true) == true ) : ?>	                
		        	$('.single .left-col').removeClass('header-scrolled');   
		        <?php endif; ?>                                
		    }
		});	
 		
 		<?php endif; ?>

        /*-----------------------------------------------------------------------------------*/
        /*  Sticky Left Navigation
        /*-----------------------------------------------------------------------------------*/
		<?php if ( get_theme_mod('sticky-nav-on', true) == true ) : ?>	 
			$(".left-col").sticky( { topSpacing: 0 } );
		<?php endif; ?>

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

<?php if( is_single() && ( get_theme_mod('single-sponsor-on', true) == true ) ) : ?>

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

</body>
</html>
