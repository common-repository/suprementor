<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Slidenav {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_slidenav',
            [
                'label' => __( 'Slidenav', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_slidenav_show',
            [
                'label' => __( 'Show Slidenav', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );


        $obj->add_control(
            'sup_slidenav_position',
            [
                'label' => __( 'Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-top-left',
                'options' => \Suprementor\Helpers\UIkit::position_corners(),
            ]
        );

        $obj->add_control(
            'sup_slidenav_hidden_hover',
            [
                'label' => __( 'Hidden Hover', 'suprementor' ),
                'description' => __( 'Hide until parent is hovered or focused.', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->add_control(
            'sup_slidenav_hidden_touch',
            [
                'label' => __( 'Hidden Touch', 'suprementor' ),
                'description' => __( 'Hide on touch devices.', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYTLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_slidenav',
            [
                'label' => __( 'Slidenav', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_slidenav_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav:hover, {{WRAPPER}} .sup-slidenav:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_container_background_color',
            [
                'label' => __( 'Container Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav-container' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slidenav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_container_padding',
            [
                'label' => __( 'Container Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slidenav-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_slidenav_container_margin',
            [
                'label' => __( 'Container Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slidenav-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        $settings['sup_slidenav_container_classes'][] = 'sup-slidenav-container-processed';
        $settings['sup_slidenav_container_classes'][] = $settings['sup_slidenav_position'];
        ( empty( $settings['sup_slidenav_hidden_hover'] ) ) ?: $settings['sup_slidenav_container_classes'][] = 'sup-hidden-hover';
        ( empty( $settings['sup_slidenav_hidden_touch'] ) ) ?: $settings['sup_slidenav_container_classes'][] = 'uk-hidden-touch';

        ?>

        <?php if ( ! empty( $settings['sup_slidenav_show'] ) ) : ?>

            <div class="uk-slidenav-container uk-z-index sup-slidenav-container sup-pointer sup-transition-all <?php echo esc_attr( implode( ' ', $settings['sup_slidenav_container_classes'] ) ); ?>">
                <span class="sup-slidenav uk-display-inline-block sup-transition-all" uk-slidenav-previous uk-slideshow-item="previous"></span>
                <span class="sup-slidenav uk-display-inline-block sup-transition-all" uk-slidenav-next uk-slideshow-item="next"></span>
            </div>

        <?php endif; ?>

        <?php
    }

}
