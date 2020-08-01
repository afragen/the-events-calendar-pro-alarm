<?php

namespace Fragen\ECP_Alarm;

use Tribe__Events__Pro__Custom_Meta;

class Alarm {

	public function load_hooks() {
		add_action( 'init', [ $this, 'add_alarm' ] );
		add_filter( 'tribe_ical_feed_item', [ $this, 'ical_add_alarm' ], 10, 2 );
	}

	public function add_alarm() {
		$intervals = [ '15', '30', '60' ];
		$intervals = implode( "\r\n", $intervals );
		$this->add_custom_field( 'Alarm', 'dropdown', $intervals );
	}

	protected function add_custom_field( $label, $type = 'text', $default = '' ) {
		$custom_fields = tribe_get_option( 'custom-fields', [] );
		$field_exists  = false;

		// Check in case the "new" custom field is already present
		foreach ( $custom_fields as $field ) {
			if ( $field['label'] === $label ) {
				$field_exists = true;
				break;
			}
		}

		// If it is not, add it
		if ( false === $field_exists ) {
			$index = count( $custom_fields ) + 1;

			$custom_fields[] = [
				'name'   => "_ecp_custom_$index",
				'label'  => $label,
				'type'   => $type,
				'values' => $default,
			];

			tribe_update_option( 'custom-fields', $custom_fields );
		}
	}

	public function ical_add_alarm( $item, $eventPost ) {
		$alarm = Tribe__Events__Pro__Custom_Meta::get_custom_field_by_label( 'Alarm', $eventPost->ID );
		if ( ! empty( $alarm ) && is_numeric( $alarm ) ) {
			$item[] = 'BEGIN:VALARM';
			$item[] = 'TRIGGER:-PT' . $alarm . 'M';
			$item[] = 'END:VALARM';
		}

		return $item;
	}
}
