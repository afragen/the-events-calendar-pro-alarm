<?php
/**
 * Plugin Name:       The Events Calendar PRO Alarm
 * Plugin URI:        https://github.com/afragen/events-calendar-pro-alarm/
 * Description:       This plugin adds an alarm functionality to The Events Calendar PRO plugin by using the Additional Fields feature of Events Calendar PRO. This evolved from the following <a href="https://tri.be/support/forums/topic/add-alarm-to-event/">Add Alarm to Event</a> forum discussion topic. The <a href="https://theeventscalendar.com/products/wordpress-events-calendar/">Events Calendar PRO plugin</a> is required.
 * Version:           3.1.0
 * Text Domain:       the-events-calendar-pro-alarm
 * Author:            Andy Fragen
 * Author URI:        https://thefragens.com/2012/05/add-alarm-to-events-calendar-pro/
 * License:           GNU General Public License v2
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * GitHub Plugin URI: https://github.com/afragen/the-events-calendar-pro-alarm
 * Requires PHP:      7.0
 * Requires WP:       5.2
 */

namespace Fragen\ECP_Alarm;

/*
 * Exit if called directly.
 * PHP version check and exit.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Autoloading
require_once __DIR__ . '/vendor/autoload.php';

( new Bootstrap( __DIR__ ) )->run();
