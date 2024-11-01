<?php

namespace Suprementor\Group_Controls;

class Get_Post extends \Elementor\Group_Control_Base {

    /**
    * Fields.
    *
    * Holds all the control fields.
    *
    * @since 1.0.0
    */
    protected static $fields;

    /**
    * Get Type
    * @since 1.0.0
    */
    public static function get_type() {
        return 'sup_group_controls_get_post';
    }

    /**
    * Init Fields
    * @since 1.0.0
    */
    protected function init_fields() {

        $args = $this->get_args();

        $fields = [];

        $post_options = \Suprementor\Helpers\General::get_post_options();

        $fields['source'] = [
            'label'         => __( 'Source', 'suprementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'single' => __( 'Direct', 'suprementor' ),
                'query' => __( 'Query', 'suprementor' ),
                'related' => __( 'Related', 'suprementor' ),
                'loop' => __( 'Current Post', 'suprementor' ),
            ],
            'default'       => 'query',
            'label_block'   => false,
            'export'        => false,
        ];

        $fields['exclude_current'] = [
            'label' => __( 'Exclude Current', 'suprementor' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'suprementor' ),
            'label_off' => __( 'No', 'suprementor' ),
            'return_value' => 'yes',
            'default' => false,
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
        ];

        $fields['post_id'] = [
            'label'     => __( 'Post', 'suprementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'options'   => $post_options,
            // 'select2options' => [
            //     'minimumInputLength' => 3,
            // ],
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'single',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => false,
            'export'        => false,
        ];

        $fields['restrict_categories'] = [
            'label'     => __( 'Restrict Categories', 'suprementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_post_categoy_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['restrict_tags'] = [
            'label'     => __( 'Restrict Tags', 'suprementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_post_tag_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['restrict_authors'] = [
            'label'     => __( 'Restrict Authors', 'suprementor' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'default'   => [],
            'options'   => \Suprementor\Helpers\General::get_author_options(),
            'conditions' => [
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ]
                ]
            ],
            'label_block'   => true,
            'multiple'      => true,
            'export'        => false,
        ];

        $fields['offset'] = [
            'label'         => __( 'Offset', 'suprementor' ),
            'type'          => \Elementor\Controls_Manager::NUMBER,
            'min'           => 0,
            'max'           => 200,
            'step'          => 1,
            'default'       => 0,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'related',
                    ]
                ]
            ]
        ];

        $fields['orderby'] = [
            'label'         => __( 'Order By', 'suprementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'date'          => __( 'Date', 'suprementor' ),
                'name'          => __( 'Name', 'suprementor' ),
                'comment_count' => __( 'Comment Count', 'suprementor' ),
                'modified'      => __( 'Last Modified', 'suprementor' ),
                'random'        => __( 'Random', 'suprementor' ),
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'group',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'related',
                    ]
                ]
            ],
            'default'       => 'date',
            'label_block'   => false,
            'export'        => false,
        ];

        $fields['order'] = [
            'label'         => __( 'Order', 'suprementor' ),
            'type'          => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'asc'             => __( 'Ascending', 'suprementor' ),
                'desc'          => __( 'Descending', 'suprementor' ),
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'query',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'group',
                    ],
                    [
                        'name'      => 'source',
                        'operator'  => '=',
                        'value'     => 'related',
                    ]
                ]
            ],
            'default'       => 'desc',
            'label_block'   => false,
            'export'        => false,
        ];

        return $fields;

    }

    /**
    * Get default options.
    *
    * @since 1.0.0
    * @access protected
    *
    * @return array Default image size control options.
    */
    protected function get_default_options() {

        $args = $this->get_args();

        if ( !empty($args['popover']) ) {

            $return['popover'] = [
                'starter_name' => self::get_type(),
                'settings' => [
                    'render_type' => 'ui',
                ],
            ];

        } else {

            $return['popover'] = false;

        }

        return $return;
    }

    /**
    * Process Control.
    * @since 1.0.0
    * @access protected
    *
    * @return array Array of post IDs or empty if no posts found.
    */
    public static function get_id( $settings, $control_name ) {

        if ( empty( $settings[ $control_name . '_source'] ) ) {

            return [];

        }

        // get the loop post
        if ( $settings[$control_name . '_source'] == 'loop' ) {

            return get_the_ID();

        }

        // get a single post by ID
        if ( $settings[$control_name . '_source'] == 'single' ) {

            if ( ! is_numeric( $settings[$control_name . '_post_id'] ) ) {
                return [];
            }

            return $settings[$control_name . '_post_id'];

        }

        // get a group of posts by IDs
        if ( $settings[$control_name . '_source'] == 'query' ) {

            $args = [
                'post_type' => 'post',
                'fields' => 'ids',
                'order' => $settings[$control_name . '_order'],
                'orderby' => $settings[$control_name . '_orderby'],
                'posts_per_page' => 1,
                'offset' => $settings[$control_name . '_offset'],
            ];

            if ( ! empty( $settings[$control_name . '_restrict_categories'] ) ) {
                $args['category__in'] = $settings[$control_name . '_restrict_categories'];
            }

            if ( ! empty( $settings[$control_name . '_restrict_tags'] ) ) {
                $args['tag__in'] = $settings[$control_name . '_restrict_tags'];
            }

            if ( ! empty( $settings[$control_name . '_restrict_authors'] ) ) {
                $args['author__in'] = $settings[$control_name . '_restrict_authors'];
            }

            if ( ! empty( $settings[$control_name . '_exclude_current'] ) ) {
                $args['post__not_in'] = [get_the_ID()];
            }

            $posts = get_posts( $args );

            if ( ! empty( $posts ) && ! is_wp_error(  $posts ) ) {

                return $posts[0];

            } else {

                return [];

            }

        }

        // get a group of related posts
        if ( $settings[$control_name . '_source'] == 'related' ) {

            if ( is_singular( 'post' ) ) {

                $args = [
                    'post_type' => 'post',
                    'fields' => 'ids',
                    'order' => $settings[$control_name . '_order'],
                    'orderby' => $settings[$control_name . '_orderby'],
                    'posts_per_page' => 1,
                    'offset' => $settings[$control_name . '_offset'],
                ];

                global $post;

                $args['category__in'] = wp_get_post_categories(get_the_ID());
                $args['post__not_in'] = [get_the_ID()];

                $posts = get_posts( $args );

                if ( ! empty( $posts ) && ! is_wp_error(  $posts ) ) {

                    return $posts[0];

                } else {

                    return [];

                }

            }

        }

    }

}
