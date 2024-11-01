<?php

namespace Suprementor\Modules\Post_Archive_Nav;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Archive_Nav',
		];
	}

	public function get_name() {
		return 'sup-post-archive-nav';
	}

}
