<div class="left-col sidebar-2">
	<?php //dynamic_sidebar( 'sidebar-2' ); ?>

	<nav id="left-nav" class="left-navigation">
		<?php 
		if ( has_nav_menu( 'left' ) ) {
			wp_nav_menu( array( 'theme_location' => 'left', 'menu_id' => 'left-menu', 'menu_class' => 'left-menu' ) );
		} else { 
		?>
			<ul>
			    <?php wp_list_categories( array('title_li' => '<h3>' . __( '分类目录', 'zimeiti-1' ) . '</h3>') ); ?>
			</ul>

		<?php } ?>
	</nav><!-- #left-nav -->

</div><!-- .left-col -->