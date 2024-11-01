<?php

namespace Suprementor\Controls\Post\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Scale_Up_Thumbnail {

    /**
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_category_scale_up_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_post_category_scale_up_thumbnail_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_show',
            [
                'label' => __( 'Show Thumbnail', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_link',
            [
                'label' => __( 'Link Thumbnail', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_image_mode',
            [
                'label' => __( 'Image Mode', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'simple' => __( 'Simple', 'suprementor' ),
                    'advanced' => __( 'Advanced', 'suprementor' ),
                ],
                'default' => 'simple',
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_size',
            [
                'label' => __( 'Image Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_scale_up_thumbnail_image_mode' => 'simple'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_desktop',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_tablet',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_mobile',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_scale_up_thumbnail_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_transition',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [
                    '0' =>  __( '-', 'suprementor' ),
                    'uk-transition-scale-up' => __( 'Scale Up', 'suprementor' )
                ],
            ]
        );

        $obj->add_control(
            'sup_post_category_scale_up_thumbnail_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the categories Image 1 Supreme ACF field.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /**
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_category_scale_up_thumbnail_wrapper_classes'][] = 'sup-scale-up-thumbnail-wrap-processed';
        ( empty( $settings['sup_post_category_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_post_category_scale_up_thumbnail_wrapper_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_category_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_post_category_scale_up_thumbnail_wrapper_classes'][] = $settings['sup_post_category_scale_up_thumbnail_transition'];

        return $settings;

    }

    /**
    *  RENDER
    */
    public static function render( $settings, $category_id, $as_cover = false ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        $settings = self::process( $settings );

        $images = get_field( 'sup_post_category_group_images', 'category_' . $category_id );

        if ( ! empty( $images['sup_post_category_image_1'] ) ) {

            if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'advanced') {

                $desktop_image = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_scale_up_thumbnail_desktop']];
                $mobile_image = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_scale_up_thumbnail_tablet']];
                $tablet_image = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_scale_up_thumbnail_mobile']];

            }

            if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'simple') {

                $simple_image = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_scale_up_thumbnail_size']];

            }

        }

        ?>

        <?php if ( ! empty( $settings['sup_post_category_scale_up_thumbnail_show'] ) ) : ?>

            <?php if ( empty( $images['sup_post_category_image_1'] ) ) : ?>

                <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Please set Image One in Posts > Categories > Edit Category.' ); ?>

            <?php else : ?>

                <div class="uk-transition-toggle">

                    <?php if ( empty( $as_cover ) ) : ?>

                        <div class="uk-cover-container">

                            <?php if ( ! empty( $settings['sup_post_category_scale_up_thumbnail_link'] ) ) : ?>

                                <a class="uk-display-block" href="<?php echo esc_url( get_category_link( $category_id ) ); ?>">

                                <?php endif; ?>

                                <div class="sup-post-scale-up-thumbnail-outer uk-overflow-hidden">

                                    <div class="sup-post-scale-up-thumbnail-inner <?php echo esc_attr( implode( ' ', $settings['sup_post_category_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                                        <?php if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'simple') : ?>

                                            <img class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $simple_image ); ?>'>

                                        <?php endif; ?>

                                        <?php if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'advanced') : ?>

                                            <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( $desktop_image ) ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( $tablet_image ); ?>'>
                                                <img class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $mobile_image ); ?>'>
                                            </picture>

                                        <?php endif; ?>

                                    </div>

                                </div>

                                <?php if ( ! empty( $settings['sup_post_category_scale_up_thumbnail_link'] ) ) : ?>

                                </a>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $as_cover ) ) : ?>

                        <?php if ( ! empty( $settings['sup_post_category_scale_up_thumbnail_link'] ) ) : ?>

                            <a class="uk-position-cover uk-display-block" href="<?php echo esc_url( get_category_link( $category_id ) ); ?>">

                            <?php endif; ?>

                            <div class="sup-post-scale-up-thumbnail-outer uk-overflow-hidden uk-position-cover">

                                <div class="sup-post-scale-up-thumbnail-inner uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_post_category_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                                    <?php if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'simple') : ?>

                                        <img uk-cover class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $simple_image ); ?>'>

                                    <?php endif; ?>

                                    <?php if ( $settings['sup_post_category_scale_up_thumbnail_image_mode'] == 'advanced') : ?>

                                        <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( $desktop_image ) ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( $tablet_image ); ?>'>
                                            <img uk-cover class="uk-display-block uk-width-1-1" src='<?php echo esc_url( $mobile_image ); ?>'>
                                        </picture>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <?php if ( ! empty( $settings['sup_post_category_scale_up_thumbnail_link'] ) ) : ?>

                            </a>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
