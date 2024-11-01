<?php

namespace Suprementor\Modules\Product_Category_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_Cover extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_cover';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Cover (Upgrade)', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        \Suprementor\Helpers\General::upgrade_skin_advert( 'product-category-box');

    }

}
