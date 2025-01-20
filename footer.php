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
                <?php
                $array_menu = [
                    'footer-sns',
                    'footer-left',
                    'footer-right',
                ];
                ?>

                <?php foreach ($array_menu as $menu_name) : ?>
                    <div class="footer-list">
                        <?php
                        $menu_locations = get_nav_menu_locations();
                        if (isset($menu_locations[$menu_name]) && $menu_locations[$menu_name] !== 0) {
                            $menu_title = get_term($menu_locations[$menu_name], 'nav_menu')->name;
                        } else {
                            $menu_title = 'Menu Title';
                        }
                        ?>
                        <h4 class="footer-title"><?php echo esc_html($menu_title); ?></h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => $menu_name,
                            'menu_class'     => $menu_name . '-menu',
                        ));
                        ?>
                    </div>
                <?php endforeach; ?>
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