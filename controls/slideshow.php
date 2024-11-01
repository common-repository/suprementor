<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Slideshow {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_slideshow',
            [
                'label' => __( 'Slideshow', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_slideshow_animation',
            [
                'label' => __( 'Animation', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade',
                'options' =>  \Suprementor\Helpers\UIkit::slideshow_animation()
            ]
        );

        $obj->add_control(
            'sup_slideshow_ratio',
            [
                'label' => __( 'Ratio', 'suprementor' ),
                'description' => __( 'Generally you should enter the image dimensions here the same as the image selected above in the format [width]:[height] (1280:720). Other common ratios include 4:3, 16:9, 1:1.', 'pap' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '16:9', 'suprementor' ),
                'placeholder' => __( '16:9', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_slideshow_autoplay',
            [
                'label' => __( 'Autoplay', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->add_control(
            'sup_slideshow_autoplay_interval',
            [
                'label' => __( 'Autoplay Interval', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 5,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slideshow_autoplay',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $obj->add_control(
            'sup_slideshow_autoplay_pause_on_hover',
            [
                'label' => __( 'Pause on Hover', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'sup_slideshow_autoplay',
                            'operator' => '=',
                            'value' => 'yes',
                        ]
                    ]
                ]
            ]
        );

        $obj->add_responsive_control(
            'sup_slideshow_min_height',
            [
                'label' => __( 'Min Height', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 450,
                ],
                'selectors' => [
                    '{{WRAPPER}} .uk-slideshow-items' => 'min-height: {{SIZE}}{{UNIT}} !important;',
                ],
                // 'selectors' => [
                //     '{{WRAPPER}} .sup-slideshow-nav-vertical, {{WRAPPER}} .uk-slideshow-items' => 'min-height: {{SIZE}}{{UNIT}} !important;',
                // ],
            ]
        );

        $obj->add_control(
            'sup_slideshow_kenburns',
            [
                'label' => __( 'Use Kenburns', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  GET CONTROL SETTINGS INDEPENDENT FROM THE RENDER
    */
    public static function process( $settings ) {

        $settings['sup_slideshow_atts'] = '';

        if (  ! empty( $settings['sup_slideshow_animation'] ) ) {

            $settings['sup_slideshow_atts'] .= 'animation: ' . $settings['sup_slideshow_animation'] . ';';

        }

        if (  ! empty( $settings['sup_slideshow_ratio'] ) ) {

            $settings['sup_slideshow_atts'] .= 'ratio: ' . $settings['sup_slideshow_ratio'] . ';';

        }

        if (  ! empty( $settings['sup_slideshow_autoplay'] ) ) {

            $settings['sup_slideshow_atts'] .= 'autoplay: true;';
            $settings['sup_slideshow_atts'] .= 'autoplay-interval: ' . absint($settings['sup_slideshow_autoplay_interval']) * 1000 . ';';

            if (  ! empty( $settings['sup_slideshow_autoplay_pause_on_hover'] ) ) {

                $settings['sup_slideshow_atts'] .= 'pause-on-hover: true;';

            } else {

                $settings['sup_slideshow_atts'] .= 'pause-on-hover: false;';

            }

        }

        if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {

            $settings['sup_slideshow_atts'] .= 'draggable: false;';

        }

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render() {

        // this control requires the render output to be built in the skins

        return;

    }

}
