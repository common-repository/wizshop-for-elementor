<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor;
use Elementor\Controls_Manager;
use Elementor_Wizshop\Modules\Wizshop\Module;
use Elementor_Wizshop\Modules\Wizshop\WizShop_Api;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Add_To_Cart extends Wizshop_Widget_Button_Base {

	public function get_name() {
		return 'wizshop-add-to-cart';
	}

	public function get_title() {
		return __( 'Add to Cart', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'cart', 'product', 'add' ];
	}

	protected function print_before_after() {
		return true;
	}

	protected function _register_controls() {
		$options = [
			'' => __( 'All', 'elementor' ),
		];

		$products = WizShop_Api::get_all_products();

		foreach($products as $product) {
			$options[$product['Key']] = "{$product['Name']} ({$product['Key']})";
		}

		$this->start_controls_section(
			'product',
			[
				'label' => __('Product', 'wizshop-for-elementor'),
			]
		);

		$this->add_control(
			'product_id',
			[
				'label' => __('Select Product', 'wizshop-for-elementor'),
				'type' => Controls_Manager::SELECT2,
				'options' => $options,
				'filter_type' => 'wizshop_product',
				'object_type' => $this->get_name(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_inventory',
			[
				'label' => __( 'Product Inventory', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_product_inventory',
			[
				'label' => __( 'Show Product Inventory', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_inventory_style',
			[
				'label' => __( 'Product Inventory', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_product_inventory!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inventory_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-inventory',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'inventory_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-inventory' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'inventory_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-inventory',
			]
		);

		$this->add_control(
			'inventory_margin_bottom',
			[
				'label' => __( 'Margin Bottom', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-inventory' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		//Matrix
		$this->start_controls_section(
			'section_matrix',
			[
				'label' => __( 'Matrix', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_matrix',
			[
				'label' => __( 'Show Matrix', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_matrix_1_label',
			[
				'label' => __( 'First Matrix Label', 'wizshop-for-elementor' ),
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_control(
			'matrix_1_label',
			[
				'label' => __( 'Label', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your label text', 'wizshop-for-elementor' ),
				'default' => __( 'Matrix', 'wizshop-for-elementor' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_matrix_2_label',
			[
				'label' => __( 'Second Matrix Label', 'wizshop-for-elementor' ),
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_control(
			'matrix_2_label',
			[
				'label' => __( 'Label', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your label text', 'wizshop-for-elementor' ),
				'default' => __( 'Matrix', 'wizshop-for-elementor' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_matrix_1_label_style',
			[
				'label' => __( 'First Matrix Label', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'matrix_1_label_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-label.first',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'matrix_1_label_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-matrix-label.first' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'matrix_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-label.first',
			]
		);

		$this->add_control(
			'label_indent_right',
			[
				'label' => __( 'Margin Right', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-label.first' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'label_indent_left',
			[
				'label' => __( 'Margin Left', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-label.first' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'label_indent_bottom',
			[
				'label' => __( 'Margin Bottom', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_matrix_2_label_style',
			[
				'label' => __( 'Second Matrix Label', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'matrix_2_label_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-label.second',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'matrix_2_label_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-matrix-label.second' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'matrix_2_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-label.second',
			]
		);

		$this->add_control(
			'matrix_2_label_indent_right',
			[
				'label' => __( 'Margin Right', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-label.second' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'matrix_2_label_indent_left',
			[
				'label' => __( 'Margin Left', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-label.second' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'matrix_2_label_indent_bottom',
			[
				'label' => __( 'Margin Bottom', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_matrix_1_input',
			[
				'label' => __( 'First Matrix Input', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_control(
			'matrix_1_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'matrix_1_input_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-input.first',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'matrix_1_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_control(
			'matrix_1_input_indent_bottom',
			[
				'label' => __( 'Margin Bottom', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'matrix_1_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-input.first',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'matrix_1_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'matrix_1_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.first' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_matrix_2_input',
			[
				'label' => __( 'Second Matrix Input', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_matrix!' => '',
				],
			]
		);

		$this->add_control(
			'matrix_2_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'matrix_2_input_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-input.second',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'matrix_2_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_control(
			'matrix_2_input_indent_bottom',
			[
				'label' => __( 'Margin Bottom', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'matrix_2_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-matrix-input.second',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'matrix_2_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'matrix_2_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-matrix-input.second' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		//Quantity
		$this->start_controls_section(
			'section_qty',
			[
				'label' => __( 'Quantity', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_qty',
			[
				'label'        => __( 'Show Quantity', 'wizshop-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'elementor' ),
				'label_off'    => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'qty_label',
			[
				'label'       => __( 'Label', 'wizshop-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your label text', 'wizshop-for-elementor' ),
				'default'     => __( 'Quantity', 'wizshop-for-elementor' ),
				'condition'   => [
					'show_qty!' => '',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_qty_label_style',
			[
				'label'     => __( 'Quantity Label', 'wizshop-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_qty!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'qty_label_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-label',
				'scheme'   => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'qty_label_color',
			[
				'label'     => __( 'Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-qty-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'qty_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-label',
			]
		);

		$this->add_control(
			'qty_label_indent_right',
			[
				'label'     => __( 'Margin Right', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-label' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'qty_label_indent_left',
			[
				'label'     => __( 'Margin Left', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-label' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_qty_input_advanced',
			[
				'label'     => __( 'Quantity Input', 'wizshop-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_qty!' => '',
				],
			]
		);

		$this->add_control(
			'qty_text_color',
			[
				'label'     => __( 'Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'qty_input_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-input',
				'scheme'   => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'qty_background_color',
			[
				'label'     => __( 'Background Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'background-color: {{VALUE}};',
				],
				'default'   => '#ffffff',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name'        => 'border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .wizshop-product-qty-input',
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'qty_border_color',
			[
				'label'     => __( 'Border Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'qty_border_radius',
			[
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'qty_margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'allowed_dimensions' => 'horizontal',
				'placeholder' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '5',
				],
				'default' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'qty_size',
			[
				'label' => __( 'Input Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 35,
						'max' => 150,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		//Packs
		$this->start_controls_section(
			'section_packs',
			[
				'label' => __( 'Packs', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_packs',
			[
				'label'        => __( 'Show Packs', 'wizshop-for-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'elementor' ),
				'label_off'    => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'packs_label',
			[
				'label'       => __( 'Label', 'wizshop-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your label text', 'wizshop-for-elementor' ),
				'default'     => __( 'Packs', 'wizshop-for-elementor' ),
				'condition'   => [
					'show_packs!' => '',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_packs_label_style',
			[
				'label'     => __( 'Packs Label', 'wizshop-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_packs!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'packs_label_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-packs-label',
				'scheme'   => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'packs_label_color',
			[
				'label'     => __( 'Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-packs-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'packs_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-packs-label',
			]
		);

		$this->add_control(
			'packs_label_indent_right',
			[
				'label'     => __( 'Margin Right', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-label' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'packs_label_indent_left',
			[
				'label'     => __( 'Margin Left', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-label' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_packs_input_advanced',
			[
				'label'     => __( 'Packs Input', 'wizshop-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_packs!' => '',
				],
			]
		);

		$this->add_control(
			'packs_text_color',
			[
				'label'     => __( 'Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'packs_input_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-packs-input',
				'scheme'   => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'packs_background_color',
			[
				'label'     => __( 'Background Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'background-color: {{VALUE}};',
				],
				'default'   => '#ffffff',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name'        => 'border',
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .wizshop-product-packs-input',
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'packs_border_color',
			[
				'label'     => __( 'Border Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'packs_border_radius',
			[
				'label'      => __( 'Border Radius', 'elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'packs_margin',
			[
				'label' => __( 'Margin', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'allowed_dimensions' => 'horizontal',
				'placeholder' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '5',
				],
				'default' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '5',
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'margin-right: {{RIGHT}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'packs_size',
			[
				'label' => __( 'Input Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 35,
						'max' => 150,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-packs-input' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		parent::_register_controls();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		//Inventory
		if($settings['show_product_inventory'] == 'yes') {
			?><div class="wizshop-product-inventory"><?php echo Module::maybe_preview_text( __( 'Balance', 'wizshop-for-elementor' ), '{{Balance}}' ); ?></div><?php
		}

		//Matrix
		if($settings['show_matrix'] == 'yes') {
			?><div data-wiz-matrix>
			<div class="wizshop-matrix">
				<label for="matrix-<?php echo $this->get_id(); ?>-1" class="wizshop-product-matrix-label first"><?php echo $settings['matrix_1_label']; ?></label>
				<select data-wiz-dim-1 class="wizshop-product-matrix-input first" id="matrix-<?php echo $this->get_id(); ?>-1">
					<option data-wiz-no-item><?php echo Module::maybe_preview_text(__('First Matrix Option', 'wizshop-for-elementor'), '{{mtxTitle1}}'); ?></option>
					<option data-wiz-mtx-item wiz_selection><?php echo Module::maybe_preview_text(__('Second Matrix Option', 'wizshop-for-elementor'), '{{mtxName}}'); ?></option>
				</select>
			</div>
			<div class="wizshop-matrix">
				<label for="matrix-<?php echo $this->get_id(); ?>-2" class="wizshop-product-matrix-label second"><?php echo $settings['matrix_2_label']; ?></label>
				<select data-wiz-dim-2 class="wizshop-product-matrix-input second" id="matrix-<?php echo $this->get_id(); ?>-2">
					<option data-wiz-no-item><?php echo Module::maybe_preview_text(__('First Matrix Option', 'wizshop-for-elementor'), '{{mtxTitle2}}'); ?></option>
					<option data-wiz-mtx-item wiz_selection><?php echo Module::maybe_preview_text(__('Second Matrix Option', 'wizshop-for-elementor'), '{{mtxName}}'); ?></option>
				</select>
			</div>
			</div><?php
		}
		?>
		<div class="add-to-cart-row">
			<?php if($settings['show_qty'] == 'yes') { ?>
				<div class="{{dispCart}}">
					<div class="{{dispUnits}}">
						<label for="qty-<?php echo $this->get_id(); ?>" class="wizshop-product-qty-label"><?php echo $settings['qty_label']; ?></label>
						<input class="wizshop-product-qty-input" id="qty-<?php echo $this->get_id(); ?>" type="text" wiz_QuantId="{{QuantId}}" data-wiz-packs-only="{{OnlyPacks}}" value="1"/>
					</div>
				</div>
			<?php } ?>
			<?php if($settings['show_packs'] == 'yes') { ?>
				<div class="{{dispCart}}">
					<div class="{{dispPacks}}">
						<label for="packs-<?php echo $this->get_id(); ?>" class="wizshop-product-packs-label"><?php echo $settings['packs_label']; ?></label>
						<input class="wizshop-product-packs-input" id="packs-<?php echo $this->get_id(); ?>" type="text" wiz_PacksId="{{PacksId}}" data-wiz-quant-in-pack="{{QntInPack}}" value="1"/>
					</div>
				</div>
			<?php } ?>
			<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<a <?php echo $this->get_render_attribute_string( 'button' ); ?>
					data-wiz-item-to-cart="<?php echo $settings['product_id']; ?>"
					data-wiz-packs-ctrl="{{PacksId}}"
					data-wiz-quant-ctrl="{{QuantId}}"
					data-wiz-check-quant="1"
					data-wiz-remark-ctrl="{{RemarkId}}"
					data-wiz-item-row data-wiz-item-col data-wiz-status * >
					<?php $this->render_text(); ?>
				</a>
				<a href="<?php echo esc_url(wizshop_get_cart_url()); ?>" data-wiz-view-list='<?php echo $settings['product_id']; ?>' class="v_ihide"><?php _e('הצגת רשימה', 'wizshop-for-elementor'); ?></a>
			</div><!-- data-wiz-view-list was {{urlItemKey}} -->
		</div>

		<?php
	}

	protected function _wizshop_content_template() {
		//Inventory
		?><# if ( settings.show_product_inventory ) { #>
		<div class="wizshop-product-inventory"><?php echo Module::maybe_preview_text( __( 'Balance', 'wizshop-for-elementor' ), '{{Balance}}' ); ?></div>
		<# } #><?php

		//Matrix
		?><# if ( settings.show_matrix ) { #>
		<div data-wiz-matrix>
			<div class="wizshop-matrix">
				<label for="matrix-<?php echo $this->get_id(); ?>-1" class="wizshop-product-matrix-label first">{{settings.matrix_1_label}}</label>
				<select data-wiz-dim-1 class="wizshop-product-matrix-input first" id="matrix-<?php echo $this->get_id(); ?>-1">
					<option data-wiz-no-item>First Matrix Option</option>
					<option data-wiz-mtx-item wiz_selection>Second Matrix Option</option>
				</select>
			</div>
			<div class="wizshop-matrix">
				<label for="matrix-<?php echo $this->get_id(); ?>-2" class="wizshop-product-matrix-label second">{{settings.matrix_2_label}}</label>
				<select data-wiz-dim-2 class="wizshop-product-matrix-input second" id="matrix-<?php echo $this->get_id(); ?>-2">
					<option data-wiz-no-item>First Matrix Option</option>
					<option data-wiz-mtx-item wiz_selection>Second Matrix Option</option>
				</select>
			</div>
		</div>
		<# } #><?php

		//Button
		?>
		<#
		view.addRenderAttribute( 'text', 'class', 'elementor-button-text' );
		view.addInlineEditingAttributes( 'text', 'none' );

        var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
            migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' );
		#>
		<div class="add-to-cart-row">
			<# if ( settings.show_qty ) { #>
			<div>
				<div>
					<label for="qty-<?php echo $this->get_id(); ?>" class="wizshop-product-qty-label">{{ settings.qty_label }}</label>
					<input class="wizshop-product-qty-input" id="qty-<?php echo $this->get_id(); ?>" type="text" value="1"/>
				</div>
			</div>
			<# } #>
			<# if ( settings.show_packs ) { #>
			<div>
				<div>
					<label for="packs-<?php echo $this->get_id(); ?>" class="wizshop-product-packs-label">{{ settings.packs_label }}</label>
					<input class="wizshop-product-packs-input" id="packs-<?php echo $this->get_id(); ?>" type="text" value="1"/>
				</div>
			</div>
			<# } #>
			<div class="elementor-button-wrapper">
				<a id="{{ settings.button_css_id }}" class="elementor-button elementor-size-{{ settings.size }} elementor-animation-{{ settings.hover_animation }}" href="" role="button">
                    <span class="elementor-button-content-wrapper">
                        <# if ( settings.icon || settings.selected_icon ) { #>
                        <span class="elementor-button-icon elementor-align-icon-{{ settings.icon_align }}">
                            <# if ( ( migrated || ! settings.icon ) && iconHTML.rendered ) { #>
                                {{{ iconHTML.value }}}
                            <# } else { #>
                                <i class="{{ settings.icon }}" aria-hidden="true"></i>
                            <# } #>
                        </span>
                        <# } #>
                        <span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
					</span>
				</a>
			</div>
		</div>
		<?php
	}

	protected function product_id() {
		return $this->get_settings_for_display()['product_id'];
	}

}