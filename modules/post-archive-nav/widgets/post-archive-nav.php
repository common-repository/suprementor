<?php

/**
* Post Box Widget.
*/

namespace Suprementor\Modules\Post_Archive_Nav\Widgets;

class Post_Archive_Nav extends \Elementor\Widget_Base {

    /**
    * Used internally to get the widgets categories.
    */
    public function get_categories() {
        return [ 'suprementor' ];
    }

    /**
    * Used internally to get the widgets name.
    */
    public function get_name() {
        return 'sup_widget_post_archive_nav';
    }

    /**
    * Used internally to get the widgets title.
    */
    public function get_title() {
        return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Archive Nav',  'suprementor' );
    }

    /**
    * Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
    */
    public function get_icon() {
        return 'eicon-single-post';
    }

    /**
    * Register the widgets controls
    */
    protected function _register_controls() {

        /*
        * CONTENT
        */

        $this->start_controls_section(
            'sup_content_post_archive_nav',
            [
                'label' => __( 'Navigation', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sup_content_post_archive_nav_show',
            [
                'label' => __( 'Show Navigation', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_text_show',
            [
                'label' => __( 'Show Text', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_buttons',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_icons_show',
            [
                'label' => __( 'Show Icons', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_buttons',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_post_archive_next_text',
            [
                'label' => __( 'Next Text', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Next Page', 'suprementor' ),
                'placeholder' => __( 'Type your text here', 'suprementor' ),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_buttons',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_post_archive_previous_text',
            [
                'label' => __( 'Previous Text', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Previous Page', 'suprementor' ),
                'placeholder' => __( 'Type your text here', 'suprementor' ),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_buttons',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - BUTTONS
        */

        $this->start_controls_section(
            'sup_style_post_archive_nav_button',
            [
                'label' => __( 'Buttons', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_buttons',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_archive_nav_button_typography',
                'label' => __( 'Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button',
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_button_padding_next',
            [
                'label' => __( 'Next Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-next-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_button_padding_prev',
            [
                'label' => __( 'Prev Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-prev-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_button_margin',
            [
                'label' => __( 'Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-button-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_button_border_radius',
            [
                'label' => __( 'Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'sup_post_archive_nav_button_tabs',
        );

        $this->start_controls_tab(
            'sup_post_archive_nav_button_normal_tab',
            [
                'label' => __( 'Normal', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_button_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_button_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_archive_nav_button_hover_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'sup_post_archive_nav_button_hover_tab',
            [
                'label' => __( 'Hover', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_button_hover_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_button_hover_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_archive_nav_button_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-button:hover',
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - ICONS
        */

        $this->start_controls_section(
            'sup_style_post_archive_nav_icon',
            [
                'label' => __( 'Icons', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_post_archive_nav_icons_size',
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

        $this->add_responsive_control(
            'sup_post_archive_nav_icons_next_padding',
            [
                'label' => __( 'Next Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-archive-nav-icon-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_icons_next_margin',
            [
                'label' => __( 'Next Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-archive-nav-icon-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_icons_previous_padding',
            [
                'label' => __( 'Previous Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-archive-nav-icon-previous' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_archive_nav_icons_previous_margin',
            [
                'label' => __( 'Previous Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-archive-nav-icon-previous' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        \Suprementor\Controls\Wrapper::style( $this );


    }

    /**
    * Setting this removes the default skin select option.
    */
    protected $_has_template_content = false;

    /**
    * Adds the skins to the widget Skin select (first control section).
    */
    protected function _register_skins() {

        $this->add_skin( new \Suprementor\Modules\Post_Archive_Nav\Skins\Smart_Buttons( $this ) );

    }

    /**
    * Adds classes and other stuff to the settings array.
    */
    public function process_settings( $settings ) {

        $settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
        $settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

        $settings['sup_post_archive_nav_slidenav_wrap_outer_classes'][] = 'sup-post-archive-nav-slidenav-wrap-outer-processed';
        ( empty( $settings['sup_post_archive_nav_slidenav_wrap_alignment'] ) ) ?: $settings['sup_post_archive_nav_slidenav_wrap_outer_classes'][] = $settings['sup_post_archive_nav_slidenav_wrap_alignment'];

        return $settings;

    }

}
