<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Scale_Up_Thumbnail {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_scale_up_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_author_scale_up_thumbnail_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_author_scale_up_thumbnail_show',
            [
                'label' => __( 'Show Thumbnail', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_image_mode',
            [
                'label' => __( 'Image Mode', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'simple' => __( 'Simple', 'suprementor' ),
                    'advanced' => __( 'Advanced', 'suprementor' ),
                ],
                'default' => 'simple',
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_size',
            [
                'label' => __( 'Image Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_scale_up_thumbnail_image_mode' => 'simple'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_desktop',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_tablet',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_mobile',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [
                    '0' =>  __( '-', 'suprementor' ),
                    'uk-transition-scale-up' => __( 'Scale Up', 'suprementor' )
                ],
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-scale-up-thumbnail-inner img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_scale_up_thumbnail_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the Authors Image One from their user profile.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $as_cover = false ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        if ( $settings['sup_author_source'] == 'loop' ) {

            $field = get_field( 'sup_author_image_1', 'user_' . get_the_author_meta( 'ID' ) );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

        }

        if ( $settings['sup_author_source'] == 'direct' ) {

            $field = get_field( 'sup_author_image_1', 'user_' . $settings['sup_author_source_author_id'] );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID', $settings['sup_author_source_author_id'] ) );

        }

        if ( ! empty( $field ) ) {

            if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'advanced') {

                if ( ! empty( $field['sizes'][$settings['sup_author_scale_up_thumbnail_desktop']] ) ) {
                    $desktop_image = $field['sizes'][$settings['sup_author_scale_up_thumbnail_desktop']];
                } else {
                    $desktop_image = $field['sizes']['large'];
                }

                if ( ! empty( $field['sizes'][$settings['sup_author_scale_up_thumbnail_tablet']] ) ) {
                    $tablet_image = $field['sizes'][$settings['sup_author_scale_up_thumbnail_tablet']];
                } else {
                    $tablet_image = $field['sizes']['large'];
                }

                if ( ! empty( $field['sizes'][$settings['sup_author_scale_up_thumbnail_mobile']] ) ) {
                    $mobile_image = $field['sizes'][$settings['sup_author_scale_up_thumbnail_mobile']];
                } else {
                    $mobile_image = $field['sizes']['large'];
                }

            }

            if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'simple') {

                if ( ! empty( $field['sizes'][$settings['sup_author_scale_up_thumbnail_size']] ) ) {
                    $simple_image = $field['sizes'][$settings['sup_author_scale_up_thumbnail_size']];
                } else {
                    $simple_image = $field['sizes']['large'];
                }

            }

        }

        $settings['sup_author_scale_up_thumbnail_wrapper_classes'][] = 'sup-scale-up-thumbnail-wrap-processed';
        ( empty( $settings['sup_author_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_author_scale_up_thumbnail_wrapper_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_author_scale_up_thumbnail_wrapper_classes'][] = $settings['sup_author_scale_up_thumbnail_transition'];

        $breakpoints = \Elementor\Core\Responsive\Responsive::get_editable_breakpoints();

        ?>

        <?php if ( ! empty( $settings['sup_author_scale_up_thumbnail_show'] ) ) : ?>

            <?php if ( empty( $field ) ) : ?>

                <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Please set an image in the user profile.' ); ?>

            <?php else : ?>

                <a href="<?php echo esc_url( $author_url ); ?>">

                    <?php if ( empty( $as_cover ) ) : ?>

                        <div class="uk-overflow-hidden">

                            <div class="sup-author-scale-up-thumbnail-outer uk-overflow-hidden">

                                <div class="sup-author-scale-up-thumbnail-inner <?php echo esc_attr( implode( ' ', $settings['sup_author_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                                    <?php if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'simple') : ?>

                                        <img class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $simple_image ); ?>'>

                                    <?php endif; ?>

                                    <?php if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'advanced') : ?>

                                        <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( $desktop_image ); ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( $tablet_image ); ?>'>
                                            <img class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $mobile_image ); ?>'>
                                        </picture>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $as_cover ) ) : ?>

                        <div class="sup-author-scale-up-thumbnail-outer uk-overflow-hidden uk-position-cover">

                            <div class="sup-author-scale-up-thumbnail-inner uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_author_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                                <?php if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'simple') : ?>

                                    <img uk-cover src='<?php echo esc_url( $simple_image ); ?>'>

                                <?php endif; ?>

                                <?php if ( $settings['sup_author_scale_up_thumbnail_image_mode'] == 'advanced') : ?>

                                    <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( $desktop_image ); ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( $tablet_image ); ?>'>
                                        <img uk-cover src='<?php echo esc_url( $mobile_image ); ?>'>
                                    </picture>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endif; ?>

                </a>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
