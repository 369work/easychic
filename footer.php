<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */
?>

<div id="page-top" class="page-top"><a href="#"><span>TOP</span></a></div>

<footer id="footer" class="site-footer">
    <div class="container">
        <div class="footer-wrap">
            <div class="footer-menu">
                <!-- Follow Us -->
                <div class="footer-list">
                    <h4 class="footer-title">
                        <?php esc_html_e('Follow Us', 'easychic'); ?>
                    </h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-sns',
                        'menu_class'     => 'footer-sns-menu',
                    ));
                    ?>
                </div>

                <!-- Use cases -->
                <div class="footer-list">
                    <?php
                    $left_title = 'Left Link';

                    $menu_left = 'footer-left';
                    $menu_left_locations = get_nav_menu_locations();
                    $menu_left_title = get_term($menu_left_locations[$menu_left], 'nav_menu')->name;
                    if (isset($menu_left_title)) {
                        $left_title = $menu_left_title;
                    }
                    ?>
                    <h4 class="footer-title"><?php echo esc_html($left_title); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-left',
                        'menu_class'     => 'footer-menu-left',
                    ));
                    ?>
                </div>

                <!-- Resources -->
                <div class="footer-list">
                    <?php
                    $right_title = 'Right Link';

                    $menu_right = 'footer-right';
                    $menu_right_locations = get_nav_menu_locations();
                    $menu_right_title = get_term($menu_right_locations[$menu_right], 'nav_menu')->name;
                    if (isset($menu_right_title)) {
                        $right_title = $menu_right_title;
                    }
                    ?>
                    <h4 class="footer-title"><?php echo esc_html($right_title); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-right',
                        'menu_class'     => 'footer-menu-right',
                    ));
                    ?>
                </div>
            </div>

            <div class="site-info">
                <p>&copy; <?php echo Date("Y"); ?>
                    <a href=" <?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </p>
                <p><?php easychic_credits(); ?></p>

            </div><!-- .site-info -->
        </div><!-- .footer-wrap -->
    </div>
</footer><!-- #footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>