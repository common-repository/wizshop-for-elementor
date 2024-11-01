<?php
use Elementor_Wizshop\Plugin as Plugin;

global $template_global;

$wiz_product = isset($template_global['product_id']) ? $template_global['product_id'] : esc_attr(wizshop_get_id_var());
$data_wizshop_attr = (Plugin::is_elementor_editor() === false) ? 'data-wizshop="" ' : '';
?>
