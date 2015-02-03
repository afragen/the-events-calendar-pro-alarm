<?php
namespace Fragen\ECP_Alarm;

class Alarm {

	protected static $object = false;

	/**
	 * The Main object can be created/obtained via this
	 * method - this prevents unnecessary work in rebuilding the object and
	 * querying to construct a list of categories, etc.
	 *
	 * @return Alarm
	 */
	public static function instance() {
		$class = __CLASS__;
		if ( false === self::$object ) {
			self::$object = new $class();
		}

		return self::$object;
	}

	public function __construct() {
		add_action( 'admin_notices', array( $this, 'fail_msg' ) );
		add_action( 'init', array( $this, 'add_Alarm' ) );
		add_filter( 'tribe_ical_feed_item', array( $this, 'ical_add_alarm' ), 10, 2 );
	}

	public function fail_msg() {
		if ( ! class_exists( 'Tribe__Events__Pro__Events_Pro' ) ) {
			if ( current_user_can( 'activate_plugins' ) && is_admin() ) {
				$url   = 'http://tri.be/wordpress-events-calendar-pro/?utm_source=helptab&utm_medium=promolink&utm_campaign=plugin';
				$title = __( 'The Events Calendar', 'the-events-calendar-pro-alarm' );
				echo '<div class="error"><p>' . sprintf( __( 'To begin using The Events Calendar PRO Alarm, please install the latest version of <a href="%s" class="thickbox" title="%s">The Events Calendar PRO</a>.', 'the-events-calendar-pro-alarm' ), $url, $title ) . '</p></div>';
			}
		}
	}

	public function add_Alarm() {
		$intervals = array( '15', '30', '60' );
		$intervals = implode( "\r\n", $intervals );
		$this->add_custom_field( 'Alarm', 'dropdown', $intervals );
	}

	public function add_custom_field( $label, $type = 'text', $default = '' ) {
		if ( class_exists( 'Tribe__Events__Pro__Events_Pro' ) ) {
			$custom_fields = tribe_get_option( 'custom-fields' );
			$field_exists  = false;

			// Check in case the "new" custom field is already present
			foreach ( $custom_fields as $field ) {
				if ( $field['label'] === $label ) {
					$field_exists = true;
				}
			}

			// If it is not, add it
			if ( false === $field_exists ) {
				$index = count( $custom_fields ) + 1;

				$custom_fields[] = array(
					'name'   => "_ecp_custom_$index",
					'label'  => $label,
					'type'   => $type,
					'values' => $default
				);

				tribe_update_option( 'custom-fields', $custom_fields );
			}
		}
	}

	public static function ical_add_alarm( $item, $eventPost ) {
		$alarm = tribe_get_custom_field( 'Alarm', $eventPost->ID );
		if ( ! empty( $alarm ) && is_numeric( $alarm ) ) {
			$item[] = 'BEGIN:VALARM';
			$item[] = 'TRIGGER:-PT' . $alarm . "M";
			$item[] = 'END:VALARM';
		}

		return $item;
	}

}
