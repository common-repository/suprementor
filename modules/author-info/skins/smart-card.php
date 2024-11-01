<?php

namespace Suprementor\Modules\Author_Info\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Card extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_card';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Card', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() ); ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <div class="sup-author-info-thumbnail-wrap">

            <?php \Suprementor\Controls\Author\Scale_Up_Thumbnail::render( $settings ); ?>

        </div>

        <div class="sup-author-info-inner">

            <?php \Suprementor\Controls\Author\Display_Name::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Snippet::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Bio::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Button::render( $settings ); ?>

        </div>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
