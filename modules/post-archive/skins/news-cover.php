<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class News_Cover extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'news_cover';
    }

    /**
    * Get the skin label for internal use.
    */
    public function get_title() {
        return __( 'News - Cover (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-archive');

    }

}
