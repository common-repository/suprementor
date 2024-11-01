<?php

namespace Suprementor\Modules\Post_Slideshow;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Post_Slideshow',
		];
	}

	public function get_name() {
		return 'sup-post-slideshow';
	}

}
