<?php

namespace Suprementor\Modules\Post_Slideshow\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class News_Overlay_Vertical extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'news_overlay_vertical';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'News - Overlay Vertical (Upgrade)', 'suprementor' );
    }

    /**
    * Render the skin.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-slideshow');

    }

}
