<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Mimrot
 * @version 1.2.1
 */

get_header();
?>

<div class="article-layout-grid">

	<?php get_sidebar( 'left' ); ?>

	<main id="primary" class="main-content-col" style="text-align: center; padding-top: 80px;">
		<div class="error-404-box" style="background: var(--color-surface); padding: 48px; border: 1px solid var(--color-border); border-radius: var(--radius-lg);">
			<span style="font-family: var(--font-family-mono); font-size: 4rem; font-weight: 800; color: var(--color-accent); display: block; line-height: 1;">404</span>
			<h1 class="entry-title" style="font-size: 2rem; margin: 16px 0;"><?php esc_html_e( 'Page Not Found', 'mimrot' ); ?></h1>
			<p style="color: var(--color-text-secondary); margin-bottom: 24px;">
				<?php esc_html_e( 'The resource or article you are looking for may have been moved, renamed, or deleted.', 'mimrot' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary" style="display: inline-block; text-decoration: none;">
				<?php esc_html_e( '&larr; Return to Homepage', 'mimrot' ); ?>
			</a>
		</div>
	</main>

	<?php get_sidebar( 'right' ); ?>

</div>

<?php
get_footer();
