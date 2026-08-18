<?php
/**
 * The Left Sidebar Template (Widget Area)
 *
 * @package Mimrot
 * @version 1.2.1
 */

?>
<aside id="secondary-left" class="left-sidebar-col" aria-label="<?php esc_attr_e( 'Left Widget Area', 'mimrot' ); ?>">
	<div class="left-sidebar-inner">
		
		<?php
		if ( is_active_sidebar( 'left-sidebar' ) ) {
			dynamic_sidebar( 'left-sidebar' );
		} else {
			// FALLBACK DEFAULT WIDGETS IF NO ACTIVE WIDGETS IN WP ADMIN
			?>
			
			<!-- Default Widget 1: Categories -->
			<section class="widget widget_categories">
				<h3 class="widget-title"><?php esc_html_e( 'EXPLORE TOPICS', 'mimrot' ); ?></h3>
				<ul>
					<?php
					$cats = get_categories( array( 'number' => 6 ) );
					if ( ! empty( $cats ) ) {
						foreach ( $cats as $c ) {
							echo '<li><a href="' . esc_url( get_category_link( $c->term_id ) ) . '">' . esc_html( $c->name ) . ' <span class="cat-count">(' . esc_html( $c->count ) . ')</span></a></li>';
						}
					} else {
						echo '<li><a href="#">' . esc_html__( 'Artificial Intelligence', 'mimrot' ) . '</a></li>';
						echo '<li><a href="#">' . esc_html__( 'Agentic Web', 'mimrot' ) . '</a></li>';
						echo '<li><a href="#">' . esc_html__( 'Cloud Security', 'mimrot' ) . '</a></li>';
						echo '<li><a href="#">' . esc_html__( 'Developer Tools', 'mimrot' ) . '</a></li>';
					}
					?>
				</ul>
			</section>

			<!-- Default Widget 2: Recent Posts -->
			<section class="widget widget_recent_entries">
				<h3 class="widget-title"><?php esc_html_e( 'FEATURED READS', 'mimrot' ); ?></h3>
				<ul>
					<?php
					$recent = get_posts( array( 'numberposts' => 4, 'post_status' => 'publish' ) );
					if ( ! empty( $recent ) ) {
						foreach ( $recent as $post_item ) {
							echo '<li><a href="' . esc_url( get_permalink( $post_item->ID ) ) . '">' . esc_html( get_the_title( $post_item->ID ) ) . '</a></li>';
						}
					} else {
						echo '<li><a href="#">' . esc_html__( 'Building Autonomous Agents at Scale', 'mimrot' ) . '</a></li>';
						echo '<li><a href="#">' . esc_html__( 'Zero Trust Security Architectures', 'mimrot' ) . '</a></li>';
					}
					?>
				</ul>
			</section>

			<!-- Default Widget 3: Discuss Online & Social Sharing -->
			<div class="discuss-online-block">
				<h3 class="widget-title"><?php esc_html_e( 'DISCUSS ONLINE', 'mimrot' ); ?></h3>
				<div class="social-circle-grid">
					<a href="https://news.ycombinator.com" target="_blank" rel="noopener noreferrer" class="social-pill" title="Hacker News">Y</a>
					<a href="https://x.com" target="_blank" rel="noopener noreferrer" class="social-pill" title="X (Twitter)">X</a>
					<a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-pill" title="LinkedIn">in</a>
					<a href="https://bsky.app" target="_blank" rel="noopener noreferrer" class="social-pill" title="Bluesky">&#129419;</a>
					<a href="https://reddit.com" target="_blank" rel="noopener noreferrer" class="social-pill" title="Reddit">r/</a>
					<a href="https://mastodon.social" target="_blank" rel="noopener noreferrer" class="social-pill" title="Mastodon">M</a>
				</div>
			</div>

			<?php
		}
		?>

	</div>
</aside>
