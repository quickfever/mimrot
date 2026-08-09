<?php
/**
 * The template for displaying comments
 *
 * @package CloudTech
 * @version 1.2.0
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf( esc_html__( '1 COMMENT', 'cloudtech' ) );
			} else {
				printf(
					/* translators: 1: comment count */
					esc_html( _nx( '%1$s COMMENT', '%1$s COMMENTS', $comment_count, 'comments title', 'cloudtech' ) ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 44,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => esc_html__( '&larr; Older Comments', 'cloudtech' ),
				'next_text' => esc_html__( 'Newer Comments &rarr;', 'cloudtech' ),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed for this article.', 'cloudtech' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	comment_form(
		array(
			'title_reply'        => esc_html__( 'LEAVE A COMMENT', 'cloudtech' ),
			'title_reply_to'     => esc_html__( 'LEAVE A REPLY TO %s', 'cloudtech' ),
			'cancel_reply_link'  => esc_html__( 'Cancel Reply', 'cloudtech' ),
			'label_submit'       => esc_html__( 'Post Comment', 'cloudtech' ),
			'class_submit'       => 'btn-primary comment-submit-btn',
			'comment_field'      => '<div class="comment-form-group comment-form-comment"><label for="comment" class="form-label">' . esc_html__( 'Comment', 'cloudtech' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="' . esc_attr__( 'Join the discussion...', 'cloudtech' ) . '" required="required"></textarea></div>',
			'fields'             => array(
				'author' => '<div class="comment-form-row"><div class="comment-form-group"><label for="author" class="form-label">' . esc_html__( 'Name *', 'cloudtech' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Your name', 'cloudtech' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
				'email'  => '<div class="comment-form-group"><label for="email" class="form-label">' . esc_html__( 'Email *', 'cloudtech' ) . '</label><input id="email" name="email" type="email" placeholder="' . esc_attr__( 'your@email.com', 'cloudtech' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></div></div>',
				'url'    => '<div class="comment-form-group"><label for="url" class="form-label">' . esc_html__( 'Website (optional)', 'cloudtech' ) . '</label><input id="url" name="url" type="url" placeholder="' . esc_attr__( 'https://yourwebsite.com', 'cloudtech' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
			),
		)
	);
	?>

</section>
