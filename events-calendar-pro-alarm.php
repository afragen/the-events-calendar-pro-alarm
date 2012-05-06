<?php
/*
Plugin Name: The Events Calendar PRO Alarm Addon
Description: This plugin adds an alarm functionality to The Events Calendar PRO plugin by using the Additional Fields feature of Events Calendar PRO. This evolved from the following <a href="http://tri.be/support/forums/topic/add-alarm-to-event/">Add Alarm to Event</a> forum discussion topic. The <a href="http://tri.be/wordpress-events-calendar-pro/">Events Calendar PRO plugin</a> is required.
Version: 1.0
Text Domain: events-calendar-pro-alarm
Author: Andy Fragen & Joey Kudish (Modern Tribe, Inc.)
Author URI: http://thefragens.com/blog/2012/05/add-alarm-to-events-calendar-pro/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
/* Add your functions below this line */

add_filter( 'tribe_ical_feed_item', 'tribe_ical_add_alarm', 10, 2 );
function tribe_ical_add_alarm( $item, $eventPost ) {
	$alarm = tribe_get_custom_field( 'Alarm', $eventPost->ID );
	if ( !empty( $alarm ) && is_numeric( $alarm ) ) {
		$item[] = 'BEGIN:VALARM';
		$item[] = 'TRIGGER:-PT' . $alarm . "M";
		$item[] = 'END:VALARM';
	}
	return $item;
}

/* Add your functions above this line */
?>