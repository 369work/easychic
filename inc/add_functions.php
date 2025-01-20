<?php

// Add custom functions
// Add Easychic menu to admin
function easychic_add_admin_menu()
{
    add_menu_page(
        'Easychic Theme Description', // Page title
        'Easychic', // Menu title
        'manage_options', // Capability
        'easychic-theme-description', // Menu slug
        'easychic_theme_description_page', // Function to display the page
        'dashicons-pets', // Icon URL
        59 // Position (just above Appearance menu which is at 60)
    );
}
add_action('admin_menu', 'easychic_add_admin_menu');

// Display the theme options page
function easychic_theme_description_page()
{
    $lang = get_bloginfo('language');
    if ($lang == 'ja') {
        $easychic_theme_uri = 'https://easychic.369work.net/index-ja.html';
    } else {
        $easychic_theme_uri = 'https://easychic.369work.net/';
    }
?>
    <style>
        #wpwrap .admin-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #wpwrap .admin-sub-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            padding-bottom: .5rem;
            border-bottom: 1px solid #5e96ff;
        }

        #wpwrap p {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        #wpwrap .content {
            box-sizing: border-box;
            width: 100%;
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        #wpwrap .content-pro {
            box-sizing: border-box;
            width: 100%;
            margin-top: 1rem;
            padding: 1rem;
            border: 3px solid #b4ffa1;
            border-radius: 5px;
            background-color: #feffef;
        }

        .content .border {
            border: 1px solid #5e96ff;
        }

        .content .bold {
            font-weight: bold;
        }

        .content a {
            color: #fff;
            font-size: 1rem;
        }
    </style>
    <div class="wrap">
        <h1 class="admin-title"><?php esc_html_e('Easychic Theme Options', 'easychic'); ?></h1>
        <div class="notice notice-success is-dismissible">
            <h3 class="admin-sub-title"><?php esc_html_e('Thank you for using the Easychic theme!', 'easychic'); ?></h3>
            <p><?php esc_html_e('Here you can customize the Easychic theme.', 'easychic'); ?></p>
        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Getting Started', 'easychic'); ?></h2>
            <p><?php esc_html_e('To get started with the Easychic theme, you can customize the theme using the Customizer.', 'easychic'); ?></p>
            <a href="<?php echo esc_url(admin_url('customize.php?easychic-theme-options')); ?>" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;"><?php esc_html_e('Customize', 'easychic'); ?></a>

        </div>

        <div class="content">
            <h3 class="admin-sub-title"><?php esc_html_e('Basic usage of Easychic theme', 'easychic'); ?></h3>
            <p><?php esc_html_e('The Customizer allows you to easily customize the look of your site. You can customize the following elements:', 'easychic'); ?></p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">

                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Font selection', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Site style', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom logo', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background Color', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Menu placement', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar and layout', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar Widget', 'easychic'); ?></p>
                </div>

            </div>
            <a href="<?php echo esc_url(admin_url('customize.php?easychic-theme-options')); ?>" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Customize', 'easychic'); ?>
            </a>

        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Review the Easychic Theme', 'easychic'); ?></h2>
            <p><?php esc_html_e('Thank you for using the Easychic theme!', 'easychic'); ?></p>
            <p><?php esc_html_e('We would love to hear your feedback on the Easychic theme. Please take a moment to leave a review.', 'easychic'); ?></p>
            <a href="https://wordpress.org/support/theme/easychic/reviews/" target="_blank" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Leave a Review', 'easychic'); ?>
            </a>
        </div>

        <div class="content">
            <h2 class="admin-sub-title"><?php esc_html_e('Theme Support', 'easychic'); ?></h2>
            <p><?php esc_html_e('If you have any questions or need help with the Easychic theme, please visit the support page.', 'easychic'); ?></p>
            <a href="<?php echo esc_url($easychic_theme_uri); ?>" target="_blank" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;"><?php esc_html_e('Support', 'easychic'); ?></a>
        </div>

        <div class="content-pro">
            <h3 class="admin-sub-title"><?php esc_html_e('When you upgrade to Pro you can:', 'easychic'); ?></h3>
            <p><?php esc_html_e('Upgrading to Pro gives you even more customization and faster support.', 'easychic'); ?></p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">

                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Font selection', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom logo', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background Color', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Custom background', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Menu placement', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar and layout', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar Widget', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Header style', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Footer style', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Sidebar style', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Main style', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('SEO Support', 'easychic'); ?></p>
                </div>
                <div style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
                    <p class="bold"><?php esc_html_e('Theme Support', 'easychic'); ?></p>
                </div>
            </div>
            <a href="https://easychic.369work.net/" target="_blank" style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
                <?php esc_html_e('Go to details page', 'easychic'); ?>
            </a>

        </div>

    </div>
<?php
}

// title tag separator
function easychic_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'easychic_title_separator');

// Determine the layout within the template
function get_current_layout()
{
    return get_theme_mod('page_layout', 'two-column');
}

// Check if the sidebar is enabled for the current template
function is_sidebar_enabled()
{
    if (is_front_page()) {
        return false; // Front page is always 1 column
    }

    $layout = get_current_layout();
    return $layout !== 'one-column';
}
