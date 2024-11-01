<?php
namespace Elementor_Wizshop\Modules\Wizshop\Documents;

use Elementor\Controls_Manager;
use ElementorPro\Modules\ThemeBuilder\Documents\Single;
use Elementor_Wizshop\Modules\Wizshop\Module;
use Elementor_Wizshop\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wizshop_Product extends Single {

	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['location'] = 'single';
		$properties['condition_type'] = 'wizshop_product';

		return $properties;
	}

	public function get_name() {
		return 'wizshop-product';
	}

	public static function get_title() {
		return __( 'Wizshop Single', 'wizshop-for-elementor' );
	}

	public function get_remote_library_type() {
		return 'wizshop product';
	}

	/*public static function get_editor_panel_config() {
		$config = parent::get_editor_panel_config();
		$config['widgets_settings']['wizshop-product-content'] = [
			'show_in_panel' => true,
		];

		return $config;
	}*/

	protected static function get_editor_panel_categories() {
		$categories = [
			'wizshop-elements-single' => [
				'title' => __( 'Wizshop Product', 'wizshop-for-elementor' ),

			],
			// Move to top as active.
			'wizshop-elements' => [
				'title' => __( 'Wizshop', 'wizshop-for-elementor' ),
				'active' => true,
			],
		];

		$categories += parent::get_editor_panel_categories();

		unset( $categories['theme-elements-single'] );

		return $categories;
	}

	protected function _register_controls() {
		parent::_register_controls();

		/*$this->update_control(
			'preview_type',
			[
				'type' => Controls_Manager::HIDDEN,
				'default' => 'single/wizshop-product',
			]
		);*/
	}

	/*public function get_depended_widget() {
		return Plugin::elementor()->widgets_manager->get_widget_types( 'wizshop-product-data-tabs' );
	}*/

	public function get_container_classes() {
		$classes = parent::get_container_classes();

		$classes .= ' wizshop-product';

		return $classes;
	}

	/*public function filter_body_classes( $body_classes ) {
		$body_classes = parent::filter_body_classes( $body_classes );

		if ( get_the_ID() === $this->get_main_id() || Plugin::elementor()->preview->is_preview_mode( $this->get_main_id() ) ) {
			$body_classes[] = 'wizshop';
		}

		return $body_classes;
	}*/

	public function print_content() {
		if ( post_password_required() ) {
			echo get_the_password_form(); // WPCS: XSS ok.
			return;
		}

		Module::get_template_part('wizshop-single-before-product');

		parent::print_content();

		Module::get_template_part('wizshop-single-after-product');
	}

	public function __construct( array $data = [] ) {
		parent::__construct( $data );
	}
}
