<?php
namespace Elementor_Wizshop;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor free html control.
 *
 * A base control for printing any html code.
 *
 * @since 0.2.0
 */
class Control_Free_Html extends \Elementor\Base_UI_Control {

	/**
	 * Get control type.
	 *
	 * Retrieve the control type
	 *
	 * @since 0.2.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'free_html';
	}

	/**
	 * Get control default settings.
	 *
	 * Retrieve the default settings of the control. Used to return the
	 * default settings while initializing the control.
	 *
	 * @since 0.2.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'html' => '',
		];
	}

	/**
	 * Render control output in the editor
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function content_template() {
		?>
		<div class="elementor-control-field">
			{{{ data.html }}}
		</div>
		<?php
	}
}
