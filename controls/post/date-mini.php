<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Date_Mini {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_date_mini',
            [
                'label' => __( 'Date Mini', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_day_show',
            [
                'label' => __( 'Show Day', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_day_format',
            [
                'label' => __( 'Day Format', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'd',
                'placeholder' => 'd',
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_month_show',
            [
                'label' => __( 'Show Month', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_month_format',
            [
                'label' => __( 'Month Format', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'M',
                'placeholder' => 'M',
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_transition_opaque',
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
            'sup_post_date_mini_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_position',
            [
                'label' => __( 'Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-top-left',
                'options' => \Suprementor\Helpers\UIkit::position_corners_top_bottom(),
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_post_date_mini',
            [
                'label' => __( 'Date Mini', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_date_mini_typography_day',
                'label' => __( 'Typography Day', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-date-mini-day',
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_date_mini_typography_month',
                'label' => __( 'Typography Month', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-date-mini-month',
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-mini-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_date_mini_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-mini-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_date_mini_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-mini-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_date_mini_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-date-mini-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    * PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_date_mini_wrap_classes'][] = 'sup-post-date-mini-wrap-processed';
        ( empty( $settings['sup_post_date_mini_transition_opaque'] ) ) ?: $settings['sup_post_date_mini_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_date_mini_transition'] ) ) ?: $settings['sup_post_date_mini_wrap_classes'][] = $settings['sup_post_date_mini_transition'];

        $settings['sup_post_date_mini_position_classes'][] = 'sup-post-date-mini-position-processed';
        ( empty( $settings['sup_post_date_mini_position'] ) ) ?: $settings['sup_post_date_mini_position_classes'][] = $settings['sup_post_date_mini_position'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_date_mini_day_show'] ) || ! empty( $settings['sup_post_date_mini_month_show'] ) ) : ?>

            <div class="sup-post-date-mini-position uk-text-center <?php echo esc_attr(implode(' ', $settings['sup_post_date_mini_position_classes'])); ?>">

                <div class="sup-post-date-mini-wrap uk-text-center uk-display-inline-block <?php echo esc_attr(implode(' ', $settings['sup_post_date_mini_wrap_classes'])); ?>">

                    <?php if ( ! empty( $settings['sup_post_date_mini_day_show'] ) ) : ?>

                        <div class="sup-post-date-mini-day"><?php echo get_the_date( $settings['sup_post_date_mini_day_format'], $post_id ); ?></div>

                    <?php endif; ?>

                    <?php if ( ! empty($settings['sup_post_date_mini_month_show'] ) ) : ?>

                        <div class="sup-post-date-mini-month"><?php echo get_the_date( $settings['sup_post_date_mini_month_format'], $post_id ); ?></div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

    <?php }

}
