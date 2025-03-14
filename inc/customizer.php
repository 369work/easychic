<?php
// Customizer settings
function easychic_customize_register($wp_customize)
{
    // Added layout selection section
    $wp_customize->add_panel(
        'easychic_setting',
        array(
            'title' => esc_html__('EasyChic Settings', 'easychic'),
            'priority' => 1,
        )
    );

    $wp_customize->add_section('easychic_layout_section', array(
        'title' => esc_html__('EasyChic Layout Settings', 'easychic'),
        'priority' => 1,
        'panel' => 'easychic_setting',
    ));

    // Layout selection settings
    $wp_customize->add_setting('easychic_page_layout', array(
        'default' => 'one-column',
        'transport' => 'refresh',
        'sanitize_callback' => 'easychic_sanitize_layout',
    ));

    $wp_customize->add_control('easychic_page_layout', array(
        'label' => esc_html__('EasyChic Page Layout', 'easychic'),
        'section' => 'easychic_layout_section',
        'type' => 'radio',
        'choices' => array(
            'one-column-none' => esc_html__('One Column Sidebar None', 'easychic'),
            'one-column' => esc_html__('One Column Sidebar bottom', 'easychic'),
            'two-columns' => esc_html__('Two Columns Sidebar Right', 'easychic'),
        )
    ));

    // Select font settings
    class Font_Radio_Control extends WP_Customize_Control
    {
        public $type = 'radio-font';

        public function render_content()
        {
            if (empty($this->choices)) {
                return;
            }
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>

            <?php foreach ($this->choices as $value => $label) : ?>
                <label>
                    <input type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($this->id); ?>" <?php $this->link(); ?> <?php checked($this->value(), $value); ?> />
                    <span class="<?php echo esc_attr(strtolower(str_replace(' ', '-', $value))); ?>"><?php echo esc_html($label); ?></span>
                </label>
            <?php endforeach; ?>
        <?php
        }
    }

    $wp_customize->add_section('easychic_font_section', array(
        'title' => esc_html__('EasyChic Font Select', 'easychic'),
        'priority' => 2,
        'panel' => 'easychic_setting',
    ));

    $wp_customize->add_setting('easychic_font_setting', array(
        'default' => 'noto-sans-jp',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new Font_Radio_Control($wp_customize, 'easychic_font_setting', array(
        'label' => esc_html__('EasyChic Font Setting', 'easychic'),
        'section' => 'easychic_font_section',
        'settings' => 'easychic_font_setting',
        'type' => 'radio',
        'choices' => array(
            'noto-sans-jp' => 'Noto Sans JP',
            'noto-serif-jp' => 'Noto Serif JP',
        ),
        'description' => esc_html__('Select the font for your site.', 'easychic'),
    )));

    // Header CTA Button Text
    $wp_customize->add_setting('easychic_header_cta_text', array(
        'default' => 'Contact',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('easychic_header_cta_text', array(
        'label' => esc_html__('Header CTA Button Text', 'easychic'),
        'section' => 'easychic_header_section',
        'type' => 'text',
    ));

    // Header CTA Button URL
    $wp_customize->add_setting('easychic_header_cta_url', array(
        'default' => '#contact',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('easychic_header_cta_url', array(
        'label' => esc_html__('Header CTA Button URL', 'easychic'),
        'section' => 'easychic_header_section',
        'type' => 'url',
    ));

    // Header CTA Button Background Color
    $wp_customize->add_setting('easychic_header_cta_bg_color', array(
        'default' => '#1E293B',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'easychic_header_cta_bg_color', array(
        'label' => esc_html__('Header CTA Button Background Color', 'easychic'),
        'section' => 'easychic_header_section',
    )));

    // Header CTA Button Text Color
    $wp_customize->add_setting('easychic_header_cta_text_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'easychic_header_cta_text_color', array(
        'label' => esc_html__('Header CTA Button Text Color', 'easychic'),
        'section' => 'easychic_header_section',
    )));


    // custom radio image control
    class Easychic_Image_Radio_Control extends WP_Customize_Control
    {
        public $type = 'radio_image';

        public function render_content()
        {
            if (empty($this->choices)) {
                return;
            }
        ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (! empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>
            <div class="radio-image-control">
                <?php foreach ($this->choices as $value => $label) : ?>
                    <label>
                        <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($value); ?>"
                        <?php $this->link(); checked($this->value(), $value); ?>>
                        <img src="<?php echo esc_url($label); ?>" alt="<?php echo esc_attr($value); ?>">
                    </label>
                <?php endforeach; ?>
            </div>
    <?php
        }
    }

    // style select section
    $wp_customize->add_section('easychic_style_section', array(
        'title'    => __('Site Style Select', 'easychic'),
        'priority' => 3,
        'panel' => 'easychic_setting',
    ));

    // style select setting
    $wp_customize->add_setting('easychic_style_setting', array(
        'default' => 'style1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new Easychic_Image_Radio_Control($wp_customize, 'easychic_image_radio_control', array(
        'label'    => __('Select Image', 'easychic'),
        'section'  => 'easychic_style_section',
        'settings' => 'easychic_style_setting',
        'choices'  => array(
            'style1' => EASYCHIC_THEME_IMAGE . '/icons/style_select1.webp',
            'style2' => EASYCHIC_THEME_IMAGE . '/icons/style_select2.webp',
            'style3' => EASYCHIC_THEME_IMAGE . '/icons/style_select3.webp',
            'style4' => EASYCHIC_THEME_IMAGE . '/icons/style_select4.webp',
        ),
    )));
}
add_action('customize_register', 'easychic_customize_register');

function easychic_sanitize_layout($input)
{
    $valid = array(
        'one-column' => esc_html__('One Column Sidebar bottom', 'easychic'),
        'one-column-none' => esc_html__('One Column Sidebar none', 'easychic'),
        'two-columns' => esc_html__('Two Columns Sidebar right', 'easychic'),
    );
    if (array_key_exists($input, $valid)) {
        return $input;
    } else {
        return '';
    }
}

// Customizer body font CSS
function easychic_customizer_body_css()
{
    $font_css = esc_attr(get_theme_mod('easychic_font_setting', 'noto-sans-jp'));

    if (!empty($font_css)) {
        add_filter('body_class', function ($classes) use ($font_css) {
            $classes[] = $font_css;
            return $classes;
        });
    }
}
add_action('wp_head', 'easychic_customizer_body_css');

// layout selection
function easychic_sidebar_layout()
{
    $layout = esc_attr(get_theme_mod('easychic_page_layout', 'two-columns'));
    if ($layout == 'one-column') {
        $layout_class = 'one-column';
    } elseif ($layout == 'one-column-none') {
        $layout_class = 'one-column-none';
    } else {
        $layout_class = 'two-columns';
    }
    return $layout_class;
}

// cta button
function easychic_header_cta_button()
{
    ?>
    <a href="<?php echo esc_url(get_theme_mod('easychic_header_cta_url', 'https://wordpress.org/themes/')); ?>" class="header_cta_link"><?php echo esc_html(get_theme_mod('easychic_header_cta_text', 'Contact')); ?></a>
<?php
}

// Customizer style CSS
function easychic_customizer_style_css()
{
    $style = [];
    $easychic_style = get_theme_mod('easychic_style_setting', 'style1');

    $style1 = [];
    $style1['header'] = [
        'background-color' => '#ffffff',
        'text-color' => '#687e9d',
        'link-color' => '#1a293b'
    ];
    $style1['footer'] = [
        'background-color' => '#334155',
        'text-color' => '#e2e8f0',
        'heading-color' => '#bef264'
    ];
    $style1['main'] = [
        'background-color' => '#ffffff',
        'text-color' => '#1a293b'
    ];
    $style1['sidebar'] = [
        'background-color' => '#f1f5f9',
        'text-color' => '#475569'
    ];

    $style2 = [];
    $style2['header'] = [
        'background-color' => '#BB2735',
        'text-color' => '#e2e8f0',
        'link-color' => '#F8F8FF'
    ];
    $style2['footer'] = [
        'background-color' => '#454A6A',
        'text-color' => '#e2e8f0',
        'heading-color' => '#bef264'
    ];
    $style2['main'] = [
        'background-color' => '#ffffff',
        'text-color' => '#1a293b'
    ];
    $style2['sidebar'] = [
        'background-color' => '#d7dbdd',
        'text-color' => '#475569'
    ];

    $style3 = [];
    $style3['header'] = [
        'background-color' => '#0487E2',
        'text-color' => '#e2e8f0',
        'link-color' => '#F8F8FF'
    ];
    $style3['footer'] = [
        'background-color' => '#3B454E',
        'text-color' => '#e2e8f0',
        'heading-color' => '#bef264'
    ];
    $style3['main'] = [
        'background-color' => '#ffffff',
        'text-color' => '#1a293b'
    ];
    $style3['sidebar'] = [
        'background-color' => '#B1D5F5',
        'text-color' => '#475569'
    ];

    $style4 = [];
    $style4['header'] = [
        'background-color' => '#FED1E6',
        'text-color' => '#687e9d',
        'link-color' => '#1a293b'
    ];
    $style4['footer'] = [
        'background-color' => '#5C5C5C',
        'text-color' => '#e2e8f0',
        'heading-color' => '#bef264'
    ];
    $style4['main'] = [
        'background-color' => '#ffffff',
        'text-color' => '#1a293b'
    ];
    $style4['sidebar'] = [
        'background-color' => '#E6E4F1',
        'text-color' => '#475569'
    ];

    if (empty($easychic_style)) {
        $easychic_style = 'style1';
    }

    if ($easychic_style == 'style1') {
        $style = $style1;
    } elseif ($easychic_style == 'style2') {
        $style = $style2;
    } elseif ($easychic_style == 'style3') {
        $style = $style3;
    } elseif ($easychic_style == 'style4') {
        $style = $style4;
    }

    $custom_css = '';
    if (isset($style['header'])) {
        $custom_css .= 'header { background-color: ' . esc_attr($style['header']['background-color']) . '; color: ' . esc_attr($style['header']['text-color']) . '; }' . "\n";
        $custom_css .= 'header a { color: ' . esc_attr($style['header']['link-color']) . '; }' . "\n";
    }
    if (isset($style['footer'])) {
        $custom_css .= 'footer { background-color: ' . esc_attr($style['footer']['background-color']) . '; color: ' . esc_attr($style['footer']['text-color']) . '; }' . "\n";
        $custom_css .= 'footer h3 { color: ' . esc_attr($style['footer']['heading-color']) . '; }' . "\n";
    }
    if (isset($style['main'])) {
        $custom_css .= 'main { background-color: ' . esc_attr($style['main']['background-color']) . '; color: ' . esc_attr($style['main']['text-color']) . '; }' . "\n";
    }
    if (isset($style['sidebar'])) {
        $custom_css .= 'aside { background-color: ' . esc_attr($style['sidebar']['background-color']) . '; color: ' . esc_attr($style['sidebar']['text-color']) . '; }' . "\n";
    }
    wp_register_style('theme-style-handle', false);
    wp_enqueue_style('theme-style-handle');
    wp_add_inline_style('theme-style-handle', $custom_css);

}
add_action('wp_head', 'easychic_customizer_style_css');
