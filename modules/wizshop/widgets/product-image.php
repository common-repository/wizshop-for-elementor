<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor_Wizshop\Modules\Wizshop\Module as Module;
use Elementor_Wizshop\Plugin as Plugin;
use Elementor\Controls_Manager;
use Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Image extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-product-image';
	}

	public function get_title() {
		return __( 'Product Image', 'wizshop-for-elementor' );
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
			'section_sale_badge_content',
			[
				'label' => __( 'Product Sale Badge', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_sale_badge',
			[
				'label' => __( 'Show Sale Badge', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'sale_badge_text',
			[
				'label' => __( 'Sale Badge', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'default' => __( 'Sale!', 'wizshop-for-elementor' ),
				'placeholder' => __( 'Type your text here', 'wizshop-for-elementor' ),
				'condition' => [
					'show_sale_badge!' => '',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_sale_badge',
			[
				'label' => __( 'Product Sale Badge', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'badge_typography',
				'selector' => '{{WRAPPER}} .sale-badge span',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'badge_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .sale-badge span' => 'color: {{VALUE}};',
				],
                'default' => '#ffffff',
			]
		);

		$this->add_control(
			'badge_background',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .sale-badge' => 'background-color: {{VALUE}};',
				],
				'default' => '#23a535',
			]
		);

		$this->add_control(
			'badge_align',
			[
				'label' => __( 'Badge Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Left', 'elementor' ),
					'right' => __( 'Right', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'badge_indent_top',
			[
				'label' => __( 'Top Spacing (px)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
                        'min' => -500,
					],
				],
				//'default' => '25',
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .sale-badge' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'badge_indent_side',
			[
				'label' => __( 'Side Spacing (px)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 500,
						'min' => -500,
					],
				],
				//'default' => '25',
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .badge-align-right .sale-badge' => 'right: {{SIZE}}{{UNIT}}; left: initial;',
					'{{WRAPPER}} .badge-align-left .sale-badge' => 'left: {{SIZE}}{{UNIT}}; right: initial;',
				],
			]
		);

		$this->add_control(
			'badge_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 400,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .sale-badge' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => '',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'right' => __( 'Before', 'elementor' ),
					'left' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing (px)', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-align-icon-right span i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wizshop-align-icon-left span i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Product Image', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$wizshop_image_sizes = (array) get_option('wizshop_media_settings');

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Image Size', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'full',
				'options' => [
					'full'  => __( 'Full', 'wizshop-for-elementor' ),
					'thumb'  => __( 'Thumbnail', 'wizshop-for-elementor' ) . " ({$wizshop_image_sizes['thumb_w']}x{$wizshop_image_sizes['thumb_h']})",
					'product'  => __( 'Product Page', 'wizshop-for-elementor' ) . " ({$wizshop_image_sizes['product_w']}x{$wizshop_image_sizes['product_h']})",
					'grid'  => __( 'Products Grid', 'wizshop-for-elementor' ) . " ({$wizshop_image_sizes['grid_w']}x{$wizshop_image_sizes['grid_h']})",
					'cat'  => __( 'Category Page', 'wizshop-for-elementor' ) . " ({$wizshop_image_sizes['cat_w']}x{$wizshop_image_sizes['cat_h']})",
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
					'{{WRAPPER}} .wizshop-product-image' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .wizshop-product-image' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wizshop-product-image' => 'max-width: {{SIZE}}{{UNIT}};',
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

		$this->add_render_attribute( [
			'icon-align' => [
				'class' => [
				    'sale-badge',
				    '{{dispSale}}',
					'wizshop-align-icon-' . $settings['icon_align'],
				],
			],
			'badge-align' => [
				'class' => [
					'wizshop-product-image',
					'badge-align-' . $settings['badge_align'],
				],
			],
		] );

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-product-image-wrapper' );

		?><div <?php echo $this->get_render_attribute_string( 'badge-align' ); ?>>
            <?php if($settings['show_sale_badge'] == 'yes') { ?>
            <div <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
	            <?php if ( ! empty( $settings['icon'] ) ) { ?>
                    <span>
				        <i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
			        </span>
	            <?php } ?>
                <span <?php echo $this->get_render_attribute_string( 'text' ); ?>><?php echo $settings['sale_badge_text']; ?></span>
            </div>
            <?php } ?>
        <?php
            if(Plugin::is_elementor_editor()) {
                $wizshop_image_sizes = (array) get_option('wizshop_media_settings');
                ?><style type="text/css">
                    .wizshop-image-size-grid    {width: <?php echo $wizshop_image_sizes['grid_w']; ?>px; height: <?php echo $wizshop_image_sizes['grid_h']; ?>px;}
                    .wizshop-image-size-product {width: <?php echo $wizshop_image_sizes['product_w']; ?>px; height: <?php echo $wizshop_image_sizes['product_h']; ?>px;}
                    .wizshop-image-size-thumb   {width: <?php echo $wizshop_image_sizes['thumb_w']; ?>px; height: <?php echo $wizshop_image_sizes['thumb_h']; ?>px;}
                    .wizshop-image-size-cat     {width: <?php echo $wizshop_image_sizes['cat_w']; ?>px; height: <?php echo $wizshop_image_sizes['cat_h']; ?>px;}
                </style><?php
	            ?><img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" class="wizshop-image-size-<?php echo $settings['image_size']; ?>" /><?php
            } else {
                $image_size = ($settings['image_size'] == 'full') ? '' : 'wiz_' . $settings['image_size'];
                ?><img {{itemsrc}}="<?php esc_url(wizshop_image_name_link("{{ImageFile}}", $image_size)); ?>" /><?php
            }
        ?>
        </div><?php
	}

	protected function _wizshop_content_template() {
		$wizshop_image_sizes = (array) get_option('wizshop_media_settings');
		?><style type="text/css">
            .wizshop-image-size-grid    {width: <?php echo $wizshop_image_sizes['grid_w']; ?>px; height: <?php echo $wizshop_image_sizes['grid_h']; ?>px;}
            .wizshop-image-size-product {width: <?php echo $wizshop_image_sizes['product_w']; ?>px; height: <?php echo $wizshop_image_sizes['product_h']; ?>px;}
            .wizshop-image-size-thumb   {width: <?php echo $wizshop_image_sizes['thumb_w']; ?>px; height: <?php echo $wizshop_image_sizes['thumb_h']; ?>px;}
            .wizshop-image-size-cat     {width: <?php echo $wizshop_image_sizes['cat_w']; ?>px; height: <?php echo $wizshop_image_sizes['cat_h']; ?>px;}
        </style><?php
		?><div class="wizshop-product-image badge-align-{{ settings.badge_align }}">
            <# if ( settings.show_sale_badge ) { #>
                <div class="sale-badge wizshop-align-icon-{{ settings.icon_align }}">
                    <# if ( settings.icon ) { #>
                    <span>
						<i class="{{ settings.icon }}" aria-hidden="true"></i>
					</span>
                    <# } #>
                    <span>{{settings.sale_badge_text}}</span>
                </div>
            <# } #>
            <img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" class="wizshop-image-size-{{settings.image_size}}" />
        </div><?php
	}

}