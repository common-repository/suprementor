<?php

namespace Suprementor\Modules\Post_Slideshow\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Bottom extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_bottom';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Bottom', 'suprementor' );
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

                        <li class="uk-overflow-hidden">

                            <div class="uk-position-cover <?php echo esc_attr( implode( ' ', $settings['sup_slideshow_image_wrap_classes']) ); ?>">

                                <?php \Suprementor\Controls\Post\Responsive_Thumbnail::render( $settings, $post_id, true ); ?>

                            </div>

                        </li>

                    <?php endforeach; ?>

                </ul>

                <?php \Suprementor\Controls\Slidenav::render( $settings ); ?>

                <div class="sup-slideshow-nav">

                    <div class="uk-flex uk-flex-no-wrap uk-flex-1 uk-flex-wrap-stretch" uk-height-match="target: > .sup-slideshow-nav-item;">

                        <?php foreach ( $post_ids as $k => $post_id ) : ?>

                            <div class="sup-slideshow-nav-item uk-width-expand uk-transition-toggle sup-transition-all" uk-slideshow-item="<?php echo $k; ?>">

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
