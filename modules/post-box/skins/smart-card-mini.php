<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Card_Mini extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_card_mini';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Card Mini', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        $post_id = \Suprementor\Group_Controls\Get_Post::get_id( $settings, 'get_post' );

        ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <?php \Suprementor\Controls\Post\Scale_Up_Thumbnail::render( $settings, $post_id ); ?>

        <div class="sup-post-box-inner">

            <?php \Suprementor\Controls\Post\Title::render( $settings, $post_id ); ?>

            <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, $post_id ); ?>

        </div>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
