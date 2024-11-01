<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Categories {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_categories',
            [
                'label' => __( 'Categories', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_categories_show',
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
			'sup_post_categories_position',
			[
				'label' => __( 'Position', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'uk-position-bottom',
				'options' => \Suprementor\Helpers\UIkit::position_corners_top_bottom(),
			]
		);

        $obj->add_control(
            'sup_post_categories_transition_opaque',
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
            'sup_post_categories_transition',
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
            'sup_style_post_categories',
            [
                'label' => __( 'Categories', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_categories_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-categories-wrap',
            ]
        );

        $obj->add_control(
            'sup_post_categories_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-categories-wrap, {{WRAPPER}} .sup-post-categories-wrap a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_categories_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-categories-wrap a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_control(
            'sup_post_categories_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-categories-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_categories_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-categories-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_post_categories_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-categories-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'sup_post_categories_border',
				'label' => __( 'Border', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-categories-wrap',
			]
		);

        $obj->end_controls_section();

    }

    /*
    * PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_categories_wrap_classes'][] = 'sup-post-categories-wrap-processed';
        ( empty( $settings['sup_post_categories_transition_opaque'] ) ) ?: $settings['sup_post_categories_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_categories_transition'] ) ) ?: $settings['sup_post_categories_wrap_classes'][] = $settings['sup_post_categories_transition'];

        return $settings;

    }

    /*
    * RENDER
    */
    public static function render( $settings, $post_id ) {

        $settings = self::process( $settings );

        ?>

        <?php if ( !empty($settings['sup_post_categories_show']) ) : ?>

            <?php

            $post_post_categories = wp_get_post_categories( $post_id );
            $cats = array();

            foreach($post_post_categories as $c){
                $cats[] = array('name' => get_category($c)->name, 'link' => get_category_link($c));
            }

            ?>

            <div class="sup-post-categories-wrap uk-display-inline-block <?php echo esc_attr(implode(' ', $settings['sup_post_categories_wrap_classes'])); ?>">
                <?php foreach($cats as $k => $v): ?>
                    <a class="uk-display-inline-block sup-transition-all" href="<?php echo esc_url($v['link']); ?>"><?php echo esc_html($v['name']); ?></a><?php if (next($cats)) echo ', '; ?>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    <?php }

}
