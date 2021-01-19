<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zimeiti-1
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
?>
<style type="text/css">
	
	/* Theme Colors */
	.site-title a:hover,
	.site-header .search-icon:hover span,
	.site-header .search-icon:hover span:before,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.site-footer .widget a,
	#back-top a span,
	#site-bottom a:hover {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	#back-top a:hover span {
		background-color: <?php echo $primary_color; ?>;
	}
	.entry-category a,
	.header-search .search-input:focus,
	.sidebar .widget_search input[type='search']:focus,
	#back-top a span {
		border-color: <?php echo $primary_color; ?>;
	}
	.entry-category a,
	.entry-category a:hover {
		color: <?php echo $primary_color; ?> !important;
	}
	a:hover,	
	.sidebar .widget a:hover,
	.site-footer .widget a:hover,
	.entry-title a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.content-list .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.comment-content a:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.single #primary .sticky-breadcrumbs .entry-comment a,
	.entry-meta a:hover {
		color: <?php echo $secondary_color; ?>;
	}	
	.sidebar-2 #left-nav li a:hover,
	.sidebar-2 #left-nav li.current-cat a,
	.sidebar-2 #left-nav li.current-menu-item a,
	.sidebar-2 #left-nav li.categories h3,
	.search .sidebar-2 #left-nav li.menu-item-home a,
	.single .sidebar-2 #left-nav li.menu-item-home a,
	.author .sidebar-2 #left-nav li.menu-item-home a,
	.tag .sidebar-2 #left-nav li.menu-item-home a,
	.sidebar .widget .widget-title:before {
		background-color: <?php echo $secondary_color; ?>; 
	}
	.slicknav_nav {
		border-color: <?php echo $secondary_color; ?>
	}
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus {
		background-color: #ffbe02;
	}
	.header-search {
		border-top-color: #ffbe02;
	}
	<?php if( get_theme_mod('loop-font-bold-on', false) == true) : ?>
		/* Make headings strong font */
		.content-list .entry-title {
			font-weight: bold;
		}
	<?php endif; ?>

	<?php if( get_theme_mod('loop-view-on', true) == false) : ?>
		/* Display views count on content list */
		.content-list .entry-meta .entry-comment {
			margin-left: 0;
		}
		.content-list .entry-meta .entry-comment:before {
			content: none;
			display: none;
		}
	<?php endif; ?>
	
	<?php if( get_theme_mod('single-view-on', true) == false) : ?>
		/* Display views count on single post */
		.single #primary .entry-meta .entry-comment {
			margin-left: 0;
		}
		.single #primary .entry-meta .entry-comment:before {
			content: none;
		}
	<?php endif; ?>

	
	<?php 
		/* Fix post title margins on single post */
		if( ( get_theme_mod('single-category-on', true) == false ) && 
			( get_theme_mod('single-author-avatar-on', true) == false ) &&  
			( get_theme_mod('single-author-name-on', true) == false ) && 
			( get_theme_mod('single-date-on', true) == false ) && 
			( get_theme_mod('single-share-on', true) == false ) && 
			( get_theme_mod('single-view-on', true) == false ) && 
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
		if( ( get_theme_mod('loop-category-on', true) == false ) && 
			( get_theme_mod('loop-author-avatar-on', true) == false ) &&  
			( get_theme_mod('loop-author-name-on', true) == false ) && 
			( get_theme_mod('loop-date-on', true) == false ) && 
			( get_theme_mod('loop-view-on', true) == false ) && 
			( get_theme_mod('loop-comment-on', true) == false ) ) : 
	?>
		.content-list .entry-title,
		.content-search .entry-title {
			margin-bottom: 0;
		}
	<?php 
		endif; 
	?>

	
	<?php if( get_theme_mod('loop-featured-mod-on', false) == true ) : ?>
		/* Customize thumbnail width on content list */
		<?php if( get_theme_mod('home-layout', 'choice-1') == 'choice-1' ) { ?>
			@media only screen and (min-width: 1180px) {
				.content-list .thumbnail-link {
					width: <?php echo get_theme_mod('loop-featured-width', '217'); ?>px;
				}
			}
		<?php } else { ?>	
			@media only screen and (min-width: 1180px) {
				.two-col-layout .content-list .thumbnail-link {
					width: <?php echo get_theme_mod('loop-featured-width', '262'); ?>px;
				}
			}
		<?php } ?>
	<?php endif; ?>

	
	<?php if( get_theme_mod('pagination-style', 'choice-1') == 'choice-2' ) : ?>	
		/* Pagination style */
		.content-list .hentry.last,
		.content-search .hentry.last {
			border-bottom: none;
		}
		.pagination {
			display: block;
		}
	<?php endif; ?>

	<?php if( get_theme_mod('sidebar-widget-title-border-on', true) == false) : ?>
		/* Display left border of widget title on sidebar */
		.sidebar .widget .widget-title:before {
			content: none;
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

	<?php if( get_theme_mod('hide-footer-column-on', true) == true) : ?>
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

		<nav id="primary-nav" class="primary-navigation">
			<?php 
				wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
			?>
		</nav><!-- #primary-nav -->

		<div id="slick-mobile-menu"></div>
			
		<?php if( get_theme_mod('header-search-on', true) == true ) : ?>

			<span class="search-icon">
				<span class="genericon genericon-search"> <span><?php esc_html_e('搜索', 'zimeiti-1'); ?></span></span>
				<span class="genericon genericon-close"> <span><?php esc_html_e('收起', 'zimeiti-1'); ?></span></span>			
			</span>

			<div class="header-search">
				<?php get_search_form(); ?>
			</div><!-- .header-search -->
		
		<?php endif; ?>

		</div><!-- .container -->

	</header><!-- #masthead -->	

	<?php
		$column_layout = "";

		if (!is_single()) :
			if( ( get_theme_mod('home-layout', 'choice-1') == 'choice-1' ) && ( !(is_page_template('full-single-post.php') ) ) ) {
				$column_layout = 'three-col-layout';
			} else {
				$column_layout = 'two-col-layout';
			}
		endif;

		if (is_single() ) :
			if( ( get_theme_mod('single-layout', 'choice-1') == 'choice-1' ) && ( !(is_page_template('full-single-post.php') ) ) ) {
				$column_layout = 'three-col-layout';
			} else {
				$column_layout = 'two-col-layout';
			}
		endif;		
	?>

	<div id="content" class="site-content container <?php echo $column_layout; ?> <?php if (isset($_GET['home-layout'])) { if($_GET["home-layout"] === "two-col-layout") echo "two-col-layout"; } ?> clear">
