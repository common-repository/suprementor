<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Footer {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_footer',
            [
                'label' => __( 'Footer', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_footer_show',
            [
                'label' => __( 'Show Footer', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => $conditions
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_footer',
            [
                'label' => __( 'Footer', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_footer_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-footer-wrap' => 'background-color: {{VALUE}};',
                ],
                'conditions' => $conditions
            ]
        );

        $obj->add_responsive_control(
            'sup_footer_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-footer-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_footer_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-footer-wrap',
                'conditions' => $conditions
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  OPEN & CLOSE footer
    */
    public static function open( $settings, $classes = [] ) {

        $classes[] = 'sup-footer-wrap';

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '">';

    }

    public static function close() {

        echo '</div>';

    }

}
