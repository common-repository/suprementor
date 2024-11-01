<?php

namespace Suprementor\Modules\Post_Comments\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart extends \Elementor\Skin_Base {

	/**
	* Used internally to get the widgets categories.
	*/
	public function get_categories() {
		return [ 'suprementor' ];
	}

	/**
	* Get skin ID.
	*/
	public function get_id() {
		return 'smart';
	}

	/**
	* Get skin title.
	*/
	public function get_title() {
		return __( 'Smart (Upgrade)', 'suprementor' );
	}

	/**
	* Overide theme comments template.
	*/
	public function comments_template() {
		return SUPREMENTOR_PATH . '/modules/post-comments/templates/smart.php';
	}

	/**
	* Render widget output on the frontend.
	*/
	public function render() {

		\Suprementor\Helpers\General::upgrade_skin_advert( 'post-comments');

	}

}
