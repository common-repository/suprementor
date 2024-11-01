<?php

namespace Suprementor\Modules\Post_List\Widgets;

class Post_List extends \Elementor\Widget_Base {

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
        return 'sup_widget_post_list';
    }

    /**
    * Used internally to get the widgets title.
    */
    public function get_title() {
        return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post List',  'suprementor' );
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
        * CONTENT - HEADER
        */
        \Suprementor\Controls\Header::content( $this );

        /*
        * CONTENT - THUMBNAIL
        */
        \Suprementor\Controls\Post\Scale_Up_Thumbnail::content( $this );

        /*
        * CONTENT - TITLE
        */
        $title_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => '!in',
                    'value' => [
                        'news_card',
                        'news_list',
                        'news_cover',
                        'news_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Title::content( $this, $title_conditions );

        /*
        * CONTENT - CTI
        */
        $cti_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'news_card',
                        'news_list',
                        'news_cover',
                        'news_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Categories_Title_Inline::content( $this, $cti_conditions );

        /*
        * CONTENT - META INLINE
        */
        $meta_inline_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_card',
                        'smart_card_mini',
                        'smart_list',
                        'smart_cover',
                        'smart_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Meta_Inline::content( $this, $meta_inline_conditions );

        /*
        * CONTENT - EXCCERPT
        */
        $excerpt_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => '!in',
                    'value' => [
                        'smart_card_mini',
                        'bold_card_mini',
                        'news_card',
                        'news_list',
                        'news_cover',
                        'news_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Excerpt::content( $this, $excerpt_conditions );

        /*
        * CONTENT - CATEGORIES
        */
        $categories_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_card',
                        'bold_card_mini',
                        'bold_list',
                        'bold_cover',
                        'bold_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Categories::content( $this, $categories_conditions );

        /*
        * CONTENT - AUTHOR
        */
        $author_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_card',
                        'bold_list',
                        'bold_cover',
                        'bold_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Author::content( $this, $author_conditions );

        /*
        * CONTENT - DATE
        */
        $date_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_cover',
                        'bold_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Date::content( $this, $date_conditions );

        /*
        * CONTENT - DATE MINI
        */
        $date_mini_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'bold_card',
                        'bold_card_mini',
                        'bold_list',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Date_Mini::content( $this, $date_mini_conditions );

        /*
        * CONTENT - COVER
        */
        $cover_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_cover',
                        'smart_boxed_cover',
                        'bold_cover',
                        'bold_boxed_cover',
                        'news_cover',
                        'news_boxed_cover',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Cover::content( $this, $cover_conditions );

        /*
        * CONTENT - COLUMNS
        */
        $columns_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_list',
                        'bold_list',
                        'news_list',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Columns::content( $this, $columns_conditions );

        /*
        * CONTENT - BUTTON
        */
        $button_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_card',
                        'smart_list',
                        'bold_card',
                        'bold_list',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Post\Button::content( $this, $button_conditions );

        /*
        * SECTION - GET POSTS
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
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - HEADER
        */
        $header_conditions = [
            'terms' => [
                [
                    'name' => 'sup_header_show',
                    'operator' => '=',
                    'value' => 'yes'
                ]
            ]
        ];
        \Suprementor\Controls\Header::style( $this, $header_conditions );

        /*
        * STYLE - TITLE
        */
        \Suprementor\Controls\Post\Title::style( $this, $title_conditions );

        /*
        * STYLE - CTI
        */
        \Suprementor\Controls\Post\Categories_Title_Inline::style( $this, $cti_conditions );

        /*
        * STYLE - META INLINE
        */
        \Suprementor\Controls\Post\Meta_inline::style( $this, $meta_inline_conditions );

        /*
        * STYLE - EXCERPT
        */
        \Suprementor\Controls\Post\Excerpt::style( $this, $excerpt_conditions );

        /*
        * STYLE - CATEGORIES
        */
        \Suprementor\Controls\Post\Categories::style( $this, $categories_conditions );

        /*
        * STYLE - AUTHOR
        */
        \Suprementor\Controls\Post\Author::style( $this, $author_conditions );

        /*
        * STYLE - DATE
        */
        \Suprementor\Controls\Post\Date::style( $this, $date_conditions );

        /*
        * STYLE - DATE MINI
        */
        \Suprementor\Controls\Post\Date_mini::style( $this, $date_mini_conditions );

        /*
        * STYLE - COVER
        */
        \Suprementor\Controls\Cover::style( $this, $cover_conditions );

        /*
        * STYLE - ITEMS
        */
        $this->start_controls_section(
            'sup_style_items',
            [
                'label' => __( 'Items', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sup_post_list_item_wrap_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_list_item_inner_padding',
            [
                'label' => __( 'Item Inner Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_list_item_outer_padding',
            [
                'label' => __( 'Item Outer Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-outer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'sup_post_list_item_outer_margin',
            [
                'label' => __( 'Item Outer Margin', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => ['bottom'],
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-outer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_post_list_item_outer_background_color',
            [
                'label' => __( 'Outer Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-outer' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_list_item_wrap_background_color',
            [
                'label' => __( 'Wrap Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-list-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'sup_post_list_outer_box_shadow',
                'label' => __( 'Item Outer Box Shadow', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .sup-post-list-outer',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_list_outer_border',
                'label' => __( 'Item Outer Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-post-list-outer',
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - BUTTON
        */
        \Suprementor\Controls\Post\Button::style( $this, $button_conditions );

        /*
        * STYLE - WRAPPER
        */
        \Suprementor\Controls\Wrapper::style( $this );

        /*
        * Modify the controls to better fit the skin
        */
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

        // load upgrade skins
        do_action('suprementor-upgrade/modules/post-list/load-skins');

        // free skins
        $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Smart_List( $this ) );

        // upgrade skins, extends the included base skins
        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\Smart_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\Smart_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Smart_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\Smart_Boxed_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\Smart_Boxed_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Smart_Boxed_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\Bold_List') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\Bold_List( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Bold_List( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\Bold_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\Bold_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Bold_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\Bold_Boxed_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\Bold_Boxed_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\Bold_Boxed_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\News_List') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\News_List( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\News_List( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\News_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\News_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\News_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_List\Skins\News_Boxed_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_List\Skins\News_Boxed_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_List\Skins\News_Boxed_Cover( $this ) );
        }

    }

    /**
    * Adds classes and other stuff to the settings array.
    */
    public function sup_process_settings( $settings ) {

        $settings['sup_post_categories_position_classes'][] = 'sup-post-categories-position-processed';
        ( empty( $settings['sup_post_categories_position'] ) ) ?: $settings['sup_post_categories_position_classes'][] = $settings['sup_post_categories_position'];

        return $settings;

    }

    /**
    * Change any global controls used in the widgets.
    */
    public function sup_update_controls() {

        $this->update_control(
            '_skin',
            [
                'label_block' => true,
                'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_LIST', 'post-list'),
            ]
        );

    }

}
