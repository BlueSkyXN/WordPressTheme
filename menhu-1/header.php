<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package menhu-1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<?php wp_head(); ?>

<?php
	// Theme Color
	$primary_color = get_theme_mod('primary-color', '#ff3333');
	$secondary_color = get_theme_mod('secondary-color', '#007fdb');	

?>
<style type="text/css" media="all">
	a,
	a:visited,
	.sf-menu ul li li a:hover,
	.sf-menu li.sfHover li a:hover,
	#primary-menu li.sfHover a,
	#primary-menu li a:hover,	
	#primary-menu li li a:hover,
	#secondary-menu li li a:hover,
	#secondary-menu li a:hover,
	#secondary-menu li.sfHover a,
	.top-right a:hover,
	.home-latest ul li a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	.entry-meta a,
	.comment-reply-title small a:hover,
	.pagination .page-numbers.current,
	.mobile-menu ul li a:hover,
	.pagination .page-numbers:hover,	
	.entry-tags .tag-links a:hover:before,
	.page-content ul li:before,
	.entry-content ul li:before,
	a:hover,
	.site-title a:hover,
	.entry-title a:hover,
	.entry-related .hentry .entry-title a:hover,
	.sidebar .widget a:hover,
	.sidebar .widget ul li a:hover,	 
	.site-footer .widget a:hover,
	.site-footer .widget ul li a:hover,
	.single .navigation a:hover,
	#site-bottom a:hover,
	.content-block .section-heading h3 a:hover,
	.content-block .section-heading .section-more a:hover,
	.carousel-content .section-heading a:hover,
	.breadcrumbs ul.sub-categories li a:hover,
	.entry-content a:hover,
	.page-content a:hover,
	.author-box .author-meta .author-name a:hover,
	.entry-content li a:hover,
	.page-content li a:hover,
	.content-grid .hentry a:hover .entry-title,
	.friend-nav li a:hover {
		color: <?php echo $primary_color; ?>;
	}
	.sidebar .widget a,
	.site-footer .widget a,
	.logged-in-as a,
	.edit-link a,
	.entry-content a,
	.entry-content a:visited,
	.page-content a,
	.page-content a:visited,
	.tooltip .left .contact-info h3 {
		color: <?php echo $secondary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	button:hover,
	.btn:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="button"]:hover,
	.content-loop .entry-header .entry-category-icon a,
	.entry-tags .tag-links a:hover,
	.widget_tag_cloud .tagcloud a:hover,
	.entry-related .section-title:before,
	.comments-title:before,
	#reply-title:before,
	.breadcrumbs h3:before,	
	.friend h3:before,
	.sidebar .widget .widget-title:before,
	.bottom-right span.icon-link .text,
	.bottom-right a .text {
		background-color: <?php echo $primary_color; ?>;
	}
	.entry-tags .tag-links a:hover:after,
	.widget_tag_cloud .tagcloud a:hover:after {
		border-left-color: <?php echo $primary_color; ?>;
	}
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus,
	.single #primary .bx-wrapper .bx-pager.bx-default-pager a:hover,
	.single #primary .bx-wrapper .bx-pager.bx-default-pager a.active,
	.single #primary .bx-wrapper .bx-pager.bx-default-pager a:focus {
		background-color: <?php echo $primary_color; ?>;
	}
	#secondary-bar,
	.content-block .section-heading h3 {
		border-top-color: <?php echo $primary_color; ?>;
	}
	<?php 
		/* Fix post title margins on single post */
		if( ( get_theme_mod('single-author-avatar-on', true) == false ) &&  
			( get_theme_mod('single-author-name-on', true) == false ) && 
			( get_theme_mod('single-date-on', true) == false ) && 
			( get_theme_mod('single-share-on', true) == false ) && 
			( get_theme_mod('single-comment-on', true) == false ) &&
			( get_theme_mod('single-view-on', true) == false ) ) : 			
	?>
		.single #primary .entry-header h1.entry-title {
			margin-bottom: 0;
		}
		.single .entry-header .entry-meta {
			display: none;
			height: 0;
		}
	<?php 
		endif; 
	?>
	
	<?php
		/* Fix post title margins on content list */
		if( ( get_theme_mod('loop-author-avatar-on', true) == false ) &&  
			( get_theme_mod('loop-author-name-on', true) == false ) &&
			( get_theme_mod('loop-category-on', true) == false ) && 
			( get_theme_mod('loop-date-on', true) == false ) && 
			( get_theme_mod('loop-comment-on', true) == false ) &&
			( get_theme_mod('loop-view-on', true) == false ) ) : 			

	?>
		.content-loop .entry-title,
		.content-search .entry-title {
			margin-bottom: 0;
		}
	<?php 
		endif; 
	?>
	
	<?php if( get_theme_mod('pagination-style', 'choice-1') == 'choice-2' ) : ?>	
		/* Pagination style */
		.pagination {
			display: block;
		}
	<?php endif; ?>

	<?php if( get_theme_mod('single-line-title', true) == true ) : ?>	
		.home-latest ul li {
			max-height: 27px;
			overflow: hidden;	
		}
		.content-block .post-small .entry-title,
		.content-block-2 .post-small .entry-title {
		    max-height: 24px;
			overflow: hidden;    
		}
	<?php endif; ?>
</style>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div id="primary-bar">

			<div class="container">

			<nav id="primary-nav" class="main-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('请设置顶部菜单', 'menhu-1'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->	

			<ul class="top-right">	
				
				<?php if( get_theme_mod('header-day-on', true) == true ) : ?>
					<li class="current-date">
						<?php echo date("Y年m月d日"); ?>
					</li>
				<?php endif; ?>

				<?php if( get_theme_mod('header-day-on', true) == true ) : ?>
					<li class="current-day">
						<?php echo "星期" . mb_substr( "日一二三四五六",date("w"),1,"utf-8" ); ?>					
					</li>
				<?php endif; ?>

				<?php 
					if( is_user_logged_in() ) {
				?>

					<li class="header-user">
						你好, <a href="<?php echo home_url(); ?>/wp-admin/"><?php echo wp_get_current_user()->user_login; ?></a>
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
			</ul><!-- .top-right -->

			</div><!-- .container -->

		</div><!-- #primary-bar -->	

		<div class="site-start clear">

			<div class="container">

			<div class="site-branding">

				<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
				
				<div id="logo">
					<span class="helper"></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
					</a>
				</div><!-- #logo -->

				<?php } else { ?>

				<div class="site-title">
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				</div><!-- .site-title -->
				
				<div class="site-description">
					<?php  echo get_bloginfo( 'description' ); ?>
				</div><!-- .site-description -->				

				<?php } ?>

			</div><!-- .site-branding -->

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('请输入关键词', 'menhu-1'); ?>" autocomplete="off">
						<button type="submit" class="search-submit">搜索</button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>

			<div class="header-icons">
				<?php if ( get_theme_mod('header-mobile-on', true) ) : ?>
				<span class="header-mobile tooltip">
					    <span>手机版</span>
					    <div class="bottom-space">
						    <div class="bottom">
						        <img src="<?php echo get_theme_mod('site-url-qrcode', get_template_directory_uri() . '/assets/img/site-url-qrcode.png'); ?>" alt="手机扫一扫打开网站"/>
						        <h3>扫一扫打开手机网站</h3>
						        <i></i>
						    </div>
						</div>
				</span>
				<?php endif; ?>
				
				<?php if ( get_theme_mod('header-weixin-on', true) ) : ?>				
				<span class="header-weixin tooltip">
					    <span>公众号</span>
					    <div class="bottom-space">
						    <div class="bottom">
						        <img src="<?php echo get_theme_mod('weixin-qrcode', get_template_directory_uri() . '/assets/img/weixin-qrcode.png'); ?>" alt="微信扫一扫关注我们"/>
						        <h3>微信扫一扫关注我们</h3>
						        <i></i>
						    </div>
						</div>
				</span>
				<?php endif; ?>

				<?php if ( get_theme_mod('header-weibo-on', true) ) : ?>
				<span class="header-weibo">
					<a href="<?php echo get_theme_mod('weibo-url', 'https://weibo.com/zhutibaba'); ?>" target="_blank">微博</a>
				</span>		
				<?php endif; ?>										
			</div><!-- .header-icons -->

			<span class="mobile-menu-icon">
				<span class="menu-icon-open"><i class="fa fa-bars"></i><?php echo get_theme_mod('mobile-nav-heading', '菜单'); ?></span>
				<span class="menu-icon-close"><i class="fa fa-close"></i><?php echo get_theme_mod('mobile-nav-heading', '菜单'); ?></span>		
			</span>	
			
			</div><!-- .container -->

		</div><!-- .site-start -->

		<div id="secondary-bar" class="container clear">

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('请设置主菜单', 'menhu-1'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #secondary-nav -->

		</div><!-- .secondary-bar -->

		<div class="mobile-menu clear">

			<div class="container">

			<?php 

				if ( has_nav_menu( 'primary' ) ) {

					echo '<div class="menu-left">';

					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

				if ( has_nav_menu( 'secondary' ) ) {

					echo '<div class="menu-right">';

					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-mobile-menu', 'menu_class' => '', 'depth' => 1 ) );

					echo "</div>";

				}

			?>

			</div><!-- .container -->

		</div><!-- .mobile-menu -->	

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<i class="fa fa-search"></i>
				<i class="fa fa-close"></i>			
			</span>

		<?php endif; ?>						

	</header><!-- #masthead -->

	<div class="clear"></div>
	
	<?php dynamic_sidebar('header-ad'); ?>
		
	<div id="content" class="site-content container clear">
		<div class="clear">
