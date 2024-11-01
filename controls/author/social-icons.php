<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Social_Icons {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_social_icons',
            [
                'label' => __( 'Social Icons', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_author_social_icons_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_author_social_icons_show',
            [
                'label' => __( 'Show Social Icons', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_transition_opaque',
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
            'sup_author_social_icons_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_new_tab',
            [
                'label' => __( 'Open In New Tab', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_author_socal_icons_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the Authors Social Username ACF Fields from their user profile.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  SECTION STYLE
    */
    public static function style( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_style_author_social_icons',
            [
                'label' => __( 'Social Icons', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_size',
            [
                'label' => __( 'Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_heading_colors',
            [
                'label' => __( 'Colors', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_background_hover_color',
            [
                'label' => __( 'Background Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_heading_border',
            [
                'label' => __( 'Border', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $obj->start_controls_tabs(
            'sup_author_social_icons_border_tabs'
        );

        $obj->start_controls_tab(
            'sup_author_social_icons_border_tab_normal',
            [
                'label' => __( 'Normal', 'suprementor' ),
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_author_social_icons_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon',
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_author_social_icons_border_tab_hover',
            [
                'label' => __( 'Hover', 'suprementor' ),
            ]
        );

        $obj->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_author_social_icons_border_hover',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon:hover',
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

        $obj->add_control(
            'sup_author_social_icons_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_heading_pam',
            [
                'label' => __( 'Padding & Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $obj->add_responsive_control(
            'sup_author_social_icons_icon_margin',
            [
                'label' => __( 'Icon Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_social_icons_icon_padding',
            [
                'label' => __( 'Icon Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap .sup-author-social-icon' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_social_icons_wrap_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_responsive_control(
            'sup_author_social_icons_wrap_margin',
            [
                'label' => __( 'Wrap Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-author-social-icons-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $obj->add_control(
            'sup_author_social_icons_wrapper_alignment',
            [
                'label' => __( 'Alignment', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'uk-text-left' => [
                        'title' => __( 'Left', 'suprementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'uk-text-center' => [
                        'title' => __( 'Center', 'suprementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'uk-text-right' => [
                        'title' => __( 'Right', 'suprementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'uk-text-left',
                'toggle' => true,
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_author_social_icons_wrap_classes'][] = 'sup-author-social-icons-wrap-processed';
        ( empty( $settings['sup_author_social_icons_transition_opaque'] ) ) ?: $settings['sup_author_social_icons_wrap_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_author_social_icons_transition'] ) ) ?: $settings['sup_author_social_icons_wrap_classes'][] = $settings['sup_author_social_icons_transition'];
        ( empty( $settings['sup_author_social_icons_wrapper_alignment'] ) ) ?: $settings['sup_author_social_icons_wrap_classes'][] = $settings['sup_author_social_icons_wrapper_alignment'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        $settings = self::process( $settings );

        $usernames = [];

        if ( $settings['sup_author_source'] == 'loop' ) {

            $usernames['facebook'] = get_field( 'sup_author_facebook_username', 'user_' . get_the_author_meta( 'ID' ) );
            $usernames['twitter'] = get_field( 'sup_author_twitter_username', 'user_' . get_the_author_meta( 'ID' ) );
            $usernames['instagram'] = get_field( 'sup_author_instagram_username', 'user_' . get_the_author_meta( 'ID' ) );
            $usernames['linkedin'] = get_field( 'sup_author_linkedin_username', 'user_' . get_the_author_meta( 'ID' ) );
            $usernames['etsy'] = get_field( 'sup_author_etsy_username', 'user_' . get_the_author_meta( 'ID' ) );
            $usernames['behance'] = get_field( 'sup_author_behance_username', 'user_' . get_the_author_meta( 'ID' ) );

        }

        if ( $settings['sup_author_source'] == 'direct' ) {

            $usernames['facebook'] = get_field( 'sup_author_facebook_username', 'user_' . $settings['sup_author_source_author_id'] );
            $usernames['twitter'] = get_field( 'sup_author_twitter_username', 'user_' . $settings['sup_author_source_author_id'] );
            $usernames['instagram'] = get_field( 'sup_author_instagram_username', 'user_' . $settings['sup_author_source_author_id'] );
            $usernames['linkedin'] = get_field( 'sup_author_linkedin_username', 'user_' . $settings['sup_author_source_author_id'] );
            $usernames['etsy'] = get_field( 'sup_author_etsy_username', 'user_' . $settings['sup_author_source_author_id'] );
            $usernames['behance'] = get_field( 'sup_author_behance_username', 'user_' .  $settings['sup_author_source_author_id'] );

        }

        if ( ! empty( $settings['sup_author_social_icons_new_tab'] ) ) {

            $target = '_blank';

        } else {

            $target = '_self';

        }

        ?>

        <?php if (  !empty( $settings['sup_author_social_icons_show']) ) : ?>

            <?php if ( ! array_filter( $usernames ) ) : ?>

                <?php echo __( 'Set social usernames in Users > Profie.', 'suprementor' ); ?>

            <?php else : ?>

                <div class="sup-author-social-icons-wrap <?php echo esc_attr( implode( ' ', $settings['sup_author_social_icons_wrap_classes'] ) ); ?>">

                    <?php if ( ! empty( $usernames['facebook'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://facebook.com/' . $usernames['facebook'] ); ?>" uk-icon="icon: facebook; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                    <?php if ( ! empty( $usernames['twitter'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://twitter.com/' . $usernames['twitter'] ); ?>" uk-icon="icon: twitter; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                    <?php if ( ! empty( $usernames['instagram'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://instagram.com/' . $usernames['instagram'] ); ?>" uk-icon="icon: instagram; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                    <?php if ( ! empty( $usernames['linkedin'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://linkedin.com/in/' . $usernames['linkedin'] ); ?>" uk-icon="icon: linkedin; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                    <?php if ( ! empty( $usernames['etsy'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://etsy.com/shop/' . $usernames['etsy'] ); ?>" uk-icon="icon: etsy; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                    <?php if ( ! empty( $usernames['behance'] ) ) : ?>

                        <a target="<?php echo esc_attr( $target ); ?>" class="uk-display-inline-block sup-author-social-icon sup-transition-all sup-line-height-1" href="<?php echo esc_url( 'https://behance.net/' . $usernames['behance'] ); ?>" uk-icon="icon: behance; ratio: <?php echo $settings['sup_author_social_icons_size']['size']; ?>;"></a>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
