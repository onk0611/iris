<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://theo-soulier.fr
 * @since      1.0.0
 *
 * @package    Technical_Test_By_Théo_Soulier_For_Iris_Interactive
 * @subpackage Technical_Test_By_Théo_Soulier_For_Iris_Interactive/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Technical_Test_By_Théo_Soulier_For_Iris_Interactive
 * @subpackage Technical_Test_By_Théo_Soulier_For_Iris_Interactive/includes
 * @author     Théo SOULIER <theos.pro@proton.me>
 */
class Technical_Test_By_Théo_Soulier_For_Iris_Interactive_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'technical test by théo soulier for iris interactive',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
