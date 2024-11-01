<?php
namespace Elementor_Wizshop;
use Elementor\Widget_Base;
use ElementorPro\Manager;
use Elementor_Wizshop\Modules\Wizshop;
use Elementor_Wizshop\Modules\Wizshop\Widgets;
use Elementor;
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 0.0.1
 */
class Plugin {
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

	/**
	 * Include Documents files
	 *
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private function include_documents_files() {
		require_once( __DIR__ . '/modules/wizshop/documents/wizshop-product.php' );
		require_once( __DIR__ . '/modules/wizshop/documents/wizshop-archive.php' );
	}

	/**
	 * Include Widgets files
	 *
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/modules/wizshop/widgets/widget-base.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/widget-button-base.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-name.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-sku.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-inventory.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/price.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/full-price.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-image.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-small-images.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-qty.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-packs.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-matrix.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-note.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-add-to-cart.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-properties.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-description.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-add-to-wishlist.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-add-to-fixed-cart.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-add-invoice-tree-to-cart.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-invoice-tree.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-related-products.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-parent-kits.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/product-items-in-kit.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/test-widget.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/add-to-cart.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/mini-cart.php' );
		require_once( __DIR__ . '/modules/wizshop/widgets/grid.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor Modules.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function register_widgets() {
		// It is now safe to include Widgets files
		$this->include_widgets_files();
		// Register Widgets
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Name() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Sku() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Inventory() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Price() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Full_Price() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Image() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Small_Images() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Qty() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Packages() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Matrix() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Note() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Add_To_Cart() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Properties() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Description() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Add_To_Wishlist() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Add_To_Fixed_Cart() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Add_Invoice_Tree_To_Cart() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Invoice_Tree() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Related_Products() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Parent_Kits() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Items_In_Kit() );

		//Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Test_widget() );
		//Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Add_To_Cart() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Mini_Cart() );
		Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Grid() );

		//Add new widgets category in Elementor editor
		Elementor\Plugin::instance()->elements_manager->add_category(
			'wizshop-elements',
			[
				'title' => __( 'Wizshop', 'wizshop-for-elementor' ),
				'icon' => 'fa fa-plug'
			],
			1
		);
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function widget_scripts() {
		//wp_register_script( 'wizshop-for-elementor', plugins_url( '/assets/js/elementor-wizshop.js', __FILE__ ), [ 'jquery' ], false, true );
	}



	/**
	 * Include Controls files
	 *
	 *
	 * @since 0.2.0
	 * @access private
	 */
	private function include_controls_files() {
		require_once( __DIR__ . '/modules/wizshop/controls/free-html.php' );
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 0.2.0
	 * @access public
	 */
	public function register_controls() {
		$this->include_controls_files();
		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'free_html', new Control_Free_Html() );
	}

	/**
	 * Include Modules files
	 *
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private function include_modules_files() {
		require_once( __DIR__ . '/modules/wizshop/module.php' );
	}

	/**
	 * Register Modules
	 *
	 * Register new Elementor Modules.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function register_modules() {
		$this->include_documents_files();
		$this->include_conditions_files();
		$this->include_modules_files();
		Modules\Wizshop\Module::instance();
	}

	public function on_elementor_init() {
		require_once ( __DIR__ . '/modules/wizshop/WizShop_Api.php');
		$this->register_modules();
		/**
		 * Elementor for Wizshop init.
		 *
		 * Fires on Elementor for Wizshop init, after Elementor has finished loading but
		 * before any headers are sent.
		 *
		 * @since 0.0.1
		 */
		do_action( 'elementor_wizshop/init' );
	}

	public function on_elementor_editor_init() {}

	/**
	 * Include Conditions files
	 *
	 *
	 * @since 0.0.1
	 * @access private
	 */
	private function include_conditions_files() {
		require_once( __DIR__ . '/modules/wizshop/conditions/single-product-filter-by-category.php' );
		require_once( __DIR__ . '/modules/wizshop/conditions/single-product-filter-by-specific-product.php' );
		require_once( __DIR__ . '/modules/wizshop/conditions/single-product.php' );
		require_once( __DIR__ . '/modules/wizshop/conditions/product-archive.php' );
		require_once( __DIR__ . '/modules/wizshop/conditions/wizshop.php' );
	}

	public function enqueue_scripts() {
		if($this->is_elementor_editor()) {
			//wiz-load script is not necessary and can interrupt when on editing mode
			wp_deregister_script('wiz-load');
		}
		wp_enqueue_style('wizshop-for-elementor', plugins_url('/modules/wizshop/assets/css/elements.css', __FILE__ ));
		wp_enqueue_script('wizshop-for-elementor', plugins_url('/modules/wizshop/assets/js/elements.js', __FILE__ ), ['jquery']);
	}

	public function enqueue_editor_scripts() {
		wp_enqueue_style('elementor-wizshop-editor', plugins_url('/modules/wizshop/assets/css/editor.css', __FILE__ ));
	}

	private function setup_hooks() {
		add_action( 'elementor/init', [ $this, 'on_elementor_init' ] );
		add_action( 'elementor/editor/init', [ $this, 'on_elementor_editor_init' ] );
		// Register controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		add_action( 'elementor/editor/before_enqueue_scripts', [$this, 'enqueue_editor_scripts'] );
	}

	/**
	 * @return \Elementor\Plugin
	 */
	public static function elementor() {
		return \Elementor\Plugin::$instance;
	}

	/**
	 * @return true if Elementor is on editing/preview mode
	 */
	public static function is_elementor_editor() {
		return (self::elementor()->editor->is_edit_mode() || self::elementor()->preview->is_preview_mode());
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function __construct() {
		// Register widget scripts
		//add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		$this->setup_hooks();
	}
}
// Instantiate Plugin Class
Plugin::instance();