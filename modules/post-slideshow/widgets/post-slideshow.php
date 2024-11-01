<?php

namespace Suprementor\Modules\Post_Slideshow\Widgets;

class Post_Slideshow extends \Elementor\Widget_Base {

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
        return 'sup_widget_post_slideshow';
    }

    /**
    * Used internally to get the widgets title.
    */
    public function get_title() {
        return \Suprementor\Helpers\General::widget_prefix() . __(  'Post Slideshow',  'suprementor' );
    }

    /**
    * Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
    */
    public function get_icon() {
        return 'fa fa-code';
    }

    /**
    * Register the widgets controls
    */
    protected function _register_controls() {

        /*
        * CONTENT - SKIN
        */
        $this->start_controls_section(
            'sup_skin',
            [
                'label' => __( 'Skin', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();

        /*
        * CONTENT - GET POSTS
        */
        $this->start_controls_section(
            'sup_content_get_posts',
            [
                'label' => __( 'Get Posts', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            \Suprementor\Group_Controls\Get_Posts::get_type(),
            [
                'name' => 'sup_get_posts',
                'label' => __( 'Get Posts', 'suprementor' ),
            ]
        );

        $this->end_controls_section();

        /*
        * CONTENT - SLIDESHOW
        */

        \Suprementor\Controls\Slideshow::content( $this );

        $this->start_controls_section(
            'sup_content_slideshow_extra',
            [
                'label' => __( 'Slideshow Extra', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'news_bottom',
                                'news_overlay',
                                'smart_bottom',
                                'smart_overlay',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slideshow_extra_as_single',
            [
                'label' => __( 'Single Items', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $this->end_controls_section();

        /*
        * CONTENT - RESPONSIVE THUMBNAIL
        */
        \Suprementor\Controls\Post\Responsive_Thumbnail::content( $this );

        /*
        * CONTENT - SLIDESHOW NAV
        */

        $this->start_controls_section(
            'sup_content_slideshow_nav',
            [
                'label' => __( 'Slideshow Nav', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_overlay_vertical',
                                'news_overlay_vertical',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_slideshow_nav_width',
            [
                'label' => __( 'Width', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-2@s',
                'options' =>  \Suprementor\Helpers\UIkit::width_s(),
            ]
        );

        $this->add_control(
            'sup_slideshow_nav_position',
            [
                'label' => __( 'Position', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-position-left',
                'options' =>  [
                    'uk-position-left' => __( 'Left', 'suprementor' ),
                    'uk-position-right' => __( 'Right', 'suprementor' ),
                ],

            ]
        );

        $this->end_controls_section();

        /*
        * CONTENT - SLIDENAV
        */
        \Suprementor\Controls\Slidenav::content( $this );

        /*
        * CONTENT - TITLE
        */
        $title_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => '!in',
                    'value' => [
                        'news_bottom',
                        'news_overlay',
                        'news_overlay_vertical',
                    ]
                ]
            ]
        ];
        \Suprementor\Controls\Post\Title::content( $this, $title_conditions );

        /*
        * CONTENT - META INLINE
        */
        $meta_inline_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_bottom',
                        'smart_overlay',
                        'smart_overlay_vertical',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Meta_Inline::content( $this, $meta_inline_conditions );

        /*
        * CONTENT - CATEGORY TITLE INLINE
        */
        $cti_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'news_bottom',
                        'news_overlay',
                        'news_overlay_vertical',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Categories_Title_Inline::content( $this, $cti_conditions );

        /*
        * CONTENT - DATE
        */
        $date_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_bottom',
                        'bold_overlay',
                        'bold_overlay_vertical',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Date::content( $this, $date_conditions );

        /*
        * CONTENT - CATEGORIES
        */
        $categories_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_bottom',
                        'bold_overlay',
                        'bold_overlay_vertical',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Categories::content( $this, $categories_conditions );

        /*
        * CONTENT - EXCERPT
        */
        \Suprementor\Controls\Post\Excerpt::content( $this );

        /*
        * STYLE - SLIDESHOW NAV
        */
        $this->start_controls_section(
            'sup_style_slideshow_nav',
            [
                'label' => __( 'Slideshow Nav', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_slideshow_nav_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_slideshow_nav_item_padding',
            [
                'label' => __( 'Item Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_slideshow_nav_item_margin',
            [
                'label' => __( 'Item Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_slideshow_nav_item_border_radius',
            [
                'label' => __( 'Item Border Radius', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_slideshow_nav_margin',
            [
                'label' => __( 'Nav Wrap Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - SLIDENAV
        */
        \Suprementor\Controls\Slidenav::style( $this );

        /*
        * STYLE - TITLE
        */
        \Suprementor\Controls\Post\Title::style( $this, $title_conditions );

        /*
        * STYLE - META INLINE
        */
        \Suprementor\Controls\Post\Meta_Inline::style( $this, $meta_inline_conditions );

        /*
        * STYLE - CATEGORY TITLE INLINE
        */
        \Suprementor\Controls\Post\Categories_Title_Inline::style( $this, $cti_conditions );

        /*
        * STYLE - CATEGORIES
        */
        \Suprementor\Controls\Post\Categories::style( $this, $categories_conditions );

        /*
        * STYLE - EXCERPT
        */
        \Suprementor\Controls\Post\Excerpt::style( $this );

        /*
        * STYLE - DATE
        */
        \Suprementor\Controls\Post\Date::style( $this, $date_conditions );

        /*
        * STYLE WHEN ACTIVE
        */
        $this->start_controls_section(
            'sup_style_when_active',
            [
                'label' => __( 'When Active', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_slideshow_nav_active_background_color',
            [
                'label' => __( 'Active Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active, {{WRAPPER}} .sup-slideshow-nav-item:hover' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        /*
        * STYLE WHEN ACTIVE - Title
        */

        $this->add_control(
            'sup_style_when_active_title',
            [
                'label' => __( 'Title', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_title_active_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-title-wrap a,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-title-wrap a' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_title_active_hover_color',
            [
                'label' => __( 'Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-title-wrap a:hover,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-title-wrap a:focus' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        /*
        * STYLE WHEN ACTIVE - META INLINE
        */

        $this->add_control(
            'sup_style_when_active_meta_inline',
            [
                'label' => __( 'Meta Inline', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_meta_inline_active_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-meta-inline,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-meta-inline' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_meta_inline_actvie_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-meta-inline a,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-meta-inline a' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_meta_inline_active_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-meta-inline a:hover,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-meta-inline a:focus' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'smart_bottom',
                                'smart_overlay',
                                'smart_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        /*
        * STYLE WHEN ACTIVE - CATEGORY TITLE INLINE
        */

        $this->add_control(
            'sup_style_when_active_categories_title_inline',
            [
                'label' => __( 'Categories & Title Inline', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'news_bottom',
                                'news_overlay',
                                'news_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_category_title_inline_active_category_color',
            [
                'label' => __( 'Category Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-categories a,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-separator,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-cti-wrap .sup-cti-categories a,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-cti-wrap .sup-cti-separator' => 'color: {{VALUE}} !important;',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'news_bottom',
                                'news_overlay',
                                'news_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_category_title_inline_active_category_hover_color',
            [
                'label' => __( 'Category Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-categories a:hover,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-categories a:focus' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'news_bottom',
                                'news_overlay',
                                'news_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_category_title_inline_active_title_color',
            [
                'label' => __( 'Title Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-post-title a,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-cti-post-title a' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'news_bottom',
                                'news_overlay',
                                'news_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_category_title_inline_active_title_hover_color',
            [
                'label' => __( 'Title Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-post-title a:hover,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-cti-post-title a:focus' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'news_bottom',
                                'news_overlay',
                                'news_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        /*
        * STYLE WHEN ACTIVE - CATEGORIES
        */
        $this->add_control(
            'sup_style_when_active_categories',
            [
                'label' => __( 'Categories', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_categories_when_active_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-categories-wrap,
                    {{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-categories-wrap a,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-categories-wrap,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-categories-wrap a' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_categories_when_active_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-categories-wrap a:hover' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_categories_when_active_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-categories-wrap,
                    {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-categories-wrap' => 'background-color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        /*
        * STYLE WHEN ACTIVE - DATE
        */
        $this->add_control(
            'sup_style_when_active_date',
            [
                'label' => __( 'Date', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_date_when_active_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-date-wrap, {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-date-wrap' => 'color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'sup_date_when_active_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-date-wrap, {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-date-wrap' => 'background-color: {{VALUE}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => '_skin',
                            'operator' => 'in',
                            'value' => [
                                'bold_bottom',
                                'bold_overlay',
                                'bold_overlay_vertical',
                            ]
                        ]
                    ]
                ]
            ]
        );

        /*
        * STYLE WHEN ACTIVE - EXCERPT
        */
        $this->add_control(
            'sup_style_when_active_excerpt',
            [
                'label' => __( 'Excerpt', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sup_excerpt_when_active_color',
            [
                'label' => __( 'Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-slideshow-nav-item.uk-active .sup-post-excerpt-wrap, {{WRAPPER}} .sup-slideshow-nav-item:hover .sup-post-excerpt-wrap' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - WRAPPER
        */
        \Suprementor\Controls\Wrapper::style( $this );

        $this->sup_update_controls();

    }

    /**
    * Setting this removes the default skin select option.
    */
    protected $_has_template_content = false;

    /**
    * Adds the skins to the widget Skin select (first control section).
    */
    protected function _register_skins() {

        // load upgrade skins to add later
        do_action('suprementor-upgrade/modules/post-slideshow/load-skins');

        // free skins
        $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Smart_Bottom( $this ) );
        $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Smart_Overlay_Vertical( $this ) );

        // upgrade skins, extends the included base skins
        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\Smart_Overlay') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\Smart_Overlay( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Smart_Overlay( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\News_Bottom') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\News_Bottom( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\News_Bottom( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\News_Overlay') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\News_Overlay( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\News_Overlay( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\News_Overlay_Vertical') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\News_Overlay_Vertical( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\News_Overlay_Vertical( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Bottom') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Bottom( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Bold_Bottom( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Overlay') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Overlay( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Bold_Overlay( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Overlay_Vertical') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Slideshow\Skins\Bold_Overlay_Vertical( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Slideshow\Skins\Bold_Overlay_Vertical( $this ) );
        }

    }

    /**
    * Adds classes and other stuff to the settings array.
    */
    public function sup_process_settings($settings) {

        $settings['sup_wrapper_classes'][] = 'sup-visible-toggle';
        ( empty( $settings['sup_slideshow_as_single'] ) ) ?: $settings['sup_wrapper_classes'][] = 'sup-as-single';

        $settings['sup_slideshow_nav_vertical_classes'][] = 'sup-slideshownav-vertical-processed';
        // $settings['sup_slideshow_nav_vertical_classes'][] = 'uk-width-1-1';
        ( empty( $settings['sup_slideshow_nav_width'] ) ) ?: $settings['sup_slideshow_nav_vertical_classes'][] = $settings['sup_slideshow_nav_width'];
        ( empty( $settings['sup_slideshow_nav_position'] ) ) ?: $settings['sup_slideshow_nav_vertical_classes'][] = $settings['sup_slideshow_nav_position'];

        $settings['sup_slideshow_image_wrap_classes'][] = 'sup-slideshow-thumbnail-wrap-processed';
        ( empty( $settings['sup_slideshow_kenburns'] ) ) ?: $settings['sup_slideshow_image_wrap_classes'][] = 'uk-animation-kenburns';

        /*
        * Build slideshow attribute string based on settings
        */
        $settings = \Suprementor\Controls\Slideshow::process( $settings );

        return $settings;

    }

    /**
    * Update any global controls used in the widgets.
    */
    public function sup_update_controls() {

        $this->update_control(
            '_skin',
            [
                'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_SLIDESHOW', 'post-slideshow'),
            ]
        );

    }

}
