<?php
/**
 * Customizer settings.
 *
 * phpcs:disable Universal.Files.SeparateFunctionsFromOO.Mixed
 * phpcs:disable Generic.Files.OneObjectStructurePerFile.MultipleFound
 *
 * @package easychic
 */

/**
 * Custom radio image control.
 */
if ( class_exists( 'WP_Customize_Control' ) ) :
	/**
	 * Custom radio image control class.
	 */
	class Easychic_Image_Radio_Control extends WP_Customize_Control {

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'radio_image';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}
			?>
<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) : ?>
<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
<div class="radio-image-control">
			<?php foreach ( $this->choices as $value => $label ) : ?>
	<label>
		<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $value ); ?>" 
				<?php
						$this->link();
						checked( $this->value(), $value );
				?>
				>
		<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>">
	</label>
	<?php endforeach; ?>
</div>
			<?php
		}
	}
endif;


/**
 * Font radio control class.
 */
if ( class_exists( 'WP_Customize_Control' ) ) :
	/**
	 * Font radio control class.
	 */
	class Font_Radio_Control extends WP_Customize_Control {

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'radio-font';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}
			?>
<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) : ?>
<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<?php foreach ( $this->choices as $value => $label ) : ?>
<label>
	<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
					<?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />
	<span
		class="<?php echo esc_attr( strtolower( str_replace( ' ', '-', $value ) ) ); ?>"><?php echo esc_html( $label ); ?></span>
</label>
			<?php endforeach; ?>
			<?php
		}
	}
endif;

/**
 * Register customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function easychic_customize_register( $wp_customize ) {
	// Added layout selection section.
	$wp_customize->add_panel(
		'easychic_setting',
		array(
			'title'    => esc_html__( 'EasyChic Settings', 'easychic' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_section(
		'easychic_layout_section',
		array(
			'title'    => esc_html__( 'EasyChic Layout Settings', 'easychic' ),
			'priority' => 1,
			'panel'    => 'easychic_setting',
		)
	);

	// Layout selection settings.
	$wp_customize->add_setting(
		'easychic_page_layout',
		array(
			'default'           => 'one-column',
			'transport'         => 'refresh',
			'sanitize_callback' => 'easychic_sanitize_layout',
		)
	);

	$wp_customize->add_control(
		'easychic_page_layout',
		array(
			'label'   => esc_html__( 'EasyChic Page Layout', 'easychic' ),
			'section' => 'easychic_layout_section',
			'type'    => 'radio',
			'choices' => array(
				'one-column-none' => esc_html__( 'One Column Sidebar None', 'easychic' ),
				'one-column'      => esc_html__( 'One Column Sidebar bottom', 'easychic' ),
				'two-columns'     => esc_html__( 'Two Columns Sidebar Right', 'easychic' ),
			),
		)
	);

	$wp_customize->add_section(
		'easychic_font_section',
		array(
			'title'    => esc_html__( 'EasyChic Font Select', 'easychic' ),
			'priority' => 2,
			'panel'    => 'easychic_setting',
		)
	);

	$wp_customize->add_setting(
		'easychic_font_setting',
		array(
			'default'           => 'noto-sans-jp',
			'transport'         => 'refresh',
			'sanitize_callback' => 'easychic_sanitize_font',
		)
	);

	$wp_customize->add_control(
		new Font_Radio_Control(
			$wp_customize,
			'easychic_font_setting',
			array(
				'label'       => esc_html__( 'EasyChic Font Setting', 'easychic' ),
				'section'     => 'easychic_font_section',
				'settings'    => 'easychic_font_setting',
				'type'        => 'radio',
				'choices'     => array(
					'noto-sans-jp'  => 'Noto Sans JP',
					'noto-serif-jp' => 'Noto Serif JP',
				),
				'description' => esc_html__( 'Select the font for your site.', 'easychic' ),
			)
		)
	);

	$wp_customize->add_section(
		'easychic_header_section',
		array(
			'title'    => esc_html__( 'EasyChic Header Button Settings', 'easychic' ),
			'priority' => 2,
			'panel'    => 'easychic_setting',
		)
	);

	// Header CTA Button Text.
	$wp_customize->add_setting(
		'easychic_header_cta_text',
		array(
			'default'           => 'Contact',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'easychic_header_cta_text',
		array(
			'label'   => esc_html__( 'Header CTA Button Text', 'easychic' ),
			'section' => 'easychic_header_section',
			'type'    => 'text',
		)
	);

	// Header CTA Button URL.
	$wp_customize->add_setting(
		'easychic_header_cta_url',
		array(
			'default'           => '#contact',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'easychic_header_cta_url',
		array(
			'label'   => esc_html__( 'Header CTA Button URL', 'easychic' ),
			'section' => 'easychic_header_section',
			'type'    => 'url',
		)
	);

	// Header CTA Button Background Color.
	$wp_customize->add_setting(
		'easychic_header_cta_bg_color',
		array(
			'default'           => '#1E293B',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'easychic_header_cta_bg_color',
			array(
				'label'   => esc_html__( 'Header CTA Button Background Color', 'easychic' ),
				'section' => 'easychic_header_section',
			)
		)
	);

	// Header CTA Button Text Color.
	$wp_customize->add_setting(
		'easychic_header_cta_text_color',
		array(
			'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'easychic_header_cta_text_color',
			array(
				'label'   => esc_html__( 'Header CTA Button Text Color', 'easychic' ),
				'section' => 'easychic_header_section',
			)
		)
	);

	// style select section.
	$wp_customize->add_section(
		'easychic_style_section',
		array(
			'title'    => esc_html__( 'Site Style Select', 'easychic' ),
			'priority' => 3,
			'panel'    => 'easychic_setting',
		)
	);

	// style select setting.
	$wp_customize->add_setting(
		'easychic_style_setting',
		array(
			'default'           => 'style1',
			'transport'         => 'refresh',
			'sanitize_callback' => 'easychic_sanitize_style',
		)
	);

	$wp_customize->add_control(
		new Easychic_Image_Radio_Control(
			$wp_customize,
			'easychic_image_radio_control',
			array(
				'label'    => esc_html__( 'Select Image', 'easychic' ),
				'section'  => 'easychic_style_section',
				'settings' => 'easychic_style_setting',
				'choices'  => array(
					'style1' => EASYCHIC_THEME_IMAGE . '/icons/style_select1.webp',
					'style2' => EASYCHIC_THEME_IMAGE . '/icons/style_select2.webp',
					'style3' => EASYCHIC_THEME_IMAGE . '/icons/style_select3.webp',
					'style4' => EASYCHIC_THEME_IMAGE . '/icons/style_select4.webp',
				),
			)
		)
	);
}
add_action( 'customize_register', 'easychic_customize_register' );

/**
 * Sanitize layout setting.
 *
 * @param string $input Layout value.
 * @return string
 */
function easychic_sanitize_layout( $input ) {
	$valid = array(
		'one-column'      => esc_html__( 'One Column Sidebar bottom', 'easychic' ),
		'one-column-none' => esc_html__( 'One Column Sidebar none', 'easychic' ),
		'two-columns'     => esc_html__( 'Two Columns Sidebar right', 'easychic' ),
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/**
 * Sanitize style setting.
 *
 * @param string $input Style value.
 * @return string
 */
function easychic_sanitize_style( $input ) {
	$valid = array( 'style1', 'style2', 'style3', 'style4' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'style1';
}

/**
 * Sanitize font setting.
 *
 * @param string $input Font value.
 * @return string
 */
function easychic_sanitize_font( $input ) {
	$valid = array( 'noto-sans-jp', 'noto-serif-jp' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'noto-sans-jp';
}

/**
 * Customizer body font CSS.
 */
function easychic_customizer_body_css() {
	$font_css = sanitize_html_class( get_theme_mod( 'easychic_font_setting', 'noto-sans-jp' ) );

	if ( ! empty( $font_css ) ) {
		add_filter(
			'body_class',
			function ( $classes ) use ( $font_css ) {
				$classes[] = $font_css;
				return $classes;
			}
		);
	}
}
add_action( 'after_setup_theme', 'easychic_customizer_body_css' );

/**
 * Apply the selected font to the block editor canvas.
 *
 * The webfonts themselves are loaded through assets/css/editor-style.css.
 * The body selector is rewritten to the editor wrapper by the editor itself.
 *
 * @param array $settings Block editor settings.
 * @return array
 */
function easychic_block_editor_font_css( $settings ) {
	$font = get_theme_mod( 'easychic_font_setting', 'noto-sans-jp' );

	if ( 'noto-serif-jp' === $font ) {
		$font_stack = "'Noto Serif JP', serif";
	} else {
		$font_stack = "'Noto Sans JP', sans-serif";
	}

	$settings['styles'][] = array(
		'css' => 'body { font-family: ' . $font_stack . '; }',
	);

	return $settings;
}
add_filter( 'block_editor_settings_all', 'easychic_block_editor_font_css' );

/**
 * Layout selection.
 */
function easychic_sidebar_layout() {
	$layout        = get_theme_mod( 'easychic_page_layout', 'two-columns' );
	$valid_layouts = array( 'one-column', 'one-column-none', 'two-columns' );

	if ( in_array( $layout, $valid_layouts, true ) ) {
		return $layout;
	}

	return 'two-columns';
}

/**
 * CTA button.
 */
function easychic_header_cta_button() {
	?>
<a href="<?php echo esc_url( get_theme_mod( 'easychic_header_cta_url', '#contact' ) ); ?>"
	class="header_cta_link"><?php echo esc_html( get_theme_mod( 'easychic_header_cta_text', 'Contact' ) ); ?></a>
	<?php
}

/**
 * Customizer style CSS.
 */
function easychic_customizer_style_css() {
	$style          = array();
	$easychic_style = get_theme_mod( 'easychic_style_setting', 'style1' );

	$style1            = array();
	$style1['header']  = array(
		'background-color' => '#ffffff',
		'text-color'       => '#687e9d',
		'link-color'       => '#1a293b',
	);
	$style1['footer']  = array(
		'background-color' => '#334155',
		'text-color'       => '#e2e8f0',
		'heading-color'    => '#bef264',
	);
	$style1['main']    = array(
		'background-color' => '#ffffff',
		'text-color'       => '#1a293b',
	);
	$style1['sidebar'] = array(
		'background-color' => '#f1f5f9',
		'text-color'       => '#475569',
	);

	$style2            = array();
	$style2['header']  = array(
		'background-color' => '#BB2735',
		'text-color'       => '#e2e8f0',
		'link-color'       => '#F8F8FF',
	);
	$style2['footer']  = array(
		'background-color' => '#454A6A',
		'text-color'       => '#e2e8f0',
		'heading-color'    => '#bef264',
	);
	$style2['main']    = array(
		'background-color' => '#ffffff',
		'text-color'       => '#1a293b',
	);
	$style2['sidebar'] = array(
		'background-color' => '#d7dbdd',
		'text-color'       => '#475569',
	);

	$style3            = array();
	$style3['header']  = array(
		'background-color' => '#0487E2',
		'text-color'       => '#e2e8f0',
		'link-color'       => '#F8F8FF',
	);
	$style3['footer']  = array(
		'background-color' => '#3B454E',
		'text-color'       => '#e2e8f0',
		'heading-color'    => '#bef264',
	);
	$style3['main']    = array(
		'background-color' => '#ffffff',
		'text-color'       => '#1a293b',
	);
	$style3['sidebar'] = array(
		'background-color' => '#B1D5F5',
		'text-color'       => '#475569',
	);

	$style4            = array();
	$style4['header']  = array(
		'background-color' => '#FED1E6',
		'text-color'       => '#687e9d',
		'link-color'       => '#1a293b',
	);
	$style4['footer']  = array(
		'background-color' => '#5C5C5C',
		'text-color'       => '#e2e8f0',
		'heading-color'    => '#bef264',
	);
	$style4['main']    = array(
		'background-color' => '#ffffff',
		'text-color'       => '#1a293b',
	);
	$style4['sidebar'] = array(
		'background-color' => '#E6E4F1',
		'text-color'       => '#475569',
	);

	if ( empty( $easychic_style ) ) {
		$easychic_style = 'style1';
	}

	if ( 'style1' === $easychic_style ) {
		$style = $style1;
	} elseif ( 'style2' === $easychic_style ) {
		$style = $style2;
	} elseif ( 'style3' === $easychic_style ) {
		$style = $style3;
	} elseif ( 'style4' === $easychic_style ) {
		$style = $style4;
	}

	$custom_css = '';
	if ( isset( $style['header'] ) ) {
		$custom_css .= 'header { background-color: ' . esc_attr( $style['header']['background-color'] ) . '; color: ' . esc_attr( $style['header']['text-color'] ) . '; }' . "\n";
		$custom_css .= 'header a { color: ' . esc_attr( $style['header']['link-color'] ) . '; }' . "\n";
	}
	if ( isset( $style['footer'] ) ) {
		$custom_css .= 'footer { background-color: ' . esc_attr( $style['footer']['background-color'] ) . '; color: ' . esc_attr( $style['footer']['text-color'] ) . '; }' . "\n";
		$custom_css .= 'footer h3 { color: ' . esc_attr( $style['footer']['heading-color'] ) . '; }' . "\n";
	}
	if ( isset( $style['main'] ) ) {
		$custom_css .= 'main { background-color: ' . esc_attr( $style['main']['background-color'] ) . '; color: ' . esc_attr( $style['main']['text-color'] ) . '; }' . "\n";
	}
	if ( isset( $style['sidebar'] ) ) {
		$custom_css .= 'aside { background-color: ' . esc_attr( $style['sidebar']['background-color'] ) . '; color: ' . esc_attr( $style['sidebar']['text-color'] ) . '; }' . "\n";
	}

	// header CTA button styles.
	$cta_bg_color   = get_theme_mod( 'easychic_header_cta_bg_color', '#1E293B' );
	$cta_text_color = get_theme_mod( 'easychic_header_cta_text_color', '#ffffff' );
	$custom_css    .= '.header_cta_link { background-color: ' . esc_attr( $cta_bg_color ) . '; color: ' . esc_attr( $cta_text_color ) . '; }' . "\n";

	wp_add_inline_style( 'easychic-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'easychic_customizer_style_css' );