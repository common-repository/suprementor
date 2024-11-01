<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Button {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_button',
            [
                'label' => __( 'Button', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_button_show',
            [
                'label' => __( 'Show Button', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_button_text',
            [
                'label' => __( 'Button Text', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'VIEW NOW', 'suprementor' ),
                'placeholder' => __( 'Type your text here', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_post_button_transition_opaque',
            [
                'label' => __( 'Button Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_button_transition',
            [
                'label' => __( 'Button Transition', 'suprementor' ),
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
            'sup_style_post_button',
            [
                'label' => __( 'Button', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_button_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-button',
            ]
        );

        $obj->add_responsive_control(
            'sup_post_button_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_button_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_button_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->start_controls_tabs(
            'sup_post_button_tabs',
        );

        $obj->start_controls_tab(
            'sup_post_button_normal_tab',
            [
                'label' => __( 'Normal', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_post_button_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_button_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_button_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-button',
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_post_button_hover_tab',
            [
                'label' => __( 'Hover', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_post_button_hover_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button:hover, {{WRAPPER}} .sup-post-button:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_button_hover_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-button:hover, {{WRAPPER}} .sup-post-button:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_button_hover_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-button:hover, {{WRAPPER}} .sup-post-button:focus',
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_button_wrap_classes'][] = 'sup-post-button-wrap-processed';
        ( empty( $settings['sup_post_button_transition_opaque'] ) ) ?: $settings['sup_post_button_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_button_transition'] ) ) ?: $settings['sup_post_button_wrap_classes'][] = $settings['sup_post_button_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_button_show']) ) : ?>

            <div class="sup-post-button-wrap <?php echo esc_attr( implode( ' ', $settings['sup_post_button_wrap_classes'] ) ); ?>">

                <a class="uk-display-inline-block sup-post-button sup-transition-all" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">

                    <?php echo esc_html( $settings['sup_post_button_text'] ); ?>

                </a>

            </div>

        <?php endif; ?>

    <?php }

}
