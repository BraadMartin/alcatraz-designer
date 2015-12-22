<?php
/**
 * Alcatraz Designer Customize class
 *
 * @since  1.0.0
 */
class Alcatraz_Designer_Customize {

	/**
	 * Our plugin options.
	 */
	private $options;

	/**
	 * The constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		$this->options = get_option( 'alcatraz_designer_options' );
	}

	/**
	 * Set up our hooks.
	 */
	public function init() {
		add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	/**
	 * Enqueue our customizer preview JS.
	 *
	 * @since  1.0.0
	 */
	public function customize_preview_init() {
		wp_enqueue_script(
			'alcatraz_designer_customizer',
			ALCATRAZ_DESIGNER_URL . 'js/alcatraz-designer-customizer.js',
			array( 'customize-preview' ),
			ALCATRAZ_DESIGNER_VERSION,
			true
		);
	}

	/**
	 * Register our Customizer settings and controls.
	 *
	 * @since  1.0.0
	 *
	 * @param  object  $wp_customize  The Customizer object.
	 */
	public function customize_register( $wp_customize ) {

		/**
		 * Set up our defaults.
		 */
		$defaults    = $this->get_option_defaults();
		$bg_colors   = $this->get_bg_colors();
		$text_colors = $this->get_text_colors();

		/**
		 * Register our settings and controls.
		 */

		/* Colors */

		// Header Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[header_bg_color]',
			array(
				'default'     => $defaults['header_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_header_bg_color',
				array(
					'label'         => __( 'Header Background Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[header_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Header Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[header_text_color]',
			array(
				'default'     => $defaults['header_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_header_text_color',
				array(
					'label'         => __( 'Header Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[header_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);

		// Body Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[body_bg_color]',
			array(
				'default'     => $defaults['body_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_body_bg_color',
				array(
					'label'         => __( 'Body Background Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[body_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Body Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[body_text_color]',
			array(
				'default'     => $defaults['body_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_body_text_color',
				array(
					'label'         => __( 'Body Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[body_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);

		// Menu Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[menu_bg_color]',
			array(
				'default'     => $defaults['menu_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_menu_bg_color',
				array(
					'label'         => __( 'Menu Background Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[menu_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Menu Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[menu_text_color]',
			array(
				'default'     => $defaults['menu_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_menu_text_color',
				array(
					'label'         => __( 'Menu Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[menu_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);

		// Sub Menu Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[sub_menu_bg_color]',
			array(
				'default'     => $defaults['sub_menu_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_sub_menu_bg_color',
				array(
					'label'         => __( 'Sub Menu Background Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[sub_menu_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Sub Menu Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[sub_menu_text_color]',
			array(
				'default'     => $defaults['sub_menu_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_sub_menu_text_color',
				array(
					'label'         => __( 'Sub Menu Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[sub_menu_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);

		// Sidebar Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[sidebar_bg_color]',
			array(
				'default'     => $defaults['sidebar_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_sidebar_bg_color',
				array(
					'label'         => __( 'Sidebar Background Color', 'alcatraz-designer' ),
					'description'   => __( 'Only shows on certain page layouts', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[sidebar_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Sidebar Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[sidebar_text_color]',
			array(
				'default'     => $defaults['sidebar_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_sidebar_text_color',
				array(
					'label'         => __( 'Sidebar Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[sidebar_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);

		// Footer Background.
		$wp_customize->add_setting(
			'alcatraz_designer_options[footer_bg_color]',
			array(
				'default'     => $defaults['footer_bg_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_footer_bg_color',
				array(
					'label'         => __( 'Footer Background Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[footer_bg_color]',
					'show_opacity'  => true,
					'palette'       => $bg_colors,
				)
			)
		);

		// Footer Text.
		$wp_customize->add_setting(
			'alcatraz_designer_options[footer_text_color]',
			array(
				'default'     => $defaults['footer_text_color'],
				'type'        => 'option',
				'capability'  => 'edit_theme_options',
				'transport'   => 'postMessage'
			)
		);
		$wp_customize->add_control(
			new Alcatraz_Customize_Alpha_Color_Control(
				$wp_customize,
				'alcatraz_designer_options_footer_text_color',
				array(
					'label'         => __( 'Footer Text Color', 'alcatraz-designer' ),
					'section'       => 'colors',
					'settings'      => 'alcatraz_designer_options[footer_text_color]',
					'show_opacity'  => true,
					'palette'       => $text_colors,
				)
			)
		);
	}

	/**
	 * Return an array of default options.
	 *
	 * @since   1.0.0
	 *
	 * @return  array  The default options.
	 */
	public function get_option_defaults() {

		$defaults = array(
			'header_bg_color'     => '#e1e1e1',
			'header_text_color'   => '#222222',
			'body_bg_color'       => '#ffffff',
			'body_text_color'     => '#222222',
			'menu_bg_color'       => '#6E9AA2',
			'menu_text_color'     => '#ffffff',
			'sub_menu_bg_color'   => '#ffffff',
			'sub_menu_text_color' => '#6E9AA2',
			'sidebar_bg_color'    => '#666666',
			'sidebar_text_color'  => '#eeeeee',
			'footer_bg_color'     => '#222222',
			'footer_text_color'   => '#ffffff',
		);
		$defaults = apply_filters( 'alcatraz_designer_default_options', $defaults );

		return $defaults;
	}

	/**
	 * Return an array of background colors.
	 *
	 * @since   1.0.0
	 *
	 * @return  array  The background color options.
	 */
	public function get_bg_colors() {

		$bg_colors = array(
			'#ffffff',
			'#eeeeee',
			'#cccccc',
			'rgba(255,255,255,0.85)',
			'rgba(0,0,0,0.15)',
			'#222222',
		);
		$bg_colors = apply_filters( 'alcatraz_designer_background_colors', $bg_colors );

		return $bg_colors;
	}

	/**
	 * Return an array of text colors.
	 *
	 * @since   1.0.0
	 *
	 * @return  array  The text color options.
	 */
	public function get_text_colors() {

		$text_colors = array(
			'#222222',
			'#666666',
			'#999999',
			'#cccccc',
			'#ffffff',
		);
		$text_colors = apply_filters( 'alcatraz_designer_text_colors', $text_colors );

		return $text_colors;
	}
}