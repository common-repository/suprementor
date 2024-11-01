<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_Boxed_Cover_Top extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'smart_boxed_cover_top';
    }

    /**
    */
    public function get_title() {
        return __( 'Smart - Boxed Cover Top (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-archive');

    }

}
