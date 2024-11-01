<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class News_Card extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'news_card';
    }

    /**
    */
    public function get_title() {
        return __( 'News - Card (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-archive');

    }

}
