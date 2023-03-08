<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://theo-soulier.fr
 * @since             1.0.0
 * @package           Technical_Test_By_Théo_Soulier_For_Iris_Interactive
 *
 * @wordpress-plugin
 * Plugin Name:       IRIS Interactive
 * Plugin URI:        https://theo-soulier.fr
 * Description:       Technical Test by Théo SOULIER for IRIS Interactive
 * Version:           1.0.0
 * Author:            Théo SOULIER
 * Author URI:        https://theo-soulier.fr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       technical test by théo soulier for iris interactive
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TECHNICAL TEST BY THÉO SOULIER FOR IRIS INTERACTIVE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-technical test by théo soulier for iris interactive-activator.php
 */
function activate_technical test by théo soulier for iris interactive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-technical test by théo soulier for iris interactive-activator.php';
	Technical_Test_By_Théo_Soulier_For_Iris_Interactive_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-technical test by théo soulier for iris interactive-deactivator.php
 */
function deactivate_technical test by théo soulier for iris interactive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-technical test by théo soulier for iris interactive-deactivator.php';
	Technical_Test_By_Théo_Soulier_For_Iris_Interactive_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_technical test by théo soulier for iris interactive' );
register_deactivation_hook( __FILE__, 'deactivate_technical test by théo soulier for iris interactive' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-technical test by théo soulier for iris interactive.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_technical test by théo soulier for iris interactive() {

	$plugin = new Technical_Test_By_Théo_Soulier_For_Iris_Interactive();
	$plugin->run();

}
run_technical test by théo soulier for iris interactive();
