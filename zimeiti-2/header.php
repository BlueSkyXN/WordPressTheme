<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zimeiti-2
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
	a:hover,	
	.sf-menu li.sfHover li a:hover,
	.sidebar .widget a:hover,
	.site-footer .widget a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	article.hentry .edit-link a:hover,
	.comment-content a:hover,
	.entry-meta a:hover,
	.entry-title a:hover,
	.content-list .entry-title a:hover,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	#site-bottom a:hover,
	.tab-titles li.active a,
	.entry-category a:after,
	.author-box .author-meta .author-name a:hover,
	#featured-grid h2.section-title span {
		color: <?php echo $primary_color; ?>;
	}	
	h2.section-title .title,
	.breadcrumbs h1 span.title,	
	.tab-titles li.active a,
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
	.sf-menu li a:hover,
	.sf-menu li.sfHover a,
	.entry-category a,	
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus {
		background-color: <?php echo $primary_color; ?>;
	}
	
	@media only screen and (max-width: 767px) {
		#primary-nav {
			background-color: <?php echo $primary_color; ?>;		
		}
	}	
	/* Secondary Color */
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
	.site-footer .widget a {
		color: <?php echo $secondary_color; ?>;
	}

	/* Tertiary Color */
	#featured-grid .entry-like a.liked,
	h2.section-title .posts-counter strong,
	.popular-content .entry-meta .entry-like a.liked,
	.content-list .entry-meta.second-line .entry-like a.liked,
	.related-content .entry-meta .entry-like a.liked,
	.entry-tags .tag-links a,
	.widget_tag_cloud .tagcloud a {
		color: <?php echo $tertiary_color; ?> !important;
	}
	.single #primary .entry-footer .entry-like a {
		background-color: <?php echo $tertiary_color; ?>;
	}
	.entry-tags .tag-links a,
	.widget_tag_cloud .tagcloud a {
		border-color: <?php echo $tertiary_color; ?> !important;
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
		$column_layout = "";	
	?>

	<div id="content" class="site-content container <?php echo $column_layout; ?> <?php if (isset($_GET['home-layout'])) { if($_GET["home-layout"] === "two-col-layout") echo "two-col-layout"; } ?> clear">

	<?php get_template_part('sidebar', '2'); ?>

