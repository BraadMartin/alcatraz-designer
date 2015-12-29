<?php
/**
 * Alcatraz Designer class
 *
 * @since  1.0.0
 */
class Alcatraz_Designer {

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
	 *
	 * @since  1.0.0
	 */
	public function init() {

		// Output our style element.
		add_action( 'alcatraz_before', array( $this, 'output_styles' ) );

		// Maybe initialize our Customizer settings and controls.
		add_action( 'init', array( $this, 'customizer_init' ) );
	}

	/**
	 * Initialize our Customizer settings and controls.
	 *
	 * @since  1.0.0
	 */
	public function customizer_init() {

		if ( ! is_customize_preview() ) {
			return;
		}

		require_once ALCATRAZ_DESIGNER_PATH . 'classes/class-alcatraz-designer-customize.php';

		$alcatraz_designer_customize = new Alcatraz_Designer_Customize();
		$alcatraz_designer_customize->init();
	}

	/**
	 * Output the style element that contains all Alcatraz Designer CSS.
	 *
	 * @since  1.0.0
	 */
	public function output_styles() {

		if ( empty( $this->options ) ) {
			return;
		}

		$styles = array();

		if ( ! empty( $this->options['body_bg_color'] ) ) {
			$styles[] = 'body { background-color: ' . $this->options['body_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['body_text_color'] ) ) {
			$styles[] = 'body { color: ' . $this->options['body_text_color'] . '; }';
		}

		if ( ! empty( $this->options['header_bg_color'] ) ) {
			$styles[] = '.site-header { background-color: ' . $this->options['header_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['header_text_color'] ) ) {
			$styles[] = '.site-header { color: ' . $this->options['header_text_color'] . '; }';
		}

		if ( ! empty( $this->options['menu_bg_color'] ) ) {
			$styles[] = '.main-navigation #primary-menu, .header-style-default #primary-menu { background-color: ' . $this->options['menu_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['menu_text_color'] ) ) {
			$styles[] = '.main-navigation #primary-menu a, .header-style-default #primary-menu a { color: ' . $this->options['menu_text_color'] . '; }';
		}

		if ( ! empty( $this->options['sub_menu_bg_color'] ) ) {
			$styles[] = '.main-navigation #primary-menu .sub-menu, .header-style-default .main-navigation #primary-menu .sub-menu, .header-style-short .main-navigation #primary-menu .sub-menu { background-color: ' . $this->options['sub_menu_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['sub_menu_text_color'] ) ) {
			$styles[] = '.main-navigation #primary-menu .sub-menu a, .header-style-default .main-navigation #primary-menu .sub-menu .menu-item a, .header-style-short .main-navigation #primary-menu .sub-menu .menu-item a { color: ' . $this->options['sub_menu_text_color'] . '; border-color: ' . $this->options['sub_menu_text_color'] . '; }';
			$styles[] = '#primary-menu .sub-menu-toggle .sub-menu-toggle-span { background-color: ' . $this->options['sub_menu_text_color'] . '; }';
		}

		if ( ! empty( $this->options['content_bg_color'] ) ) {
			$styles[] = '.content-area { background-color: ' . $this->options['content_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['content_text_color'] ) ) {
			$styles[] = '.content-area, .content-area h1, .content-area h2, .content-area h3, .content-area h4, .content-area h5, .content-area h6 { color: ' . $this->options['content_text_color'] . '; }';
		}

		if ( ! empty( $this->options['sidebar_bg_color'] ) ) {
			$styles[] = '.primary-sidebar { background-color: ' . $this->options['sidebar_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['sidebar_text_color'] ) ) {
			$styles[] = '.primary-sidebar, .primary-sidebar h1, .primary-sidebar h2, .primary-sidebar h3, .primary-sidebar h4, .primary-sidebar h5, .primary-sidebar h6 { color: ' . $this->options['sidebar_text_color'] . '; }';
		}

		if ( ! empty( $this->options['footer_bg_color'] ) ) {
			$styles[] = '.site-footer { background-color: ' . $this->options['footer_bg_color'] . '; }';
		}

		if ( ! empty( $this->options['footer_text_color'] ) ) {
			$styles[] = '.site-footer { color: ' . $this->options['footer_text_color'] . '; }';
		}

		printf(
			'<style type="text/css">%s</style>',
			esc_attr( implode( ' ', $styles ) )
		);
	}
}