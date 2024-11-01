<?php

namespace Suprementor\Controls\Product\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Count {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_product_category_count',
            [
                'label' => __( 'Count', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_product_category_count_show',
            [
                'label' => __( 'Show Count', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_product_category_count_prefix',
            [
                'label' => __( 'Prefix', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $obj->add_control(
            'sup_product_category_count_suffix',
            [
                'label' => __( 'Suffix', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $obj->add_control(
            'sup_product_category_count_transition_opaque',
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
            'sup_product_category_count_transition',
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
            'sup_style_product_category_count',
            [
                'label' => __( 'Count', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_product_category_count_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-product-category-count-wrap',
            ]
        );

        $obj->add_control(
            'sup_product_category_count_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-count-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_product_category_count_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-count-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_product_category_count_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-count-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_product_category_count_wrap_classes'][] = 'sup-product-category-count-wrap-processed';
        ( empty( $settings['sup_product_category_count_transition_opaque'] ) ) ?: $settings['sup_product_category_count_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_product_category_count_transition'] ) ) ?: $settings['sup_product_category_count_wrap_classes'][] = $settings['sup_product_category_count_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $category_id ) {

        if ( ! class_exists( 'WooCommerce' ) ) {

            return;

        }

        $term = get_term( $category_id );

        if ( empty( $term ) || is_wp_error( $term ) ) {

            return false;

        }

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_product_category_count_show'] ) ) : ?>

            <div class="sup-product-category-count-wrap <?php echo esc_attr( implode( ' ', $settings['sup_product_category_count_wrap_classes'] ) ); ?>">

                <?php if ( ! empty( $settings['sup_product_category_count_prefix'] ) ) : ?>

                    <span class="sup-product-category-count-prefix">

                        <?php echo esc_html( $settings['sup_product_category_count_prefix'] ); ?>

                    </span>

                <?php endif; ?>

                <span class="sup-product-category-count-amount">

                    <?php echo esc_html( $term->count ); ?>

                </span>

                <?php if ( ! empty( $settings['sup_product_category_count_suffix'] ) ) : ?>

                    <span  class="sup-product-category-count-suffix">

                        <?php echo esc_html( $settings['sup_product_category_count_suffix'] ); ?>

                    </span>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
