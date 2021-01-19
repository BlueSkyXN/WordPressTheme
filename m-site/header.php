<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-site
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
	$primary_color = get_theme_mod('primary-color', '#ff4c4c');
	$secondary_color = get_theme_mod('secondary-color', '#037ef3');
	$tertiary_color = get_theme_mod('tertiary-color', '#76b852');
?>
<style type="text/css">
	
	/* Theme Colors */
	/* Primary Color */
	article.hentry .edit-link a:hover,
	.comment-content a:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	#site-bottom a:hover,
	.author-box .author-meta .author-name a:hover,
	article.hentry .edit-link a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.site-footer .widget a {
		color: <?php echo $primary_color; ?>;
	}	
	h2.section-title .title,
	.breadcrumbs h1 span.title,	
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current {
		border-bottom-color: <?php echo $primary_color; ?>;
	}	
	.site-header,
	#back-top a .fa,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"] {
		background-color: <?php echo $primary_color; ?>;		
	}
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus {
		background-color: #ffbe02;
	}

	/* Secondary Color */
	.page-content a,
	.entry-content a {
		color: <?php echo $secondary_color; ?>;
	}

	/* Tertiary Color */
	h2.section-title .posts-counter strong,
	.related-content .entry-meta .entry-like a.liked,
	.content-list .entry-meta .entry-like a.liked {
		color: <?php echo $tertiary_color; ?> !important;
	}
	.single #primary .entry-footer .entry-like a {
		background-color: <?php echo $tertiary_color; ?>;
	}
	<?php if( get_theme_mod('loop-font-bold-on', false) == true) : ?>
		/* Make headings strong font */
		.content-list .entry-title {
			font-weight: bold;
		}
	<?php endif; ?>

</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
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
	<header id="masthead" class="site-header container <?php echo $bar_color; ?> clear">
		<?php
			the_custom_header_markup();
		?>

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

		<?php if ( get_theme_mod('top-menu-on', true) == true ) : ?> 

			<div class="top-menu-icon">
				<span class="genericon genericon-menu"></span>
				<span class="genericon genericon-close"></span>		
			</div><!-- .top-menu-icon -->

			<div class="top-menu">
				<?php 
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'top-nav', 'menu_class' => 'top-nav clear', 'depth' => '1' ) );
				?>			
			</div><!-- .top-menu -->

		<?php endif; ?>

		<?php if ( get_theme_mod('header-search-on', true) == true ) : ?> 

			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<?php get_search_form(); ?>
			</div><!-- .header-search -->

		<?php endif; ?>

	</header><!-- #masthead -->	

	<?php
		$menu_cols = "";

		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-0') {
			$menu_cols = 'flexible-menu';
		}			
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-1') {
			$menu_cols = 'menu_column_1';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-2') {
			$menu_cols = 'menu_column_2';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-3') {
			$menu_cols = 'menu_column_3';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-4') {
			$menu_cols = 'menu_column_4';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-5') {
			$menu_cols = 'menu_column_5';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-6') {
			$menu_cols = 'menu_column_6';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-7') {
			$menu_cols = 'menu_column_7';
		}
		if ( get_theme_mod('menu-columns', 'choice-4') == 'choice-8') {
			$menu_cols = 'menu_column_8';
		}		
	?>

	<nav id="primary-nav" class="primary-navigation container <?php echo $menu_cols; ?>">
		<?php 
			wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'primary-menu', 'menu_class' => 'm-menu clear', 'depth' => '1' ) );
		?>
	</nav><!-- #primary-nav -->

<div id="content" class="site-content container clear">
