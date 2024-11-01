<?php

namespace Suprementor\Controls\Author;

if ( ! defined( 'ABSPATH' ) ) exit;

class Source {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_author_source',
            [
                'label' => __( 'Get Author', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_author_source',
            [
                'label' => __( 'Source', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'direct',
                'options' => [
                    'loop'  => __( 'Current Author', 'suprementor' ),
                    'direct' => __( 'Specific Author', 'suprementor' ),
                ],
            ]
        );

        $obj->add_control(
            'sup_author_source_author_id',
            [
                'label' => __( 'Author', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => \Suprementor\Helpers\General::get_author_options(),
                'condition' => [
                    'sup_author_source' => 'direct'
                ],
            ]
        );

        $obj->end_controls_section();

    }

}
