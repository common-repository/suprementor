<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Bio {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_bio',
            [
                'label' => __( 'Bio', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_author_bio_show',
            [
                'label' => __( 'Show Bio', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_bio_length',
            [
                'label' => __( 'Max Words', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 999,
                'step' => 1,
                'default' => 999,
            ]
        );

        $obj->add_control(
            'sup_author_bio_transition_opaque',
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
            'sup_author_bio_transition',
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
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_author_bio',
            [
                'label' => __( 'Bio', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_author_bio_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-author-bio-wrap',
            ]
        );

        $obj->add_control(
            'sup_author_bio_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-bio-wrap' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_bio_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-bio-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_bio_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-bio-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_author_bio_wrap_classes'][] = 'sup-author-bio-wrap-processed';
        ( empty( $settings['sup_author_bio_transition_opaque'] ) ) ?: $settings['sup_author_bio_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_bio_transition'] ) ) ?: $settings['sup_author_bio_wrap_classes'][] = $settings['sup_author_bio_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        $settings = self::process( $settings );

        if ( $settings['sup_author_source'] == 'direct' ) {

            $author_bio = wp_trim_words( get_the_author_meta( 'description', $settings['sup_author_source_author_id'] ), $settings['sup_author_bio_length'] );

        }

        if ( $settings['sup_author_source'] == 'loop' ) {

            $author_bio = wp_trim_words( get_the_author_meta( 'description' ), $settings['sup_author_bio_length'] );

        }

        ?>

        <?php if (  ! empty( $settings['sup_author_bio_show']) ) : ?>

            <div class="sup-author-bio-wrap <?php echo esc_attr( implode( ' ', $settings['sup_author_bio_wrap_classes'] ) ); ?>">

                <?php echo esc_html( $author_bio ); ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
