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
                <?php
                    $args = array(
                        'prev_text' => sprintf(esc_html__('%s Older', 'easychic'), '<span class="meta-nav"> < </span>'),
                        'next_text' => sprintf(esc_html__('Newer %s', 'easychic'), '<span class="meta-nav"> > </span>')
                    );
                    $navigation = get_the_post_navigation($args);
                    if ($navigation) :
                        echo $navigation;
                    endif;
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