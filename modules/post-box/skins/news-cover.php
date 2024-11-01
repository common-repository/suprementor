<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class News_Cover extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'news_cover';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'News - Cover (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-box');

    }

}
