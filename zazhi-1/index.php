<?php get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

			<div id="recent-content">

			<?php if ( is_active_sidebar( 'homepage' ) ) { ?>

				<?php dynamic_sidebar( 'homepage' ); ?>

			<?php } else { ?>

				<div class="notice">
					<p><?php echo __('请将“首页内容 - 1/2/3个栏目”和“广告”小工具添加到<strong>首页内容（栏目）</strong>区域。', 'zazhi-1'); ?></p>

					<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php" target="_blank"><?php echo __('好的，我现在就去设置 &raquo;', 'zazhi-1'); ?></a>  | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-widgets.png" target="_blank"><?php echo __('教我如何设置 &raquo;', 'zazhi-1'); ?></a></p>
				</div>

			<?php } ?>							
			
			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_template_part('sidebar', 'home'); ?>
<?php get_footer(); ?>
