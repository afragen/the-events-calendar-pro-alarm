<?php

class TECPro_Alarm {

	public function __construct() {
		add_action( 'admin_notices', array($this, 'tecpa_fail_msg' ));
		add_action( 'init', array($this, 'tecpa_add_Alarm' ));
	}
	
	public function tecpa_fail_msg() {
		if ( !class_exists( 'TribeEventsPro' ) ) {
			if ( current_user_can( 'activate_plugins' ) && is_admin() ) {
				$url = 'http://tri.be/wordpress-events-calendar-pro/?utm_source=helptab&utm_medium=promolink&utm_campaign=plugin';
				$title = __( 'The Events Calendar', 'the-events-calendar-pro-alarm' );
				echo '<div class="error"><p>'.sprintf( __( 'To begin using The Events Calendar PRO Alarm, please install the latest version of <a href="%s" class="thickbox" title="%s">The Events Calendar PRO</a>.', 'tribe-events-calendar-pro' ),$url, $title ).'</p></div>';
			}
		}
	}

	public function tecpa_add_Alarm() {
		$intervals = array( '15', '30', '60' );
		if ( class_exists( 'TribeEventsPro' ) && version_compare( TribeEventsPro::VERSION, '2.0.9', '<' ) )
			$intervals = array( 'Off', '15', '30', '60' );
		$intervals = implode( "\r\n", $intervals );
		$this->addCustomField('Alarm', 'dropdown', $intervals);
	}

	public function addCustomField($label, $type = 'text', $default = '') {
		if ( class_exists( 'TribeEvents' ) ) {
			$customFields = tribe_get_option('custom-fields');
			$fieldExists = false;

			// Check in case the "new" custom field is already present
			foreach ($customFields as $field) {
				if ($field['label'] === $label)
					$fieldExists = true;
			}

			// If it is not, add it
			if ($fieldExists === false) {
				$index = count($customFields) + 1;

				$customFields[] = array(
					'name'   => "_ecp_custom_$index",
					'label'  => $label,
					'type'   => $type,
					'values' => $default
				);

				tribe_update_option('custom-fields', $customFields);
			}
		}
	}

}
