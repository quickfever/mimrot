<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script>
		// Inline Theme Initializer to avoid Light/Dark FOUC
		(function() {
			const savedTheme = localStorage.getItem('cloudtech_theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
			document.documentElement.setAttribute('data-theme', savedTheme);
		})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="tech-grid-wrapper">

<!-- Site Header -->
<header id="masthead" class="site-header">
	<div class="header-container">
		
		<!-- Site Branding / Custom Logo Support -->
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-logo" rel="home">
					<svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" fill="currentColor">
						<path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3z"/>
					</svg>
					<span><?php bloginfo( 'name' ); ?></span>
				</a>
				<?php
			}
			?>
		</div>

		<!-- Primary Navigation Menu -->
		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'cloudtech' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class'     => 'nav-menu',
						'container'      => false,
					)
				);
			} else {
				?>
				<ul>
					<li><a href="#"><?php esc_html_e( 'Products', 'cloudtech' ); ?> &#9662;</a></li>
					<li><a href="#"><?php esc_html_e( 'Solutions', 'cloudtech' ); ?> &#9662;</a></li>
					<li><a href="#"><?php esc_html_e( 'Resources', 'cloudtech' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Pricing', 'cloudtech' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</nav>

		<!-- Action Controls -->
		<div class="header-actions">
			
			<!-- Category Selector Dropdown -->
			<div class="dropdown-pill">
				<select onchange="if(this.value) window.location.href=this.value;" class="tag-pill" aria-label="<?php esc_attr_e( 'Select Category', 'cloudtech' ); ?>" style="cursor:pointer;">
					<option value=""><?php esc_html_e( 'All Categories', 'cloudtech' ); ?></option>
					<?php
					$categories = get_categories();
					foreach ( $categories as $cat ) {
						echo '<option value="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</option>';
					}
					?>
				</select>
			</div>

			<!-- Search Button -->
			<button id="search-modal-trigger" class="icon-btn" title="<?php esc_attr_e( 'Search Articles', 'cloudtech' ); ?>" aria-label="<?php esc_attr_e( 'Search', 'cloudtech' ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<circle cx="11" cy="11" r="8"></circle>
					<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
				</svg>
			</button>

			<!-- Theme Dark/Light Mode Switcher -->
			<button id="theme-toggle-btn" class="icon-btn" title="<?php esc_attr_e( 'Toggle Theme Mode', 'cloudtech' ); ?>" aria-label="<?php esc_attr_e( 'Toggle Dark/Light Mode', 'cloudtech' ); ?>">
				<svg class="sun-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<circle cx="12" cy="12" r="5"></circle>
					<line x1="12" y1="1" x2="12" y2="3"></line>
					<line x1="12" y1="21" x2="12" y2="23"></line>
					<line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
					<line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
					<line x1="1" y1="12" x2="3" y2="12"></line>
					<line x1="21" y1="12" x2="23" y2="12"></line>
				</svg>
			</button>

			<!-- Action Button -->
			<a href="<?php echo esc_url( wp_login_url() ); ?>" class="btn-primary"><?php esc_html_e( 'Login', 'cloudtech' ); ?></a>
		</div>

	</div>
</header>
