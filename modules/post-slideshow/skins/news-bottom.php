<?php

namespace Suprementor\Modules\Post_Slideshow\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class News_Bottom extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'news_bottom';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'News - Bottom (Upgrade)', 'suprementor' );
    }

    /**
    * Render the skin.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-slideshow');

    }

}
