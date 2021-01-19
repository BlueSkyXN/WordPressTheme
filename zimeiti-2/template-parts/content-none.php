<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package zimeiti-2
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '找不到相关结果', 'zimeiti-2' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php esc_html_e( '准备好发布您的第一篇文章了吗?', 'zimeiti-2' );  ?> <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php esc_html_e( '现在开始', 'zimeiti-2' ); ?></a>.
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( '您输入的关键字无相关结果，请尝试其他关键字。', 'zimeiti-2' ); ?></p>
			<?php
				//get_search_form();

		else : ?>

			<p><?php esc_html_e( '无相关结果，请返回首页，或输入关键字搜索相应结果。', 'zimeiti-2' ); ?></p>
			
			<?php
				//get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
