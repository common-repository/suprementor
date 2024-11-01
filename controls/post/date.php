<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Date {

    /*
    * SECTION CONTENT
    */
    public static function content( $obj, $conditions = false ) {

        $obj->start_controls_section(
            'sup_content_post_date',
            [
                'label' => __( 'Date', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_date_show',
            [
                'label' => __( 'Show Date', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_date_format',
            [
                'label' => __( 'Date Format', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'd.m.Y',
                'default' => 'd.m.Y',
            ]
        );

        $obj->add_control(
            'sup_post_date_transition_opaque',
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
            'sup_post_date_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->end_controls_section();

    }

    /*
    * SECTION STYLE
    */
    public static function style( $obj, $conditions = false ) {

        $obj->start_controls_section(
            'sup_style_post_date',
            [
                'label' => __( 'Date', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_date_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-date-wrap',
            ]
        );

        $obj->add_control(
            'sup_post_date_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_date_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_date_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_date_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'sup_post_date_border',
				'label' => __( 'Border', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-date-wrap',
			]
		);

        $obj->end_controls_section();

    }

    /*
    * PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_date_wrap_classes'][] = 'sup-post-date-wrap-processed';
        ( empty( $settings['sup_post_date_transition_opaque'] ) ) ?: $settings['sup_post_date_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_date_transition'] ) ) ?: $settings['sup_post_date_wrap_classes'][] = $settings['sup_post_date_transition'];

        return $settings;

    }

    /*
    * RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_date_show']) ) : ?>

            <div class="sup-post-date-wrap uk-display-inline-block <?php echo esc_attr( implode( ' ', $settings['sup_post_date_wrap_classes'] ) ); ?>">

                <?php echo get_the_date( $settings['sup_post_date_format'], $post_id ); ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
