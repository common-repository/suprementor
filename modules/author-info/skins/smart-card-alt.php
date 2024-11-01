<?php

namespace Suprementor\Modules\Author_Info\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Card_Alt extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_card_alt';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Card Alternative (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'author-info');

    }

}
