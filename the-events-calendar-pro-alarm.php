<?php
/*
Plugin Name:  The Events Calendar PRO Alarm
Plugin URI:   https://github.com/afragen/events-calendar-pro-alarm/
Description:  This plugin adds an alarm functionality to The Events Calendar PRO plugin by using the Additional Fields feature of Events Calendar PRO. This evolved from the following <a href="http://tri.be/support/forums/topic/add-alarm-to-event/">Add Alarm to Event</a> forum discussion topic. The <a href="http://tri.be/wordpress-events-calendar-pro/">Events Calendar PRO plugin</a> is required.
Version:      2.1.0
Text Domain:  the-events-calendar-pro-alarm
Author:       Andy Fragen
Author URI:   http://thefragens.com/2012/05/add-alarm-to-events-calendar-pro/
License:      GNU General Public License v2
License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Requires PHP: 5.3
Requires WP:  3.8
*/

require_once ( plugin_dir_path( __FILE__ ) . '/vendor/WPUpdatePhp.php' );
$updatePhp = new WPUpdatePhp( '5.3.0' );
$updatePhp->set_plugin_name( 'The Events Calendar PRO Alarm' );

if ( ! $updatePhp->does_it_meet_required_php_version() ) {
	return false;
}

load_plugin_textdomain( 'the-events-calendar-pro-alarm', false, __DIR__ . '/languages' );

function ecpalarm_init() {
	global $ecpalarm;

	// Back compat classes
	$compatibility = array(
		'Tribe__Events__Pro__Events_Pro' => __DIR__ . '/src/Back_Compat/Events_Pro.php',
	);

	// Plugin namespace root
	$root = array(
		'Fragen\\ECP_Alarm' => __DIR__ . '/src/ECP_Alarm'
	);

	// Autoloading
	require_once( __DIR__ . '/src/ECP_Alarm/Autoloader.php' );
	$class_loader = 'Fragen\\ECP_Alarm\\Autoloader';
	new $class_loader( $root, $compatibility );

	// Launch
	$launch_method = array( 'Fragen\\ECP_Alarm\\Alarm', 'instance' );
	$ecpalarm      = call_user_func( $launch_method );
}

add_action( 'plugins_loaded', 'ecpalarm_init', 15 );
