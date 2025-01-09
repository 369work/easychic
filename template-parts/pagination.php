<div class="nav-post">
    <?php

    $previous_post = get_previous_post();
    if (!empty($previous_post)) : ?>

        <div class="left-column">
            <div class="previous-post-link-wrap">
                <div class="previous-post-link">

                    <?php esc_html_e('&laquo; Previous Page', 'easychic'); ?><br />

                    <?php previous_post_link('%link'); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $next_post = get_next_post();
    if (!empty($next_post)) : ?>

        <div class="right-column">
            <div class="next-post-link-wrap">
                <div class="next-post-link">

                    <?php esc_html_e('Next Page &raquo;', 'easychic'); ?><br />

                    <?php next_post_link('%link'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>