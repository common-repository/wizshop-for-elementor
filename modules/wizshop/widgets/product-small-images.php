<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor_Wizshop\Modules\Wizshop\Module as Module;
use Elementor_Wizshop\Plugin as Plugin;
use Elementor\Controls_Manager;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Small_Images extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-small-images';
	}

	public function get_title() {
		return __( 'Product Small Images', 'wizshop-for-elementor' );
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
			'section_image',
			[
				'label' => __( 'Product Small Images', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => __( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 15,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => __( 'Max Width', 'elementor' ) . ' (%)',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Space Between Images', 'wizshop-for-elementor' ) . ' (%)',
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 6,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} img' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} img',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} img',
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

		?><div class="wizshop-product-product-small-images">
            <div data-wiz-item-img-container>
                    <span data-wiz-item-img >
                    <a href="<?php wizshop_image_name_link("{{BigImageFile}}","")?>" data-rel="prettyPhoto[product-gallery]">
                        <img {{bigmsrc}}="<?php esc_url(wizshop_image_name_link("{{BigImageFile}}","wiz_product"))?>" alt="{{Name}}" >
                    </a>
                    </span>
            </div>
        </div><?php
	}

	protected function _wizshop_content_template() {
		?><div class="wizshop-product-product-small-images">
			<div data-wiz-item-img-container>
				<a href="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-wiz-item-img data-rel="prettyPhoto[product-gallery]">
					<img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" alt="">
				</a>
				<a href="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-wiz-item-img data-rel="prettyPhoto[product-gallery]">
					<img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" alt="">
				</a>
				<a href="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-wiz-item-img data-rel="prettyPhoto[product-gallery]">
					<img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" alt="">
				</a>
				<a href="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-wiz-item-img data-rel="prettyPhoto[product-gallery]">
					<img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" alt="">
				</a>
			</div>
		</div><?php
	}

}