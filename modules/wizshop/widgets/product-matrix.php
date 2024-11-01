<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor;
use Elementor_Wizshop\Modules\Wizshop\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Matrix extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-matrix';
	}

	public function get_title() {
		return __( 'Variations', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'cart', 'product', 'matrix' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_matrix_general',
			[
				'label' => __( 'General', 'wizshop-for-elementor' ),
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
			'section_matrix_1_label',
			[
				'label' => __( 'First Matrix Label', 'wizshop-for-elementor' ),
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
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
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
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
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
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-matrix' );

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

	protected function _wizshop_content_template() {
		?><div data-wiz-matrix>
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
		</div><?php
	}

}