<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Columns {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_columns',
            [
                'label' => __( 'Columns', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_columns_first_column_width_desktop',
            [
                'label' => __( 'First Column Desktop', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@m',
                'options' => \Suprementor\Helpers\UIkit::width_m(),
            ]
        );

        $obj->add_control(
            'sup_columns_first_column_width_tablet',
            [
                'label' => __( 'First Column Tablet', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@s',
                'options' => \Suprementor\Helpers\UIkit::width_s(),
            ]
        );

        $obj->add_control(
            'sup_columns_first_column_width_mobile',
            [
                'label' => __( 'First Column Mobile', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4',
                'options' => \Suprementor\Helpers\UIkit::width(),
            ]
        );

        $obj->add_responsive_control(
            'sup_columns_column_min_height',
            [
                'label' => __( 'Column Min Height', 'suprementor' ),
                'description' => __( 'Widgets that use covers will need a larger value to ensure they display correctly on mobiles.', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sup-columns-first-column, {{WRAPPER}} .sup-columns-second-column' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  OPEN & CLOSE COLUMNS
    */
    public static function open( $settings = [], $classes = [] ) {

        $classes[] = 'sup-columns';
        $classes[] = 'uk-grid-collapse';

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '" uk-grid>';

    }

    public static function first_column( $settings = [], $classes = [] ) {

        $classes[] = 'sup-columns-first-column';
        $classes[] = $settings['sup_columns_first_column_width_mobile'];
        $classes[] = $settings['sup_columns_first_column_width_tablet'];
        $classes[] = $settings['sup_columns_first_column_width_desktop'];

        echo '<div class="' . esc_attr( implode(' ', $classes ) ) . '">';

    }

    public static function first_column_close() {

        echo '</div>';

    }

    public static function second_column() {

        echo '<div class="sup-columns-second-column uk-width-expand">';

    }

    public static function second_column_close() {

        echo '</div>';

    }

    public static function close() {

        echo '</div>';

    }

}
