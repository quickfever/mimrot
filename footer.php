<?php
/**
 * The Footer Template
 *
 * @package CloudTech
 */

?>

</div> <!-- /.tech-grid-wrapper -->

<!-- Site Footer -->
<footer id="colophon" class="site-footer" style="border-top: 1px dashed var(--color-grid-line); background-color: var(--color-bg); padding: 48px 24px 32px 24px;">
	<div class="footer-container" style="max-width: var(--site-max-width); margin: 0 auto;">
		
		<div class="footer-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 32px; margin-bottom: 40px;">
			
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			<?php else : ?>
				
				<!-- Default Footer Column 1 -->
				<div class="footer-col">
					<h4 class="footer-widget-title" style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--color-text-muted); margin-bottom: 16px; font-family: var(--font-family-mono);"><?php esc_html_e( 'PRODUCTS', 'cloudtech' ); ?></h4>
					<ul style="list-style: none; font-size: 0.88rem;">
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Application Services', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'AI & Workers', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Zero Trust', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Network Services', 'cloudtech' ); ?></a></li>
					</ul>
				</div>

				<!-- Default Footer Column 2 -->
				<div class="footer-col">
					<h4 class="footer-widget-title" style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--color-text-muted); margin-bottom: 16px; font-family: var(--font-family-mono);"><?php esc_html_e( 'RESOURCES', 'cloudtech' ); ?></h4>
					<ul style="list-style: none; font-size: 0.88rem;">
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Developer Docs', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'API Reference', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'System Status', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'GitHub Repositories', 'cloudtech' ); ?></a></li>
					</ul>
				</div>

				<!-- Default Footer Column 3 -->
				<div class="footer-col">
					<h4 class="footer-widget-title" style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: var(--color-text-muted); margin-bottom: 16px; font-family: var(--font-family-mono);"><?php esc_html_e( 'COMPANY', 'cloudtech' ); ?></h4>
					<ul style="list-style: none; font-size: 0.88rem;">
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'About Us', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Careers', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Press & News', 'cloudtech' ); ?></a></li>
						<li style="margin-bottom: 8px;"><a href="#" style="color: var(--color-text-secondary);"><?php esc_html_e( 'Contact Sales', 'cloudtech' ); ?></a></li>
					</ul>
				</div>

			<?php endif; ?>

		</div>

		<!-- Bottom Copyright Bar -->
		<div class="footer-bottom" style="padding-top: 24px; border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; font-size: 0.82rem; color: var(--color-text-muted);">
			<div>
				&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'cloudtech' ); ?>
			</div>
			<div style="display: flex; gap: 16px;">
				<a href="#" style="color: var(--color-text-muted);"><?php esc_html_e( 'Privacy Policy', 'cloudtech' ); ?></a>
				<a href="#" style="color: var(--color-text-muted);"><?php esc_html_e( 'Terms of Service', 'cloudtech' ); ?></a>
				<a href="#" style="color: var(--color-text-muted);"><?php esc_html_e( 'Cookie Preferences', 'cloudtech' ); ?></a>
			</div>
		</div>

	</div>
</footer>

<!-- Copy Toast Feedback Notification -->
<div id="copy-toast" class="copy-toast" role="alert" aria-live="polite">
	<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
	<span><?php esc_html_e( 'Article URL copied to clipboard!', 'cloudtech' ); ?></span>
</div>

<!-- Search Modal Overlay -->
<div id="search-modal" class="search-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); backdrop-filter:blur(4px); z-index:1000; align-items:flex-start; justify-content:center; padding-top:100px;">
	<div class="search-modal-box" style="background:var(--color-surface); border:1px solid var(--color-border); border-radius:var(--radius-md); width:90%; max-width:600px; padding:24px; box-shadow:var(--shadow-lg);">
		<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
			<h3 style="font-family:var(--font-family-heading); font-size:1.1rem; font-weight:700;"><?php esc_html_e( 'Search Articles', 'cloudtech' ); ?></h3>
			<button id="search-modal-close" class="icon-btn" style="border:none;">&times;</button>
		</div>
		<?php get_search_form(); ?>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
