<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package menhu-1
 */


?>

<aside id="secondary" class="widget-area sidebar">

<?php if ( is_active_sidebar( 'homepage-sidebar' ) ) { ?>

	<?php dynamic_sidebar( 'homepage-sidebar' ); ?>

<?php } elseif ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

<?php } else { ?>

	<div class="widget">
		<p><?php echo __('请在<strong>右侧边栏（首页）</strong>中添加小工具。', 'menhu-1'); ?></p>
		<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('好的，我现在就去添加 &raquo;', 'menhu-1'); ?></a></p>
	</div>

<?php } ?>

</aside><!-- #secondary -->

