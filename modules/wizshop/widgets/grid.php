<?php
namespace Elementor_Wizshop\Modules\Wizshop\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use ElementorPro\Modules\QueryControl\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Grid extends Widget_Base {

	public function get_name() {
		return 'wizshop-grid';
	}

	public function get_title() {
		return __( 'Grid', 'wizshop-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-wizshop';
	}

	public function get_categories() {
		return [ 'wizshop-elements' ];
	}

	protected function _register_controls() {}

	protected function render() {
		?><div data-grid-view="products-view" data-grid-lang="<?php echo esc_attr( wizshop_cur_lang() ); ?>">
		<?php wizshop_get_template_part( 'products-grid' ); ?>
        </div>

        <div data-grid-scripts>
            <script type="text/html" id="wiz_script-grid">
		        <?php echo rawurlencode( wizshop_template_part_string( 'products-grid' ) ); ?>
            </script>
        </div>
        <?php
	}

	protected function _content_template() {}

}