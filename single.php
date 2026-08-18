<?php
/**
 * The Template for displaying all single posts with 3-Column Tech Layout
 *
 * @package Mimrot
 * @version 1.2.1
 */

get_header();
?>

<div class="article-layout-grid">

	<!-- 1. LEFT SIDEBAR (WIDGETS) -->
	<?php get_sidebar( 'left' ); ?>

	<!-- 2. CENTER MAIN CONTENT -->
	<main id="primary" class="main-content-col">
		
		<!-- Top Meta (Breadcrumbs & Category Pills) -->
		<div class="post-meta-top">
			<?php mimrot_breadcrumbs(); ?>
			<?php mimrot_post_tags_pills( get_the_ID() ); ?>
		</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			// Sleek, Minimal Previous & Next Post Navigation
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			if ( $prev_post || $next_post ) :
				?>
				<nav class="post-navigation-minimal" aria-label="<?php esc_attr_e( 'Post Navigation', 'mimrot' ); ?>">
					<div class="post-nav-grid">
						<?php if ( $prev_post ) : ?>
							<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="post-nav-card nav-previous">
								<span class="post-nav-direction">&larr; <?php esc_html_e( 'PREVIOUS ARTICLE', 'mimrot' ); ?></span>
								<span class="post-nav-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
							</a>
						<?php else : ?>
							<div></div>
						<?php endif; ?>

						<?php if ( $next_post ) : ?>
							<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="post-nav-card nav-next">
								<span class="post-nav-direction"><?php esc_html_e( 'NEXT ARTICLE', 'mimrot' ); ?> &rarr;</span>
								<span class="post-nav-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
							</a>
						<?php endif; ?>
					</div>
				</nav>
				<?php
			endif;

			// Comments Template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</main>

	<!-- 3. RIGHT SIDEBAR (TABLE OF CONTENTS) -->
	<?php get_sidebar( 'right' ); ?>

</div>

<?php
get_footer();
