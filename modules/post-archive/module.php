<?php

namespace Suprementor\Modules\Post_Archive;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Archive',
		];
	}

	public function get_name() {
		return 'sup-post-archive';
	}

}
