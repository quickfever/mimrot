<?php
/**
 * CloudTech Grid Theme Functions and Definitions
 *
 * @package CloudTech
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cloudtech_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus(
		array(
			'primary'    => esc_html__( 'Primary Top Menu', 'cloudtech' ),
			'categories' => esc_html__( 'Categories Bar Menu', 'cloudtech' ),
			'footer'     => esc_html__( 'Footer Menu', 'cloudtech' ),
		)
	);

	/*
	 * Switch default core markup to valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * 1. Custom Logo Support
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 48,
			'width'       => 220,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	/*
	 * 2. Gutenberg Block Editor Styles & Typography Presets
	 */
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'cloudtech_setup' );

/**
 * --------------------------------------------------------------------------
 * DISABLE ALL AUTOMATIC IMAGE RESIZING & SRCSET VARIANTS
 * --------------------------------------------------------------------------
 * 1. Uploads ONLY the original image file without generating thumbnail, medium,
 *    large, 1536x1536, 2048x2048, or scaled image copies.
 * 2. Completely disables HTML srcset & sizes attributes for all past & new images.
 */

// 1. Disable all intermediate image sizes on upload
function cloudtech_disable_all_image_sizes( $sizes ) {
	return array();
}
add_filter( 'intermediate_image_sizes_advanced', 'cloudtech_disable_all_image_sizes' );

// 2. Disable default WP 5.3+ big image scaling threshold (-scaled.jpg)
add_filter( 'big_image_size_threshold', '__return_false' );

// 3. Disable fallback intermediate image sizes
add_filter( 'fallback_intermediate_image_sizes', '__return_empty_array' );

// 4. Completely disable calculation and HTML output of srcset and sizes attributes
add_filter( 'wp_calculate_image_srcset', '__return_false' );
add_filter( 'wp_calculate_image_sizes', '__return_false' );
add_filter( 'wp_img_tag_add_srcset_and_sizes_attr', '__return_false' );

/**
 * Register widget areas (Sidebars).
 */
function cloudtech_widgets_init() {
	// 1. LEFT SIDEBAR WIDGET AREA
	register_sidebar(
		array(
			'name'          => esc_html__( 'Left Sidebar (Widgets)', 'cloudtech' ),
			'id'            => 'left-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in the sticky left column.', 'cloudtech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// 2. RIGHT SIDEBAR WIDGET AREA
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right Sidebar (Widgets & TOC)', 'cloudtech' ),
			'id'            => 'right-sidebar',
			'description'   => esc_html__( 'Add additional widgets here to appear below the Table of Contents.', 'cloudtech' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	// 3. FOOTER WIDGET AREA
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'cloudtech' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in the footer grid.', 'cloudtech' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'cloudtech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cloudtech_scripts() {
	// Google Fonts: Inter, Space Grotesk & Fira Code
	wp_enqueue_style( 'cloudtech-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700;800&family=Fira+Code:wght@400;500&display=swap', array(), null );

	// Theme Main Stylesheet
	wp_enqueue_style( 'cloudtech-style', get_stylesheet_uri(), array(), '1.1.0' );

	// Main JavaScript Utilities
	wp_enqueue_script( 'cloudtech-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.1.0', true );

	// Table of Contents Animated Scroll-Spy JS (only on single posts)
	if ( is_single() ) {
		wp_enqueue_script( 'cloudtech-toc-js', get_template_directory_uri() . '/assets/js/toc.js', array(), '1.1.0', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cloudtech_scripts' );

/**
 * Helper: Calculate Estimated Reading Time
 */
function cloudtech_estimated_reading_time( $post_id = null ) {
	$post = get_post( $post_id );
	if ( ! $post ) {
		return '3 MINUTE READ';
	}
	$content       = strip_tags( $post->post_content );
	$word_count    = str_word_count( $content );
	$reading_speed = 200;
	$minutes       = ceil( $word_count / $reading_speed );
	if ( $minutes < 1 ) {
		$minutes = 1;
	}
	return sprintf( esc_html__( '%d MINUTE READ', 'cloudtech' ), $minutes );
}

/**
 * Helper: Render Breadcrumb Navigation Trail
 */
function cloudtech_breadcrumbs() {
	echo '<nav class="breadcrumbs-nav" aria-label="' . esc_attr__( 'Breadcrumb Navigation', 'cloudtech' ) . '">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'cloudtech' ) . '</a>';
	echo ' <span>&rsaquo;</span> ';
	echo '<a href="' . esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog/' ) ) . '">' . esc_html__( 'Blog', 'cloudtech' ) . '</a>';
	
	if ( is_single() ) {
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			echo ' <span>&rsaquo;</span> ';
			echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
		}
	}
	echo '</nav>';
}

/**
 * Helper: Render Category Pill Tags
 */
function cloudtech_post_tags_pills( $post_id = null ) {
	$categories = get_the_category( $post_id );
	if ( empty( $categories ) ) {
		return;
	}
	echo '<div class="tag-pills-group">';
	foreach ( $categories as $category ) {
		echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="tag-pill">' . esc_html( $category->name ) . '</a>';
	}
	echo '</div>';
}

/**
 * Register Customizer Options (Theme Options Panel)
 */
function cloudtech_customize_register( $wp_customize ) {
	// Add Panel: Theme Options
	$wp_customize->add_panel(
		'cloudtech_theme_options',
		array(
			'title'       => __( 'CloudTech Theme Options', 'cloudtech' ),
			'description' => __( 'Customize layout grid, sidebar widths, brand colors, and features.', 'cloudtech' ),
			'priority'    => 30,
		)
	);

	// 1. LAYOUT & SIDEBAR WIDTHS SECTION
	$wp_customize->add_section(
		'cloudtech_layout_section',
		array(
			'title'    => __( 'Layout & Sidebar Widths', 'cloudtech' ),
			'panel'    => 'cloudtech_theme_options',
			'priority' => 10,
		)
	);

	// Left Sidebar Width
	$wp_customize->add_setting(
		'cloudtech_left_sidebar_width',
		array(
			'default'           => 240,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'cloudtech_left_sidebar_width',
		array(
			'label'       => __( 'Left Sidebar Width (px)', 'cloudtech' ),
			'description' => __( 'Default: 240px (min 180, max 360)', 'cloudtech' ),
			'section'     => 'cloudtech_layout_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 180,
				'max'  => 360,
				'step' => 10,
			),
		)
	);

	// Right Sidebar Width
	$wp_customize->add_setting(
		'cloudtech_right_sidebar_width',
		array(
			'default'           => 260,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'cloudtech_right_sidebar_width',
		array(
			'label'       => __( 'Right Sidebar Width (px)', 'cloudtech' ),
			'description' => __( 'Default: 260px (min 200, max 400)', 'cloudtech' ),
			'section'     => 'cloudtech_layout_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 200,
				'max'  => 400,
				'step' => 10,
			),
		)
	);

	// Main Content Max Width
	$wp_customize->add_setting(
		'cloudtech_content_max_width',
		array(
			'default'           => 780,
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'cloudtech_content_max_width',
		array(
			'label'       => __( 'Main Content Max Width (px)', 'cloudtech' ),
			'description' => __( 'Default: 780px (min 600, max 1100)', 'cloudtech' ),
			'section'     => 'cloudtech_layout_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 600,
				'max'  => 1100,
				'step' => 20,
			),
		)
	);

	// Show/Hide Left Sidebar
	$wp_customize->add_setting(
		'cloudtech_show_left_sidebar',
		array(
			'default'           => true,
			'sanitize_callback' => 'cloudtech_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'cloudtech_show_left_sidebar',
		array(
			'label'   => __( 'Show Left Sidebar on Single Posts', 'cloudtech' ),
			'section' => 'cloudtech_layout_section',
			'type'    => 'checkbox',
		)
	);

	// Show/Hide Right Sidebar (TOC)
	$wp_customize->add_setting(
		'cloudtech_show_right_sidebar',
		array(
			'default'           => true,
			'sanitize_callback' => 'cloudtech_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'cloudtech_show_right_sidebar',
		array(
			'label'   => __( 'Show Right Sidebar (TOC) on Single Posts', 'cloudtech' ),
			'section' => 'cloudtech_layout_section',
			'type'    => 'checkbox',
		)
	);

	// 2. BRANDING & COLORS SECTION
	$wp_customize->add_section(
		'cloudtech_colors_section',
		array(
			'title'    => __( 'Colors & Background', 'cloudtech' ),
			'panel'    => 'cloudtech_theme_options',
			'priority' => 20,
		)
	);

	// Brand Accent Color
	$wp_customize->add_setting(
		'cloudtech_accent_color',
		array(
			'default'           => '#f6821f',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cloudtech_accent_color',
			array(
				'label'       => __( 'Brand Accent Color', 'cloudtech' ),
				'description' => __( 'Changes link hover, active TOC line, and button highlights.', 'cloudtech' ),
				'section'     => 'cloudtech_colors_section',
			)
		)
	);

	// Enable Dot Grid Background Pattern
	$wp_customize->add_setting(
		'cloudtech_enable_grid_pattern',
		array(
			'default'           => true,
			'sanitize_callback' => 'cloudtech_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'cloudtech_enable_grid_pattern',
		array(
			'label'   => __( 'Enable Technical Dot Grid Background', 'cloudtech' ),
			'section' => 'cloudtech_colors_section',
			'type'    => 'checkbox',
		)
	);

	// 3. TABLE OF CONTENTS SECTION
	$wp_customize->add_section(
		'cloudtech_toc_section',
		array(
			'title'    => __( 'Table of Contents (TOC)', 'cloudtech' ),
			'panel'    => 'cloudtech_theme_options',
			'priority' => 30,
		)
	);

	// TOC Header Title
	$wp_customize->add_setting(
		'cloudtech_toc_title',
		array(
			'default'           => __( 'ON THIS PAGE', 'cloudtech' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cloudtech_toc_title',
		array(
			'label'   => __( 'TOC Heading Title', 'cloudtech' ),
			'section' => 'cloudtech_toc_section',
			'type'    => 'text',
		)
	);

	// 4. HEADER ACTIONS SECTION
	$wp_customize->add_section(
		'cloudtech_header_section',
		array(
			'title'    => __( 'Header Call-to-Action', 'cloudtech' ),
			'panel'    => 'cloudtech_theme_options',
			'priority' => 40,
		)
	);

	// Header CTA Text
	$wp_customize->add_setting(
		'cloudtech_header_button_text',
		array(
			'default'           => __( 'Login', 'cloudtech' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cloudtech_header_button_text',
		array(
			'label'   => __( 'Header Button Label', 'cloudtech' ),
			'section' => 'cloudtech_header_section',
			'type'    => 'text',
		)
	);

	// Header CTA Link
	$wp_customize->add_setting(
		'cloudtech_header_button_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'cloudtech_header_button_url',
		array(
			'label'       => __( 'Header Button Link URL', 'cloudtech' ),
			'description' => __( 'Leave empty for default WP Login URL.', 'cloudtech' ),
			'section'     => 'cloudtech_header_section',
			'type'        => 'url',
		)
	);

	// Enable Random Post Button in Header
	$wp_customize->add_setting(
		'cloudtech_enable_random_post_btn',
		array(
			'default'           => true,
			'sanitize_callback' => 'cloudtech_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'cloudtech_enable_random_post_btn',
		array(
			'label'   => __( 'Show Random Post Button Beside Logo', 'cloudtech' ),
			'section' => 'cloudtech_header_section',
			'type'    => 'checkbox',
		)
	);

	// 5. FOOTER OPTIONS SECTION
	$wp_customize->add_section(
		'cloudtech_footer_section',
		array(
			'title'    => __( 'Footer Options & Copyright', 'cloudtech' ),
			'panel'    => 'cloudtech_theme_options',
			'priority' => 50,
		)
	);

	// Copyright Text
	$wp_customize->add_setting(
		'cloudtech_footer_copyright',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cloudtech_footer_copyright',
		array(
			'label'       => __( 'Footer Copyright Text', 'cloudtech' ),
			'description' => __( 'Leave empty for default copyright message.', 'cloudtech' ),
			'section'     => 'cloudtech_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'cloudtech_customize_register' );

/**
 * Sanitize Checkbox Helper
 */
function cloudtech_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === (bool) $checked ) ? true : false;
}

/**
 * Redirect ?random=1 requests to a random published post
 */
function cloudtech_random_post_redirect() {
	if ( isset( $_GET['random'] ) && '1' === $_GET['random'] ) {
		$random_posts = get_posts(
			array(
				'numberposts' => 1,
				'orderby'     => 'rand',
				'post_status' => 'publish',
			)
		);
		if ( ! empty( $random_posts ) ) {
			wp_safe_redirect( get_permalink( $random_posts[0]->ID ) );
			exit;
		}
	}
}
add_action( 'template_redirect', 'cloudtech_random_post_redirect' );

/**
 * Output Dynamic Customizer CSS Variables & Column Overrides
 */
function cloudtech_customizer_css() {
	$left_width        = get_theme_mod( 'cloudtech_left_sidebar_width', 240 );
	$right_width       = get_theme_mod( 'cloudtech_right_sidebar_width', 260 );
	$content_max_width = get_theme_mod( 'cloudtech_content_max_width', 780 );
	$accent_color      = get_theme_mod( 'cloudtech_accent_color', '#f6821f' );
	$grid_pattern      = get_theme_mod( 'cloudtech_enable_grid_pattern', true );
	$show_left         = get_theme_mod( 'cloudtech_show_left_sidebar', true );
	$show_right        = get_theme_mod( 'cloudtech_show_right_sidebar', true );

	$custom_css = "
	:root {
		--sidebar-left-width: {$left_width}px;
		--sidebar-right-width: {$right_width}px;
		--content-max-width: {$content_max_width}px;
		--color-accent: {$accent_color};
		--color-link: {$accent_color};
	}
	";

	if ( ! $grid_pattern ) {
		$custom_css .= " body { background-image: none !important; } ";
	}

	if ( ! $show_left && ! $show_right ) {
		$custom_css .= "
		@media (min-width: 901px) {
			.article-layout-grid { grid-template-columns: minmax(0, 1fr) !important; }
			.left-sidebar-col, .right-sidebar-col { display: none !important; }
		}
		";
	} elseif ( ! $show_left ) {
		$custom_css .= "
		@media (min-width: 901px) {
			.article-layout-grid { grid-template-columns: minmax(0, 1fr) var(--sidebar-right-width) !important; }
			.left-sidebar-col { display: none !important; }
		}
		";
	} elseif ( ! $show_right ) {
		$custom_css .= "
		@media (min-width: 901px) {
			.article-layout-grid { grid-template-columns: var(--sidebar-left-width) minmax(0, 1fr) !important; }
			.right-sidebar-col { display: none !important; }
		}
		";
	}

	wp_add_inline_style( 'cloudtech-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'cloudtech_customizer_css', 20 );
