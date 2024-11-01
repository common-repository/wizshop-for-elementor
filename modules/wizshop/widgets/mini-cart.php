<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor;
use Elementor\Controls_Manager;
use Elementor_Wizshop\Modules\Wizshop\Module;
use Elementor_Wizshop\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Mini_Cart extends Wizshop_Widget_Button_Base {

	public function get_name() {
		return 'wizshop-mini-cart';
	}

	public function get_title() {
		return __( 'Mini Cart', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-general' ];
	}

	public function get_keywords() {
		return [ 'wizshop', 'shop', 'store', 'cart', 'product', 'test' ];
	}

	protected function print_before_after() {
		return false;
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->add_control(
			'show_counter',
			[
				'section' => 'section_button',
				'label' => __( 'Show Items in Cart Counter', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wizshop-for-elementor' ),
				'label_off' => __( 'Hide', 'wizshop-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->start_controls_section(
			'section_mini_cart',
			[
				'label' => __( 'Mini Cart', 'wizshop-for-elementor' ),
			]
		);

		$this->add_responsive_control(
			'show_mini_cart',
			[
				'label' => __( 'Show Cart', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wizshop-for-elementor' ),
				'label_off' => __( 'Hide', 'wizshop-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_responsive_control(
			'show_image',
			[
				'label' => __( 'Show Image', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wizshop-for-elementor' ),
				'label_off' => __( 'Hide', 'wizshop-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'show_mini_cart!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'show_quantity',
			[
				'label' => __( 'Show Quantity', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'wizshop-for-elementor' ),
				'label_off' => __( 'Hide', 'wizshop-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'show_mini_cart!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'empty_cart_text',
			[
				'label' => __( 'Cart is Empty Text', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::TEXT,
				'default' => __('Cart is Empty', 'wizshop-for-elementor'),
				'condition' => [
					'show_mini_cart!' => '',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_mini_cart_style',
			[
				'label' => __( 'Mini Cart', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_mini_cart!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'mini_cart_width',
			[
				'label' => __( 'Mini Cart Width', 'wizshop-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 550,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-mini-cart-container' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'mini_cart_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-mini-cart-container' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffffff',
			]
		);

		$this->add_control(
			'mini_cart_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_4,
				],
				'selectors' => [
					'{{WRAPPER}} .wizshop-mini-cart-container' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wizshop-mini-cart-container *' => 'color: {{VALUE}};',
				],
				'default' => '#000000',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'mini_cart_border',
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wizshop-mini-cart-container',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'mini_cart_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wizshop-mini-cart-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => ['unit' => 'px', 'top' => 5, 'right' => 5, 'bottom' => 5, 'left' => 5],
			]
		);

		$this->add_control(
			'remove_item_icon',
			[
				'label' => __( 'Remove Item Icon', 'wizshop-for-elementor' ),
				'type' => Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-trash-alt',
					'library' => 'solid',
				],
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'section_style_buttons',
			[
				'label' => __( 'Buttons', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'buttons_layout',
			[
				'label' => __( 'Layout', 'elementor' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'inline' => __( 'Inline', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor-pro' ),
				],
				'default' => 'inline',
				'prefix_class' => 'elementor-menu-cart--buttons-',
			]
		);

		$this->add_control(
			'space_between_buttons',
			[
				'label' => __( 'Space Between', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-menu-cart__footer-buttons' => 'grid-column-gap: {{SIZE}}{{UNIT}}; grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_view_cart_button_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'View Cart', 'wizshop-for-elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'view_cart_button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--view-cart span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_cart_button_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--view-cart' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_cart_button_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--view-cart' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'view_cart_button_border_width',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button--view-cart' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->add_control(
			'heading_checkout_button_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Checkout', 'wizshop-for-elementor' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'checkout_button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--checkout span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'checkout_button_background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--checkout' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'checkout_button_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button--checkout' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'checkout_button_border_width',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button--checkout' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'product_buttons_typography',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elementor-menu-cart__footer-buttons .elementor-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-menu-cart__footer-buttons .elementor-button' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'button_text', 'none' );

		if(Plugin::is_elementor_editor()) {
			$this->add_render_attribute( 'action_buttons_wrapper', 'class', 'elementor-menu-cart__footer-buttons' );
		} else {
			$this->add_render_attribute( 'action_buttons_wrapper', 'class', 'elementor-menu-cart__footer-buttons v_ihide' );
		}

		?>
		<div data-wiz-shopping-cart data-wizshop class="wizshop-mini-cart">
			<div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
				<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
					<?php if($settings['icon_align'] == 'right' && $settings['show_counter']) { ?>
						<span data-wiz-cart-totals class="wizshop-mini-cart-count">
                            <span>(<?php echo Module::maybe_preview_text('3', '{{Items}}') ?>)</span>
                        </span>
					<?php } ?>
					<?php $this->render_text(); ?>
					<?php if($settings['icon_align'] == 'left' && $settings['show_counter']) { ?>
						<span data-wiz-cart-totals class="wizshop-mini-cart-count">
                            <span>(<?php echo Module::maybe_preview_text('3', '{{Items}}') ?>)</span>
                        </span>
					<?php } ?>
				</a>
			</div>
			<div class="wizshop-mini-cart-inner wiz-table">
				<?php if('yes' === $settings['show_mini_cart']) { ?>
					<div class="wizshop-mini-cart-container">
						<div data-wiz-cart-container class="wiz-table-body v_cart table-nodorder  layout-auto">

							<div data-wiz-discount-item class="wiz-table-item">
								<div class="wiz-table-row">
									<?php if($settings['show_image'] == 'yes') { ?>
										<div class="thumb wiz-table-cell"></div>
									<?php } ?>
									<div class="wiz-table-cell"><a><?php echo Module::maybe_preview_text('Product 1', '{{Name}}'); ?></a></div>
									<div class="wiz-table-cell"><a><?php echo Module::maybe_preview_text('1.00', '{{LineTotal}}'); ?></a></div>
								</div>
							</div>
							<div data-wiz-cart-item class="wiz-table-item">
								<div class="wiz-table-row">
									<?php if($settings['show_image'] == 'yes') { ?>
										<div class="thumb wiz-table-cell">
											<a href="<?php echo esc_url(wizshop_get_products_url())?>{{Link}}" class="px-1" >
												<?php if(Plugin::is_elementor_editor()) { ?>
													<img src="<?php echo esc_url(Module::get_image_placeholder()); ?>" data-img-key="{{ImageFile}}" width="60" height="60" data-img-size="60x60" alt="{{Name}}">
												<?php } else { ?>
													<img {{cartsrc}}="<?php echo esc_url(wizshop_image_name_link("{{ImageFile}}", "wiz_thumb")); ?>" data-img-key="{{ImageFile}}"  width="60" height="60"data-img-size="60x60" alt="{{Name}}">
												<?php } ?>
											</a>
										</div>
									<?php } ?>
									<div class="wiz-table-cell">
										<a href="<?= esc_url(wizshop_get_products_url())?>{{Link}}" class="px-1"><?php echo Module::maybe_preview_text('Product 2', '{{Name}}'); ?></a>
									</div>
									<div class="wiz-table-cell">
										<?php if($settings['show_quantity'] == 'yes') { ?>
											<div class="px-1"><?php echo Module::maybe_preview_text('1', '{{Quantity}}'); ?></div>
											<div class="px-1"> x </div>
										<?php } ?>
										<div class="price px-1"><?php echo Module::maybe_preview_text('11.00', '{{Price-P}}'); ?></div>
										<div class="px-1">
											<a href="javascript:void(0);" data-wiz-remove-from-cart='{{ID}}' data-wiz-status=""  title="הסר פריט זה">
												<?php Elementor\Icons_Manager::render_icon( $settings['remove_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
											</a>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="menu-item empty-basket"><a class="elementor-sub-item"><?php echo esc_html($settings['empty_cart_text']); ?></a></div>
						<div data-wiz-cart-totals>
							<a class="total text-center elementor-sub-item">סך הכל <strong><?php echo Module::maybe_preview_text('11.00', '{{Total-P}}'); ?></strong></a>
						</div>

						<div data-wiz-cart-actions <?php echo $this->get_render_attribute_string( 'action_buttons_wrapper' ); ?>>
							<a href="<?php echo esc_url(wizshop_get_cart_url())?>" class="elementor-button elementor-button--view-cart elementor-size-md">
								<span class="elementor-button-text"><?php esc_attr_e( 'Show Cart', 'elementor' ); ?></span>
							</a>
							<a href="<?php echo wizshop_get_checkout_final_url()?>" class="elementor-button elementor-button--checkout elementor-size-md">
								<span class="elementor-button-text"><?php esc_attr_e( 'Checkout', 'elementor' ); ?></span>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
	}

	protected function _wizshop_content_template() {

	}

}