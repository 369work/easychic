<?php

/**
 * The template for displaying the sidebar
 *
 * Provides functionality related to the display of the sidebar.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */
?>

<?php if (easychic_sidebar_layout() !== 'one-column-none'): ?>
<aside class="site-aside">
    <div class="container">
        <div class="aside-inner">
            <?php
            if (is_active_sidebar('sidebar-1')) {
                dynamic_sidebar('sidebar-1');
            }
            ?>
        </div>
    </div>
</aside>
<?php endif; ?>