<?php
/**
 * The Footer Template
 *
 * @package Mimrot
 * @version 1.2.1
 */

?>

</div> <!-- /.tech-grid-wrapper -->

<!-- Site Footer -->
<footer id="colophon" class="site-footer">
	<div class="footer-container">
		
		<div class="footer-grid">
			
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			<?php else : ?>
				
				<!-- Default Footer Column 1 -->
				<div class="footer-col">
					<h4 class="footer-widget-title"><?php esc_html_e( 'PRODUCTS', 'mimrot' ); ?></h4>
					<ul class="footer-list">
						<li><a href="#"><?php esc_html_e( 'Application Services', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'AI & Workers', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Zero Trust', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Network Services', 'mimrot' ); ?></a></li>
					</ul>
				</div>

				<!-- Default Footer Column 2 -->
				<div class="footer-col">
					<h4 class="footer-widget-title"><?php esc_html_e( 'RESOURCES', 'mimrot' ); ?></h4>
					<ul class="footer-list">
						<li><a href="#"><?php esc_html_e( 'Developer Docs', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'API Reference', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'System Status', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'GitHub Repositories', 'mimrot' ); ?></a></li>
					</ul>
				</div>

				<!-- Default Footer Column 3 -->
				<div class="footer-col">
					<h4 class="footer-widget-title"><?php esc_html_e( 'COMPANY', 'mimrot' ); ?></h4>
					<ul class="footer-list">
						<li><a href="#"><?php esc_html_e( 'About Us', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Careers', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Press & News', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Contact Sales', 'mimrot' ); ?></a></li>
					</ul>
				</div>

			<?php endif; ?>

		</div>

		<!-- Bottom Copyright Bar -->
		<div class="footer-bottom">
			<div class="footer-copyright">
				<?php
				$copyright_text = get_theme_mod( 'mimrot_footer_copyright', '' );
				if ( ! empty( $copyright_text ) ) {
					echo esc_html( $copyright_text );
				} else {
					echo '&copy; ' . esc_html( date( 'Y' ) ) . ' ' . get_bloginfo( 'name' ) . '. ' . esc_html__( 'All rights reserved.', 'mimrot' );
				}
				?>
			</div>

			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer Navigation', 'mimrot' ); ?>">
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'container'      => false,
							'depth'          => 1,
						)
					);
				} else {
					?>
					<ul class="footer-menu">
						<li><a href="#"><?php esc_html_e( 'Privacy Policy', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Terms of Service', 'mimrot' ); ?></a></li>
						<li><a href="#"><?php esc_html_e( 'Cookie Preferences', 'mimrot' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</nav>
		</div>

	</div>
</footer>

<!-- Copy Toast Feedback Notification -->
<div id="copy-toast" class="copy-toast" role="alert" aria-live="polite">
	<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
	<span><?php esc_html_e( 'Article URL copied to clipboard!', 'mimrot' ); ?></span>
</div>

<!-- Search Modal Overlay -->
<div id="search-modal" class="search-modal" style="display:none;">
	<div class="search-modal-box">
		<div class="search-modal-header">
			<h3 class="search-modal-title"><?php esc_html_e( 'Search Articles', 'mimrot' ); ?></h3>
			<button id="search-modal-close" class="icon-btn search-modal-close-btn" aria-label="<?php esc_attr_e( 'Close Search Modal', 'mimrot' ); ?>">&times;</button>
		</div>
		<?php get_search_form(); ?>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
