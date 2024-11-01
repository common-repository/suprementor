<?php

namespace Suprementor\Modules\Post_List\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class News_List extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'news_list';
    }

    /**
    */
    public function get_title() {
        return __( 'News - List (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-list');

    }

}
