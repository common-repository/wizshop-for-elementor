<?php
namespace Elementor_Wizshop\Modules\Wizshop\Conditions;

use Elementor_Wizshop\Modules\Wizshop\WizShop_Api;
use ElementorPro\Modules\ThemeBuilder as ThemeBuilder;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Filter_By_Specific_Product extends ThemeBuilder\Conditions\Condition_Base {
	public function __construct( array $data = [] ) {
		parent::__construct( $data );
	}

	public static function get_type() {
		return 'singular';
	}

	public function get_name() {
		return 'wizshop_product_filter_by_specific_product';
	}

	public static function get_priority() {
		return 40;
	}

	public function get_label() {
		return __( 'Specific Product', 'wizshop-for-elementor' );
	}

	public function get_all_label() {
		return __( 'All Wizshop Products', 'wizshop-for-elementor' );
	}

	public function register_sub_conditions() {
		//$this->register_sub_condition( new Shop_page() );
	}

	public function check( $args ) {
		return $args['id'] === WizShop_Api::current_product_id();
	}

	protected function _register_controls() {
		$options = [
			'' => __( 'All', 'elementor' ),
		];

		$products = WizShop_Api::get_all_products();

		foreach($products as $product) {
			$options[$product['Key']] = "{$product['Name']} ({$product['Key']})";
		}

		$this->add_control(
			'product_id',
			[
				'section' => 'settings',
				'type' => Controls_Manager::SELECT2,
				'options' => $options,
				'filter_type' => 'wizshop_product',
				'object_type' => $this->get_name(),
			]
		);
	}
}
