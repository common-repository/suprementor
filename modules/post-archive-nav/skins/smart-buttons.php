<?php

namespace Suprementor\Modules\Post_Archive_Nav\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_Buttons extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_buttons';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - Buttons', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->process_settings( $this->parent->get_settings_for_display() ); ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <?php if ( ! empty( $settings['sup_content_post_archive_nav_show']) ) : ?>

            <div class="uk-flex uk-flex-between uk-flex-middle uk-overflow-hidden">

                <div>

                    <?php if ( get_previous_posts_link() ) : ?>

                        <?php $previous_url = get_previous_posts_page_link(); ?>

                        <div class="sup-button-wrap">

                            <a class="sup-button sup-prev-button uk-flex uk-flex-middle sup-line-height-1 sup-transition-all" href="<?php echo esc_url( $previous_url ); ?>">

                                <?php if ( ! empty( $settings['sup_post_archive_nav_icons_show']) ) : ?>

                                    <?php if ( ! empty( $settings['sup_post_archive_nav_icons_show']) ) : ?>

                                        <span class="uk-display-inline-block sup-post-archive-nav-icon-previous sup-line-height-1" uk-icon="icon: chevron-left; ratio: <?php echo $settings['sup_post_archive_nav_icons_size']['size']; ?>;"></span>

                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if ( ! empty( $settings['sup_post_archive_nav_text_show']) ) : ?>

                                    <span class="uk-display-inline-block sup-line-height-1">

                                        <?php echo esc_html( $settings['sup_post_archive_previous_text'] ); ?>

                                    </span>

                                <?php endif; ?>

                            </a>

                        </div>

                    <?php endif; ?>

                </div>

                <div>

                    <?php if ( get_next_posts_link() ) : ?>

                        <?php $next_url = get_next_posts_page_link(); ?>

                        <div class="sup-button-wrap">

                            <a class="sup-button sup-next-button uk-flex uk-flex-middle sup-line-height-1 sup-transition-all" href="<?php echo esc_url( $next_url ); ?>">

                                <?php if ( ! empty( $settings['sup_post_archive_nav_text_show']) ) : ?>

                                    <span class="uk-display-inline-block sup-line-height-1">

                                        <?php echo esc_html( $settings['sup_post_archive_next_text'] ); ?>

                                    </span>

                                <?php endif; ?>

                                <?php if ( ! empty( $settings['sup_post_archive_nav_icons_show']) ) : ?>

                                    <span class="uk-display-inline-block sup-post-archive-nav-icon-next sup-line-height-1" uk-icon="icon: chevron-right; ratio: <?php echo $settings['sup_post_archive_nav_icons_size']['size']; ?>;"></span>

                                <?php endif; ?>

                            </a>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        <?php endif; ?>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
