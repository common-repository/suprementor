<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Tags {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_tags',
            [
                'label' => __( 'Tags', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_tags_show',
            [
                'label' => __( 'Show Tags', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_content_post_tags_icon',
            [
                'label' => __( 'Icon', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_post_tags',
            [
                'label' => __( 'Tags', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_tags_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-tag',
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_tags_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_tags_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag:hover, .sup-post-tag:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_tags_icon_color',
            [
                'label' => __( 'Icon Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_tags_tag_padding',
            [
                'label' => __( 'Tag Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_tags_icon_padding',
            [
                'label' => __( 'Icon Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_tags_icon_size',
            [
                'label' => __( 'Icon Size', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tag-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_tags_wrap_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tags-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_tags_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-tags-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_tags_wrap_classes'][] = 'sup-post-title-processed';
        ( empty( $settings['sup_post_tags_transition_opaque'] ) ) ?: $settings['sup_post_tags_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_tags_transition'] ) ) ?: $settings['sup_post_tags_wrap_classes'][] = $settings['sup_post_tags_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_tags_show']) ) : ?>

            <?php $tags = get_the_tags( $post_id ); ?>

            <?php if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) : ?>

                <div class="sup-post-tags-wrap uk-flex uk-flex-middle">

                    <?php foreach ( $tags as $t ) : ?>

                        <div class="uk-width-auto uk-flex uk-flex-middle">

                            <div class="uk-width-auto sup-post-tag-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['sup_content_post_tags_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>

                            <div class="uk-width-auto">

                                <a class="uk-display-inline-block sup-post-tag sup-transition-all" href="<?php echo esc_url( get_tag_link( $t->term_id ) ); ?>">

                                    <?php echo $t->name; ?>

                                </a>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
