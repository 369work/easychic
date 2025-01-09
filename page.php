<?php
/*
Template Name: Page
Template Post Type: post, page, event

 * The template for displaying full-width pages.
 * @package EasyChic
 * @since 1.0.0
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
                ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
                            <div class="entry-header">
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                                <?php if (has_post_thumbnail()): ?>
                                    <figure class="post-thumbnail">
                                        <?php
                                        // Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
                                        the_post_thumbnail('post-thumbnail', array('loading' => false));
                                        ?>
                                        <?php if (wp_get_attachment_caption(get_post_thumbnail_id())) : ?>
                                            <figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
                                        <?php endif; ?>
                                    </figure><!-- .post-thumbnail -->
                                <?php endif; ?>
                            </div><!-- .entry-header -->

                            <div class="entry-content">
                                <?php the_content(); ?>
                                <?php
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'easychic'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div><!-- .entry-content -->

                            <div class="entry-footer default-max-width">
                                <?php
                                $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

                                $time_string = sprintf(
                                    $time_string,
                                    esc_attr(get_the_date(DATE_W3C)),
                                    esc_html(get_the_date())
                                );
                                ?>
                                <div class="posted-on">
                                    <?php
                                    printf(
                                        /* translators: %s: Publish date. */
                                        esc_html__('Published %s', 'easychic'),
                                        $time_string // phpcs:ignore WordPress.Security.EscapeOutput
                                    );
                                    ?>
                                </div><!-- .posted-on -->
                                <div class="posted-by">
                                    <span><?php esc_html_e('Posted by ', 'easychic'); ?></span>
                                    <span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author"><?php echo esc_html(get_the_author()); ?></a></span>
                                </div><!-- .posted-by -->

                                <div>
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                            /* translators: %s: Post title. Only visible to screen readers. */
                                            esc_html__('Edit %s', 'easychic'),
                                            '<span class="screen-reader-text">' . get_the_title() . '</span>'
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                    ?>
                                </div>
                            </div><!-- .entry-footer -->
                        </article>
                <?php
                    endwhile;
                endif;
                ?>
            </section>
        </div>
    </main>
    <?php get_sidebar(); ?>
</div><!-- #content -->

<?php get_footer(); ?>