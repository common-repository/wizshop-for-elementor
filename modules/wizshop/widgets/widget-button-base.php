<?php


namespace Elementor_Wizshop\Modules\Wizshop\Widgets;
use Elementor_Wizshop\Modules\Wizshop\Module as Module;

class Wizshop_Widget_Button_Base extends \Elementor\Widget_Button {

	public function get_default_value($key) {
		$defaults = [
			'add_to_cart' => __( 'Add to Cart', 'wizshop-for-elementor' ),
		];

		return $defaults[$key];
	}

	protected function _register_controls() {
		parent::_register_controls();
		$this->remove_control('link');

		$this->update_control(
			'text',
			[
				'default' => $this->get_default_value('add_to_cart'),
				'placeholder' => $this->get_default_value('add_to_cart'),
			]
		);
	}

	protected function product_id() {
		return null;
	}

	protected function print_before_after() {
		return true;
	}

	protected function wizshop_render() {
	}

	protected function _wizshop_content_template() {
	}

	protected function wizshop_add_button_render_attributes() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );
		$this->add_render_attribute( 'button', 'href', 'javascript:void(0);' );
		$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );

		$this->add_render_attribute( 'button', 'class', 'elementor-button' );
		$this->add_render_attribute( 'button', 'role', 'button' );

		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}
	}

	protected function render() {
		$template_vars = [];
		if($this->product_id() != null) {
			$template_vars['product_id'] = $this->product_id();
		}

		if($this->print_before_after()) {
			Module::get_template_part('wizshop-before-element', $template_vars );
		}

		$this->wizshop_add_button_render_attributes();
		$this->wizshop_render();

		if($this->print_before_after()) {
			Module::get_template_part( 'wizshop-after-element', $template_vars );
		}
	}

	protected function _content_template() {
		$this->_wizshop_content_template();
	}
}