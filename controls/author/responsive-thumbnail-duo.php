<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Responsive_Thumbnail_Duo {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_responsive_thumbnail_duo',
            [
                'label' => __( 'Thumbnail Duo', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_author_responsive_thumbnail_duo_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_show',
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
            'sup_author_responsive_thumbnail_duo_image_mode',
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
            'sup_author_responsive_thumbnail_duo_size',
            [
                'label' => __( 'Image Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'simple'
                ]
            ]
        );

        $obj->start_controls_tabs(
            'sup_author_responsive_thumbnail_duo_image_tabs',
        );

        $obj->start_controls_tab(
            'sup_author_responsive_thumbnail_duo_image_tab_1',
            [
                'label' => __( 'Image One', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_desktop_1',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_tablet_1',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_mobile_1',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_transition_opaque_1',
            [
                'label' => __( 'Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_transition_1',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-transition-scale-up',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_author_responsive_thumbnail_duo_image_tab_2',
            [
                'label' => __( 'Image Two', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_desktop_2',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_tablet_2',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_mobile_2',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_author_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_transition_opaque_2',
            [
                'label' => __( 'Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_transition_2',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-transition-scale-down',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-responsive-thumbnail-duo-inner img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_responsive_thumbnail_duo_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the Authors Image One & Image Two ACF Fields from their user profile.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $as_cover = false, $wrap_classes_1 = [], $wrap_classes_2 = [] ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        if ( $settings['sup_author_source'] == 'loop' ) {

            $image_1 = get_field( 'sup_author_image_1', 'user_' . get_the_author_meta( 'ID' ) );
            $image_2 = get_field( 'sup_author_image_2', 'user_' . get_the_author_meta( 'ID' ) );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

        }

        if ( $settings['sup_author_source'] == 'direct' ) {

            $image_1 = get_field( 'sup_author_image_1', 'user_' . $settings['sup_author_source_author_id'] );
            $image_2 = get_field( 'sup_author_image_2', 'user_' . $settings['sup_author_source_author_id'] );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID', $settings['sup_author_source_author_id'] ) );

        }

        if ( ! empty( $image_1 ) && ! empty( $image_2 ) ) {

            if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'advanced') {

                if ( ! empty( $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_desktop_1']] ) ) {
                    $desktop_image_1 = $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_desktop_1']];
                } else {
                    $desktop_image_1 = $image_1['sizes']['large'];
                }

                if ( ! empty( $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_tablet_1']] ) ) {
                    $tablet_image_1 = $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_tablet_1']];
                } else {
                    $tablet_image_1 = $image_1['sizes']['large'];
                }

                if ( ! empty( $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_mobile_1']] ) ) {
                    $mobile_image_1 = $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_mobile_1']];
                } else {
                    $mobile_image_1 = $image_1['sizes']['large'];
                }

                if ( ! empty( $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_desktop_2']] ) ) {
                    $desktop_image_2 = $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_desktop_2']];
                } else {
                    $desktop_image_2 = $image_2['sizes']['large'];
                }

                if ( ! empty( $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_tablet_2']] ) ) {
                    $tablet_image_2 = $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_tablet_2']];
                } else {
                    $tablet_image_2 = $image_2['sizes']['large'];
                }

                if ( ! empty( $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_mobile_2']] ) ) {
                    $mobile_image_2 = $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_mobile_2']];
                } else {
                    $mobile_image_2 = $image_2['sizes']['large'];
                }

            }

            if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'simple') {

                if ( ! empty( $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_size']] ) ) {
                    $simple_image_1 = $image_1['sizes'][$settings['sup_author_responsive_thumbnail_duo_size']];
                } else {
                    $simple_image_1 = $image_1['sizes']['large'];
                }

                if ( ! empty( $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_size']] ) ) {
                    $simple_image_2 = $image_2['sizes'][$settings['sup_author_responsive_thumbnail_duo_size']];
                } else {
                    $simple_image_2 = $image_2['sizes']['large'];
                }

            }

            $wrap_classes_1[] = 'sup-responsive-thumbnail-duo-wrap-processed-1';
            ( empty( $settings['sup_author_responsive_thumbnail_duo_transition_opaque_1'] ) ) ?: $wrap_classes_1[] = 'uk-transition-opaque';
            ( empty( $settings['sup_author_responsive_thumbnail_duo_transition_1'] ) ) ?: $wrap_classes_1[] = $settings['sup_author_responsive_thumbnail_duo_transition_1'];

            $wrap_classes_2[] = 'sup-responsive-thumbnail-duo-wrap-processed-2';
            ( empty( $settings['sup_author_responsive_thumbnail_duo_transition_opaque_2'] ) ) ?: $wrap_classes_2[] = 'uk-transition-opaque';
            ( empty( $settings['sup_author_responsive_thumbnail_duo_transition_2'] ) ) ?: $wrap_classes_2[] = $settings['sup_author_responsive_thumbnail_duo_transition_2'];

        }

        $breakpoints = \Elementor\Core\Responsive\Responsive::get_editable_breakpoints();

        ?>

        <?php if ( ! empty( $settings['sup_author_responsive_thumbnail_duo_show'] ) ) : ?>

            <?php if ( empty( $image_1 ) || empty( $image_2 ) ) : ?>

                <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Set Images One & Two in Users > Profile > Suprementor.' ); ?>

            <?php else : ?>

                <?php if ( empty( $as_cover ) ) : ?>

                    <a class="uk-display-block uk-overflow-hidden uk-position-relative sup-author-responsive-thumbnail-duo-inner" href="<?php echo esc_url( $author_url ); ?>">

                        <div class="<?php echo esc_attr( implode( ' ', $wrap_classes_1 ) ); ?>">

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img class="uk-display-block uk-width-1-1" src="<?php echo esc_url( $simple_image_1 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_1 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_1 ); ?>">
                                    <img class="uk-display-block uk-width-1-1" src="<?php echo esc_url( $mobile_image_1 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                        <div class="uk-position-top <?php echo esc_attr( implode( ' ', $wrap_classes_2 ) ); ?>">

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img class="uk-display-block" src="<?php echo esc_url( $simple_image_2 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_2 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_2 ); ?>">
                                    <img class="uk-display-block" src="<?php echo esc_url( $mobile_image_2 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                    </a>

                <?php endif; ?>

                <?php if ( ! empty( $as_cover ) ) : ?>

                    <a class="uk-display-block uk-cover-container uk-position-cover sup-author-responsive-thumbnail-duo-inner" href="<?php echo esc_url( $author_url ); ?>">

                        <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $wrap_classes_1 ) ); ?>">

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img uk-cover class="uk-display-block" src="<?php echo esc_url( $simple_image_1 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_1 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_1 ); ?>">
                                    <img uk-cover class="uk-display-block" src="<?php echo esc_url( $mobile_image_1 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                        <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $wrap_classes_2 ) ); ?>">

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img uk-cover class="uk-display-block" src="<?php echo esc_url( $simple_image_2 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_author_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_2 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_2 ); ?>">
                                    <img uk-cover class="uk-display-block" src="<?php echo esc_url( $mobile_image_2 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                    </a>

                <?php endif; ?>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
