<?php
namespace Elementor_Wizshop\Modules\Wizshop\Documents;

use ElementorPro\Modules\ThemeBuilder\Documents\Archive;
use Elementor_Wizshop\Modules\Wizshop\Module;
use Elementor_Wizshop\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Archive extends Archive {

	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['location'] = 'archive';
		$properties['condition_type'] = 'wizshop_archive';

		return $properties;
	}

	public function get_name() {
		return 'wizshop-archive';
	}

	public static function get_title() {
		return __( 'Wizshop Archive', 'wizshop-for-elementor' );
	}

	public function get_remote_library_type() {
		return 'wizshop product archive';
	}

	protected static function get_editor_panel_categories() {
		$categories = [
			'wizshop-elements-archive' => [
				'title' => __( 'Wizshop Product Archive', 'wizshop-for-elementor' ),
			],
			// Move to top as active.
			'wizshop-elements' => [
				'title' => __( 'Wizshop', 'wizshop-for-elementor' ),
				'active' => true,
			],
		];

		$categories += parent::get_editor_panel_categories();

		unset( $categories['theme-elements-archive'] );

		return $categories;
	}

	protected function _register_controls() {
		parent::_register_controls();

		/*$this->update_control(
			'preview_type',
			[
				'default' => 'post_type_archive/product',
			]
		);*/
	}

	public function enqueue_scripts() {
		// In preview mode it's not a real Woocommerce page - enqueue manually.
		//if ( Plugin::elementor()->preview->is_preview_mode( $this->get_main_id() ) ) {
			//wp_enqueue_script( 'woocommerce' );
		//}
	}

	public function get_container_classes() {
		$classes = parent::get_container_classes();

		$classes .= ' wizshop-archive';

		return $classes;
	}

	public function print_content() {
		if ( post_password_required() ) {
			echo get_the_password_form(); // WPCS: XSS ok.
			return;
		}


		parent::print_content();
	}

	public function __construct( array $data = [] ) {
		parent::__construct( $data );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 11 );
	}
}
