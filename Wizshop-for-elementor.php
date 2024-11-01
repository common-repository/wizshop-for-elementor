<?php
/**
Plugin Name: Wizshop for Elementor
Plugin URI:
Description:
Version: 1.0.1
Stable tag: 1.0.1
Author: WizSoft, Inc
Author URI: https://www.hash.co.il/
Text Domain: elementor-wizshop
Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('WIZSHOP_FOR_ELEMENTOR_VERSION', '1.0.1');
/**
 * Main Elementor Wizshop Class
 *
 * The init class that runs the Elementor Wizshop plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 0.0.1
 */
final class Elementor_Wizshop {
	/**
	 * Plugin Version
	 *
	 * @since 0.0.1
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.1';
	/**
	 * Minimum Elementor Version
	 *
	 * @since 0.0.1
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	/**
	 * Minimum PHP Version
	 *
	 * @since 0.0.1
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';
	/**
	 * Constructor
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function __construct() {
		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );
		// Add Product Descriptions Post Type
		add_action( 'init', array( $this, 'wizshop_product_descriptions' ), 0 );
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
		// Add Admin Menu Links
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}
	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'wizshop-for-elementor' );
	}
	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
	}
	/**
	 * Add Admin Menu Links
	 *
	 * Fired by `admin_menu` action hook.
	 *
	 * @since 0.1.4
	 * @access public
	 */
	public function admin_menu() {
		add_submenu_page('edit.php?post_type=' . wizshopShopPostType, __('Product Descriptions', 'wizshop-for-elementor'), __('Product Descriptions', 'wizshop-for-elementor') ,'manage_options','edit.php?post_type=wizshop-product-desc');
	}
	/**
	 * Add Product Descriptions Post Type
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 0.1.4
	 * @access public
	 */
	public function wizshop_product_descriptions() {
		$labels = array(
			'name'                  => _x( 'Product Descriptions', 'Post Type General Name', 'wizshop-for-elementor' ),
			'singular_name'         => _x( 'Product Description', 'Post Type Singular Name', 'wizshop-for-elementor' ),
			'menu_name'             => __( 'Product Descriptions', 'wizshop-for-elementor' ),
			'name_admin_bar'        => __( 'Product Description', 'wizshop-for-elementor' ),
			'archives'              => __( 'Item Archives', 'wizshop-for-elementor' ),
			'attributes'            => __( 'Item Attributes', 'wizshop-for-elementor' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wizshop-for-elementor' ),
			'all_items'             => __( 'All Items', 'wizshop-for-elementor' ),
			'add_new_item'          => __( 'Add New Item', 'wizshop-for-elementor' ),
			'add_new'               => __( 'Add New', 'wizshop-for-elementor' ),
			'new_item'              => __( 'New Item', 'wizshop-for-elementor' ),
			'edit_item'             => __( 'Edit Item', 'wizshop-for-elementor' ),
			'update_item'           => __( 'Update Item', 'wizshop-for-elementor' ),
			'view_item'             => __( 'View Item', 'wizshop-for-elementor' ),
			'view_items'            => __( 'View Items', 'wizshop-for-elementor' ),
			'search_items'          => __( 'Search Item', 'wizshop-for-elementor' ),
			'not_found'             => __( 'Not found', 'wizshop-for-elementor' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wizshop-for-elementor' ),
			'featured_image'        => __( 'Featured Image', 'wizshop-for-elementor' ),
			'set_featured_image'    => __( 'Set featured image', 'wizshop-for-elementor' ),
			'remove_featured_image' => __( 'Remove featured image', 'wizshop-for-elementor' ),
			'use_featured_image'    => __( 'Use as featured image', 'wizshop-for-elementor' ),
			'insert_into_item'      => __( 'Insert into item', 'wizshop-for-elementor' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wizshop-for-elementor' ),
			'items_list'            => __( 'Items list', 'wizshop-for-elementor' ),
			'items_list_navigation' => __( 'Items list navigation', 'wizshop-for-elementor' ),
			'filter_items_list'     => __( 'Filter items list', 'wizshop-for-elementor' ),
		);
		$args = array(
			'label'                 => __( 'Product Description', 'wizshop-for-elementor' ),
			'description'           => __( 'Wizshop Product Descriptions', 'wizshop-for-elementor' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'elementor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => false,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-info',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'wizshop-product-desc', $args );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wizshop-for-elementor' ),
			'<strong>' . esc_html__( 'Elementor Wizshop', 'wizshop-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wizshop-for-elementor' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wizshop-for-elementor' ),
			'<strong>' . esc_html__( 'Elementor Wizshop', 'wizshop-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wizshop-for-elementor' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 0.0.1
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wizshop-for-elementor' ),
			'<strong>' . esc_html__( 'Elementor Wizshop', 'wizshop-for-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'wizshop-for-elementor' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}
// Instantiate Elementor_Wizshop.
new Elementor_Wizshop();
