<?php
namespace Elementor_Wizshop\Modules\Wizshop\Conditions;

use ElementorPro\Modules\ThemeBuilder as ThemeBuilder;
use Elementor_Wizshop\Modules\Wizshop\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wizshop extends ThemeBuilder\Conditions\Condition_Base {

	public static function get_type() {
		return 'wizshop';
	}

	public function get_name() {
		return 'wizshop';
	}

	public function get_label() {
		return __( 'Wizshop', 'wizshop-for-elementor' );
	}

	public function get_all_label() {
		return __( 'Entire Shop', 'wizshop-for-elementor' );
	}

	public function register_sub_conditions() {
		$product_archive = new Product_Archive();

		$product_single = new Product();

		$this->register_sub_condition( $product_archive );
		$this->register_sub_condition( $product_single );
	}

	public function check( $args ) {
		return Module::is_wizshop();
	}
}
