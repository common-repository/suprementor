<?php

namespace Suprementor\Modules\Post_List;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_List',
		];
	}

	public function get_name() {
		return 'sup-post-list';
	}

}
