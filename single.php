<?php

/**
 * The template for displaying all single posts
 *
 * This is the template that displays all single posts by default.
 * Please note that this is the WordPress construct of single posts
 * and that other 'single' posts on your site will use a different template.
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
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content-single' );

                        if ( is_attachment() ) {
                            // Parent post navigation.
                            the_post_navigation(
                                array(
                                    /* translators: %s: Parent post link. */
                                    'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'easychic' ), '%title' ),
                                )
                            );
                        }

                        // If comments are open or there is at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }

                        get_template_part('template-parts/pagination');
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </section>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div><!-- #content -->

<?php get_footer(); ?>