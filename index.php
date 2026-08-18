<?php
/**
 * Main Template File (Blog Index & Fallback Listing)
 *
 * @package Mimrot
 * @version 1.2.1
 */

get_header();
?>

<div class="article-layout-grid">

	<!-- Left Sidebar (Widgets) -->
	<?php get_sidebar( 'left' ); ?>

	<!-- Main Content Column -->
	<main id="primary" class="main-content-col">
		
		<header class="archive-header" style="margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px dashed var(--color-grid-line);">
			<h1 class="entry-title" style="font-size: 2.25rem;"><?php esc_html_e( 'Latest Engineering & AI Insights', 'mimrot' ); ?></h1>
			<p style="color: var(--color-text-muted); font-size: 1rem; margin-top: 8px;">
				<?php esc_html_e( 'Deep dives, architectural breakdowns, and announcements from our technical teams.', 'mimrot' ); ?>
			</p>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="posts-list-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>

			<div class="pagination-wrapper">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => __( '&larr; Previous', 'mimrot' ),
						'next_text' => __( 'Next &rarr;', 'mimrot' ),
					)
				);
				?>
			</div>

		<?php else : ?>

			<p><?php esc_html_e( 'No posts found.', 'mimrot' ); ?></p>

		<?php endif; ?>

	</main>

	<!-- Empty / Minimal Right Column for Archive Page Symmetry -->
	<aside class="right-sidebar-col">
		<div class="toc-header"><?php esc_html_e( 'SUBSCRIBE TO UPDATES', 'mimrot' ); ?></div>
		<p style="font-size: 0.82rem; color: var(--color-text-muted); margin-bottom: 16px;">Get technical deep dives delivered straight to your inbox.</p>
		<input type="email" placeholder="you@company.com" style="width:100%; padding:8px 12px; font-size:0.85rem; border:1px solid var(--color-border); border-radius:var(--radius-sm); margin-bottom:8px; background:var(--color-surface); color:var(--color-text-primary);">
		<button class="btn-primary" style="width:100%;"><?php esc_html_e( 'Subscribe', 'mimrot' ); ?></button>
	</aside>

</div>

<?php
get_footer();
