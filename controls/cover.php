<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Cover {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_cover',
            [
                'label' => __( 'Cover', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_cover_position',
            [
                'label' => __( 'Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-bottom',
                'options' => \Suprementor\Helpers\UIkit::position(),
            ]
        );

        $obj->add_control(
            'sup_cover_transition_opaque',
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
            'sup_cover_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );



        $obj->add_responsive_control(
            'sup_cover_height',
            [
                'label' => __( 'Height', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 400,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 400,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 400,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sup-cover-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_cover',
            [
                'label' => __( 'Cover', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'sup_cover_overlay_background',
                'label' => __( 'Overlay Background', 'suprementor' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .sup-cover-overlay',
            ]
        );

        $obj->add_responsive_control(
            'sup_cover_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-cover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_cover_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-cover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function wrapper_classes( $settings ) {

        $wrap_classes = [];

        $wrap_classes[] = 'sup-cover-wrap-processed';
        ( empty( $settings['sup_cover_transition_opaque'] ) ) ?: $wrap_classes[] = 'uk-transition-opaque';
        ( empty( $settings['sup_cover_transition'] ) ) ?: $wrap_classes[] = $settings['sup_cover_transition'];
        ( empty( $settings['sup_cover_position'] ) ) ?: $wrap_classes[] = $settings['sup_cover_position'];

        return $wrap_classes;

    }

}
