<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Categories_Title_Inline_Other {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [], $section_label = '[Other]' ) {

        $obj->start_controls_section(
            'sup_content_post_categories_title_inline_other',
            [
                'label' => __( 'Categories & Title Inline ' . $section_label, 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_show',
            [
                'label' => __( 'Show Cat & Title', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_title_link',
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
            'sup_post_categories_title_inline_other_title_length',
            [
                'label' => __( 'Title Length', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 250,
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_separator',
            [
                'label' => __( 'Separator', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '/',
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_transition_opaque',
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
            'sup_post_categories_title_inline_other_transition',
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
            'sup_style_post_categories_title_inline_other',
            [
                'label' => __( 'Categories & Title Inline ' . $section_label, 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_categories_title_inline_other_category_typography',
                'label' => __( 'Category Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-cti-categories-other, {{WRAPPER}} .sup-cti-separator-other',
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_categories_title_inline_other_title_typography',
                'label' => __( 'Title Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-cti-post-title-other a, {{WRAPPER}} .sup-cti-post-title-other span',
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_category_color',
            [
                'label' => __( 'Category Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-categories-other a, {{WRAPPER}} .sup-cti-separator-other' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_category_hover_color',
            [
                'label' => __( 'Category Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-categories-other a:hover, {{WRAPPER}} .sup-cti-categories-other a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_title_color',
            [
                'label' => __( 'Title Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-post-title-other a, {{WRAPPER}} .sup-cti-post-title-other span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_categories_title_inline_other_title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-post-title-other a:hover, {{WRAPPER}} .sup-cti-post-title-other a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_categroy_title_inline_other_separator_margin',
            [
                'label' => __( 'Separator Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'horizontal',
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-separator-other' => 'margin: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_categories_title_inline_other_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-wrap-other' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_categories_title_inline_other_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-cti-wrap-other' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    * PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_categories_title_inline_other_wrap_classes'][] = 'sup-cti-wrap-other-processed';
        ( empty( $settings['sup_post_categories_title_inline_other_transition_opaque'] ) ) ?: $settings['sup_post_categories_title_inline_other_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_categories_title_inline_other_transition'] ) ) ?: $settings['sup_post_categories_title_inline_other_wrap_classes'][] = $settings['sup_post_categories_title_inline_other_transition'];

        return $settings;

    }

    /*
    * RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if (  ! empty( $settings['sup_post_categories_title_inline_other_show']) ) : ?>

            <div class="sup-cti-wrap-other <?php echo esc_attr( implode( ' ', $settings['sup_post_categories_title_inline_other_wrap_classes'] ) ); ?>">

                <?php

                $post_categories = wp_get_post_categories( $post_id );
                $cats = array();

                foreach($post_categories as $c){

                    $cats[] = array('name' => get_category($c)->name, 'link' => get_category_link($c));

                }

                ?>


                <span class="sup-cti-categories-other">

                    <?php foreach($cats as $k => $v): ?>

                        <a class="sup-transition-all" href="<?php echo esc_url($v['link']); ?>"><?php echo esc_html($v['name']); ?></a><?php if (next($cats)) echo ', '; ?>

                    <?php endforeach; ?>

                </span>

                <span class="uk-display-inline-block sup-cti-separator-other">

                    <?php echo esc_html( $settings['sup_post_categories_title_inline_other_separator'] ); ?>

                </span>

                <span class="sup-cti-post-title-other" href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo get_the_title( $post_id ); ?>">

                    <?php if ( empty( $settings['sup_post_categories_title_inline_other_title_link'] ) ) : ?>

                        <span>

                            <?php echo esc_html( wp_trim_words( get_the_title( $post_id ) ), $settings['sup_post_categories_title_inline_other_title_length'] ); ?>

                        </span>

                    <?php else : ?>

                        <a class="sup-transition-all" href="<?php echo get_permalink( $post_id ); ?>">

                            <?php echo esc_html( wp_trim_words( get_the_title( $post_id ) ), $settings['sup_post_categories_title_inline_other_title_length'] ); ?>

                        </a>

                    <?php endif; ?>

                </span>

            </div>

        <?php endif; ?>

        <?php
    }

}
