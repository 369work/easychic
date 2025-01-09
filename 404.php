<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */
?>


<?php get_header(); ?>


<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <section class="content-area">
                <div class="error-404">
                    <p class="not-found">404</p>
                    <h1><?php esc_html_e('Page not found', 'easychic'); ?></h1>
                    <p><?php esc_html_e('Sorry, we could not find the page you were looking for.', 'easychic') ?></p>
                    <p><a href="<?php echo esc_html(home_url()); ?>">Back Top Page</a></p>
                </div>

            </section>
        </div>
    </main>
</div><!-- #content -->

<?php get_footer(); ?>