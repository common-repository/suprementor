<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bold_Cover_Top extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'bold_cover_top';
    }

    /**
    */
    public function get_title() {
        return __( 'Bold - Cover Top (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-archive');

    }
}
