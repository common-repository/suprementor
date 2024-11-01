<?php

namespace Suprementor\Controls\Product\Category;

if ( ! defined( 'ABSPATH' ) ) exit;

class Scale_Up_Thumbnail {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [] ) {

        $obj->start_controls_section(
            'sup_content_product_category_scale_up_thumbnail',
            [
                'label' => __( 'Thumbnail', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_product_category_scale_up_thumbnail_show',
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
            'sup_product_category_scale_up_thumbnail_desktop',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_product_category_scale_up_thumbnail_tablet',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_product_category_scale_up_thumbnail_mobile',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
            ]
        );

        $obj->add_control(
            'sup_product_category_scale_up_thumbnail_transition',
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

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_product_category_scale_up_thumbnail_wrapper_classes'][] = 'sup-scale-up-thumbnail-wrap-processed';
        ( empty( $settings['sup_product_category_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_product_category_scale_up_thumbnail_wrapper_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_product_category_scale_up_thumbnail_transition'] ) ) ?: $settings['sup_product_category_scale_up_thumbnail_wrapper_classes'][] = $settings['sup_product_category_scale_up_thumbnail_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $category_id, $as_cover = false ) {

        if ( ! class_exists( 'WooCommerce' ) ) {

            return;

        }

        if ( empty( get_term( $category_id ) ) || is_wp_error( get_term( $category_id ) ) ) {

            return;

        }

        $thumbnail_id = get_term_meta( $settings['sup_category_id'], 'thumbnail_id', true );

        $category_url = get_category_link( $settings['sup_category_id'] );

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_product_category_scale_up_thumbnail_show'] ) ) : ?>

            <?php if ( empty( $as_cover ) ) : ?>

                <div class="uk-overflow-hidden">

                    <a class="uk-display-block" href="<?php echo esc_url( $category_url ); ?>">

                        <div class="<?php echo esc_attr( implode( ' ', $settings['sup_product_category_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                            <picture><source media='(min-width: 1023px)' srcset='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_desktop'] ); ?>'><source media='(min-width: 767px)' srcset='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_tablet'] ); ?>'>
                                <img class="uk-display-block" src='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_mobile'] ); ?>'>
                            </picture>

                        </div>

                    </a>

                </div>

            <?php endif; ?>

            <?php if ( ! empty( $as_cover ) ) : ?>

                <a class="uk-position-cover uk-display-block" href="<?php echo esc_url( $category_url ); ?>">

                    <div class="sup-product-category-scale-up-thumbnail-outer uk-overflow-hidden uk-position-cover">

                        <div class="sup-product-category-scale-up-thumbnail-inner uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_product_category_scale_up_thumbnail_wrapper_classes'] ) ); ?>">

                            <picture><source media='(min-width: 1023px)' srcset='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_desktop'] ); ?>'><source media='(min-width: 767px)' srcset='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_tablet'] ); ?>'>
                                <img uk-cover src='<?php echo wp_get_attachment_image_url( $thumbnail_id, $settings['sup_product_category_scale_up_thumbnail_mobile'] ); ?>'>
                            </picture>

                        </div>

                    </div>

                </a>

            <?php endif; ?>

        <?php endif; ?>

        <?php
    }

}
