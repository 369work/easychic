<?php

/**
 * The template part for displaying archive posts
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */

if (! defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>
    <div class="entry-thumbnail">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
        <?php else: ?>
            <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo EASYCHIC_THEME_IMAGE . '/no-image.webp'; ?>" alt="<?php the_title(); ?>"></a>
        <?php endif; ?>
    </div>
    <div class="entry-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
    </div><!-- .entry-header -->
    <div class="entry-content">
        <?php
        $excerpt = get_the_excerpt();
        if (strlen($excerpt) > 60) {
            $excerpt = mb_substr($excerpt, 0, 60, 'utf-8') . '...';
            $excerpt .= '<a class="readmore" href="' . get_the_permalink() . '">' . esc_html__('Read more', 'easychic') . '</a>';
        }
        echo '<p>' . $excerpt . '</p>';
        ?>
    </div><!-- .entry-content -->

    <div class="entry-meta">
        <?php
        echo '<span class="posted-on">' . get_the_date() . '</span>';
        echo '<span class="categories-links">' . get_the_category_list(', ') . '</span>';
        echo '<span class="tags-links">' . get_the_tag_list('', ', ') . '</span>';
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->