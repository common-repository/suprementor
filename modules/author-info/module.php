<?php

namespace Suprementor\Modules\Author_Info;

class Module extends \Suprementor\Base\Module_Base {

	public function get_widgets() {
		return [
			'Author_Info',
		];
	}

	public function get_name() {
		return 'sup-author-info';
	}

}
