<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Display_Name {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_display_name',
            [
                'label' => __( 'Display Name', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_author_display_name_show',
            [
                'label' => __( 'Show Display Name', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_display_name_transition_opaque',
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
            'sup_author_display_name_transition',
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
            'sup_style_author_display_name',
            [
                'label' => __( 'Display Name', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_author_display_name_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-author-display-name-wrap a',
            ]
        );

        $obj->add_control(
            'sup_author_display_name_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-display-name-wrap a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_display_name_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-display-name-wrap a:hover, {{WRAPPER}} .sup-author-display-name-wrap a:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_display_name_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-display-name-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_display_name_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-display-name-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_author_display_name_wrap_classes'][] = 'sup-author-display-name-wrap-processed';
        ( empty( $settings['sup_author_display_name_transition_opaque'] ) ) ?: $settings['sup_author_display_name_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_display_name_transition'] ) ) ?: $settings['sup_author_display_name_wrap_classes'][] = $settings['sup_author_display_name_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        $settings = self::process( $settings );

        if ( $settings['sup_author_source'] == 'direct' ) {

            $author_name = get_the_author_meta( 'display_name', $settings['sup_author_source_author_id'] );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID', $settings['sup_author_source_author_id'] ) );

        }

        if ( $settings['sup_author_source'] == 'loop' ) {

            $author_name = get_the_author_meta( 'display_name' );
            $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );

        }

        ?>

        <?php if (  !empty( $settings['sup_author_display_name_show'] ) ) : ?>

            <div class="sup-author-display-name-wrap <?php echo esc_attr( implode( ' ', $settings['sup_author_display_name_wrap_classes'] ) ); ?>">

                <a class="sup-transition-all" href="<?php echo esc_url( $author_url ); ?>">
                    <?php echo esc_html( $author_name ); ?>
                </a>

            </div>

        <?php endif; ?>

        <?php
    }

}
