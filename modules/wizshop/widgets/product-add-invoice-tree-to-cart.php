<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Add_Invoice_Tree_To_Cart extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-add-invoice-tree-to-cart';
	}

	public function get_title() {
		return __( 'Add Invoice Tree to Cart', 'wizshop-for-elementor' );
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
			'add_to_cart' => __( 'Add Invoice Tree to Cart', 'wizshop-for-elementor' ),
		];

		return $defaults[$key];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_atc',
			[
				'label' => $this->get_default_value('add_to_cart'),
			]
		);

		$this->add_control(
			'add_to_cart',
			[
				'label' => __( 'Text', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your text', 'wizshop-for-elementor' ),
				'default' => $this->get_default_value('add_to_cart'),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_atc_style',
			[
				'label' => __( 'Button', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'atc_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'atc_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart' => 'color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'atc_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart' => 'background-color: {{VALUE}};',
				],
				'default' => '#61ce70',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => ['unit' => 'px', 'top' => 3, 'right' => 3, 'bottom' => 3, 'left' => 3],
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-add-invoice-tree-to-cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'default' => ['unit' => 'px', 'top' => '12', 'right' => 24, 'bottom' => 12, 'left' => 24],
			]
		);

		$this->end_controls_section();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-add-invoice-tree-to-cart' );

		?><div class=""><!-- {{dispNoCart}} -->
			<a class="wizshop-product-add-invoice-tree-to-cart elementor-button" style="display: inline-block;" href="javascript:void(0);" data-wiz-hesh-items-to-cart><?php echo $settings['add_to_cart']; ?></a>
			<a href="<?php echo esc_url(wizshop_get_cart_url()); ?>" data-wiz-view-list data-wiz-type='hesh-LIST' class="v_ihide"><?php _e('הצגת רשימה', 'wizshop-for-elementor'); ?></a>
		</div><?php
	}

	protected function _wizshop_content_template() {}

}