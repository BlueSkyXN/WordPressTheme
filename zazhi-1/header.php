<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zazhi-1
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
	$primary_color = get_theme_mod('primary-color', '#007fdb');
	$secondary_color = get_theme_mod('secondary-color', '#ff322e');	

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
	.breadcrumbs .breadcrumbs-nav a:hover,
	.entry-meta a,
	.edit-link a,
	.comment-reply-title small a:hover,
	.entry-content a,
	.entry-content a:visited,
	.page-content a,
	.page-content a:visited,
	.pagination .page-numbers.current,
	.mobile-menu ul li a:hover,
	.pagination .page-numbers:hover,	
	.entry-tags .tag-links a:hover:before,
	.page-content ul li:before,
	.entry-content ul li:before {
		color: <?php echo $primary_color; ?>;
	}
	a:hover,
	.site-title a:hover,
	.entry-title a:hover,
	.entry-related .hentry .entry-title a:hover,
	.sidebar .widget a:hover,
	.sidebar .widget ul li a:hover,	 
	.site-footer .widget a:hover,
	.site-footer .widget ul li a:hover,
	.author-box .author-name span a:hover,
	.single .navigation a:hover,
	#site-bottom a:hover,
	.content-block .section-heading h3 a:hover,
	.content-block .section-heading .section-more a:hover,
	.carousel-content .section-heading a:hover,
	.breadcrumbs ul.sub-categories li a:hover {
		color: <?php echo $secondary_color; ?>;
	}

	#secondary-bar,
	.mobile-menu-icon .menu-icon-close,
	.mobile-menu-icon .menu-icon-open,
	.more-button a,
	.more-button a:hover,
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
	.widget_tag_cloud .tagcloud a:hover {
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
		background-color: <?php echo $secondary_color; ?>;
	}

	<?php 
		/* Fix post title margins on single post */
		if( ( get_theme_mod('single-author-avatar-on', true) == false ) &&  
			( get_theme_mod('single-author-name-on', true) == false ) && 
			( get_theme_mod('single-date-on', true) == false ) && 
			( get_theme_mod('single-share-on', true) == false ) && 
			( get_theme_mod('single-comment-on', true) == false ) ) : 
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
			( get_theme_mod('loop-comment-on', true) == false ) ) : 
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

	<?php if( get_theme_mod('hide-sidebar-on', true) == true) : ?>
		/* Hide sidebar on mobile devices */
		@media only screen and (max-width: 959px) {
			#secondary {
				display: none;
			}
		}
	<?php endif; ?>

	<?php if( get_theme_mod('hide-footer-widgets-on', true) == true) : ?>
		/* Hide footer widgets on mobile devices */
		@media only screen and (max-width: 959px) {
			.footer-columns {
				display: none;
			}
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
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('请设置顶部菜单', 'zazhi-1'); ?></a></li>
					</ul><!-- .sf-menu -->

				<?php } ?>

			</nav><!-- #primary-nav -->	

			<?php if ( get_theme_mod('header-search-on', true) ) : ?>

				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('请输入关键词', 'zazhi-1'); ?>" autocomplete="off">
						<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
					</form>
				</div><!-- .header-search -->

			<?php endif; ?>

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

			<?php dynamic_sidebar( 'header-ad' ); ?>

			<span class="mobile-menu-icon">
				<span class="menu-icon-open"><?php echo get_theme_mod('mobile-nav-heading', '菜单'); ?></span>
				<span class="menu-icon-close"><span class="genericon genericon-close"></span></span>		
			</span>	
			
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

		<div id="secondary-bar" class="container <?php echo $bar_color; ?> clear">

			<nav id="secondary-nav" class="secondary-navigation">

				<?php 
					if ( has_nav_menu( 'secondary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'menu_class' => 'sf-menu' ) );
					} else {
				?>

					<ul id="secondary-menu" class="sf-menu">
						<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('请设置主菜单', 'zazhi-1'); ?></a></li>
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
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

		<?php endif; ?>						

	</header><!-- #masthead -->

	<?php
		if(is_home()) {
			get_template_part('template-parts/content','featured');
		}
	?>
	<div class="clear"></div>
	
	<div id="content" class="site-content container clear">
		<div class="clear">
