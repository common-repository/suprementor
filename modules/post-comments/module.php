<?php

namespace Suprementor\Modules\Post_Comments;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Comments',
		];
	}

	public function get_name() {
		return 'sup-post-comments';
	}

}
