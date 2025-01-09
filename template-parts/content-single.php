<?php
/* The template for displaying all single posts */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-header alignwide">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <?php if (has_category() || has_tag()) : ?>
            <div class="post-taxonomies">
                <?php
                $categories_list = get_the_category_list(wp_get_list_item_separator());
                if ($categories_list) :
                    /* translators: %s: List of categories. */
                ?>
                    <span class="cat-links"><?php echo esc_html__('Categorized :', 'easychic') . ' ' . $categories_list; ?></span>
                <?php
                endif;

                $tags_list = get_the_tag_list('', wp_get_list_item_separator());
                if ($tags_list && ! is_wp_error($tags_list)) :
                ?>
                    <span class="tags-links"><?php esc_html_e('Tagged :', 'easychic') . ' ' . $tags_list; ?></span>
                <?php
                endif;
                ?>
            </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail( )): ?>
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
        <?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'easychic') . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__('Page %', 'easychic'),
            )
        );
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
            <span><?php echo esc_html__('Posted by ', 'easychic'); ?></span>
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
</article><!-- #post-<?php the_ID(); ?> -->