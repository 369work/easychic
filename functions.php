<?php
/**
 * Functions.php
 *
 * This file contains various functions used throughout the WordPress theme.
 * It is automatically included by WordPress and is used to define theme features,
 * enqueue scripts and styles, register widget areas, and add custom functionality.
 *
 * Key functionalities included in this file:
 * - Theme setup: Defines theme support for various WordPress features.
 * - Enqueueing scripts and styles: Adds CSS and JavaScript files to the theme.
 * - Registering widget areas: Defines areas where widgets can be added.
 * - Custom functions: Adds custom PHP functions to extend theme capabilities.
 *
 * @package EasyChic
 */

defined( 'ABSPATH' ) || exit;

// define the EasyChic theme version.
define( 'EASYCHIC_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

define( 'EASYCHIC_THEME_DIR', get_template_directory() );
define( 'EASYCHIC_THEME_URI', get_template_directory_uri() );
define( 'EASYCHIC_THEME_INC', EASYCHIC_THEME_DIR . '/inc' );
define( 'EASYCHIC_THEME_ASSETS', EASYCHIC_THEME_URI . '/assets' );
define( 'EASYCHIC_THEME_IMAGE', EASYCHIC_THEME_URI . '/assets/images' );

/**
 * Set up theme support.
 */
function easychic_theme_setup() {
	load_theme_textdomain( 'easychic', EASYCHIC_THEME_DIR . '/languages' );

	// Add support for various theme features.
	add_theme_support( 'align-wide' );
	add_theme_support( 'appearance-tools' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'custom-background',
		array(
			'default-color'      => '#f5f9ff',
			'default-image'      => '',
			'default-repeat'     => 'none',
			'default-position-x' => 'center',
			'default-attachment' => 'fixed',
			'default-size'       => 'cover',
		)
	);
	add_theme_support( 'custom-logo' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'easychic_theme_setup' );


/**
 * Enqueue theme styles and scripts.
 */
function easychic_enqueue_styles() {
	wp_enqueue_style( 'easychic-style', get_stylesheet_uri(), array(), EASYCHIC_THEME_VERSION );
	wp_enqueue_style( 'easychic-wp-core', EASYCHIC_THEME_ASSETS . '/css/easychic-wp-core.css', array(), EASYCHIC_THEME_VERSION );
	wp_enqueue_style( 'easychic-original-style', EASYCHIC_THEME_ASSETS . '/css/easychic.css', array( 'easychic-wp-core' ), EASYCHIC_THEME_VERSION );
	wp_enqueue_script( 'easychic-original-js', EASYCHIC_THEME_ASSETS . '/js/easychic.js', array(), EASYCHIC_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'easychic_enqueue_styles' );

/**
 * Enqueue customizer styles.
 */
function easychic_customize_style() {
	wp_enqueue_style( 'easychic-customizer-style', EASYCHIC_THEME_ASSETS . '/css/customizer.css', array(), EASYCHIC_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'easychic_customize_style' );

/**
 * Enqueue customizer preview scripts.
 */
function easychic_customize_preview_js() {
	wp_enqueue_script( 'easychic-customizer-js', EASYCHIC_THEME_ASSETS . '/js/customizer.js', array( 'jquery', 'customize-preview' ), EASYCHIC_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'easychic_customize_preview_js' );

/**
 * Register widget areas.
 */
function easychic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'easychic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'easychic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'easychic' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here to appear in the first footer column.', 'easychic' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'easychic' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here to appear in the second footer column.', 'easychic' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 3', 'easychic' ),
			'id'            => 'footer-widget-3',
			'description'   => esc_html__( 'Add widgets here to appear in the third footer column.', 'easychic' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'easychic_widgets_init' );

/**
 * Register navigation menus.
 */
function easychic_register_menus() {
	register_nav_menus(
		array(
			'primary'      => esc_html__( 'Primary Menu', 'easychic' ),
			'footer-sns'   => esc_html__( 'Footer SNS Menu', 'easychic' ),
			'footer-left'  => esc_html__( 'Footer Left Menu', 'easychic' ),
			'footer-right' => esc_html__( 'Footer Right Menu', 'easychic' ),
		)
	);
}
add_action( 'init', 'easychic_register_menus' );

/**
 * Add custom image sizes.
 */
function easychic_add_image_sizes() {
	add_image_size( 'easychic-featured-image', 1200, 1200, true );
	add_image_size( 'easychic-thumbnail', 150, 150, true );
}
add_action( 'after_setup_theme', 'easychic_add_image_sizes' );


/**
 * Skip link focus fix.
 */
function easychic_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Skip to the content', 'easychic' ) . '</a>';
}
add_action( 'wp_body_open', 'easychic_skip_link' );


/**
 * Footer credits.
 */
function easychic_credits() {
	echo '<span>';
	esc_html_e( 'Powered by ', 'easychic' );
	echo '</span><a class="credit-link" href="https://wordpress.org" target="_blank">' . esc_html__( 'WordPress', 'easychic' ) . '</a><span>. </span>';
	echo '<span>';
	esc_html_e( 'Easychic Theme by ', 'easychic' );
	echo '</span><a class="credit-link" href="https://profiles.wordpress.org/369work/">' . esc_html__( '369work', 'easychic' ) . '</a>.';

	return;
}


/**
 * Breadcrumb navigation.
 */
function easychic_breadcrumb() {
	if ( is_front_page() ) {
		return;
	}

	echo '<nav class="breadcrumb" aria-label="' . esc_attr__( 'Breadcrumb', 'easychic' ) . '">';
	echo '<ol class="breadcrumb-list">';
	echo '<li class="breadcrumb-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'easychic' ) . '</a></li>';

	if ( is_category() ) {
		$category = get_queried_object();
		if ( 0 !== $category->parent ) {
			$parent_categories = get_ancestors( $category->term_id, 'category' );
			$parent_categories = array_reverse( $parent_categories );
			foreach ( $parent_categories as $parent_id ) {
				$parent = get_term( $parent_id, 'category' );
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_term_link( $parent ) ) . '">' . esc_html( $parent->name ) . '</a></li>';
			}
		}
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html( single_cat_title( '', false ) ) . '</li>';
	} elseif ( is_tag() ) {
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html( single_tag_title( '', false ) ) . '</li>';
	} elseif ( is_single() ) {
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$category = $categories[0];
			echo '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
		}
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_page() ) {
		$ancestors = get_post_ancestors( get_the_ID() );
		if ( ! empty( $ancestors ) ) {
			$ancestors = array_reverse( $ancestors );
			foreach ( $ancestors as $ancestor_id ) {
				echo '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $ancestor_id ) ) . '">' . esc_html( get_the_title( $ancestor_id ) ) . '</a></li>';
			}
		}
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_search() ) {
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html__( 'Search Results', 'easychic' ) . '</li>';
	} elseif ( is_404() ) {
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html__( 'Page not found', 'easychic' ) . '</li>';
	} elseif ( is_archive() ) {
		echo '<li class="breadcrumb-item" aria-current="page">' . esc_html( get_the_archive_title() ) . '</li>';
	}

	echo '</ol>';
	echo '</nav>';
}

/**
 * Social share buttons for single posts.
 */
function easychic_social_share_buttons() {
	if ( ! is_single() ) {
		return;
	}

	$post_url   = esc_url( get_permalink() );
	$post_title = esc_attr( get_the_title() );

	$share_links = array(
		'x'        => array(
			'url'   => 'https://x.com/intent/tweet?url=' . $post_url . '&text=' . $post_title,
			'label' => esc_html__( 'Share on X', 'easychic' ),
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
		),
		'facebook' => array(
			'url'   => 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url,
			'label' => esc_html__( 'Share on Facebook', 'easychic' ),
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
		),
		'linkedin' => array(
			'url'   => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&title=' . $post_title,
			'label' => esc_html__( 'Share on LinkedIn', 'easychic' ),
			'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
		),
	);

	echo '<div class="social-share">';
	echo '<span class="social-share-label">' . esc_html__( 'Share this post:', 'easychic' ) . '</span>';
	echo '<div class="social-share-buttons">';

	foreach ( $share_links as $network => $data ) {
		echo '<a href="' . esc_url( $data['url'] ) . '" class="social-share-link social-share-' . esc_attr( $network ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( $data['label'] ) . '">';
		echo $data['icon']; // phpcs:ignore WordPress.Security.EscapeOutput -- SVG is hardcoded
		echo '</a>';
	}

	echo '</div>';
	echo '</div>';
}

// Add custom file.
require_once get_parent_theme_file_path( '/inc/customizer.php' );
require_once get_parent_theme_file_path( '/inc/add_functions.php' );
