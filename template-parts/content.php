<?php

/**
 * The template part for displaying posts
 *
 * This template part is used in the loop to display posts.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */

if (! defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-post'); ?>>
    <div class="entry-header">
        <?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
        ?>
    </div><!-- .entry-header -->

    <div class="entry-wrap">
        <?php if (has_post_thumbnail()) : ?>
            <div class="entry-thumbnail">
                <?php
                echo '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">';
                the_post_thumbnail('easychic-thumbnail');
                echo '</a>';
                ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php
            $excerpt = get_the_excerpt();
            if (strlen($excerpt) > 100) {
                $excerpt = mb_substr($excerpt, 0, 100, 'utf-8') . '...';
                $excerpt .= '<a class="readmore" href="' . get_the_permalink() . '">' . esc_html__('Read more', 'easychic') . '</a>';
            }
            echo '<p>' . $excerpt . '</p>';
            ?>
        </div><!-- .entry-content -->
    </div>

    <div class="entry-meta">
        <?php
        echo '<span class="posted-on">' . get_the_date() . '</span>';
        echo '<span class="categories-links">' . get_the_category_list(', ') . '</span>';
        echo '<span class="tags-links">' . get_the_tag_list('', ', ') . '</span>';
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->