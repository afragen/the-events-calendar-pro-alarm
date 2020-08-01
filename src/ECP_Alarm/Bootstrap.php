<?php
namespace Fragen\ECP_Alarm;

class Bootstrap {
	private $dir;

	public function __construct( $dir ) {
		$this->dir = $dir;
	}

	public function run() {
		load_plugin_textdomain( 'the-events-calendar-pro-alarm', false, $this->dir . '/languages' );

		add_action(
			'plugins_loaded',
			function () {
				if ( ! class_exists( 'Tribe__Events__Pro__Main' ) ) {
					add_action( 'admin_notices', [ $this, 'fail_msg' ] );
				} else {
					( new Alarm() )->load_hooks();
				}
			}
		);
	}


	public function fail_msg() {
		?>
		<div class="error notice is-dismissible">
			<p>
				<?php
				printf(
					/* translators: 1: opening link tag to ECP 2: closing href tag */
					esc_html__( 'To begin using The Events Calendar PRO Alarm, please install the latest version of %1$sThe Events Calendar PRO%2$s', 'the-events-calendar-pro-alarm' ),
					'<a href="https://theeventscalendar.com/products/wordpress-events-calendar/">',
					'</a>'
				);
				?>
			</p>
		</div>
		<?php
	}
}
