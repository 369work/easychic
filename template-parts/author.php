<?php

if (get_the_author_meta('description')) {
    ?>
    <div class="author-info">
        <div class="author-avatar">
            <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
        </div>
        <div class="author-description">
            <h2 class="author-title"><?php esc_html_e('About the Author:', 'easychic'); ?></h2>
            <p class="author-bio"><?php the_author_meta('description'); ?></p>
        </div>
    </div>
<?php
}
