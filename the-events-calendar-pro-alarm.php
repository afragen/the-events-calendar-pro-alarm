<?php
/**
 * Plugin Name:       The Events Calendar PRO Alarm
 * Plugin URI:        https://github.com/afragen/events-calendar-pro-alarm/
 * Description:       This plugin adds an alarm functionality to The Events Calendar PRO plugin by using the Additional Fields feature of Events Calendar PRO. This evolved from the following <a href="https://tri.be/support/forums/topic/add-alarm-to-event/">Add Alarm to Event</a> forum discussion topic. The <a href="https://tri.be/wordpress-events-calendar-pro/">Events Calendar PRO plugin</a> is required.
 * Version:           2.3.4
 * Text Domain:       the-events-calendar-pro-alarm
 * Author:            Andy Fragen
 * Author URI:        https://thefragens.com/2012/05/add-alarm-to-events-calendar-pro/
 * License:           GNU General Public License v2
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * GitHub Plugin URI: https://github.com/afragen/the-events-calendar-pro-alarm
 * Requires PHP:      5.3
 * Requires WP:       3.8
 */

if ( version_compare( '5.3.0', PHP_VERSION, '>=' ) ) {
	?>
	<div class="error notice is-dismissible">
		<p>
			<?php printf( esc_html__( 'The Events Calendar PRO Alarm cannot run on PHP versions older than %s. Please contact your hosting provider to update your site.', 'the-events-calendar-pro-alarm' ), '5.3.0' ); ?>
		</p>
	</div>
	<?php

	return false;
}

function ecpalarm_init() {
	global $ecpalarm;

	load_plugin_textdomain( 'the-events-calendar-pro-alarm', false, __DIR__ . '/languages' );

	// Autoloading
	require_once __DIR__ . '/vendor/autoload.php';

	// Launch
	$launch_method = array( 'Fragen\\ECP_Alarm\\Alarm', 'instance' );
	$ecpalarm      = call_user_func( $launch_method );
}

add_action( 'admin_init', 'ecpalarm_init', 15 );
