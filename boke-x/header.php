<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package boke-x
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<?php
	$primary_color = get_theme_mod('primary-color', '#037ef3');
	$secondary_color = get_theme_mod('secondary-color', '#ff4c4c');
	$tertiary_color = get_theme_mod('tertiary-color', '#76b852');
?>
<style type="text/css">
	
	/* Theme Colors */
	/* Primary Color */
	a:hover,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.sfHover li a:hover,
	.posts-nav-menu ul li a:hover,
	.sidebar .widget a:hover,
	.site-footer .widget a:hover,
	.author-box a:hover,
	article.hentry .edit-link a:hover,
	.comment-content a:hover,
	.entry-meta a:hover,
	.entry-title a:hover,
	.content-list .entry-title a:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.author-box .author-meta .author-name a:hover,
	.site-header .search-icon:hover span,
	.site-header .search-icon:hover span:before,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.friend-nav li a:hover,
	.tooltip .left .contact-info h3,
	.single #primary .entry-footer .entry-like a,
	.single #primary .entry-footer .entry-sponsor span,
	.form-submit-text a,
	.zhuanti-heading .section-more a:hover,
	.mini-page h4 a:hover,
	.mini-page ul li a:hover {
		color: <?php echo $primary_color; ?>;
	}	
	h2.section-title .title,
	.breadcrumbs h1 span.title,	
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget .widget-title span,
	#featured-grid h2.section-title span {
		border-bottom-color: <?php echo $primary_color; ?>;
	}	

	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.friend .friend-title:before,
	.partner-title:before,
	.sidebar .widget .widget-title:before,
	.related-content .section-title:before,
	.comment-reply-title:before,
	.comments-title:before,
	.bottom-right span.icon-link .text,
	.bottom-right a .text,
	.posts-nav-menu ul li a:after,
	.single #primary .entry-footer .entry-like a:hover,
	.single #primary .entry-footer .entry-sponsor span:hover,
	.form-submit .submit,
	.footer-search .search-submit:hover {
		background-color: <?php echo $primary_color; ?>;		
	}
	.sf-menu li li a:hover {
		background-color: <?php echo $primary_color; ?> !important;
	}
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus {
		background-color: #ffbe02;
	}

	.single #primary .entry-footer .entry-like a,
	.single #primary .entry-footer .entry-like a:hover,
	.single #primary .entry-footer .entry-sponsor span {
		border-color: <?php echo $primary_color; ?>;
	}
	/* Secondary Color */
	.page-content a:hover,
	.entry-content a:hover {
		color: <?php echo $secondary_color; ?>;
	}

	/* Tertiary Color */
	.content-list .entry-meta .entry-like a.liked {
		color: <?php echo $tertiary_color; ?> !important;
	}

</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">
		<?php
			the_custom_header_markup();
		?>
		<div class="container">

			<div class="site-branding">

				<?php if (has_custom_logo()) { ?>

					<div id="logo">
						<span class="helper"></span>
						<?php the_custom_logo(); ?>
					</div><!-- #logo -->

				<?php } else { ?>

					<div class="site-title">
						<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
					</div><!-- .site-title -->

				<?php } ?>

			</div><!-- .site-branding -->		

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

				// Tablet Menu
				$tablet_cols = "";

				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-0') {
					$tablet_cols = 'flexible-menu';
				}			
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-1') {
					$tablet_cols = 'tablet_menu_col_1';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-2') {
					$tablet_cols = 'tablet_menu_col_2';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-3') {
					$tablet_cols = 'tablet_menu_col_3';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-4') {
					$tablet_cols = 'tablet_menu_col_4';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-5') {
					$tablet_cols = 'tablet_menu_col_5';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-6') {
					$tablet_cols = 'tablet_menu_col_6';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-7') {
					$tablet_cols = 'tablet_menu_col_7';
				}
				if ( get_theme_mod('tablet-columns', 'choice-6') == 'choice-8') {
					$tablet_cols = 'tablet_menu_col_8';
				}	

			?>
			<nav id="primary-nav" class="primary-navigation <?php echo $tablet_cols; ?> <?php echo $phone_cols; ?>">
				<?php 
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				?>
			</nav><!-- #primary-nav -->

			<div class="header-right">
				<ul>
				<?php 
					if( is_user_logged_in() ) {
				?>

					<li class="header-user">
						<a href="<?php echo home_url(); ?>/wp-admin/"><?php echo wp_get_current_user()->display_name; ?></a>
					</li>

					<li class="header-logout">
						<a href="<?php echo wp_logout_url(); ?>" title="退出">退出</a>
					</li>

				<?php
					} else {
				?>

					<?php if( get_theme_mod('header-login-on', true) == true ) : ?>
						<li class="header-login">
							<a href="<?php echo wp_login_url(); ?>" title="登录">登录</a>
						</li>
					<?php endif; ?>

					<?php if( get_theme_mod('header-reg-on', true) == true ) : ?>
						<li class="header-register">
							<a href="<?php echo wp_registration_url(); ?>" title="注册">注册</a>
						</li>
					<?php endif; ?>	

				<?php
					}
				?>	

				<?php if( get_theme_mod('header-submit-on', false) == true ) : ?>
					<li class="header-submit">
						<?php
							$tougao_url = get_theme_mod('tougao-url', home_url().'/tougao');

							if( is_user_logged_in() ) {
								$tougao_link = $tougao_url;
							} else {
								$tougao_link = wp_login_url() . '?redirect_to=' . $tougao_url;
							}
						?>
						<a href="<?php echo $tougao_link; ?>" title="用户投稿">投稿</a>
					</li>	
				<?php endif; ?>	

				<?php if ( get_theme_mod('header-search-on', true) == true ) : ?> 
					<li class="header-search-icon">
						<span class="search-icon">
							<i class="fa fa-search"></i>
							<i class="fa fa-close"></i>			
						</span>
					</li>
				<?php endif; ?>

				</ul>
				<?php if ( get_theme_mod('header-search-on', true) == true ) : ?> 
					<div class="header-search">
						<?php get_search_form(); ?>
					</div><!-- .header-search -->
				<?php endif; ?>				
			</div><!-- .header-right -->

		</div><!-- .container -->

	</header><!-- #masthead -->	

<div id="content" class="site-content site_container container clear">
