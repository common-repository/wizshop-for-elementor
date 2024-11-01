<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor;
use Elementor_Wizshop\Modules\Wizshop\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Full_Price extends Price {
	public function get_name() {
		return 'wizshop-full-price';
	}

	public function get_title() {
		return __( 'Full Price', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'cart', 'product', 'breadcrumbs' ];
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-price' );

		?><div class="wizshop-product-price"><?php echo Module::maybe_preview_text(__('$100', 'wizshop-for-elementor'), '{{FullPrice}}'); ?></div><?php
	}
}
