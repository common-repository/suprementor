<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Author {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_author',
            [
                'label' => __( 'Author', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_author_show',
            [
                'label' => __( 'Show Author', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_author_label',
            [
                'label' => __( 'Label', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'By',
            ]
        );

        $obj->add_control(
            'sup_post_author_transition_opaque',
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
            'sup_post_author_transition',
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
            'sup_style_post_author',
            [
                'label' => __( 'Author', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_author_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-author-wrap, {{WRAPPER}} .sup-post-author-link',
            ]
        );

        $obj->add_control(
            'sup_post_author_label_color',
            [
                'label' => __( 'Label Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_author_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_author_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-link:hover, .sup-post-author-link:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_author_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_author_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-author-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sup_post_author_text_shadow',
				'label' => __( 'Text Shadow', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-author-link',
			]
		);

        $obj->end_controls_section();

    }

    /*
    * PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_author_wrap_classes'][] = 'sup-post-author-wrap-processed';
        ( empty( $settings['sup_post_author_transition_opaque'] ) ) ?: $settings['sup_post_author_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_author_transition'] ) ) ?: $settings['sup_post_author_wrap_classes'][] = $settings['sup_post_author_transition'];

        return $settings;

    }

    /*
    * RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_author_show'] ) ) : ?>

            <div class="sup-post-author-wrap <?php echo esc_attr( implode( ' ', $settings['sup_post_author_wrap_classes'] ) ); ?>">

                <?php $post_author_id = get_post_field( 'post_author', $post_id ); ?>

                <?php if ( ! empty( $settings['sup_post_author_label'] ) ) : ?>
                    <span class="sup-post-author-label">
                        <?php echo esc_html($settings['sup_post_author_label']); ?>
                    </span>
                <?php endif; ?>


                <a class="sup-post-author-link" href="<?php echo get_author_posts_url( $post_author_id ); ?>">
                    <?php echo get_the_author_meta( 'display_name', $post_author_id ); ?>
                </a>

            </div>

        <?php endif; ?>

    <?php }

}
