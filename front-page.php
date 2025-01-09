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
    </div>
</div><!-- #content -->

<?php get_footer(); ?>