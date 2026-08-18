<?php
/**
 * Minimal & Modern Search Form Template
 *
 * @package Mimrot
 * @version 1.2.1
 */

$mimrot_search_id = wp_unique_id( 'search-form-' );
?>
<form role="search" method="get" class="search-form minimal-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-input-wrapper">
		<svg class="search-input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<circle cx="11" cy="11" r="8"></circle>
			<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
		</svg>
		<input type="search" id="<?php echo esc_attr( $mimrot_search_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search articles, topics, or keywords...', 'placeholder', 'mimrot' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" required />
		<button type="submit" class="search-submit-btn" aria-label="<?php esc_attr_e( 'Search', 'mimrot' ); ?>">
			<span><?php esc_html_e( 'Search', 'mimrot' ); ?></span>
		</button>
	</div>
</form>
