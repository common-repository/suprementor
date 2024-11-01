<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Header {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_header',
            [
                'label' => __( 'Header', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_header_show',
            [
                'label' => __( 'Show Header', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_header_text',
            [
                'label' => __( 'Text', 'supremetor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Header', 'supremetor' ),
                'placeholder' => __( 'Type your title here', 'supremetor' ),
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_header',
            [
                'label' => __( 'Header', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_style_header_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-header',
            ]
        );

        $obj->add_control(
            'sup_header_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-header' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_header_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-header-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_header_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-header-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_header_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-header-wrap',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_header_show']) ) : ?>

            <div class="sup-header-wrap">

                <div class="sup-header">

                    <?php echo esc_html( $settings['sup_header_text'] ); ?>

                </div>

            </div>

        <?php endif; ?>

        <?php
    }

}
