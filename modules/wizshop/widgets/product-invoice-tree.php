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

class Product_Invoice_Tree extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-invoice-tree';
	}

	public function get_title() {
		return __( 'Product Invoice Tree', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'tree', 'product' ];
	}

	protected function _register_controls() {
	    $this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Product Image', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_product_image',
			[
				'label' => __( 'Show Product Name', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'product_image_label',
			[
				'label' => __( 'Column Title', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter product image column title here', 'wizshop-for-elementor' ),
				'default' => __( 'Product Image', 'wizshop-for-elementor' ),
				'condition' => [
					'show_product_image!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_name',
			[
				'label' => __( 'Product Name', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_product_name',
			[
				'label' => __( 'Show Product Name', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'product_name_is_clickable',
			[
				'label' => __( 'Clickable Product Name', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor' ),
				'label_off' => __( 'No', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'show_product_name!' => '',
				],
			]
		);

		$this->add_control(
			'product_name_label',
			[
				'label' => __( 'Column Title', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter product name column title here', 'wizshop-for-elementor' ),
				'default' => __( 'Product Name', 'wizshop-for-elementor' ),
				'condition' => [
					'show_product_name!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_sku',
			[
				'label' => __( 'Product SKU', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_product_sku',
			[
				'label' => __( 'Show Product SKU', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'product_sku_label',
			[
				'label' => __( 'Column Title', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter product SKU column title here', 'wizshop-for-elementor' ),
				'default' => __( 'SKU', 'wizshop-for-elementor' ),
				'condition' => [
					'show_product_sku!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_qty',
			[
				'label' => __( 'Product Quantity', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_product_qty',
			[
				'label' => __( 'Show Product Quantity', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'product_qty_label',
			[
				'label' => __( 'Column Title', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter product quantity column title here', 'wizshop-for-elementor' ),
				'default' => __( 'Quantity', 'wizshop-for-elementor' ),
				'condition' => [
					'show_product_qty!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_add_to_cart',
			[
				'label' => __( 'Add to Cart', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'show_add_to_cart',
			[
				'label' => __( 'Show Add to Cart Button', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'add_to_cart_title',
			[
				'label' => __( 'Column Title', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter add to cart button column title here', 'wizshop-for-elementor' ),
				'default' => __( 'Add to Cart', 'wizshop-for-elementor' ),
				'condition' => [
					'show_add_to_cart!' => '',
				],
			]
		);

		$this->add_control(
			'add_to_cart_label',
			[
				'label' => __( 'Add to Cart Button Text', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter add to cart button text here', 'wizshop-for-elementor' ),
				'default' => __( 'Add to Cart', 'wizshop-for-elementor' ),
				'condition' => [
					'show_add_to_cart!' => '',
				],
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
				'condition' => [
					'show_add_to_cart!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_cell_padding',
			[
				'label' => __( 'Cell Padding', 'wizshop-for-elementor' ),
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
					'{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row .wiz-table-cell, {{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .wiz-table',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_cell_border',
			[
				'label' => __( 'Table Cell Border', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'table_cell_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row .wiz-table-cell, {{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_table_head_style',
			[
				'label' => __( 'Table Head', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'table_head_typography',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row .wiz-table-cell',
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
					'{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row .wiz-table-cell' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'table_head_text_shadow',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row .wiz-table-cell',
			]
		);

		$this->add_control(
			'table_head_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wiz-table .wiz-table-head .wiz-table-row' => 'background-color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell *' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'table_body_text_shadow',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .wiz-table-cell',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item:nth-child(even)' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item:nth-child(odd)' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Product Image', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_product_image!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => __( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 100,
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_atc_style',
			[
				'label' => __( 'Add to Cart Button', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_add_to_cart!' => '',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'atc_typography',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button' => 'color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'atc_text_shadow',
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button' => 'background-color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wiz-table .wiz-table-item .wiz-table-row .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'default' => ['unit' => 'px', 'top' => '12', 'right' => 24, 'bottom' => 12, 'left' => 24],
			]
		);

		$this->end_controls_section();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-invoice-tree' );

		?><div id="table-<?php echo $this->get_id(); ?>" class="wiz-table wiz-table-responsive" data-wiz-hesh-item-container>
            <div class="wiz-table-head" data-wiz-hesh-head>
                <div class="wiz-table-row">
                    <?php if($settings['show_product_image'] == 'yes') { ?><div class="wiz-table-cell"><?php echo $settings['product_image_label']; ?></div><?php } ?>
                    <?php if($settings['show_product_name'] == 'yes') { ?><div class="wiz-table-cell"><?php echo $settings['product_name_label']; ?></div><?php } ?>
	                <?php if($settings['show_product_sku'] == 'yes') { ?><div class="wiz-table-cell"><?php echo $settings['product_sku_label']; ?></div><?php } ?>
                    <?php if($settings['show_product_qty'] == 'yes') { ?><div class="wiz-table-cell"><?php echo $settings['product_qty_label']; ?></div><?php } ?>
	                <?php if($settings['show_add_to_cart'] == 'yes') { ?><div class="wiz-table-cell"><?php echo $settings['add_to_cart_title']; ?></div><?php } ?>
                </div>
            </div>
            <div class="wiz-table-body">
                <div class="wiz-table-item" data-wiz-hesh-item>
                    <div class="wiz-table-row" data-wiz-item-data>
	                    <?php if($settings['show_product_image'] == 'yes') { ?>
                            <div class="wiz-table-cell">
                                <span class="table-cell-mobile-title"><?php echo $settings['product_image_label']; ?></span>
                                <span class="table-cell-content">
                                <a href="<?php echo esc_url(wizshop_get_products_url()); ?>{{Link}}">
                                    <?php if(Plugin::is_elementor_editor()) { ?>
                                        <img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-img-key="{{ImageFile}}" data-img-size="100x100" alt="{{Name}}">
                                    <?php } else { ?>
                                        <img src="<?php echo esc_url(wizshop_image_name_link("{{ImageFile}}", "wiz_thumb")); ?>" data-img-key="{{ImageFile}}" data-img-size="100x100" alt="{{Name}}">
                                    <?php } ?>
                                </a>
                            </span>
                            </div>
	                    <?php } ?>
	                    <?php if($settings['show_product_name'] == 'yes') { ?><div class="wiz-table-cell"><span class="table-cell-mobile-title"><?php echo $settings['product_name_label']; ?></span><span class="table-cell-content"><a href="<?php echo esc_url(wizshop_get_products_url()); ?>{{Link}}"><?php echo Module::maybe_preview_text(__('Product Name', 'wizshop-for-elementor'), '{{Name}}'); ?></a></span></div><?php } ?>
                        <?php if($settings['show_product_sku'] == 'yes') { ?><div class="wiz-table-cell"><span class="table-cell-mobile-title"><?php echo $settings['product_sku_label']; ?></span><span class="table-cell-content"><?php echo Module::maybe_preview_text(__('112233', 'wizshop-for-elementor'), '{{ItemKey}}'); ?></span></div><?php } ?>
	                    <?php if($settings['show_product_qty'] == 'yes') { ?><div class="wiz-table-cell"><span class="table-cell-mobile-title"><?php echo $settings['product_qty_label']; ?></span>
                            <span class="table-cell-content">
                                <span class=" {{dispCart}} {{dispUnits}} {{dispPacks}}single">
                                    <input type="number" class="input-text qty text"  min="0" size="2" wiz_QuantId="{{QuantId}}" data-wiz-packs-only="{{OnlyPacks}}" value="{{Quantity}}">
                                </span>

                                <span class="{{dispCart}} {{dispPacks}}">
                                    <input type="number" class="input-text qty text" min="0" size="2" wiz_PacksId="{{PacksId}}" data-wiz-quant-in-pack="{{QntInPack}}" value="{{Quantity}}">
                                </span>
                            </span>
                        </div><?php } ?>
	                    <?php if($settings['show_add_to_cart'] == 'yes') { ?><div class="wiz-table-cell">
                            <span class="table-cell-mobile-title"><?php echo $settings['add_to_cart_title']; ?></span>
                                <span class="table-cell-content">
                                <div class="{{dispCart}} add2cart matrix{{MatrixType}}" >
                                    <a href="javascript:void(0);" data-wiz-item-to-cart='{{urlItemKey}}' data-wiz-packs-ctrl="{{PacksId}}" data-wiz-quant-ctrl="{{QuantId}}" data-wiz-check-quant="1" data-wiz-item-row data-wiz-item-col class="elementor-button"><?php echo $settings['add_to_cart_label']; ?></a>
                                    <a href="" data-wiz-view-list='{{urlItemKey}}' class="v_ihide"><?php _e('לחצו לצפייה', 'wizshop-for-elementor'); ?></a>
                                </div>
                            </span>
                        </div><?php } ?>
                    </div>
                </div>
            </div>
		</div>
        <!--<style type="text/css">
            @media (max-width: 1px) {
                #table-<?php /*echo $this->get_id(); */?> .wiz-table-item .wiz-table-row .wiz-table-cell:nth-child(1):before {
                    content: '<?php /*echo $settings['product_image_label']; */?>';
                }

                #table-<?php /*echo $this->get_id(); */?> .wiz-table-item .wiz-table-row .wiz-table-cell:nth-child(2):before {
                    content: '<?php /*echo $settings['product_sku_label']; */?>';
                }

                #table-<?php /*echo $this->get_id(); */?> .wiz-table-item .wiz-table-row .wiz-table-cell:nth-child(3):before {
                    content: '<?php /*echo $settings['product_name_label']; */?>';
                }

                #table-<?php /*echo $this->get_id(); */?> .wiz-table-item .wiz-table-row .wiz-table-cell:nth-child(4):before {
                    content: '<?php /*echo $settings['product_qty_label']; */?>';
                }
            }
        </style>-->
        <?php
	}

	protected function _wizshop_content_template() {
		?><div class="wiz-table wiz-table-responsive" style="width: 100%;" data-wiz-hesh-item-container>
		<div class="wiz-table-head">
			<div class="wiz-table-row">
                <# if( settings.show_product_image ) { #><div class="wiz-table-cell">{{settings.product_image_label}}</div><# } #>
                <# if( settings.show_product_name ) { #><div class="wiz-table-cell">{{settings.product_name_label}}</div><# } #>
                <# if( settings.show_product_sku ) { #><div class="wiz-table-cell">{{settings.product_sku_label}}</div><# } #>
                <# if( settings.show_product_qty ) { #><div class="wiz-table-cell">{{settings.product_qty_label}}</div><# } #>
                <# if( settings.show_add_to_cart ) { #><div class="wiz-table-cell">{{settings.add_to_cart_title}}</div><# } #>
			</div>
		</div>
		<div class="wiz-table-body">
			<div class="wiz-table-item" data-wiz-hesh-item>
				<div class="wiz-table-row" data-wiz-item-data>
                    <# if( settings.show_product_image ) { #><div class="wiz-table-cell"><?php _e('112233', 'wizshop-for-elementor'); ?></div><# } #>
                    <# if( settings.show_product_name ) { #>
                    <div class="wiz-table-cell">
                        <a href="#">
                            <img src="<?php echo esc_url(Module::get_image_placeholder()); ?>">
                        </a>
                    </div>
                    <# } #>
                    <# if( settings.show_product_sku ) { #><div class="wiz-table-cell"><a href="#"><span><?php _e('Product Name', 'wizshop-for-elementor'); ?></span></a></div><# } #>
                    <# if( settings.show_product_qty ) { #>
                    <div class="wiz-table-cell">
                            <span>
                                <input type="number" class="input-text qty text"  min="0" size="2" value="1">
                            </span>
                    </div>
                    <# } #>
                    <# if( settings.show_add_to_cart ) { #>
                    <div class="wiz-table-cell">
                        <div class="add2cart" >
                            <a href="javascript:void(0);" data-wiz-check-quant="1" data-wiz-item-row data-wiz-item-col class="elementor-button">{{settings.add_to_cart_label}}</a>
                            <a href="" class="v_ihide"><?php _e('לחצו לצפייה', 'wizshop-for-elementor'); ?></a>
                        </div>
                    </div>
                    <# } #>
				</div>

			</div>
			<div class="wiz-table-item">
				<div class="wiz-table-row">
                    <# if( settings.show_product_image ) { #><div class="wiz-table-cell"><?php _e('112233', 'wizshop-for-elementor'); ?></div><# } #>
                    <# if( settings.show_product_name ) { #>
                    <div class="wiz-table-cell">
                        <a href="#">
                            <img src="<?php echo esc_url(Module::get_image_placeholder()); ?>">
                        </a>
                    </div>
                    <# } #>
                    <# if( settings.show_product_sku ) { #><div class="wiz-table-cell"><a href="#"><span><?php _e('Product Name', 'wizshop-for-elementor'); ?></span></a></div><# } #>
                    <# if( settings.show_product_qty ) { #>
                    <div class="wiz-table-cell">
                            <span>
                                <input type="number" class="input-text qty text"  min="0" size="2" value="1">
                            </span>
                    </div>
                    <# } #>
                    <# if( settings.show_add_to_cart ) { #>
                    <div class="wiz-table-cell">
                        <div class="add2cart" >
                            <a href="javascript:void(0);" data-wiz-check-quant="1" data-wiz-item-row data-wiz-item-col class="elementor-button">{{settings.add_to_cart_label}}</a>
                            <a href="" class="v_ihide"><?php _e('לחצו לצפייה', 'wizshop-for-elementor'); ?></a>
                        </div>
                    </div>
                    <# } #>

				</div>
			</div>
		</div>
		</div><?php
	}

}