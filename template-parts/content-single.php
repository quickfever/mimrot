<?php
/**
 * Template part for displaying single post content
 *
 * @package CloudTech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article-entry' ); ?>>

	<!-- Entry Header -->
	<header class="entry-header">
		
		<!-- Publication Date -->
		<time class="post-date-stamp" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
			<?php echo esc_html( strtoupper( get_the_date( 'F j, Y' ) ) ); ?>
		</time>

		<!-- Main Title -->
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<!-- Author & Meta Bar -->
		<div class="author-meta-bar">
			<div class="author-info">
				<div class="author-avatars">
					<img class="author-avatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&h=120&q=80" alt="<?php echo esc_attr( get_the_author() ); ?>">
					<img class="author-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&h=120&q=80" alt="Co-author">
				</div>
				<div class="author-names">
					<?php the_author(); ?> <span>and</span> Marina Elmore
				</div>
			</div>

			<div class="reading-meta-tools">
				<span class="tool-item">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
					<?php echo esc_html( cloudtech_estimated_reading_time( get_the_ID() ) ); ?>
				</span>
				<button type="button" class="tool-item copy-url-btn" onclick="CloudTechMain.copyCurrentUrl(this)">
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
					<?php esc_html_e( 'COPY URL', 'cloudtech' ); ?>
				</button>
			</div>
		</div>

	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-featured-image" style="margin-bottom: 32px; border-radius: var(--radius-md); overflow: hidden; border: 1px solid var(--color-border);">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>

	<!-- Entry Body Content -->
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cloudtech' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<!-- Entry Footer -->
	<footer class="entry-footer" style="margin-top: 48px; padding-top: 24px; border-top: 1px dashed var(--color-grid-line);">
		<?php cloudtech_post_tags_pills( get_the_ID() ); ?>
	</footer>

</article>
