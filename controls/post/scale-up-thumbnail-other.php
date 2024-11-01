<?php

namespace Suprementor\Controls\Post;

if ( ! defined( 'ABSPATH' ) ) exit;

class Scale_Up_Thumbnail_Other {

    /*
    *  SECTION CONTENT
    */
    public static function content( $obj, $conditions = [], $section_label = '[Other]' ) {

        $obj->start_controls_section(
            'sup_content_post_scale_up_thumbnail_other',
            [
                'label' => __( 'Thumbnail ' . $section_label, 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'conditions' => $conditions
            ]
        );

        $obj->add_control(
            'sup_post_scale_up_thumbnail_other_show',
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
            'sup_post_scale_up_thumbnail_other_link',
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
            'sup_post_scale_up_thumbnail_other_image_mode',
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
            'sup_post_scale_up_thumbnail_other_size',
            [
                'label' => __( 'Image Size', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_scale_up_thumbnail_other_image_mode' => 'simple'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_scale_up_thumbnail_other_desktop',
            [
                'label' => __( 'Desktop Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_scale_up_thumbnail_other_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_scale_up_thumbnail_other_tablet',
            [
                'label' => __( 'Tablet Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_scale_up_thumbnail_other_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_scale_up_thumbnail_other_mobile',
            [
                'label' => __( 'Mobile Image', 'suprementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'large',
                'options' => \Suprementor\Helpers\General::get_all_image_sizes(),
                'condition' => [
                    'sup_post_scale_up_thumbnail_other_image_mode' => 'advanced'
                ]
            ]
        );

        $obj->add_control(
            'sup_post_scale_up_thumbnail_other_transition',
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
            'sup_post_scale_up_thumbnail_other_info',
            [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => __( 'This control uses the posts Featured Image.', 'suprementor' ),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $obj->end_controls_section();

    }

    /*
    *  PROCESS
    */
    public static function process( $settings ) {

        $settings['sup_post_scale_up_thumbnail_other_wrapper_classes'][] = 'sup-scale-up-thumbnail-wrap-processed';
        ( empty( $settings['sup_post_scale_up_thumbnail_other_transition'] ) ) ?: $settings['sup_post_scale_up_thumbnail_other_wrapper_classes'][] = 'uk-transition-opaque';
        ( empty( $settings['sup_post_scale_up_thumbnail_other_transition'] ) ) ?: $settings['sup_post_scale_up_thumbnail_other_wrapper_classes'][] = $settings['sup_post_scale_up_thumbnail_other_transition'];

        return $settings;

    }

    /*
    *  RENDER
    */
    public static function render( $settings, $post_id, $as_cover = false ) {

        if ( ! has_post_thumbnail( $post_id ) ) {
            return false;
        }

        $settings = self::process( $settings );

        ?>

        <?php if ( ! empty( $settings['sup_post_scale_up_thumbnail_other_show'] ) ) : ?>

            <div class="uk-transition-toggle">

                <?php if ( empty( $as_cover ) ) : ?>

                    <div class="uk-cover-container">

                        <?php if ( ! empty( $settings['sup_post_scale_up_thumbnail_other_link'] ) ) : ?>

                            <a class="uk-display-block" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">

                            <?php endif; ?>

                            <div class="sup-post-scale-up-thumbnail-other-outer uk-overflow-hidden">

                                <div class="sup-post-scale-up-thumbnail-other-inner <?php echo esc_attr( implode( ' ', $settings['sup_post_scale_up_thumbnail_other_wrapper_classes'] ) ); ?>">

                                    <?php if ( $settings['sup_post_scale_up_thumbnail_other_image_mode'] == 'simple') : ?>

                                        <img class="uk-display-block uk-width-1-1" src="<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_size'] ) ); ?>">

                                    <?php endif; ?>

                                    <?php if ( $settings['sup_post_scale_up_thumbnail_other_image_mode'] == 'advanced') : ?>

                                        <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_desktop'] ) ); ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_tablet'] ) ); ?>'>
                                            <img class="uk-display-block uk-width-1-1" src='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_mobile'] ) ); ?>'>
                                        </picture>

                                    <?php endif; ?>

                                </div>

                            </div>

                            <?php if ( ! empty( $settings['sup_post_scale_up_thumbnail_other_link'] ) ) : ?>

                            </a>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>

                <?php if ( ! empty( $as_cover ) ) : ?>

                    <?php if ( ! empty( $settings['sup_post_scale_up_thumbnail_other_link'] ) ) : ?>

                        <a class="uk-position-cover uk-display-block" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">

                        <?php endif; ?>

                        <div class="sup-post-scale-up-thumbnail-other-outer uk-overflow-hidden uk-position-cover">

                            <div class="sup-post-scale-up-thumbnail-other-inner uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_post_scale_up_thumbnail_other_wrapper_classes'] ) ); ?>">

                                <?php if ( $settings['sup_post_scale_up_thumbnail_other_image_mode'] == 'simple') : ?>

                                    <img uk-cover src='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_size'] ) ); ?>'>

                                <?php endif; ?>

                                <?php if ( $settings['sup_post_scale_up_thumbnail_other_image_mode'] == 'advanced') : ?>

                                    <picture><source media='(min-width: 1023px)' srcset='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_desktop'] ) ); ?>'><source media='(min-width: 767px)' srcset='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_tablet'] ) ); ?>'>
                                        <img uk-cover src='<?php echo esc_url( get_the_post_thumbnail_url( $post_id, $settings['sup_post_scale_up_thumbnail_other_mobile'] ) ); ?>'>
                                    </picture>

                                <?php endif; ?>

                            </div>

                        </div>

                        <?php if ( ! empty( $settings['sup_post_scale_up_thumbnail_other_link'] ) ) : ?>

                        </a>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <?php
    }

}
