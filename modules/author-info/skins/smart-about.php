<?php

namespace Suprementor\Modules\Author_Info\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_About extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_about';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - About', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() ); ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <?php \Suprementor\Controls\Columns::open( $settings, ['uk-flex', 'uk-flex-stretch'] ); ?>

        <?php \Suprementor\Controls\Columns::first_column( $settings, ['uk-cover-container'] ); ?>

        <div class="sup-author-info-thumbnail-wrap">

            <?php \Suprementor\Controls\Author\Scale_Up_Thumbnail::render( $settings ); ?>

        </div>

        <?php \Suprementor\Controls\Columns::first_column_close(); ?>

        <?php \Suprementor\Controls\Columns::second_column(); ?>

        <div class="sup-author-info-inner">

            <?php \Suprementor\Controls\Author\Display_Name::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Snippet::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Bio::render( $settings ); ?>

            <?php \Suprementor\Controls\Author\Social_Icons::render( $settings, ['uk-flex', 'uk-flex-middle'] ); ?>

            <?php if ( ! empty( $settings['sup_author_info_about_link_show'] ) && class_exists( 'ACF' ) ) : ?>

                <?php

                if ( $settings['sup_author_source'] == 'loop' ) {

                    $about_url = get_field( 'sup_author_about_page', 'user_' . get_the_author_meta( 'ID' ) );

                }

                if ( $settings['sup_author_source'] == 'direct' ) {

                    $about_url = get_field( 'sup_author_about_page', 'user_' . $settings['sup_author_source_author_id'] );

                }

                ?>

                <?php \Suprementor\Controls\Button::render( $settings, $about_url, $settings['sup_author_info_about_link_text'] ); ?>

            <?php endif; ?>

        </div>

        <?php \Suprementor\Controls\Columns::second_column_close(); ?>

        <?php \Suprementor\Controls\Columns::close(); ?>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
