<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor;
use Elementor_Wizshop\Modules\Wizshop\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Product_Description extends Wizshop_Widget_Base {

	public function get_name() {
		return 'wizshop-description';
	}

	public function get_title() {
		return __( 'Product Description', 'wizshop-for-elementor' );
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

	protected function print_before_after() {
		$settings = $this->get_settings_for_display();

		if($settings['description_source'] == 'wizshop') {
			return true;
		}

		return false;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'product_description',
			[
				'label' => __( 'Product Description', 'wizshop-for-elementor' ),
			]
		);

		$this->add_control(
			'description_source',
			[
				'label' => __( 'Description Text Source', 'elementor' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'default' => 'wizshop',
				'options' => [
					'wizshop' => __( 'Wizshop', 'elementor' ),
					'local' => __( 'Website', 'elementor' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Product Description', 'wizshop-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .wizshop-product-description',
				'scheme' => Elementor\Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Elementor\Scheme_Color::get_type(),
					'value' => Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .wizshop-product-description' => 'color: {{VALUE}};',
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
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .wizshop-product-description',
			]
		);

		$this->end_controls_section();
	}

	protected function get_description() {
	    //Check if there is a local post description for the current product
        $wizshop_product_id = get_query_var('p_id');
		$current_product_description_id = get_page_by_title( $wizshop_product_id, 'OBJECT', 'wizshop-product-desc' )->ID;

		if(!is_numeric($current_product_description_id)) {
			_e('Please create new description for this product', 'wizshop-for-elementor');
			return;
		}

		// WP_Query arguments
		$args = array(
			'p'                      => $current_product_description_id,
			'post_type'              => array( 'wizshop-product-desc' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '1',
		);

        // The Query
		$current_product_description_query = new \WP_Query( $args );

        // The Loop
		if ( $current_product_description_query->have_posts() ) {
			while ( $current_product_description_query->have_posts() ) {
				$current_product_description_query->the_post();
				the_content();
			}
		}

        // Restore original Post Data
		wp_reset_postdata();
    }

	protected function wizshop_render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'wizshop-description' );

		if($settings['description_source'] == 'wizshop') {
			?><div class="wizshop-product-description"><?php echo Module::maybe_preview_text(__('Description', 'wizshop-for-elementor'), '{{Description}}'); ?></div><?php
        } else {
			?><div class="wizshop-product-description"><?php $this->get_description(); ?></div><?php
        }
	}

	protected function _wizshop_content_template() {
	}

}