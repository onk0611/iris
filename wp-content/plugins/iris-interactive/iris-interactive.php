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
 * @package           Iris_Interactive
 *
 * @wordpress-plugin
 * Plugin Name:       IRIS_Interactive
 * Plugin URI:        https://theo-soulier.fr
 * Description:       Technical Test by Théo SOULIER for IRIS Interactive
 * Version:           1.0.0
 * Author:            Théo SOULIER
 * Author URI:        https://theo-soulier.fr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       iris-interactive
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
define( 'IRIS_INTERACTIVE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-iris-interactive-activator.php
 */
function activate_iris_interactive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-iris-interactive-activator.php';
	Iris_Interactive_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-iris-interactive-deactivator.php
 */
function deactivate_iris_interactive() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-iris-interactive-deactivator.php';
	Iris_Interactive_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_iris_interactive' );
register_deactivation_hook( __FILE__, 'deactivate_iris_interactive' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-iris-interactive.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_iris_interactive() {

	$plugin = new Iris_Interactive();
	$plugin->run();

}
run_iris_interactive();


function do_shortcode_form() {
    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $localisation = $_POST['localisation'];

        global $wpdb;
        $table_name = $wpdb->prefix . 'form_data';
		$wpdb->insert(
			$table_name,
			array(
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'localisation' => $localisation
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s'
			)
		);

        $message = "Subscription sucessfull";
        return $message;
    }
    ob_start();
    
	$form_html = '<form method="post">
					<div class="mb-3 row">
						<label for="nom" class="col-sm-2 col-form-label">Nom :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nom" id="nom" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="prenom" id="prenom" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="email" class="col-sm-2 col-form-label">Email :</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" id="email" required>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="localisation" class="col-sm-2 col-form-label">Localisation :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="localisation" id="localisation" required>
						</div>
					</div>
					<div class="mb-3 row">
						<div class="col-sm-10 offset-sm-2">
							<input type="submit" name="submit" value="Envoyer" class="btn btn-primary">
						</div>
					</div>
				<form>';

	echo $form_html;

    return ob_get_clean();
}
add_shortcode('shortcode_form', 'do_shortcode_form');

function iris_get_form_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'form_data';
	$results = $wpdb->get_results("SELECT * FROM $table_name");
	echo '<div class="wrap"><h2>Localisation</h2>';

	if ($results) {
		echo '<table class="wp-list-table widefat fixed striped">';
		echo '<thead><tr>';
		echo '<th>Nom</th><th>Prénom</th><th>Email</th><th>Localisation</th>';
		echo '</tr></thead><tbody>';
		foreach ($results as $row) {
			echo '<tr>';
			echo '<td>' . $row->nom . '</td>';
			echo '<td>' . $row->prenom . '</td>';
			echo '<td>' . $row->email . '</td>';
			echo '<td>' . $row->localisation . '</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
	} else {
		echo 'Aucune donnée pour le moment.';
	}
	echo '</div>';
}

function iris_custom_rubrique() {
	add_menu_page(
		'Localisation', // titre de la page
		'Localisation', // titre du menu
		'manage_options', // capacité requise pour voir la page
		'iris-form', // identifiant unique de la page
		'iris_get_form_data' // fonction d'affichage de la page
	);
}
add_action('admin_menu', 'iris_custom_rubrique');

function iris_get_all_api() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'form_data';

    register_rest_route( 'api/v1', '/get_all', array(
        'methods' => 'GET',
        'callback' => function () use ($table_name, $wpdb) {
            $query = "SELECT * FROM $table_name";
            $results = $wpdb->get_results($query, ARRAY_A);

            return $results;
        },
    ) );
}
add_action( 'rest_api_init', 'iris_get_all_api' );
