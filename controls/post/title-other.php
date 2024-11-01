<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Title_Other {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [], $section_label = '[Other]' ) {

        $obj->start_controls_section(
            'sup_content_post_title_other',
            [
                'label' => __( 'Title ' . $section_label, 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_title_other_show',
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
            'sup_post_title_other_link',
            [
                'label' => __( 'Link Title', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_title_other_length',
            [
                'label' => __( 'Max Letters', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 250,
            ]
        );

        $obj->add_control(
            'sup_post_title_other_transition_opaque',
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
            'sup_post_title_other_transition',
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
    public static function style( $obj, $conditions = [], $section_label = '[Other]' ) {

        $obj->start_controls_section(
            'sup_style_post_title_other',
            [
                'label' => __( 'Title ' . $section_label, 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_title_other_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-title-other-wrap a, {{WRAPPER}} .sup-post-title-other-wrap span',
            ]
        );

        $obj->add_control(
            'sup_post_title_other_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-other-wrap a, {{WRAPPER}} .sup-post-title-other-wrap span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_title_other_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-other-wrap a:hover, .sup-post-title-other-wrap a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_title_other_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-other-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_title_other_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-title-other-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sup_post_title_other_text_shadow',
				'label' => __( 'Text Shadow', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-title-other-wrap',
			]
		);

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_title_other_wrap_classes'][] = 'sup-post-title-other-processed';
        ( empty( $settings['sup_post_title_other_transition_opaque'] ) ) ?: $settings['sup_post_title_other_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_title_other_transition'] ) ) ?: $settings['sup_post_title_other_wrap_classes'][] = $settings['sup_post_title_other_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_title_other_show']) ) : ?>

            <div class="sup-post-title-other-wrap <?php echo esc_attr( implode( ' ', $settings['sup_post_title_other_wrap_classes'] ) ); ?>">

                <?php if ( empty( $settings['sup_post_title_other_link'] ) ) : ?>

                    <span class="sup-transition-all uk-display-inline-block">

                        <?php echo mb_strimwidth( wp_strip_all_tags( get_the_title( $post_id ) ), 0, (int)$settings['sup_post_title_other_length'], '...' ); ?>

                    </span>

                <?php else : ?>

                    <a class="sup-transition-all" href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo get_the_title( $post_id ); ?>">

                        <?php echo mb_strimwidth( wp_strip_all_tags( get_the_title( $post_id ) ), 0, (int)$settings['sup_post_title_other_length'], '...' ); ?>

                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
