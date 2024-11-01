<?php

namespace Suprementor\Controls\Product\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Title {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_product_category_title',
            [
                'label' => __( 'Title', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_product_category_title_show',
            [
                'label' => __( 'Show Title', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_product_category_title_length',
            [
                'label' => __( 'Max Length', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 250,
            ]
        );

        $obj->add_control(
            'sup_product_category_title_transition_opaque',
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
            'sup_product_category_title_transition',
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
            'sup_style_product_category_title',
            [
                'label' => __( 'Title', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_product_category_title_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-product-category-title-wrap a',
            ]
        );

        $obj->add_control(
            'sup_product_category_title_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-title-wrap a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_product_category_title_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-title-wrap a:hover, .sup-product-category-title-wrap a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_product_category_title_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-title-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_product_category_title_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-product-category-title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_product_category_title_wrap_classes'][] = 'sup-product-category-title-wrap-processed';
        ( empty( $settings['sup_product_category_title_transition_opaque'] ) ) ?: $settings['sup_product_category_title_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_product_category_title_transition'] ) ) ?: $settings['sup_product_category_title_wrap_classes'][] = $settings['sup_product_category_title_transition'];

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

            return;

        }

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_product_category_title_show'] ) ) : ?>

            <div class="sup-product-category-title-wrap <?php echo esc_attr( implode( ' ', $settings['sup_product_category_title_wrap_classes'] ) ); ?>">

                <a class="sup-transition-all" href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">

                    <?php echo mb_strimwidth( wp_strip_all_tags( $term->name ), 0, (int)$settings['sup_product_category_title_length'], '...' ); ?>

                </a>

            </div>

        <?php endif; ?>

        <?php
    }

}
