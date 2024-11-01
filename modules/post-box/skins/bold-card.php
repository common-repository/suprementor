<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bold_Card extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'bold_card';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Bold - Card (Upgrade)', 'suprementor' );
    }

    /**
    * Render the skin.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'post-box');

    }

}
