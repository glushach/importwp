<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://http://wordpress.loc
 * @since             1.0.0
 * @package           Importwp
 *
 * @wordpress-plugin
 * Plugin Name:       ImportWp
 * Plugin URI:        https://http://wordpress.loc
 * Description:       Плагин, который импортирует товары в базу Woocommerce
 * Version:           1.0.0
 * Author:            Webformyself
 * Author URI:        https://http://wordpress.loc/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       importwp
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
define( 'IMPORTWP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-importwp-activator.php
 */
function activate_importwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-importwp-activator.php';
	Importwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-importwp-deactivator.php
 */
function deactivate_importwp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-importwp-deactivator.php';
	Importwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_importwp' );
register_deactivation_hook( __FILE__, 'deactivate_importwp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-importwp.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-import-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_importwp() {

	$plugin = new Importwp();
	$plugin->run();

}

add_action('init', 'run_importwp');
