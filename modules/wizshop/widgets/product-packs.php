<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Packages extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-packs';
	}

	public function get_title() {
		return __( 'Product Packages', 'wizshop-for-elementor' );
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

	protected function _register_controls() {
		$this->start_controls_section(
			'section_qty_label',
			[
				'label' => __( 'Label', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'qty_label',
			[
				'label' => __( 'Label', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your label text', 'wizshop-for-elementor' ),
				'default' => __( 'Packages', 'wizshop-for-elementor' ),
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
			'section_qty_label_style',
			[
				'label' => __( 'Label', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'qty_label_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-label',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'qty_label_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
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
				'name' => 'qty_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-label',
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
					'{{WRAPPER}} .wizshop-product-qty-label' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wizshop-product-qty-label' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_qty_input_advanced',
			[
				'label' => __( 'Input', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'qty_input_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-input',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
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
					'{{WRAPPER}} .wizshop-product-qty-input' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-qty-input',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-qty-input' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .wizshop-product-qty-input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-packs' );

		?><div class="{{dispCart}}">
            <div class="{{dispPacks}}">
                <label for="qty-<?php echo $this->get_id(); ?>" class="wizshop-product-qty-label"><?php echo $settings['qty_label']; ?></label>
                <input class="wizshop-product-qty-input" id="qty-<?php echo $this->get_id(); ?>" type="text" wiz_PacksId="{{PacksId}}" data-wiz-quant-in-pack="{{QntInPack}}" value="1"/>
            </div>
		</div><?php
	}

	protected function _wizshop_content_template() {}

}