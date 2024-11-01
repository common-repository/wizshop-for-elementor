<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor_Wizshop\Modules\Wizshop\Module as Module;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Scheme_Color;
use Elementor;
use Elementor_Wizshop\Modules\Wizshop\WizShop_Api;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

abstract class Wizshop_Widget_Base extends Widget_Base {

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	protected function wizshop_render() {
	}

	protected function _wizshop_content_template() {
	}

	protected function print_before_after() {
		return true;
	}

	protected function render() {
		if($this->print_before_after()) {
			Module::get_template_part('wizshop-before-element');
		}

		$this->wizshop_render();

		if($this->print_before_after()) {
			Module::get_template_part( 'wizshop-after-element' );
		}
	}

	protected function _content_template() {
		$this->_wizshop_content_template();
	}

}
