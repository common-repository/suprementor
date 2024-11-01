<?php

namespace Suprementor\Modules\Post_Category_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

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

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        ?>

        <?php if ( empty( $settings['sup_category_id'] ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Please select a category.' ); ?>

        <?php else : ?>

            <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

            <?php \Suprementor\Controls\Post\Category\Scale_Up_Thumbnail::render( $settings, $settings['sup_category_id'] ); ?>

            <?php \Suprementor\Controls\Post\Category\Title::render( $settings, $settings['sup_category_id'] ); ?>

            <?php \Suprementor\Controls\Post\Category\Count::render( $settings, $settings['sup_category_id'] ); ?>

            <?php \Suprementor\Controls\Post\Category\Description::render( $settings, $settings['sup_category_id'] ); ?>

            <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php endif; ?>

        <?php

    }

}
