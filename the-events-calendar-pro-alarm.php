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

//Load Autoloader Class
require_once( __DIR__ . '/classes/Autoloader.php' );

load_plugin_textdomain( 'the-events-calendar-pro-alarm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

new Tribe__Events__Pro__Alarm();
