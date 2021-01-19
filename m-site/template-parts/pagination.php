<?php if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) : ?>

<!-- status elements -->
<div class="scroller-status">
	<div class="infinite-scroll-request loader-ellips">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/bx_loader.gif" alt=""/> <?php echo get_theme_mod('pagination-loading-text', '正在加载... '); ?>
	</div>
	<p class="infinite-scroll-last"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/tick.png" alt=""/> <?php echo get_theme_mod('pagination-loaded-text', '已加载全部内容'); ?></p>
	<p class="infinite-scroll-error"><?php esc_html_e( '已经没有更多文章了', 'm-site' ); ?></p>
</div><!-- .scroller-status -->

<?php endif; ?>

<?php
	the_posts_pagination( array( 'prev_text' => __( '上一页', 'm-site' ), 'next_text' => __( '下一页', 'm-site' ) ) );
?>

<?php if( get_theme_mod('pagination-style', 'choice-1') == 'choice-1' ) : ?>

<script type="text/javascript">
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        // init Infinite Scroll
        $('.content-list').infiniteScroll({
          path: '.next',
          append: '.hentry',
          status: '.scroller-status',
          hideNav: '.pagination',
        });

    });

})(jQuery);

</script>

<?php endif; ?>
