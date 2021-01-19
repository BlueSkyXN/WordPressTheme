<div class="left-col sidebar-2">

	<div class="site-branding">

		<?php if (has_custom_logo()) { ?>

			<div id="logo">
				<?php the_custom_logo(); ?>
			</div><!-- #logo -->

		<?php } else { ?>

			<div class="site-title">
				<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-title -->

		<?php } ?>

	</div><!-- .site-branding -->	
				
	<?php //dynamic_sidebar( 'sidebar-2' ); ?>

	<?php
		// Mobile Phone Menu
		$phone_cols = "";

		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-0') {
			$phone_cols = 'flexible-menu';
		}			
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-1') {
			$phone_cols = 'phone_menu_col_1';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-2') {
			$phone_cols = 'phone_menu_col_2';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-3') {
			$phone_cols = 'phone_menu_col_3';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-4') {
			$phone_cols = 'phone_menu_col_4';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-5') {
			$phone_cols = 'phone_menu_col_5';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-6') {
			$phone_cols = 'phone_menu_col_6';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-7') {
			$phone_cols = 'phone_menu_col_7';
		}
		if ( get_theme_mod('phone-columns', 'choice-4') == 'choice-8') {
			$phone_cols = 'phone_menu_col_8';
		}

	?>

	<nav id="primary-nav" class="primary-navigation <?php echo $phone_cols; ?>">
		<?php 
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
		?>
	</nav><!-- #primary-nav -->

	<!--<div id="slick-mobile-menu"></div>-->
		
	<?php if( get_theme_mod('header-search-on', true) == true ) : ?>

		<span class="search-icon">
			<span class="genericon genericon-search"> <span><?php esc_html_e('搜索', 'zimeiti-2'); ?></span></span>
			<span class="genericon genericon-close"> <span><?php esc_html_e('收起', 'zimeiti-2'); ?></span></span>			
		</span>
		<div class="header-search">
			<?php get_search_form(); ?>
		</div><!-- .header-search -->
	
	<?php endif; ?>	

</div><!-- .left-col -->