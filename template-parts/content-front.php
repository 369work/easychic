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

<article id="post-<?php the_ID(); ?>" <?php post_class('front-post'); ?>>

    <div class="front-thumbnail">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
        <?php else : ?>
            <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url(EASYCHIC_THEME_IMAGE . '/no-image.webp'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
        <?php endif; ?>
    </div>

    <div class="front-header">
        <?php the_title('<h2 class="front-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
    </div><!-- .entry-header -->

    <div class="front-meta">
        <?php
        $categories = get_the_category();
        if (! empty($categories)) :
            $category = $categories[0];
        ?>
            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="front-category"><?php echo esc_html($category->name); ?></a>
        <?php endif; ?>
        <time class="posted-on" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->