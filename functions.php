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
	set_post_thumbnail_size( 1200, 630, true );

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
