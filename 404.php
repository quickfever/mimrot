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

	<main id="primary" class="main-content-col main-content-404">
		<div class="error-404-box">
			<span class="error-404-number">404</span>
			<h1 class="entry-title error-404-title"><?php esc_html_e( 'Page Not Found', 'mimrot' ); ?></h1>
			<p class="error-404-text">
				<?php esc_html_e( 'The resource or article you are looking for may have been moved, renamed, or deleted.', 'mimrot' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary error-404-btn">
				<?php esc_html_e( '&larr; Return to Homepage', 'mimrot' ); ?>
			</a>
		</div>
	</main>

	<?php get_sidebar( 'right' ); ?>

</div>

<?php
get_footer();
