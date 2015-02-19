<?php
/*
Plugin Name:  The Events Calendar PRO Alarm
Plugin URI:   https://github.com/afragen/events-calendar-pro-alarm/
Description:  This plugin adds an alarm functionality to The Events Calendar PRO plugin by using the Additional Fields feature of Events Calendar PRO. This evolved from the following <a href="http://tri.be/support/forums/topic/add-alarm-to-event/">Add Alarm to Event</a> forum discussion topic. The <a href="http://tri.be/wordpress-events-calendar-pro/">Events Calendar PRO plugin</a> is required.
Version:      2.0.0
Text Domain:  the-events-calendar-pro-alarm
Author:       Andy Fragen
Author URI:   http://thefragens.com/2012/05/add-alarm-to-events-calendar-pro/
License:      GNU General Public License v2
License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Requires PHP: 5.3
Requires WP:  3.8
*/

load_plugin_textdomain( 'the-events-calendar-pro-alarm', false, __DIR__ . '/languages' );

function ecpalarm_load_failure() {
	global $pagenow;

	// Only show message on the plugin admin screen
	if ( 'plugins.php' !== $pagenow ) {
		return;
	}

	// @todo more work may be needed for proper l10n here
	$msg = __( 'The Events Calendar PRO Alarm could not run as it&#146;s minimum requirements were not met.', 'the-events-calendar-pro-alarm' );
	echo '<div class="error"> <p>' . $msg . '</p> </div>';
}

function ecpalarm_init() {
	global $ecpalarm;

	// Check for PHP 5.3 compatibility
	if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
		add_action( 'admin_notices', 'ecpalarm_load_failure' );
		return;
	}

	// Back compat classes
	$compatibility = array(
		'Tribe__Events__Pro__Events_Pro' => __DIR__ . '/src/Back_Compat/Events_Pro.php',
	);

	// Plugin namespace root
	$root = array(
		'Fragen\ECP_Alarm' => __DIR__ . '/src/ECP_Alarm'
	);

	// Autoloading
	require_once( __DIR__ . '/src/ECP_Alarm/Autoloader.php' );
	$class_loader = 'Fragen\ECP_Alarm\Autoloader';
	new $class_loader( $root, $compatibility );

	// Launch
	$launch_method = array( 'Fragen\ECP_Alarm\Alarm', 'instance' );
	$ecpalarm = call_user_func( $launch_method );
}

add_action( 'plugins_loaded', 'ecpalarm_init', 15 );
