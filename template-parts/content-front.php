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
        <?php else: ?>
            <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo EASYCHIC_THEME_IMAGE . '/no-image.webp'; ?>" alt="<?php the_title(); ?>"></a>
        <?php endif; ?>
    </div>

    <div class="front-header">
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
    </div><!-- .entry-header -->

    <div class="front-meta">
        <?php
        echo '<span class="posted-on">' . get_the_date() . '</span>';
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->