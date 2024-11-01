<?php


namespace Elementor_Wizshop\Modules\Wizshop;


class WizShop_Api {
	public static function current_product_id() {
		return wizshop_product_tag_var();
	}

	public static function get_product($product_id = null) {
		$product_id = $product_id === null ? self::current_product_id() : $product_id;
		$product_object = \WizShop_Api::get_item_info($product_id);

		return self::fix_product_data( $product_object )[0];
	}

	public static function get_product_data($data_key, $product_id = null) {
		return self::get_product($product_id)[$data_key];
	}

	public static function get_product_categories($product_id = null) {
		$product_id = $product_id === null ? self::current_product_id() : $product_id;
		$product_object = \WizShop_Api::get_item_info($product_id);

		return self::fix_product_data( $product_object, 'CatsTab', 'CatsColumns' );
	}

	public static function fix_product_data($data, $data_array_key = 'OutTab', $columns_array_key = 'Columns') {
		//Wizshop returns data without keys, but it retuns a key map array. this method will fix that

		$products = [];
		if(is_object($data) && isset($data->$data_array_key)) {

			foreach($data->$data_array_key as $product) {
				$current_product = [];
				foreach($data->$columns_array_key as $data_key => $column_name) {
					$current_product[$column_name] = $product[$data_key];
				}
				$products[] = $current_product;
			}

			return $products;
		} else return false;

	}

	protected static function get_current_language_tax() {
		global $wizshop_cat_taxonomies;
		return $wizshop_cat_taxonomies[wizshop_cur_lang()]['name'];
	}

	public static function get_terms() {
		return get_terms( array(
			'taxonomy' => self::get_current_language_tax(),
			'hide_empty' => false,
		) );
	}

	public static function get_cat_info($term_id) {
		return \WizShop_Categories::get_cat_info(self::get_current_language_tax(), $term_id);
	}

	public static function get_all_products() {
		$products = [];
		$all_terms = self::get_terms();

		foreach($all_terms as $term) {
			$term_info = self::get_cat_info($term->term_id);

			$items_in_term = self::fix_product_data( \WizShop_Api::get_items($term_info->id) );

			foreach($items_in_term as $item) {
				$products[] = $item;
			}
		}

		return $products;
	}

	public static function get_all_categories() {
		$categories = [];
		$all_terms = self::get_terms();

		foreach($all_terms as $term) {
			$categories[] = self::get_cat_info($term->term_id);
		}

		return $categories;
	}

	public static function is_product_in_category($category, $product_id = null) {
		$product_categories = self::get_product_categories($product_id);
		if(is_array($product_categories)) {
			return array_search($category, array_column($product_categories, 'CatName')) !== false;
		}

		return false;
	}
}