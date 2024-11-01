<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Excerpt {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_excerpt',
            [
                'label' => __( 'Excerpt', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_excerpt_show',
            [
                'label' => __( 'Show Excerpt', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_excerpt_length',
            [
                'label' => __( 'Max Words', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 55,
                'step' => 1,
                'default' => 25,
            ]
        );

        $obj->add_control(
            'sup_post_excerpt_transition_opaque',
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
            'sup_post_excerpt_transition',
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
            'sup_style_post_excerpt',
            [
                'label' => __( 'Excerpt', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_excerpt_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-excerpt-wrap',
            ]
        );

        $obj->add_control(
            'sup_post_excerpt_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-excerpt-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_excerpt_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-excerpt-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_excerpt_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-excerpt-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_excerpt_wrap_classes'][] = 'sup-post-excerpt-wrap-processed';
        ( empty( $settings['sup_post_excerpt_transition_opaque'] ) ) ?: $settings['sup_post_excerpt_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_excerpt_transition'] ) ) ?: $settings['sup_post_excerpt_wrap_classes'][] = $settings['sup_post_excerpt_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $the_post = get_post( $post_id );

        if ( ! empty( $the_post->post_excerpt ) ) {

            $content = wp_trim_words( $the_post->post_excerpt, $settings['sup_post_excerpt_length'] );

        } else {

            $content = wp_trim_words( $the_post->post_content, $settings['sup_post_excerpt_length'] );

        }

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_excerpt_show'] ) ) : ?>

            <div class="sup-post-excerpt-wrap sup-transition-all <?php echo esc_attr( implode( ' ', $settings['sup_post_excerpt_wrap_classes'] ) ); ?>">

                <?php echo esc_html( $content ); ?>

            </div>

        <?php endif; ?>

    <?php }

}
