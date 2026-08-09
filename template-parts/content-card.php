<?php
/**
 * Template part for displaying posts in card layout
 *
 * @package CloudTech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?> style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); overflow: hidden; display: flex; flex-direction: column; transition: transform var(--transition-fast), border-color var(--transition-fast);">
	
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="post-card-image" style="aspect-ratio: 16/9; overflow: hidden; display: block;">
			<?php the_post_thumbnail( 'medium_large', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="post-card-body" style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
		
		<div class="post-card-meta" style="font-family: var(--font-family-mono); font-size: 0.72rem; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px;">
			<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?> &bull; <?php echo esc_html( cloudtech_estimated_reading_time( get_the_ID() ) ); ?>
		</div>

		<h2 class="post-card-title" style="font-family: var(--font-family-heading); font-size: 1.15rem; font-weight: 700; line-height: 1.3; margin-bottom: 10px;">
			<a href="<?php the_permalink(); ?>" style="color: var(--color-text-primary);"><?php the_title(); ?></a>
		</h2>

		<div class="post-card-excerpt" style="font-size: 0.88rem; color: var(--color-text-secondary); margin-bottom: 16px; flex-grow: 1;">
			<?php the_excerpt(); ?>
		</div>

		<div class="post-card-footer" style="padding-top: 12px; border-top: 1px dashed var(--color-grid-line); display: flex; align-items: center; justify-content: space-between;">
			<span style="font-size: 0.8rem; font-weight: 600; color: var(--color-text-primary);"><?php the_author(); ?></span>
			<a href="<?php the_permalink(); ?>" style="font-size: 0.8rem; font-weight: 600; color: var(--color-accent);"><?php esc_html_e( 'Read Article &rarr;', 'cloudtech' ); ?></a>
		</div>

	</div>

</article>
