<?php

namespace Suprementor\Controls\Post\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Responsive_Thumbnail_Duo {

    /**
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_post_responsive_thumbnail_duo',
            [
                'label' => __( 'Thumbnail Duo', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        if ( ! class_exists( 'ACF' ) ) {

            $obj->add_control(
                'sup_post_category_responsive_thumbnail_duo_missing_acf',
                [
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'raw' => \Suprementor\Helpers\General::alert_acf_message(),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

        }

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_show',
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
            'sup_post_category_responsive_thumbnail_duo_link',
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
            'sup_post_category_responsive_thumbnail_duo_image_mode',
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
            'sup_post_category_responsive_thumbnail_duo_size',
            [
                'label' => __( 'Image Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'simple'
                ]
            ]
        );

        $obj->start_controls_tabs(
            'sup_post_category_responsive_thumbnail_duo_image_tabs'
        );

        $obj->start_controls_tab(
            'sup_post_category_responsive_thumbnail_duo_image_tab_1',
            [
                'label' => __( 'Image One', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_desktop_1',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_tablet_1',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_mobile_1',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_transition_opaque_1',
            [
                'label' => __( 'Transition Opaque', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_transition_1',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-transition-scale-up',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->end_controls_tab();

        $obj->start_controls_tab(
            'sup_post_category_responsive_thumbnail_duo_image_tab_2',
            [
                'label' => __( 'Image Two', 'suprementor' ),
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_desktop_2',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_tablet_2',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_mobile_2',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_category_responsive_thumbnail_duo_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_transition_opaque_2',
            [
                'label' => __( 'Transition Opaque', 'suprementor' ),
                'description' => __( 'Set this to No to allow Image One to be visible.', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'suprementor' ),
                'label_off' => __( 'No', 'suprementor' ),
                'return_value' => 'yes',
                'default' => false,
            ]
        );

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_transition_2',
            [
                'label' => __( 'Transition', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'uk-transition-scale-down',
                'options' => \Suprementor\Helpers\UIkit::transition(),
            ]
        );

        $obj->end_controls_tab();

        $obj->end_controls_tabs();

        $obj->add_control(
            'sup_post_category_responsive_thumbnail_duo_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the categories Image 1 and Image 2 Supreme ACF fields.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /**
    *  RENDER
    */
    public static function render( $settings, $category_id, $as_cover = false, $wrap_classes_1 = [], $wrap_classes_2 = [] ) {

        if ( ! class_exists( 'ACF' ) ) {
            return;
        }

        $images = get_field( 'sup_post_category_group_images', 'category_' . $category_id );

        if ( ! empty( $images['sup_post_category_image_1'] ) && ! empty( $images['sup_post_category_image_2'] ) ) {

            if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'advanced') {

                $desktop_image_1 = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_desktop_1']];
                $mobile_image_1 = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_mobile_1']];
                $tablet_image_1 = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_tablet_1']];

                $desktop_image_2 = $images['sup_post_category_image_2']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_desktop_2']];
                $tablet_image_2 = $images['sup_post_category_image_2']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_tablet_2']];
                $mobile_image_2 = $images['sup_post_category_image_2']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_mobile_2']];

            }

            if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'simple') {

                if ( ! empty( $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_size']] ) ) {
                    $simple_image_1 = $images['sup_post_category_image_1']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_size']];
                } else {
                    $simple_image_1 = $images['sup_post_category_image_1']['sizes']['large'];
                }

                if ( ! empty( $images['sup_post_category_image_2']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_size']] ) ) {
                    $simple_image_2 = $images['sup_post_category_image_2']['sizes'][$settings['sup_post_category_responsive_thumbnail_duo_size']];
                } else {
                    $simple_image_2 = $images['sup_post_category_image_2']['sizes']['large'];
                }

            }


            $wrap_classes_1[] = 'sup-post-category-responsive-thumbnail-duo-wrap-processed-1';
            ( empty( $settings['sup_post_category_responsive_thumbnail_duo_transition_opaque_1'] ) ) ?: $wrap_classes_1[] = 'uk-transition-opaque';
            ( empty( $settings['sup_post_category_responsive_thumbnail_duo_transition_1'] ) ) ?: $wrap_classes_1[] = $settings['sup_post_category_responsive_thumbnail_duo_transition_1'];

            $wrap_classes_2[] = 'sup-post-category-responsive-thumbnail-duo-wrap-processed-2';
            ( empty( $settings['sup_post_category_responsive_thumbnail_duo_transition_opaque_2'] ) ) ?: $wrap_classes_2[] = 'uk-transition-opaque';
            ( empty( $settings['sup_post_category_responsive_thumbnail_duo_transition_2'] ) ) ?: $wrap_classes_2[] = $settings['sup_post_category_responsive_thumbnail_duo_transition_2'];

        }

        ?>

        <?php if ( ! empty( $settings['sup_post_category_responsive_thumbnail_duo_show'] ) ) : ?>

            <?php if ( empty( $images['sup_post_category_image_1'] ) || empty( $images['sup_post_category_image_2'] ) ) : ?>

                <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger ', 'Please set Images One & Two in Posts > Categories > Edit Category.' ); ?>

            <?php else : ?>

                <?php if ( empty( $as_cover ) ) : ?>

                    <div class="uk-cover-container">

                        <?php if ( ! empty( $settings['sup_post_category_responsive_thumbnail_duo_link'] ) ) : ?>

                            <a class="uk-display-block" href="<?php echo esc_url( get_category_link( $category_id ) ); ?>">

                            <?php endif; ?>

                            <div class="uk-cover-container">

                                <div class="<?php echo esc_attr( implode( ' ', $wrap_classes_1 ) ); ?>">

                                    <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                        <img class="uk-display-block uk-width-1-1" src="<?php echo esc_url( $simple_image_1 ); ?>">

                                    <?php endif; ?>

                                    <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                        <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_1 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_1 ); ?>">
                                            <img class="uk-display-block uk-width-1-1" src="<?php echo esc_url( $mobile_image_1 ); ?>">
                                        </picture>

                                    <?php endif; ?>

                                </div>

                                <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $wrap_classes_2 ) ); ?>">

                                    <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                        <img uk-cover class="uk-display-block" src="<?php echo esc_url( $simple_image_2 ); ?>">

                                    <?php endif; ?>

                                    <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                        <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_2 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_2 ); ?>">
                                            <img uk-cover class="uk-display-block" src="<?php echo esc_url( $mobile_image_2 ); ?>">
                                        </picture>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <?php if ( ! empty( $settings['sup_post_responsive_thumbnail_link'] ) ) : ?>

                            </a>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php if ( ! empty( $as_cover ) ) : ?>

                    <?php if ( ! empty( $settings['sup_post_category_responsive_thumbnail_duo_link'] ) ) : ?>

                        <a class="uk-display-block" href="<?php echo esc_url( get_category_link( $category_id ) ); ?>">

                        <?php endif; ?>

                        <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $wrap_classes_1 ) ); ?>">

                            <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img uk-cover class="uk-display-block" src="<?php echo esc_url( $simple_image_1 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echo esc_url( $desktop_image_1 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_1 ); ?>">
                                    <img uk-cover class="uk-display-block" src="<?php echo esc_url( $mobile_image_1 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                        <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $wrap_classes_2 ) ); ?>">

                            <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'simple') : ?>

                                <img uk-cover class="uk-display-block" src="<?php echo esc_url( $simple_image_2 ); ?>">

                            <?php endif; ?>

                            <?php if ( $settings['sup_post_category_responsive_thumbnail_duo_image_mode'] == 'advanced') : ?>

                                <picture><source media="(min-width: 1023px)" srcset="<?php echoesc_url( $desktop_image_2 ); ?>"><source media="(min-width: 767px)" srcset="<?php echo esc_url( $tablet_image_2 ); ?>">
                                    <img uk-cover class="uk-display-block" src="<?php echo esc_url( $mobile_image_2 ); ?>">
                                </picture>

                            <?php endif; ?>

                        </div>

                        <?php if ( ! empty( $settings['sup_post_category_responsive_thumbnail_duo_link'] ) ) : ?>

                        </a>

                    <?php endif; ?>

                <?php endif; ?>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
