<?php
namespace Elementor_Wizshop\Modules\Wizshop\Conditions;

use ElementorPro\Modules\ThemeBuilder as ThemeBuilder;
use Elementor_Wizshop\Modules\Wizshop\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Archive extends ThemeBuilder\Conditions\Condition_Base {
	public function __construct( array $data = [] ) {
		parent::__construct( $data );
	}

	public static function get_type() {
		return 'archive';
	}

	public function get_name() {
		return 'wizshop_archive';
	}

	public static function get_priority() {
		return 40;
	}

	public function get_label() {
		return __( 'Wizshop Archive', 'wizshop-for-elementor' );
	}

	public function get_all_label() {
		return __( 'All Wizshop Archives', 'wizshop-for-elementor' );
	}

	public function register_sub_conditions() {
		//$this->register_sub_condition( new Shop_page() );
		//$this->register_sub_condition( new Product_Search() );
	}

	public function check( $args ) {
		return Module::is_wizshop_archive();
	}
}
