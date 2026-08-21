<?php
/**
 * Template part for displaying posts in card layout
 *
 * @package Mimrot
 * @version 1.2.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="post-card-image">
			<?php the_post_thumbnail( 'full' ); ?>
		</a>
	<?php endif; ?>

	<div class="post-card-body">
		
		<div class="post-card-meta">
			<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?> &bull; <?php echo esc_html( mimrot_estimated_reading_time( get_the_ID() ) ); ?>
		</div>

		<h2 class="post-card-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="post-card-excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="post-card-footer">
			<span class="post-card-author"><?php the_author(); ?></span>
			<a href="<?php the_permalink(); ?>" class="post-card-readmore"><?php esc_html_e( 'Read Article &rarr;', 'mimrot' ); ?></a>
		</div>

	</div>

</article>
