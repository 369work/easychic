<?php

/**
 * The template for displaying the Front
 *
 * This file is used to display a Front page.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */
?>

<?php get_header(); ?>

<div id="content" class="site-content container">
    <div class="<?php echo easychic_sidebar_layout(); ?>">
        <main id="main" class="site-main" role="main">
            <div class="container">
                <section class="content-area">
                    <?php
                    if (have_posts()) :
                    ?>
                        <div class="front-grid">
                            <?php
                            while (have_posts()) : the_post();
                                get_template_part('template-parts/content-front', get_post_format());
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
    </div>
</div><!-- #content -->

<?php get_footer(); ?>