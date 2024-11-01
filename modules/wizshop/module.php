<?php
namespace Elementor_Wizshop\Modules\Wizshop;

use Elementor\Core\Documents_Manager;
use ElementorPro\Base\Module_Base;
use ElementorPro\Modules\ThemeBuilder\Classes\Conditions_Manager;
use Elementor_Wizshop\Modules\Wizshop\Conditions\Wizshop;
use Elementor_Wizshop\Modules\Wizshop\Documents\Wizshop_Product;
use Elementor_Wizshop\Modules\Wizshop\Documents\Product_Archive;
use Elementor_Wizshop\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Module {

	const WIZSHOP_GROUP = 'wizshop';

	protected $docs_types = [];

	/**
	 * Instance
	 *
	 * @since 0.0.1
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;



	public function get_name() {
		return 'wizshop';
	}

	public function get_widgets() {
		return [
			'Add_To_Cart1',
		];
	}

	/*public function register_tags() {
		$tags = [
			'Add_To_Cart1',
		];

		/** @var \Elementor\Core\DynamicTags\Manager $module */
		/*$module = Plugin::elementor()->dynamic_tags;

		$module->register_group( self::WIZSHOP_GROUP, [
			'title' => __( 'Wizshop', 'wizshop-for-elementor' ),
		] );

		foreach ( $tags as $tag ) {
			$module->register_tag( 'Elementor_Wizshop\\Modules\\Wizshop\\tags\\' . $tag );
		}* /
	}*/

	/**
	 * @param Documents_Manager $documents_manager
	 */
	public function register_documents( $documents_manager ) {
		$this->docs_types = [
			'wizshop-product' => Wizshop_Product::get_class_full_name(),
			'wizshop-archive' => Product_Archive::get_class_full_name(),
		];

		foreach ( $this->docs_types as $type => $class_name ) {
			$documents_manager->register_document_type( $type, $class_name );
		}
	}

	/**
	 * @param Conditions_Manager $conditions_manager
	 */
	public function register_conditions( $conditions_manager ) {
		$wizshop_condition = new Wizshop();

		$conditions_manager->get_condition( 'general' )->register_sub_condition( $wizshop_condition );
		//var_dump(get_class_methods($conditions_manager->get_condition( 'general' )));
	}

	public function theme_template_include( $need_override_location, $location ) {
		if ( true ) {
			$need_override_location = true;
		}

		return $need_override_location;
	}

	public function __construct() {
		//add_action( 'elementor/dynamic_tags/register_tags', [ $this, 'register_tags' ] );
		add_action( 'elementor/documents/register', [ $this, 'register_documents' ] );
		add_action( 'elementor/theme/register_conditions', [ $this, 'register_conditions' ] );

		add_filter( 'elementor/theme/need_override_location', [ $this, 'theme_template_include' ], 10, 2 );
	}

	public static function is_wizshop() {
		return (wizshop_product_archive_type() !== false || wizshop_is_cat_tax() !== false);
	}

	public static function is_wizshop_product() {
		global $wp_query;
		return ( false !== wizshop_is_product_posttype($wp_query->query["post_type"]) ) ? true : false;
	}

	public static function is_wizshop_archive() {
		return (wizshop_is_cat_tax() !== false) ? true : false;
	}

	public static function get_template_part($name, $templateGlobal = []) {
		global $template_global;
		$template_global = $templateGlobal;

		if (locate_template( array( $name . '.php' ) ) != '') {
			// yep, load the page template
			get_template_part($name);
		} else {
			// nope, load the content
			include( __DIR__ . '/templates/' . $name . '.php' );
		}
	}

	public static function get_image_placeholder() {
		return plugins_url('/elementor/assets/images/placeholder.png');
	}

	public static function maybe_preview_text($text, $template) {
		return Plugin::is_elementor_editor() ? $text : $template;
	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 0.0.1
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
