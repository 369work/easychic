<?php

/**
 * The template for displaying the Comments
 *
 * This file comments pages.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */

?>

<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx(
                    'One thought on "%2$s"',
                    '%1$s thoughts on "%2$s"',
                    get_comments_number(),
                    'comments title',
                    'easychic'
                ),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">

                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'easychic'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'easychic')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'easychic')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif;
        ?>

        <?php if (! comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'easychic'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- #comments -->