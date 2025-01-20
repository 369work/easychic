<?php

/**
 * The template for displaying the header
 *
 * Contains the opening of the #content div and all content up to the main content.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header id="header" class="site-header" role="banner">
            <div class="container">
                <div class="header-wrap">
                    <div class="site-branding">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                        ?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                            ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                            <?php endif; ?>
                        <?php } ?>
                    </div><!-- .site-branding -->

                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'header-nav',
                            'menu_class' => 'pc_menu',
                            'menu_id' => 'pc-menu',
                            'container' => 'ul',
                            'theme_location' => 'primary',
                        ));

                        ?>
                        <?php easychic_header_cta_button(); ?>
                        <button data-collapse-toggle="sp_menu_modal" type="button" class="menu_open_button"
                            aria-controls="sp_menu_modal" aria-expanded="false" id="menu_open">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <span class="sr-only"><?php esc_html_e('Open Menu', 'easychic'); ?></span>
                        </button>
                    </nav><!-- #site-navigation -->
                </div>
                <div class="sp_menu_modal" id="sp_menu_modal" aria-hidden="true">
                    <div class="modal_content" role="dialog" aria-label="Mobile Menu">
                        <!-- first focusable element -->
                        <div tabindex="0" class="focus-trap-start"></div>

                        <?php
                        wp_nav_menu(array(
                            'menu' => 'header-nav',
                            'menu_class' => 'sp_menu',
                            'menu_id' => 'sp-menu',
                            'container' => 'ul',
                            'theme_location' => 'primary',
                        ));
                        ?>
                        <button data-collapse-toggle="sp_menu_modal" type="button" class="menu_close_button" id="menu_close"
                            aria-controls="sp_menu_modal" aria-expanded="false">
                            <span><?php esc_html_e('Close Menu', 'easychic'); ?></span>
                        </button>
                        <!-- last focusable element -->
                        <div tabindex="0" class="focus-trap-end"></div>
                    </div>

                </div><!-- #sp-menu modal -->
            </div>
        </header><!-- #header -->