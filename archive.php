<?php

/**
 * The template for displaying the archive.php
 *
 * This file archive pages.
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
                <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                <p class="page-description">
                    <?php
                    if (get_the_archive_description() !== '') {
                        echo wp_kses_post(wpautop(get_the_archive_description()));
                    }
                    ?>
                </p>
                <?php
                if (have_posts()) :
                ?>
                    <div class="archive-grid">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content-archive', get_post_format());
                        endwhile;
                        ?>
                    </div>
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