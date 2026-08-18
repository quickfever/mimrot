<?php
/**
 * The template for displaying comments
 *
 * @package Mimrot
 * @version 1.2.1
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
				printf( esc_html__( '1 COMMENT', 'mimrot' ) );
			} else {
				printf(
					/* translators: 1: comment count */
					esc_html( _nx( '%1$s COMMENT', '%1$s COMMENTS', $comment_count, 'comments title', 'mimrot' ) ),
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
					'avatar_size' => 40,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => esc_html__( '&larr; Older Comments', 'mimrot' ),
				'next_text' => esc_html__( 'Newer Comments &rarr;', 'mimrot' ),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed for this article.', 'mimrot' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	comment_form(
		array(
			'title_reply'        => esc_html__( 'LEAVE A COMMENT', 'mimrot' ),
			'title_reply_to'     => esc_html__( 'LEAVE A REPLY TO %s', 'mimrot' ),
			'cancel_reply_link'  => esc_html__( 'Cancel Reply', 'mimrot' ),
			'label_submit'       => esc_html__( 'Post Comment', 'mimrot' ),
			'class_submit'       => 'btn-primary comment-submit-btn',
			'comment_field'      => '<p class="comment-form-comment"><label for="comment" class="form-label">' . esc_html__( 'Comment', 'mimrot' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" placeholder="' . esc_attr__( 'Write your response here...', 'mimrot' ) . '" required="required"></textarea></p>',
			'fields'             => array(
				'author' => '<p class="comment-form-author"><label for="author" class="form-label">' . esc_html__( 'Name *', 'mimrot' ) . '</label><input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Your name', 'mimrot' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></p>',
				'email'  => '<p class="comment-form-email"><label for="email" class="form-label">' . esc_html__( 'Email *', 'mimrot' ) . '</label><input id="email" name="email" type="email" placeholder="' . esc_attr__( 'your@email.com', 'mimrot' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></p>',
				'url'    => '<p class="comment-form-url"><label for="url" class="form-label">' . esc_html__( 'Website (optional)', 'mimrot' ) . '</label><input id="url" name="url" type="url" placeholder="' . esc_attr__( 'https://yourwebsite.com', 'mimrot' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>',
			),
		)
	);
	?>

</section>
