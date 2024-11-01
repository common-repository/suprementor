<?php

namespace Suprementor\Modules\Post_Category_List;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Category_List',
		];
	}

	public function get_name() {
		return 'sup-post-category-list';
	}

}
