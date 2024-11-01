<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor_Wizshop\Modules\Wizshop\Module as Module;
use Elementor_Wizshop\Plugin as Plugin;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Properties extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-properties';
	}

	public function get_title() {
		return __( 'Product Properties', 'wizshop-for-elementor' );
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

	protected function _register_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Content', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'content_type',
			[
				'label' => __( 'Type', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top'  => __( 'Top', 'wizshop-for-elementor' ),
					'tab' => __( 'Tab', 'wizshop-for-elementor' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cell_padding',
			[
				'label' => __( 'Title Padding', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'cell_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-title, {{WRAPPER}} .wizshop-product-properties .property-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_border',
			[
				'label' => __( 'Table Border', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'table_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-properties',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_cell_border',
			[
				'label' => __( 'Table Row Border', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'table_cell_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-product-properties .property-item:not(:last-child)',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_head_style',
			[
				'label' => __( 'Titles', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'table_head_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-properties .property-item .property-title',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'table_head_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-item .property-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'table_head_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-properties .property-item .property-title',
			]
		);

		$this->add_control(
			'table_head_background_color1',
			[
				'label' => __( 'Background Color 1', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-item:nth-child(even) .property-title' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_control(
			'table_head_background_color2',
			[
				'label' => __( 'Background Color 2', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-item:nth-child(odd) .property-title' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_body_style',
			[
				'label' => __( 'Table Content', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'table_body_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-properties .property-item .property-content',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'table_body_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-properties .property-item .property-content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wizshop-product-properties .property-item .property-content *' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'table_body_text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-properties .property-item .property-content',
			]
		);

		$this->add_control(
			'table_body_background_color_even',
			[
				'label' => __( 'Background Color 1', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-item:nth-child(even) .property-content' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_control(
			'table_body_background_color_odd',
			[
				'label' => __( 'Background Color 2', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-product-properties .property-item:nth-child(odd) .property-content' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->end_controls_section();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		if(Plugin::is_elementor_editor()) {
			$this->_content_template();
			return;
		}

		?><div class="wizshop-product-properties">
			<div data-wiz-item-<?php echo $settings['content_type']; ?>-prop-container class="properties-container">
                <div data-wiz-item-prop class="property-item">
                    <div class="property-title">{{PropName}}</div>
                    <div class="property-content">{{PropVal}}</div>
                </div>
			</div>
		</div><?php
	}

	protected function _wizshop_content_template() {
		?><div class="wizshop-product-properties">
            <div data-wiz-item-tab-prop-container class="properties-container">
                <div data-wiz-item-prop class="property-item">
                    <div class="property-title"><?php _e( 'Property Name', 'wizshop-for-elementor' ); ?></div>
                    <div class="property-content"><?php _e( 'Property Value', 'wizshop-for-elementor' ); ?></div>
                </div>
                <div data-wiz-item-prop class="property-item">
                    <div class="property-title"><?php _e( 'Property Name', 'wizshop-for-elementor' ); ?></div>
                    <div class="property-content"><?php _e( 'Property Value', 'wizshop-for-elementor' ); ?></div>
                </div>
            </div>
		</div><?php
	}

}