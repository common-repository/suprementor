<?php

namespace Suprementor\Modules\Post_Comments\Widgets;

class Post_Comments extends \Elementor\Widget_Base {

    /*
    * Used internally to get the widgets name.
    */
    public function get_name() {
        return 'sup_widget_post_comments';
    }

    /*
    * Used internally to get the widgets title.
    */
    public function get_title() {
        return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Comments',  'suprementor' );
    }

    /*
    * Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
    */
    public function get_icon() {
        return 'eicon-single-post';
    }

    /*
    * Register the widgets controls
    */
    protected function _register_controls() {

        /*
        * CONTENT - SKIN
        */
        // $this->start_controls_section(
        //     'sup_skin',
        //     [
        //         'label' => __( 'Skin', 'suprementor' ),
        //         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        //     ]
        // );
        //
        // $this->end_controls_section();

        /*
        * CONTENT - MESSAGES
        */
        $this->start_controls_section(
            'sup_content_post_comments_messages',
            [
                'label' => __( 'Messages', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_send',
            [
                'label' => __( 'Send', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Send', 'suprementor' ),
                'placeholder' => __( 'Send', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_cancel',
            [
                'label' => __( 'Cancel', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Cancel Reply', 'suprementor' ),
                'placeholder' => __( 'Cancel Reply', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_discuss',
            [
                'label' => __( 'Discuss', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Leave a Comment', 'suprementor' ),
                'placeholder' => __( 'Leave a Comment', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_reply',
            [
                'label' => __( 'Reply', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Reply', 'suprementor' ),
                'placeholder' => __( 'Reply', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_author',
            [
                'label' => __( 'Author', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Name', 'suprementor' ),
                'placeholder' => __( 'Name', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_email',
            [
                'label' => __( 'Email', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Email', 'suprementor' ),
                'placeholder' => __( 'Email', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_body',
            [
                'label' => __( 'Body', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Comment', 'suprementor' ),
                'placeholder' => __( 'Comment', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_url',
            [
                'label' => __( 'URL', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Website', 'suprementor' ),
                'placeholder' => __( 'Website', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_cookies',
            [
                'label' => __( 'Cookies', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'By commenting you accept the', 'suprementor' ),
                'placeholder' => __( 'By commenting you accept the', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_privacy',
            [
                'label' => __( 'Privacy Policy', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Privacy Policy', 'suprementor' ),
                'placeholder' => __( 'Privacy', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_closed',
            [
                'label' => __( 'Closed', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Comments are closed.', 'suprementor' ),
                'placeholder' => __( 'Comments are closed.', 'suprementor' ),
            ]
        );


        $this->add_control(
            'sup_content_post_comments_message_before',
            [
                'label' => __( 'Registration', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'No registration required.', 'suprementor' ),
                'placeholder' => __( 'No registration required.', 'suprementor' ),
            ]
        );

        $this->add_control(
            'sup_content_post_comments_message_reply_to',
            [
                'label' => __( 'Reply To', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'in repy to', 'suprementor' ),
                'placeholder' => __( 'in reply to', 'suprementor' ),
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - HEADER
        */
        $this->start_controls_section(
            'sup_style_post_comemnts_header',
            [
                'label' => __( 'Header', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_header_number_typography',
                'label' => __( 'Number Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comments-number',
            ]
        );

        $this->add_control(
            'sup_post_comments_header_number_color',
            [
                'label' => __( 'Number Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comments-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_header_title_typography',
                'label' => __( 'Title Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comments-title',
            ]
        );

        $this->add_control(
            'sup_post_comments_header_title_color',
            [
                'label' => __( 'Title Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comments-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_header_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comments-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_header_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comments-header' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_comments_header_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comments-header',
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - COMMENT
        */
        $this->start_controls_section(
            'sup_style_post_comments_comment',
            [
                'label' => __( 'Comment', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_comment_author_typography',
                'label' => __( 'Author Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-author',
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_author_color',
            [
                'label' => __( 'Author Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-author' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_author_padding',
            [
                'label' => __( 'Author Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_comment_date_typography',
                'label' => __( 'Date Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-date time',
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_date_color',
            [
                'label' => __( 'Date Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-date time' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_date_padding',
            [
                'label' => __( 'Date Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_comment_text_typography',
                'label' => __( 'Text Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-text-wrap',
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_text_color',
            [
                'label' => __( 'Text Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-text-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_text_padding',
            [
                'label' => __( 'Text Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-text-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_background_color',
            [
                'label' => __( 'Wrap Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_wrap_padding',
            [
                'label' => __( 'Wrap Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-wrap, {{WRAPPER}} .must-log-in' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_reply_background_color',
            [
                'label' => __( 'Reply Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-wrap-reply' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_reply_padding',
            [
                'label' => __( 'Reply Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'horizontal',
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-reply' => 'padding-left: {{LEFT}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_comment_link_typography',
                'label' => __( 'Link Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-link a',
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_link_color',
            [
                'label' => __( 'Link Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-link a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_comment_link_hover_color',
            [
                'label' => __( 'Link Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-link a:hover, {{WRAPPER}} .sup-comment-link a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_comments_comment_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-wrap',
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - FORM
        */
        $this->start_controls_section(
            'sup_style_post_comments_form',
            [
                'label' => __( 'Form', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_post_comments_form_background_color',
            [
                'label' => __( 'Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .comment-form' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_form_padding',
            [
                'label' => __( 'Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .comment-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - REPLY
        */
        $this->start_controls_section(
            'sup_style_post_comments_reply',
            [
                'label' => __( 'Reply', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_reply_title_typography',
                'label' => __( 'Title Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-reply-title',
            ]
        );

        $this->add_control(
            'sup_post_comments_reply_title_color',
            [
                'label' => __( 'Title Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-reply-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_reply_title_background_color',
            [
                'label' => __( 'Title Background Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-reply-title' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_reply_title_padding',
            [
                'label' => __( 'Title Padding', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-reply-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sup_post_comments_cancel_typography',
                'label' => __( 'Cancel Typography', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-cancel-reply-title a',
            ]
        );

        $this->add_control(
            'sup_post_comments_cancel_color',
            [
                'label' => __( 'Cancel Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-cancel-reply-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_cancel_hover_color',
            [
                'label' => __( 'Cancel Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-comment-cancel-reply-title a:hover, {{WRAPPER}} .sup-comment-cancel-reply-title a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'sup_post_comments_reply_title_border',
                'label' => __( 'Border', 'suprementor' ),
                'selector' => '{{WRAPPER}} .sup-comment-reply-title',
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - NEXT PREV
        */
        $this->start_controls_section(
            'sup_style_post_comments_next_prev',
            [
                'label' => __( 'Next Previous', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sup_post_comments_np_icon_color',
            [
                'label' => __( 'Icon Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-commments-next-prev a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_np_icon_hover_color',
            [
                'label' => __( 'Icon Hover Color', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sup-post-commments-next-prev a:hover, {{WRAPPER}} .sup-post-commments-next-prev a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sup_post_comments_np_icon_size',
            [
                'label' => __( 'Icon Size', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
            ]
        );

        $this->end_controls_section();

        /*
        * STYLE - WRAPPER
        */
        \Suprementor\Controls\Wrapper::style( $this );

        /*
        * Modify the controls to better fit the skin
        */
        $this->sup_update_controls();
    }

    /*
    * Setting this removes the default skin select option.
    */
    protected $_has_template_content = false;

    /*
    * Adds the skins to the widget Skin select (first control section).
    */
    protected function _register_skins() {

        // load upgrade skins to add later
        do_action('suprementor-upgrade/modules/post-comments/load-skins');

        // upgrade skins, extends the included base skins
        if ( class_exists( '\Suprementor_Upgrade\Post_Comments\Skins\Smart' ) ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Comments\Skins\Smart( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Comments\Skins\Smart( $this ) );
        }

    }

    /*
    * Adds classes and other stuff to the settings array.
    */
    public function sup_process_settings( $settings ) {

        $settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
        $settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

        return $settings;

    }

    /**
    * Adds classes and other stuff to the settings array.
    */
    public function sup_get_settings( $settings ) {

        $settings = $this->sup_process_settings( $this->get_settings_for_display() );

        return $settings;

    }

    /**
    * Update any global controls used in the widgets.
    */
    public function sup_update_controls() {

        $this->update_control(
            '_skin',
            [
                'label_block' => true,
                'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_COMMENTS', 'post-comments'),
            ]
        );

    }

    /**
    * Adds classes and other stuff to the settings array.
    */
    public function sup_comment_form( $settings ) {

        $settings = $this->sup_process_settings( $this->get_settings_for_display() );

        return $settings;

    }

}
