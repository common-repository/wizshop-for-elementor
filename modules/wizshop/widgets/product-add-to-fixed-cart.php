<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Add_To_Fixed_Cart extends Product_Add_To_Cart {
	public function get_name() {
		return 'wizshop-product-add-to-cart-fixed';
	}

	public function get_title() {
		return __( 'Add to Fixed Cart', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'cart', 'product', 'quantity' ];
	}

	public function get_default_value($key) {
		$defaults = [
			'add_to_cart' => __( 'Add to Fixed Cart', 'wizshop-for-elementor' ),
		];

		return $defaults[$key];
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-add-to-fixed-cart' );

		?><div wiz_login>
        <a class="wizshop-product-add-to-cart elementor-button" style="display: inline-block;" href="javascript:void(0);"
           data-wiz-list-action-item='{{urlItemKey}}'
           data-wiz-type='FX'
           data-wiz-item-row data-wiz-item-col
           data-wiz-action='2'
           data-wiz-status="|itemtocartstatus|2"><?php echo $settings['add_to_cart']; ?></a>
        <a href="<?php echo esc_url(wizshop_get_permanent_cart_url()); ?>" data-wiz-type='FX' data-wiz-view-list='{{urlItemKey}}'  class="v_ihide"><?php _e('הצגת רשימה', 'wizshop-for-elementor'); ?></a>
        </div><?php
	}
}