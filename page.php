<?php
/**
 * The template for displaying all pages
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

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
		endwhile;
		?>

	</main>

	<!-- Right Sidebar -->
	<?php get_sidebar( 'right' ); ?>

</div>

<?php
get_footer();
