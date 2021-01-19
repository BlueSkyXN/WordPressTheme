<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    
    <?php
    $login_url = wp_login_url() . '?redirect_to='.get_permalink();
    $reg_url = wp_registration_url() . '?redirect_to='.get_permalink();

    $fields =  array(
        'author' => '<div class="comment-form-author"><label for="author">'.( $req ? '<span class="required">*</span>' : '' ).__('名字: ', 'boke-x').'</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"'.( $req ? ' class="required"' : '' ).'></div>',
        'email'  => '<div class="comment-form-email"><label for="email">'.( $req ? '<span class="required">*</span>' : '' ).__('邮箱: ', 'boke-x').'</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"'.( $req ? ' class="required"' : '' ).'></div>'
    );
    $formsubmittext = '';
    if(is_user_logged_in()) {
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $formsubmittext = '<div class="pull-left form-submit-text">'.get_avatar( $user->ID, 60 ).'<span>'.$user_identity.'</span></div>';
    }
    comment_form( array(
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h3>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' =>  '<div class="comment-form-comment"><textarea id="comment" name="comment" class="required" rows="6" placeholder="请填写您的评论"></textarea></div>',
        'must_log_in' => '<div class="comment-form"><div class="comment-must-login">请登录后参与评论...</div><div class="form-submit"><div class="form-submit-text pull-left"><a href="'.$login_url.'">登录</a> &bullet; <a href="'.$reg_url.'">注册</a></div><a id="must-login" class="submit" href='.$login_url.'>发布</a></div></div>',
        'logged_in_as' => '',
        'submit_field' => '<div class="form-submit">'.$formsubmittext.'%1$s %2$s</div>',
        'label_submit' => '提交',
        'format' => 'html5'
    ) );
    ?>
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			printf(__('评论列表(%s)', 'boke-x'), number_format_i18n( $comments_number ));
			?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( '评论分页', 'boke-x' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '上一页', 'boke-x' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( '下一页', 'boke-x' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.
		?>

	<?php endif; // Check for have_comments(). ?>
</div><!-- .comments-area -->