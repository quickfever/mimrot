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
		
		<header class="archive-header">
			<h1 class="entry-title archive-title"><?php esc_html_e( 'Latest Engineering & AI Insights', 'mimrot' ); ?></h1>
			<p class="archive-description">
				<?php esc_html_e( 'Deep dives, architectural breakdowns, and announcements from our technical teams.', 'mimrot' ); ?>
			</p>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="posts-list-grid">
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

			<p class="no-posts-found"><?php esc_html_e( 'No posts found.', 'mimrot' ); ?></p>

		<?php endif; ?>

	</main>

	<!-- Right Column: Subscribe Widget for Archive Symmetry -->
	<aside class="right-sidebar-col">
		<div class="subscribe-widget">
			<div class="toc-header"><?php esc_html_e( 'SUBSCRIBE TO UPDATES', 'mimrot' ); ?></div>
			<p class="subscribe-description"><?php esc_html_e( 'Get technical deep dives delivered straight to your inbox.', 'mimrot' ); ?></p>
			<form class="subscribe-form" action="#" method="post">
				<input type="email" class="subscribe-input" placeholder="<?php esc_attr_e( 'you@company.com', 'mimrot' ); ?>" required />
				<button type="submit" class="btn-primary subscribe-btn"><?php esc_html_e( 'Subscribe', 'mimrot' ); ?></button>
			</form>
		</div>
	</aside>

</div>

<?php
get_footer();
