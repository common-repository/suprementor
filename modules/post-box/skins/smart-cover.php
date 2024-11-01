<?php

namespace Suprementor\Modules\Post_Box\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

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
        return __( 'Smart - Cover', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        $post_id = \Suprementor\Group_Controls\Get_Post::get_id( $settings, 'get_post' );

        ?>

        <?php if ( empty( $post_id ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'No post found.' ); ?>

        <?php else : ?>

            <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

            <div class="sup-cover-container uk-cover-container uk-position-relative">

                <?php \Suprementor\Controls\Post\Scale_Up_Thumbnail::render( $settings, $post_id, true ); ?>

                <div style="pointer-events: none;" class="uk-position-cover sup-cover-overlay uk-overflow-hidden"></div>

                <div class="sup-cover sup-cover-wrap sup-post-box-inner <?php echo esc_attr( implode( ' ', \Suprementor\Controls\Cover::wrapper_classes( $settings ) ) ); ?>" style="pointer-events: none;">

                    <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, $post_id ); ?>

                    <?php \Suprementor\Controls\Post\Title::render( $settings, $post_id ); ?>

                    <?php \Suprementor\Controls\Post\Excerpt::render( $settings, $post_id ); ?>

                </div>

            </div>

            <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php endif; ?>

        <?php

    }

}
