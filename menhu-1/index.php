<?php get_header(); ?>

	<div id="primary" class="content-area clear">

		<?php
			if(is_home()) {
				get_template_part('template-parts/content','featured');
				get_template_part('template-parts/home','latest');
			}
		?>
		<div class="latest-content">

		</div><!-- .latest-content -->

		<main id="main" class="site-main clear">

			<div id="recent-content">

			<?php if ( is_active_sidebar( 'homepage' ) ) { ?>

				<?php dynamic_sidebar( 'homepage' ); ?>

			<?php } else { ?>

				<div class="notice entry-content">
					<p><?php echo __('请将“首页内容 - 1/2个栏目”和“广告”小工具添加到<strong>首页内容（栏目）</strong>区域。', 'menhu-1'); ?></p>

					<a href="<?php echo home_url(); ?>/wp-admin/widgets.php" target="_blank"><?php echo __('好的，我现在就去设置 &raquo;', 'menhu-1'); ?></a>  | <a href="<?php echo get_template_directory_uri(); ?>/assets/img/how-to-widgets.png" target="_blank"><?php echo __('教我如何设置 &raquo;', 'menhu-1'); ?></a>
				</div>

			<?php } ?>							
			
			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_template_part('sidebar', 'home'); ?>
<?php get_footer(); ?>
