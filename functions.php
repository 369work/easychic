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

defined('ABSPATH') || exit;

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});

// define the EasyChic theme version
define('EASYCHIC_THEME_VERSION', wp_get_theme()->get('Version'));

define('EASYCHIC_THEME_DIR', get_template_directory());
define('EASYCHIC_THEME_URI', get_template_directory_uri());
define('EASYCHIC_THEME_INC', EASYCHIC_THEME_DIR . '/inc');
define('EASYCHIC_THEME_ASSETS', EASYCHIC_THEME_URI . '/assets');
define('EASYCHIC_THEME_IMAGE', EASYCHIC_THEME_URI . '/assets/images');

// Set up theme support
function easychic_theme_setup()
{
    load_theme_textdomain('easychic', EASYCHIC_THEME_DIR . '/languages');

    // Add support for various theme features
    add_theme_support('align-wide');
    add_theme_support('appearance-tools');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-background', array(
        'default-color'          => '#f5f9ff',
        'default-image'          =>  '',
        'default-repeat'         => 'none',
        'default-position-x'     => 'center',
        'default-attachment'     => 'fixed',
        'default-size'           => 'cover',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('title-tag');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));

}
add_action('after_setup_theme', 'easychic_theme_setup');


// Enqueue theme styles and scripts
function easychic_enqueue_styles() {
    wp_enqueue_style('easychic-style', get_stylesheet_uri(), array(), EASYCHIC_THEME_VERSION);
    wp_enqueue_style('easychic-wp-core', EASYCHIC_THEME_ASSETS . '/css/easychic-wp-core.css', array(), EASYCHIC_THEME_VERSION);
    wp_enqueue_style('easychic-original', EASYCHIC_THEME_ASSETS . '/css/easychic.css', array(), EASYCHIC_THEME_VERSION);
    wp_enqueue_script('easychic-original', EASYCHIC_THEME_ASSETS . '/js/easychic.js', array(), EASYCHIC_THEME_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'easychic_enqueue_styles');

// Enqueue customizer styles
function easychic_customize_style() {
    wp_enqueue_style('easychic-customizer', EASYCHIC_THEME_ASSETS . '/css/customizer.css', array(), EASYCHIC_THEME_VERSION);
}
add_action('customize_controls_enqueue_scripts', 'easychic_customize_style');

// Register widget areas
function easychic_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'easychic'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'easychic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'easychic_widgets_init');

// Register navigation menus
function easychic_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'easychic'),
        'footer-sns'  => esc_html__('Footer SNS Menu', 'easychic'),
        'footer-left'  => esc_html__('Footer Left Menu', 'easychic'),
        'footer-right'  => esc_html__('Footer Right Menu', 'easychic'),
    ));
}
add_action('init', 'easychic_register_menus');

// Add custom image sizes
function easychic_add_image_sizes() {
    add_image_size('easychic-featured-image', 1200, 1200, true);
    add_image_size('easychic-thumbnail', 150, 150, true);
}
add_action('after_setup_theme', 'easychic_add_image_sizes');


// Skip link focus fix
function easychic_skip_link()
{
    echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__('Skip to the content', 'easychic') . '</a>';
}
add_action('wp_body_open', 'easychic_skip_link');


// Footer credits
function easychic_credits()
{
    echo '<span>';
    esc_html_e('Powered by ', 'easychic');
    echo '</span><a class="credit-link" href="http://wordpress.org" target="_blank">WordPress</a><span>. </span>';
    echo '<span>';
    esc_html_e('Easychic Theme by ', 'easychic');
    echo '</span><a class="credit-link" href="https://profiles.wordpress.org/369work/">369work</a>.';

    return;
}


// Add custom file
require_once get_parent_theme_file_path('/inc/customizer.php');
require_once get_parent_theme_file_path('/inc/add_functions.php');





