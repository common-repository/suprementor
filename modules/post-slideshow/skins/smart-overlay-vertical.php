<?php

namespace Suprementor\Modules\Post_Slideshow\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_Overlay_Vertical extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_overlay_vertical';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Overlay Vertical', 'suprementor' );
    }

    /**
    * Render the skin.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        $post_ids = \Suprementor\Group_Controls\Get_Posts::get_ids( $settings, 'sup_get_posts' );

        ?>

        <?php if ( empty( $post_ids ) ) : ?>

            <?php \Suprementor\Helpers\General::alert( 'uk-alert-danger', 'Please adjust the <strong>Post Select</strong> control to get some posts.' ); ?>

        <?php else : ?>

            <?php \Suprementor\Controls\Wrapper::open( $settings,  $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

            <div uk-slideshow="<?php echo esc_attr( $settings['sup_slideshow_atts'] ); ?>" class="uk-overflow-hidden uk-position-relative">

                <ul class="uk-slideshow-items">

                    <?php foreach ( $post_ids as $post_id ) : ?>

                        <li>

                            <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_slideshow_image_wrap_classes']) ); ?>">

                                <?php \Suprementor\Controls\Post\Responsive_Thumbnail::render( $settings, $post_id, true, $settings['sup_slideshow_image_wrap_classes'] ); ?>

                            </div>

                        </li>

                    <?php endforeach; ?>

                </ul>

                <?php \Suprementor\Controls\Slidenav::render( $settings ); ?>

                <div class="sup-slideshow-nav uk-flex uk-flex-top <?php echo esc_attr( implode( ' ', $settings['sup_slideshow_nav_vertical_classes'] ) ); ?>">

                    <div class="uk-flex uk-flex-wrap uk-flex-middle">

                        <?php foreach ( $post_ids as $k => $post_id ) : ?>

                            <div class="uk-flex uk-flex-stretch uk-flex-column uk-width-1-1 sup-slideshow-nav-item sup-transition-all" uk-slideshow-item="<?php echo $k; ?>">

                                <?php \Suprementor\Controls\Post\Title::render( $settings, $post_id ); ?>

                                <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, $post_id ); ?>

                                <?php \Suprementor\Controls\Post\Excerpt::render( $settings, $post_id ); ?>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

            <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php endif; ?>

        <?php

    }

}
