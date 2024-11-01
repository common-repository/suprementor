<?php

namespace Suprementor\Controls\Post\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Description {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_category_description',
            [
                'label' => __( 'Description', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_category_description_show',
            [
                'label' => __( 'Show Description', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_category_description_length',
            [
                'label' => __( 'Max Words', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 250,
            ]
        );

        $obj->add_control(
            'sup_post_category_description_transition_opaque',
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
            'sup_post_category_description_transition',
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
            'sup_style_post_category_description',
            [
                'label' => __( 'Description', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_category_description_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-category-description-wrap',
            ]
        );

        $obj->add_control(
            'sup_post_category_description_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-category-description-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_category_description_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-category-description-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_category_description_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-category-description-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_category_description_wrap_classes'][] = 'sup-post-category-description-wrap-processed';
        ( empty( $settings['sup_post_category_description_transition_opaque'] ) ) ?: $settings['sup_post_category_description_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_category_description_transition'] ) ) ?: $settings['sup_post_category_description_wrap_classes'][] = $settings['sup_post_category_description_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $category_id ) {

        $term = get_term_by( 'id', $category_id, 'category' );

        if ( empty( $term ) ) {
            // TO DO error message for missing post category.
            return false;
        }

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_category_description_show'] ) ) : ?>

            <div class="sup-post-category-description-wrap <?php echo esc_attr( implode( ' ', $settings['sup_post_category_description_wrap_classes'] ) ); ?>">

                <?php echo esc_html( wp_trim_words( $term->description, $settings['sup_post_category_description_length'] ) ); ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
