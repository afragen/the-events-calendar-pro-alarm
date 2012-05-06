<?php
/*
Plugin Name: The Events Calendar Pro Alarm Addon
Description: This plugin adds an alarm functionality to The Events Calendar Pro plugin by using the Additional Fields feature of Events Calendar Pro.
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