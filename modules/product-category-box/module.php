<?php

namespace Suprementor\Modules\Product_Category_Box;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Product_Category_Box',
		];
	}

	public function get_name() {
		return 'sup-product-category-box';
	}

}
