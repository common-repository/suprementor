<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Snippet {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_snippet',
            [
                'label' => __( 'Snippet', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_author_snippet_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_author_snippet_show',
            [
                'label' => __( 'Show Snippet', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_snippet_transition_opaque',
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
            'sup_author_snippet_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->add_control(
            'sup_author_snippet_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the Authors Snippet ACF Field from their user profile.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_author_snippet',
            [
                'label' => __( 'Snippet', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_author_snippet_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-author-snippet-wrap',
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_author_snippet_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-snippet-wrap' => 'color: {{VALUE}};',
                ],
                'conditions' => $conditions
            ]
        );

        $obj->add_responsive_control(
            'sup_author_snippet_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-snippet-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => $conditions
            ]
        );

        $obj->add_responsive_control(
            'sup_author_snippet_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-snippet-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => $conditions
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_author_snippet_wrap_classes'][] = 'sup-author-snippet-wrap-processed';
        ( empty( $settings['sup_author_snippet_transition_opaque'] ) ) ?: $settings['sup_author_snippet_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_snippet_transition'] ) ) ?: $settings['sup_author_snippet_wrap_classes'][] = $settings['sup_author_snippet_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        $settings = self::process( $settings );

        if ( $settings['sup_author_source'] == 'loop' ) {

            $snippet = get_field( 'sup_author_snippet', 'user_' . get_the_author_meta( 'ID' ) );

        }

        if ( $settings['sup_author_source'] == 'direct' ) {

            $snippet = get_field( 'sup_author_snippet', 'user_' . $settings['sup_author_source_author_id'] );

        }

        ?>

        <?php if ( empty( $snippet ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Set snippet in Users > Profile > Snippet.' ); ?>

        <?php else : ?>

            <?php if (  !empty( $settings['sup_author_snippet_show']) ) : ?>

                <div class="sup-author-snippet-wrap <?php echo esc_attr( implode( ' ', $settings['sup_author_snippet_wrap_classes'] ) ); ?>">

                    <?php echo esc_html( $snippet ); ?>

                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
