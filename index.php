<?php

/**
 * The template for displaying the index Page
 *
 * This file serves as the main template for your WordPress theme and controls the default display of your blog post
 * listing, archive pages, etc.
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
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                ?>
                    <div class="navigation">
                        <div class="previous">
                            <?php esc_html_e(previous_posts_link(__('&laquo; Previous Page', 'easychic')), 'easychic'); ?></div>
                        <div class="next"><?php esc_html_e(next_posts_link(__('Next Page &raquo;', 'easychic')), 'easychic'); ?>
                        </div>
                    </div>
                <?php
                else :
                    get_template_part('template-parts/content-none');
                endif;
                ?>
            </section>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div><!-- #content -->

<?php get_footer(); ?>