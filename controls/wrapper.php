<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Wrapper {

    /*
    *  SECTION STYLE
    */
    public static function style( $obj ) {

        $obj->start_controls_section(
            'sup_style_wrapper',
            [
                'label' => __( 'Wrapper', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $obj->add_control(
            'sup_wrapper_alignment',
            [
                'label' => __( 'Alignment', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'uk-text-left' => [
                        'title' => __( 'Left', 'suprementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'uk-text-center' => [
                        'title' => __( 'Center', 'suprementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'uk-text-right' => [
                        'title' => __( 'Right', 'suprementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
            ]
        );

        $obj->add_control(
            'sup_wrapper_overflow_hidden',
            [
                'label' => __( 'Overflow Hidden', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => false,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'return_value' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_wrapper_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  OPEN & CLOSE WRAPPER
    */
    public static function open( $settings = [], $name, $classes = [] ) {

        $classes[] = $settings['_skin'];
        $classes[] = $name;
        $classes[] = 'sup-wrapper';

        ( empty( $settings['sup_wrapper_styled'] ) ) ?: $classes[] = 'sup-styled';
        ( empty( $settings['sup_wrapper_overflow_hidden'] ) ) ?: $classes[] = 'uk-overflow-hidden';
        ( empty( $settings['sup_wrapper_alignment'] ) ) ?: $classes[] = $settings['sup_wrapper_alignment'];

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '">';

    }

    public static function close() {

        echo '</div>';

    }

}
