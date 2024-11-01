<?php

namespace Suprementor\Modules\Post_List\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_List extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'smart_list';
    }

    /**
    */
    public function get_title() {
        return __( 'Smart - List', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        $post_ids = \Suprementor\Group_Controls\Get_Posts::get_ids( $settings, 'sup_get_posts' );

        ?>

        <?php if ( empty( $post_ids ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'No posts found.' ); ?>

        <?php else : ?>

            <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name() ); ?>

            <?php \Suprementor\Controls\Header::render( $settings ); ?>

            <div class="uk-margin-remove-last-child sup-post-list-wrap">

                <?php foreach ( $post_ids as $post_id) : ?>

                    <div class="sup-post-list-outer uk-transition-toggle">

                        <?php \Suprementor\Controls\Columns::open( $settings ); ?>

                        <?php \Suprementor\Controls\Columns::first_column( $settings ); ?>

                        <?php \Suprementor\Controls\Post\Scale_Up_Thumbnail::render( $settings, $post_id ); ?>

                        <?php \Suprementor\Controls\Columns::first_column_close(); ?>

                        <?php \Suprementor\Controls\Columns::second_column(); ?>

                        <div class="sup-post-list-inner">

                            <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, $post_id ); ?>

                            <?php \Suprementor\Controls\Post\Title::render( $settings, $post_id ); ?>

                            <?php \Suprementor\Controls\Post\Excerpt::render( $settings, $post_id ); ?>

                            <?php \Suprementor\Controls\Post\Button::render( $settings, $post_id ); ?>

                        </div>

                        <?php \Suprementor\Controls\Columns::second_column_close(); ?>

                        <?php \Suprementor\Controls\Columns::close(); ?>

                    </div>

                <?php endforeach; ?>

            </div>

            <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php endif; ?>

        <?php

    }

}
