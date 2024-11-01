<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Responsive_Thumbnail {

    /*
    * SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_responsive_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_responsive_thumbnail_link',
            [
                'label' => __( 'Link Thumbnail', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_responsive_thumbnail_desktop',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_post_responsive_thumbnail_tablet',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_post_responsive_thumbnail_mobile',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_post_responsive_thumbnail_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the posts Featured Image.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    * RENDER
    */
    public static function render( $settings, $post_id, $cover = false ) {

        if ( ! has_post_thumbnail( $post_id ) ) {
            return;
        }

        ?>

        <?php if ( empty( $cover ) ) : ?>

            <?php if ( ! empty( $settings['sup_post_responsive_thumbnail_link'] ) ) : ?>

                <a class="uk-display-block" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">

                <?php endif; ?>

                <picture><source media='(min-width: 1023px)' srcset='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_desktop'] ); ?>'><source media='(min-width: 767px)' srcset='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_tablet'] ); ?>'>
                    <img class="uk-display-block" src='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_mobile'] ); ?>'>
                </picture>

                <?php if ( ! empty( $settings['sup_post_responsive_thumbnail_link'] ) ) : ?>

                </a>

            <?php endif; ?>

        <?php endif; ?>

        <?php if ( ! empty( $cover ) ) : ?>

            <?php if ( ! empty( $settings['sup_post_responsive_thumbnail_link'] ) ) : ?>

                <a class="uk-position-cover uk-display-block" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">

                <?php endif; ?>

                <picture><source media='(min-width: 1023px)' srcset='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_desktop'] ); ?>'><source media='(min-width: 767px)' srcset='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_tablet'] ); ?>'>
                    <img uk-cover src='<?php echo get_the_post_thumbnail_url( $post_id, $settings['sup_post_responsive_thumbnail_mobile'] ); ?>'>
                </picture>

                <?php if ( ! empty( $settings['sup_post_responsive_thumbnail_link'] ) ) : ?>

                </a>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
