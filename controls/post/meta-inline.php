<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Meta_Inline {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_meta_inline',
            [
                'label' => __( 'Meta Inline', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_show',
            [
                'label' => __( 'Show Meta', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_show_categories',
            [
                'label' => __( 'Show Categories', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_show_date',
            [
                'label' => __( 'Show Date', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_date_format',
            [
                'label' => __( 'Date Format', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'd.m.Y',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_separator',
            [
                'label' => __( 'Separator', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '/',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_transition_opaque',
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
            'sup_post_meta_inline_transition',
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
            'sup_style_post_meta_inline',
            [
                'label' => __( 'Meta Inline', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_meta_inline_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-meta-inline',
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline .sup-post-meta-inline-categories a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline .sup-post-meta-inline-categories a:hover, {{WRAPPER}} .sup-post-meta-inline .sup-post-meta-inline-categories a:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_meta_inline_separator_margin',
            [
                'label' => __( 'Separator Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'horizontal',
                'selectors' => [
                    '{{WRAPPER}} .sup-post-meta-inline-separator' => 'margin: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_meta_inline_wrap_classes'][] = 'sup-post-meta-inline-wrap-processed';
        ( empty( $settings['sup_post_meta_inline_transition_opaque'] ) ) ?: $settings['sup_post_meta_inline_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_meta_inline_transition'] ) ) ?: $settings['sup_post_meta_inline_wrap_classes'][] = $settings['sup_post_meta_inline_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_meta_inline_show']) ) : ?>

            <?php

            $post_categories = wp_get_post_categories( $post_id );

            $cats = [];

            foreach( $post_categories as $c ){

                $cats[] = array( 'name' => get_category( $c )->name, 'link' => get_category_link( $c ) );

            }

            ?>

            <div class="sup-post-meta-inline-wrap <?php echo esc_attr( implode( ' ', $settings['sup_post_meta_inline_wrap_classes'] ) ); ?>">

                <div class="sup-post-meta-inline">

                    <?php if ( ! empty( $settings['sup_post_meta_inline_show_categories']) ) : ?>

                        <div class="uk-display-inline-block sup-post-meta-inline-categories">

                            <?php foreach($cats as $ck => $cv): ?>

                                <a title="<?php echo esc_attr($cv['name']); ?>" href="<?php echo esc_url($cv['link']); ?>"><?php echo esc_html($cv['name']); ?></a><?php if (next($cats)) echo ', '; ?>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $settings['sup_post_meta_inline_show_categories'] ) && ! empty( $settings['sup_post_meta_inline_show_date'] ) ) : ?>

                        <div class="uk-display-inline-block sup-post-meta-inline-separator">

                            <?php echo esc_html( $settings['sup_post_meta_inline_separator'] ); ?>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $settings['sup_post_meta_inline_show_date']) ) : ?>

                        <div class="uk-display-inline-block sup-post-meta-inline-date">

                            <?php echo get_the_date( $settings['sup_post_meta_inline_date_format'], $post_id ); ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

        <?php
    }

}
