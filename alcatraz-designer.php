<?php
/**
 * Alcatraz Designer
 *
 * @package             Alcatraz_Designer
 * @author              Braad Martin, Carrie Forde, Jordan Gonzales
 * @license             GPL-3.0+
 *
 * @wordpress-plugin
 * Plugin Name:         Alcatraz Designer
 * Plugin URI:          http://alcatraztheme.com
 * Description:         A plugin for design customization of the Alcatraz theme
 * Version:             1.0.0
 * Author:              Braad Martin, Carrie Forde, Jordan Gonzales
 * Author URI:          http://alcatraztheme.com
 * License:             GPL-3.0+
 * License URI:         http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:         alcatraz_designer
 * Domain Path:         /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// Set up some constants.
define( 'ALCATRAZ_DESIGNER_VERSION', '1.0.0' );
define( 'ALCATRAZ_DESIGNER_PATH', plugin_dir_path( __FILE__ ) );
define( 'ALCATRAZ_DESIGNER_URL', plugin_dir_url( __FILE__ ) );

// Inlcude the main plugin class.
require_once dirname( __FILE__ ) . '/classes/class-alcatraz-designer.php';

/**
 * Start the party.
 *
 * @since    1.0.0
 */
function alcatraz_designer_init() {

	$alcatraz_designer = new Alcatraz_Designer();
	$alcatraz_designer->init();
}
alcatraz_designer_init();