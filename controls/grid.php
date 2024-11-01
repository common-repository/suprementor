<?php

namespace Suprementor\Controls;

if ( ! defined( 'ABSPATH' ) ) exit;

class Grid {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_grid',
            [
                'label' => __( 'Grid', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_grid_desktop',
            [
                'label' => __( 'Columns Desktop', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@m',
                'options' => \Suprementor\Helpers\UIkit::columns_desktop(),
            ]
        );

        $obj->add_control(
            'sup_grid_tablet',
            [
                'label' => __( 'Columns Tablet', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4@s',
                'options' => \Suprementor\Helpers\UIkit::columns_tablet(),
            ]
        );

        $obj->add_control(
            'sup_grid_mobile',
            [
                'label' => __( 'Columns Mobile', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-width-1-4',
                'options' => \Suprementor\Helpers\UIkit::columns_mobile(),
            ]
        );

        $obj->add_control(
            'sup_grid_gap',
            [
                'label' => __( 'Gap', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-grid-medium',
                'options' => \Suprementor\Helpers\UIkit::grid(),
            ]
        );

        $obj->end_controls_section();

    }

}
