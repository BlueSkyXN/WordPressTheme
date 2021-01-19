<?php
/**
 * Template Name: 演示 - 图标居中
 *
 * The template for displaying full width pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tupian_1
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
	$theme_color = get_theme_mod('theme-color', '#26b');
	$secondary_color = get_theme_mod('secondary-color', '#ffbe02');
	
	// Font Size
	$body_font_size = get_theme_mod('body-font-size', '16px');
?>

<style type="text/css" media="all">
	h1,h2,h3,h4,h5,h6,
	.sf-menu li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	body,
	input,
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title,
	.content-loop .content-ad .widget-title {
		font-family: Arial, 'PingFang SC', 'Microsoft Yahei', sans-serif;
	}
	#primary-bar,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.pagination .page-numbers:hover,
	.header-search .search-submit,
	.bottom-right span.icon-link .text,
	.bottom-right a .text,
	.comment-reply-title:before,
	.comments-title:before,
	.entry-related h3:before,
	.sidebar .widget .widget-title:before {
		background-color: <?php echo $theme_color; ?>;
	}
	
	a:hover,
	.sf-menu li li a:hover,
	.setup-notice p a,
	.pagination .page-numbers.current,
	.entry-related h3 span,
	.entry-tags .edit-link a,
	.author-box .author-meta .author-name a,
	.author-box .author-meta .author-name a:hover,
	.author-box .author-meta .author-desc a,
	.page-content a,
	.entry-content a,
	.page-content a:visited,
	.entry-content a:visited,	
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget a:hover,
	.sidebar ul li a:hover,
	.content-loop .entry-title a:hover {
		color: <?php echo $theme_color; ?>;
	}
	.header-search-alt,
	.header-search-alt:hover,
	#carousel li.flex-active-slide img {
		border-color: <?php echo $secondary_color; ?>;
	}
	.header-search-alt .search-submit,
	.header-search-alt .search-submit:hover {
		background: <?php echo $secondary_color; ?>;
	}
</style>

</head>

<?php if (is_front_page() || is_archive() || is_search() ) { do_action('tupian_1_before_site'); } //Hooked: tupian_1_preloader() ?>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div class="site-start clear">

			<div class="container clear">
			
			<div class="site-branding">

				<?php if ( !empty(get_theme_mod('logo')) ) { ?>
				
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

				<?php } ?>

			</div><!-- .site-branding -->

			<div class="header-left">
				
				<div class="header-icons">
					
					<?php if ( get_theme_mod('header-weibo-on', true) ) : ?>
					<span class="header-weibo">
						<a href="<?php echo get_theme_mod('weibo-url', 'https://weibo.com/zhutibaba'); ?>" target="_blank"><i class="fa fa-weibo"></i> 微博</a>
					</span>		
					<?php endif; ?>			

					<?php if ( get_theme_mod('header-weixin-on', true) ) : ?>				
					<span class="header-weixin tooltip">
					    <span><i class="fa fa-weixin"></i> 公众号</span>
					    <div class="bottom-space">
						    <div class="bottom">
						        <img src="<?php echo get_theme_mod('weixin-qrcode', get_template_directory_uri() . '/assets/img/weixin-qrcode.png'); ?>" alt="微信扫一扫关注我们"/>
						        <h3>微信扫一扫关注我们</h3>
						        <i></i>
						    </div>
						</div>
					</span>
					<?php endif; ?>

					<?php if ( get_theme_mod('header-mobile-on', true) ) : ?>
					<span class="header-mobile tooltip">
						    <span><i class="fa fa-mobile"></i> 手机版</span>
						    <div class="bottom-space">
							    <div class="bottom">
							        <img src="<?php echo get_theme_mod('site-url-qrcode', get_template_directory_uri() . '/assets/img/site-url-qrcode.png'); ?>" alt="手机扫一扫打开网站"/>
							        <h3>扫一扫打开手机网站</h3>
							        <i></i>
							    </div>
							</div>
					</span>
					<?php endif; ?>
							
				</div><!-- .header-icons -->	
							
			</div>

			<div class="header-right">
				<ul>
				<?php 
					if( is_user_logged_in() ) {
				?>

					<li class="header-user">
						<a href="<?php echo home_url(); ?>/wp-admin/"><i class="fa fa-user-o"></i> <?php echo wp_get_current_user()->display_name; ?></a>
					</li>

					<li class="header-logout">
						<a href="<?php echo wp_logout_url(); ?>" title="退出"><i class="fa fa-sign-out"></i> 退出</a>
					</li>

				<?php
					} else {
				?>

					<?php if( get_theme_mod('header-login-on', true) == true ) : ?>
						<li class="header-login">
							<a href="<?php echo wp_login_url(); ?>" title="登录"><i class="fa fa-user-o"></i> 登录</a>
						</li>
					<?php endif; ?>

					<?php if( get_theme_mod('header-reg-on', true) == true ) : ?>
						<li class="header-register">
							<a href="<?php echo wp_registration_url(); ?>" title="注册"><i class="fa fa-sign-in"></i> 注册</a>
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
						<a href="<?php echo $tougao_link; ?>" title="用户投稿"><i class="fa fa-pencil-square-o"></i> 投稿</a>
					</li>	
				<?php endif; ?>	
				</ul>
			</div>

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>
				
				<span class="search-icon">
					<span class="genericon genericon-search"></span>
					<span class="genericon genericon-close"></span>			
				</span>

			<?php endif; ?>	
							
			</div><!-- .container -->

		</div><!-- .site-start -->

		<?php
			/* Custom background colors for theme demo */
			$bar_color = '';

			if (isset($_GET['color'])) { 
				if($_GET["color"] === "red") {

					$bar_color = "bar-red";

				} elseif ($_GET["color"] === "green") {

					$bar_color = "bar-green";

				} elseif ($_GET["color"] === "orange") {

					$bar_color = "bar-orange";

				} elseif ($_GET["color"] === "pink") {

					$bar_color = "bar-pink";

				} elseif ($_GET["color"] === "purple") {
					
					$bar_color = "bar-purple";

				} elseif ($_GET["color"] === "blue") {
					
					$bar_color = "bar-blue";

				} elseif ($_GET["color"] === "sky-blue") {
					
					$bar_color = "bar-sky-blue";

				} elseif ($_GET["color"] === "light-green") {
					
					$bar_color = "bar-light-green";
																
				}else {
					$bar_color = '';
				}
			}
		?>

		<div id="primary-bar" class="<?php echo $bar_color; ?> clear">

			<div class="container clear">

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
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="primary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('请设置主菜单', 'tupian-1'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>
				
				<span class="search-icon">
					<span class="genericon genericon-search"></span>
					<span class="genericon genericon-close"></span>			
				</span>

			<?php endif; ?>	

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="输入关键词" autocomplete="off">
						<button type="submit" class="search-submit"><?php echo __('搜索', 'tupian-1'); ?></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>					


			</div><!-- .container -->

		</div><!-- #primary-bar -->		

	</header><!-- #masthead -->

	<?php dynamic_sidebar( 'header-ad' ); ?>

	<div class="header-space"></div>

	<div id="content" class="site-content container clear">

	<div id="primary" class="content-area layout-1c clear">	

		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-loop">

				<?php

				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('paged='.$paged);

				if ( $wp_query->have_posts() ) :

				$i = 1;

				echo "<div class=\"posts-loop\">";

				while ($wp_query->have_posts()) : $wp_query->the_post();								

					get_template_part('template-parts/content', 'loop');

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
